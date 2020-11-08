<?php
class Conexao {
    private $data = array();
    //variavel da classe Base
    protected $pdo = null;

    public function __set($name, $value){
        $this->data[$name] = $value;
    }

    public function __get($name){
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }
    //método que retorna a variável $pdo
    public function getPdo() {
        return $this->pdo;
    }

    //método construtor da classe
    function __construct($pdo = null) {
        $this->pdo = $pdo;
        if ($this->pdo == null)
            $this->conectar();
    }

    //método que conecta com o banco de dados
    public function conectar() {
        $_servidor = $_SERVER['SERVER_NAME'];
        if ($_servidor == 'localhost'){
            $local = "localhost";
            $user = "root";
            $pass = "";
            $basename = "sist_blsh; charset=utf8";
        }else{
            $local = "seu-servidor-web";
            $user = "user-web";
            $pass = "pass-web";
            $basename = "base-web";
        }
        try {
            $this->pdo = new PDO("mysql:host=$local;dbname=$basename",
                "$user",
                "$pass",
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    //método que desconecta
    public function desconectar() {
        $this->pdo = null;
    }

    public function select($sql){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectObj($sql){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $this->total = count($stmt);
        $arr = array();
        // percorre o resultado inserindo os dados no array
        while ($obj = $stmt->fetchObject()) {
            $arr[] = $obj;
        }
        return $arr;
    }

    public function delete( $tabela, $where ){
        $stmt = $this->pdo->prepare( "DELETE FROM {$tabela} WHERE {$where}" );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert( array $dados, $tabela ){
        $campos  = implode(", ", array_keys($dados) );
        $valores = "'" . implode( "', '", array_values($dados) ) . "'";

        $stmt = $this->pdo->prepare( "INSERT INTO {$tabela} ({$campos}) VALUES ({$valores})" );
        if($stmt->execute()){
            $this->idPessoa = $this->pdo->lastInsertId();
            return true;
        }else{
            $this->erro = "<br/>Erro ao Cadastrar {$tabela}!!!";
            //echo "INSERT INTO {$tabela} ({$campos}) VALUES ({$valores})";
            return false;
        }

    }

    public function update( array $dados, $tabela, $where ){
        foreach( $dados as $indice => $valor ){
            $campos[] = "{$indice} = '{$valor}'";
        }

        $campos  = implode(', ', $campos);
        $stmt = $this->pdo->prepare( "UPDATE {$tabela} SET {$campos} WHERE {$where}" );
        if($stmt->execute()){
            //echo "UPDATE {$tabela} SET {$campos} WHERE {$where} <br/><hr/>";
            return true;
        }else{
            $this->erro = "<br/>Erro ao atualizar {$tabela}!!!";
            //echo "UPDATE {$tabela} SET {$campos} WHERE {$where}";
            return false;
        }
    }

    /* função para salvar o(s) erro(s), caso haja */
    function SalvarErro($erro) {
        /* se não houver erros retornamos */
        if (error_reporting() == 0)
            return;
        /* queremos que não passe os erros na tela, nós trataremos eles do nosso modo */
        /* setamos os métodos de exibição de erros */
        $exec = func_get_arg(0);
        $errc = $exec->getCode();
        $errm = $exec->getMessage();
        $errf = $exec->getFile();
        $errl = $exec->getLine();
        /* definimos o nome do erro */
        $errn = 'CAUGHT EXCEPTION';
        /* preparamos o erro para salvar no txt */
        $strError = 'erro: ' . $errn . ' no arquivo ' . $errf . ' na linha(' . $errl . ') com o IP(' . $_SERVER['REMOTE_ADDR'] . ')';
        $strError .= ' na data ' . date('d/m/y H:i:s') . "\n";
        /* abrimos, gravamos os erros e fechamos o txt */
        $arquivo = fopen('errosGiga.txt', 'a');
        fwrite($arquivo, $strError);
        fclose($arquivo);
    }

}

?>