<?php

require_once './db/dbConnection.php';

class mBsc_Banco extends dbConnection {

    private $ID_Pagamento_Boleto;
    private $NUM_Boleto;
    private $COD_Barras_Boleto;
    private $ID_EVT_Pagamento;

    public function setID_Pagamento_Boleto($ID_Pagamento_Boleto)
    {
        $this->ID_Pagamento_Boleto = $ID_Pagamento_Boleto;
    }

    public function getID_Pagamento_Boleto()
    {
        return $this->ID_Pagamento_Boleto;
    }
    
    public function setNUM_Boleto($NUM_Boleto)
    {
        $this->NUM_Boleto = $NUM_Boleto;
    }
    
    public function getNUM_Boleto()
    {
        return $this->NUM_Boleto;
    }
    
    public function setCOD_Barras_Boleto($COD_Barras_Boleto)
    {
        $this->COD_Barras_Boleto = $COD_Barras_Boleto;
    }

    public function getCOD_Barras_Boleto()
    {
        return $this->COD_Barras_Boleto;
    }
    
    public function setID($ID_EVT_Pagamento)
    {
        $this->ID_EVT_Pagamento = $ID_EVT_Pagamento;
    }

    public function getID_EVT_Pagamento()
    {
        return $this->ID_EVT_Pagamento;
    }
}
