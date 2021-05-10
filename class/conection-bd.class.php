<?php
trait Conection {

    private $host = '127.0.0.1';
    private $dbName = 'rifa';
    private $dbUser = 'root';
    private $dbPassword = '';
    private $pdo;

    function __construct(){
        try{
            $this->pdo = new PDO("mysql:dbname={$this->dbName};host={$this->host}", "{$this->dbUser}", "{$this->dbPassword}");
        }catch(Exceptio $e){
            echo 'Erro: ' . $e->getMessage();
        }
    }

}