<?php

require_once './db/dbConnection.php';

class mevento_condpagamento extends dbConnection {

    private $CodEvtPag;
    private $Cod_TipoPagamento;
    private $ID_EVT;

//    public function setID($ID)
//    {
//        $this->ID = $ID;
//    }
    public function getCodEvtPag()
    {
        return $this->CodEvtPag;
    }
    
    public function setCod_TipoPagamento($Cod_TipoPagamento)
    {
        $this->Cod_TipoPagamento = $Cod_TipoPagamento;
    }
    public function getCod_TipoPagamento()
    {
        return $this->Cod_TipoPagamento;
    }
    
    public function setID($ID_EVT)
    {
        $this->ID_EVT = $ID_EVT;
    }
    public function getID_EVT()
    {
        return $this->ID_EVT;
    }

}
