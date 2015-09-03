<?php

require_once './db/dbConnection.php';

class mBsc_Profissao extends dbConnection {

    private $ID_Profissao;
    private $DSC_Nome;
    private $DSC_Descricao;

    public function setID_Profissao($ID_Profissao) {
        $this->ID_Profissao = $ID_Profissao;
    }

    public function getID_Profissao() {
        return $this->ID_Profissao;
    }

    public function setDSC_Nome($DSC_Nome) {
        $this->DSC_Nome = $DSC_Nome;
    }

    public function getDSC_Nome() {
        return $this->DSC_Nome;
    }

    public function setDSC_Descricao($DSC_Descricao) {
        $this->DSC_Descricao = $DSC_Descricao;
    }

    public function getDSC_Descricao() {
        return $this->DSC_Descricao;
    }

}
