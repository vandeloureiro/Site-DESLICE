<?php
class Conexao{

    public $host = 'localhost';
    public $user = 'root';
    public $senha = '';
    public $bd = 'bd_deslice';

    function Conecta(){
        try{
            $pdo = new PDO("mysql:host=". $this->host ."; dbname=". $this->bd .";", $this->user, $this->senha,
                    array(
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_PERSISTENT => false,
                            PDO::ATTR_EMULATE_PREPARES => false,
                            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    )
                );
            return $pdo;
        } catch(PDOException $e){
            //echo "Erro ao conectar - ". $e->getMessage();
            throw new PDOException($e);
        }
    }

    function getHost(){
        echo $this->host;
    }

}