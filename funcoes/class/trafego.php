<?php
/**
 * Created by PhpStorm.
 * User: Yeta Barnabe
 * Date: 05/07/2019
 * Time: 16:33
 */

class trafego
{
    private $db;
    private $uri;
    private $ip;
    private $data;
    private $user_agent;


    public function __construct()
    {
       // $this->db = new PDO('mysql:host=localhost; dbname=sistema_blsh; charset=utf8', 'root', '');
        $this->uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT);
        $this->ip = "105.168.6.159";//filter_input(INPUT_SERVER,'REMOTE_ADDR', FILTER_VALIDATE_IP);
        $_COOKIE = filter_input(INPUT_COOKIE, md5($this->uri), FILTER_DEFAULT);
        $this->user_agent = filter_input(INPUT_SERVER, "HTTP_USER_AGENT");

        if (!$_COOKIE):
            $this->_set_cookie();
            $this->_set_data();
        endif;
//        echo $this->_get_browser(); echo $this->_get_plataforma(); echo $this->_get_referer();
    }

    private function _set_cookie()
    {
        setcookie(md5($this->uri), TRUE, time() + strtotime(date('Y-m-d 23:59:59')) - time());
    }

    private function _set_data()
    {
        $geo = json_decode(file_get_contents("http://ip-api.com/json/{$this->ip}"));
        $this->data['data'] = date('Y-m-d H:i:s');
        $this->data['pagina'] = $this->uri;
        $this->data['ip'] = $this->ip;
        $this->data['cidade'] = (isset($geo->city)) ? $geo->city : "Desconhecido";
        $this->data['regiao'] = (isset($geo->regionName)) ? $geo->regionName : "Desconhecido";
        $this->data['pais'] = (isset($geo->country)) ? $geo->country : "Desconhecido";
        $this->data['navegador'] = $this->_get_browser();
        $this->data['plataforma'] = $this->_get_plataforma();
        $this->data['referencia'] = $this->_get_referer();

        $this->_rec_data();
    }

    private function _get_browser()
    {
        $browsers = array(
            'OPR' => 'Opera',
            'Flock' => 'Flock',
            'Edge' => 'Edge',
            'Chrome' => 'Chrome',
            'Opera.*?Version' => 'Opera',
            'Opera' => 'Opera',
            'MSIE' => 'Internet Explorer',
            'Internet Explorer' => 'Internet Explorer',
            'Trident.* rv' => 'Internet Explorer',
            'Shiira' => 'Shiira',
            'Firefox' => 'Firefox',
            'Chimera' => 'Chimera',
            'Phoenix' => 'Phoenix',
            'Firebird' => 'Firebird',
            'Camino' => 'Camino',
            'Netscape' => 'Netscape',
            'OmniWeb' => 'OmniWeb',
            'Safari' => 'Safari',
            'Mozilla' => 'Mozilla',
            'Konqueror' => 'Konqueror',
            'icab' => 'iCab',
            'Lynx' => 'Lynx',
            'Links' => 'Links',
            'hotjava' => 'HotJava',
            'amaya' => 'Amaya',
            'IBrowse' => 'IBrowse',
            'Maxthon' => 'Maxthon',
            'Ubuntu' => 'Ubuntu Web Browser'
        );
        foreach ($browsers as $key => $value):
            if (preg_match('|' . $key . '.*?([0-9\.]+)|i', $this->user_agent)):
                return $value;
            endif;
        endforeach;
    }

    private function _get_plataforma()
    {
        $platforms = array(
            'windows nt 10.0' => 'Windows 10',
            'windows nt 6.3' => 'Windows 8.1',
            'windows nt 6.2' => 'Windows 8',
            'windows nt 6.1' => 'Windows 7',
            'windows nt 6.0' => 'Windows Vista',
            'windows nt 5.2' => 'Windows 2003',
            'windows nt 5.1' => 'Windows XP',
            'windows nt 5.0' => 'Windows 2000',
            'windows nt 4.0' => 'Windows NT 4.0',
            'winnt4.0' => 'Windows NT 4.0',
            'winnt 4.0' => 'Windows NT',
            'winnt' => 'Windows NT',
            'windows 98' => 'Windows 98',
            'win98' => 'Windows 98',
            'windows 95' => 'Windows 95',
            'win95' => 'Windows 95',
            'windows phone' => 'Windows Phone',
            'windows' => 'Unknown Windows OS',
            'android' => 'Android',
            'blackberry' => 'BlackBerry',
            'iphone' => 'iOS',
            'ipad' => 'iOS',
            'ipod' => 'iOS',
            'os x' => 'Mac OS X',
            'ppc mac' => 'Power PC Mac',
            'freebsd' => 'FreeBSD',
            'ppc' => 'Macintosh',
            'linux' => 'Linux',
            'debian' => 'Debian',
            'sunos' => 'Sun Solaris',
            'beos' => 'BeOS',
            'apachebench' => 'ApacheBench',
            'aix' => 'AIX',
            'irix' => 'Irix',
            'osf' => 'DEC OSF',
            'hp-ux' => 'HP-UX',
            'netbsd' => 'NetBSD',
            'bsdi' => 'BSDi',
            'openbsd' => 'OpenBSD',
            'gnu' => 'GNU/Linux',
            'unix' => 'Unknown Unix OS',
            'symbian' => 'Symbian OS'
        );
        foreach ($platforms as $key => $value):
            if (preg_match('|' . preg_quote($key) . '|i', $this->user_agent)):
                return $value;
            endif;
        endforeach;
    }

    private function _get_referer()
    {
        $referer = filter_input(INPUT_SERVER, 'HTTP_REFERER', FILTER_VALIDATE_URL);
        $referer_host = parse_url($referer, PHP_URL_HOST);
        $host = filter_input(INPUT_SERVER, 'SERVER_NAME');

        if (!$referer):
            $returno = 'Acesso direto';
        elseif ($referer_host == $host):
            $returno = 'Navegação Interna';
        else:
            $returno = $referer;
        endif;
        return $returno;
    }

    private function _rec_data()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=sist_blsh; charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('INSERT INTO trafego (`datas`, `pagina`, `ip`, `cidade`, `regiao`, `pais`, `navegador`, `referencia`, `plataforma`) VALUES(:data,:pagina,:ip,:cidade,:regiao,:pais,:navegador,:referencia,:plataforma)');
            $stmt->execute(($this->data));

//            echo $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }
}
