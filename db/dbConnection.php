<?php

require_once './config/configs.php';

class dbConnection extends configs {

    private $user = 'root';
    private $senha = '';
    private $host = 'localhost';
    private $dbname = 'Siga_web';
    //private $host = '192.168.1.59';
    //private $dbname = 'Siga-web';

    private function Connect() {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->senha);
        return $conn;
    }

    //Executa uma query. Retorna a quantidade de linha executada(True).
    public function RunQuery($sql) {
        $stm = $this->Connect()->prepare($sql);
        return $stm->execute();
    }

    //Executa uma select
    public function RunSelect($sql) {
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function RunLog($sql) {
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        //return $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

}
