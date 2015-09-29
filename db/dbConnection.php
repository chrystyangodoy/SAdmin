<?php

require_once './config/configs.php';

require_once './config/constants.php';

class dbConnection extends configs {
    
    
    private $user = "root";
    private $senha = '';
    private $host = 'localhost';
    private $dbname = 'Siga_web';

//private $host = '192.168.1.59';
//private $dbname = 'Siga-web';

    private function Connect() {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->senha);
            return $conn;
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
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
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function RunID($sql) {
        $stm = $this->Connect()->que($sql);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function RunInsert($sql) {

        $con = mysqli_connect($this->host, $this->user, $this->senha, $this->dbname);
// Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

// Set autocommit to off
        mysqli_autocommit($con, FALSE);

// Insert some values 
        mysqli_query($con, $sql);


// Commit transaction
        mysqli_commit($con);

        $ultID = mysqli_insert_id($con);

// Close connection
        mysqli_close($con);

        return $ultID;
    }

}
