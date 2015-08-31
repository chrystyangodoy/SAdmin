<?php
require '../db/dbConnection.php';

class mTransUsuario extends dbConnection {
    private $ID_Detalhe_Transacao;
    private $COD_TIPO_Origem_Transacao;
    private $COD_Tipo_Sistema_Transacao;
    private $DTM_Transacao;
    private $ID_SEG_Usuario;
    private $DSC_Login_Transacao;
    

    public function setDetalhe_Transacao($ID_Detalhe_Transacao){
        $this->ID_Detalhe_Transacao = $ID_Detalhe_Transacao;
    }
    
    public function getDetalhe_Transacao() {
        $this->ID_Detalhe_Transacao;
    }
    
    public function setTIPO_Origem_Transacao($COD_TIPO_Origem_Transacao){
        $this->COD_TIPO_Origem_Transacao = $COD_TIPO_Origem_Transacao;
    }
    
    public function getTIPO_Origem_Transacao() {
        $this->COD_TIPO_Origem_Transacao;
    }
    
    public function setCOD_Tipo_Sistema_Transacao($COD_Tipo_Sistema_Transacao) {
        $this->COD_Tipo_Sistema_Transacao = $COD_Tipo_Sistema_Transacao;
    }

    public function getCOD_Tipo_Sistema_Transacao() {
        return $this->COD_Tipo_Sistema_Transacao;
    }
    
    public function setID_SEG_Usuario($ID_SEG_Usuario) {
        $this->ID_SEG_Usuario = $ID_SEG_Usuario;
    }

    public function getID_SEG_Usuario() {
        return $this->ID_SEG_Usuario;
    }
    
        public function setDTM_Transacao($DTM_Transacao) {
        $this->DTM_Transacao = $DTM_Transacao;
    }

    public function getDTM_Transacao() {
        return $this->DTM_Transacao;
    }
    
        public function setDSC_Login_Transacao($DSC_Login_Transacao) {
        $this->DSC_Login_Transacao = $DSC_Login_Transacao;
    }

    public function getDSC_Login_Transacao() {
        return $this->DSC_Login_Transacao;
    }

}