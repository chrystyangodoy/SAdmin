<?php
require_once 'config/configs.php';

class dbConnection extends configs{
    private $user = 'root';
    private $senha = '';
    private $host = 'localhost';
    private $dbname = 'Siga_web';
    
    private function Connect(){
        $conn = new PDO("mysql:host=this->host;dbname=$this->database",$this->user,$this->senha);
        return $conn;
    }
    private function RunQuery($sql){
        $stm = $this->Connect()->prepare($sql);
        return $stm->execute();
    }
    
    private function RunSelect($sql){
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
}

