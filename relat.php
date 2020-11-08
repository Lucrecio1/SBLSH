<?php
/**
 * Created by PhpStorm.
 * User: Yeta Barnabe
 * Date: 08/07/2019
 * Time: 20:59
 */

new relatorio();
class relatorio {
    private $db;
    private $data_atual;

    public function __construct()
    {
        $option= [PDO::MYSQL_ATTR_INIT_COMMAND =>"SET LC_TIME_NAMES = pt_PT"];
        $this->db = new PDO('mysql:host=localhost; dbname=sist_blsh; charset=utf8', 'root', '', $option);
        $this->data_atual = date('Y-m-d H:i:s');

        $uri =urldecode(filter_input(INPUT_SERVER, 'REQUEST_URI')) ;
        $request = explode('/', $uri);
        $method = $request[3];
        $param = $request[4];

       if(method_exists(get_class(), $method)):
           $this->$method($param);
       else:
           return false;
          endif;
    }
    private  function horas_trafego($param = NULL){

        try {
            $periodo = date('Y-m-d H:i:s',  strtotime($param));
            $stmt =("SELECT HOUR(datas) as hora, COUNT(id) as views FROM trafego WHERE datas >= '{$periodo}' GROUP BY  hora ORDER BY hora DESC");
            $query = $this->db->query($stmt);
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            foreach($result as $res):
                $dados[$res->hora] = $res->views;
                endforeach;
            $horas = [];
            for($i=0;$i<24; $i++):
                array_push($horas, '0');
                endfor;

            $final = array_replace($horas, $dados);
            echo json_encode($final);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }
    private function trafego_semanal($param = NULL){
        $periodo = date('Y-m-d H:i:s', strtotime($param));

        $lucre =("SELECT DAYNAME(datas) as dia, COUNT(id) as views FROM trafego WHERE datas >= '{$periodo}' GROUP BY  DAYNAME(datas) ORDER BY datas");
        $query = $this->db->query($lucre);
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        foreach($result as $res):
            $dados[$res->dia] = $res->views;
        endforeach;

      echo json_encode($dados);
    }
    private  function trafego_mensal(){
        $MES = date('m');
        $ano = date('Y');

        $Barn =("SELECT DAY(datas) as dia, COUNT(id) as views FROM trafego WHERE MONTH (datas) = '{$MES}' AND YEAR(datas) = '{$ano}' GROUP BY  DAY(datas) ORDER BY datas");
        $query = $this->db->query($Barn);
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        foreach($result as $res):
            $dados[$res->dia] = $res->views;
        endforeach;

        $dias_do_mes = $this->_dias_do_mes();
        $final = array_replace($dias_do_mes, $dados);
       echo json_encode($final);
    }
    private function _dias_do_mes(){
        $hoje = date('d');

        if($hoje <= 10):
            $esse_mes = 10;
        elseif($hoje <= 15):
        $esse_mes = 15;
        elseif($hoje <= 20):
            $esse_mes = 20;
        elseif($hoje <= 25):
            $esse_mes = 25;
        else:
            $esse_mes = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        endif;

        $dias =[1 => '0'];
        for($i =1; $i< $esse_mes; $i++):

            array_push($dias,'0');
            endfor;
        return $dias;

    }
    public function  trafego_por_plataforma($param = NULL){
       $periodo = date('Y-m-d H:i:s', strtotime($param));

        $lucre =("SELECT plataforma, COUNT(id) as views FROM trafego WHERE datas >= '{$periodo}' GROUP BY plataforma ORDER BY views DESC limit 10");
        $query = $this->db->query($lucre);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        $colors = ['#ff8000', '#FA2A00', '#1ABC9C', '#FSBE28', '#353D47', '#00bfff'];

        $i = 0;
        foreach($result as $res):
          $dados[$i]['value'] = $res->views;
          $dados[$i]['color'] = $colors[$i];
          $dados[$i]['label'] = $res->plataforma;
        $i=$i+1;
        endforeach;

   echo json_encode($dados);
   }
    public function  trafego_por_navegador($param = NULL){
        $periodo = date('Y-m-d H:i:s', strtotime($param));

        $lucre =("SELECT navegador, COUNT(id) as views FROM trafego WHERE datas >= '{$periodo}' GROUP BY navegador ORDER BY views DESC limit 6");
        $query = $this->db->query($lucre);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        $colors = ['#ff8000', '#FA2A00', '#1ABC9C', '#FSBE28', '#353D47', '#00bfff'];
        $highlight=['#ff8000', '1ABC9C', 'FABE28', '#FSBE28', '#353D47', '#00bfff'];

        $i = 0;
        foreach($result as $res):
            $dados[$i]['value'] = $res->views;
            $dados[$i]['color'] = $colors[$i];
            $dados[$i]['highlight'] =$highlight[$i];
            $dados[$i]['label'] = $res->navegador;
            $i++;
        endforeach;

        echo json_encode($dados);
    }

    public function trafego_por_paginas($param){
        $periodo = date('Y-m-d H:i:s', strtotime($param));

        $lucre =("SELECT pagina, COUNT(id) as views FROM trafego WHERE datas >= '{$periodo}' GROUP BY pagina ORDER BY views DESC ");
        $query = $this->db->query($lucre);
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        foreach($result as $res):
            $dados[$res->pagina] = $res->views;
        endforeach;
    echo json_encode($dados);
    }

    public function trafego_por_cidades($param){
        $periodo = date('Y-m-d H:i:s', strtotime($param));

        $lucre =("SELECT cidade, COUNT(id) as views FROM trafego WHERE datas >= '{$periodo}' GROUP BY cidade ORDER BY views DESC ");
        $query = $this->db->query($lucre);
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        foreach($result as $res):
            $dados[$res->cidade] = $res->views;
        endforeach;
        echo json_encode($dados);
    }

    public function Nova_Busca($Sintoma){
        $dad='';
        $dadosdoenca =("select Doenca,Descricao,sintomas.primeiro_socorro from doencas join sintomas on doencas.id_sintomas=sintomas.Sintoma  where id_sintomas= '{$Sintoma}'");
        $query = $this->db->query($dadosdoenca);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        foreach($result as $dados){
           $dad[$dados->Doenca] = $dados->Doenca;
        }
      if($dad):
          echo json_encode($dad);
      else:
          echo json_encode("nao_achou");
        endif;
    }

    public function Nova_BuscaINFO($Sintoma){
        $dad='';
        $dadosdoenca =("select Doenca,Descricao,sintomas.primeiro_socorro from doencas join sintomas on doencas.id_sintomas=sintomas.Sintoma  where id_sintomas= '{$Sintoma}'");
        $query = $this->db->query($dadosdoenca);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        foreach($result as $dados){
            $dad[$dados->Descricao] = $dados->Descricao;
        }
        if($dad):
            echo json_encode($dad);
        else:
            echo json_encode("nao_achou");
        endif;
    }
    public function Nova_BuscaSOCORRO($Sintoma){
        $dad='';
        $dadosdoenca =("select Doenca,Descricao,sintomas.primeiro_socorro from doencas join sintomas on doencas.id_sintomas=sintomas.Sintoma  where id_sintomas= '{$Sintoma}'");
        $query = $this->db->query($dadosdoenca);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        foreach($result as $dados){
            $dad[$dados->primeiro_socorro] = $dados->primeiro_socorro;
        }
        if($dad):
            echo json_encode($dad);
        else:
            echo json_encode("nao_achou");
        endif;
    }
}

