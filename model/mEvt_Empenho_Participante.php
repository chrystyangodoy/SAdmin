
<?php

require_once './db/dbConnection.php';

class mEvt_Empenho_Participante extends dbConnection {

    private $ID_Empenho_Participante;
    private $COD_CPF;
    private $DSC_Nome;
    private $SIT_USUFRUI;
    private $VLR_Consumido;
    private $ID_EVT_Empenho;

    public function setID_Empenho_Participante($ID_Empenho_Participante) {
        $this->ID_Empresa = $ID_Empenho_Participante;
    }

    public function getID_Empenho_Participante() {
        return $this->ID_Empenho_Participante;
    }

    public function setCOD_CPF($COD_CPF) {
        $this->ID_Empresa = $COD_CPF;
    }

    public function getCOD_CPF() {
        return $this->COD_CPF;
    }

    public function setDSC_Nome($DSC_Nome) {
        $this->ID_Empresa = $DSC_Nome;
    }

    public function getDSC_Nome() {
        return $this->DSC_Nome;
    }

    public function setSIT_USUFRUI($SIT_USUFRUI) {
        $this->SIT_USUFRUI = $SIT_USUFRUI;
    }

    public function getSIT_USUFRUI() {
        return $this->SIT_USUFRUI;
    }

    public function setVLR_Consumido($VLR_Consumido) {
        $this->VLR_Consumido = $VLR_Consumido;
    }

    public function getVLR_Consumido() {
        return $this->VLR_Consumido;
    }

    public function setID_EVT_Empenho($ID_EVT_Empenho) {
        $this->SIT_USUFRUI = $ID_EVT_Empenho;
    }

    public function getID_EVT_Empenho() {
        return $this->ID_EVT_Empenho;
    }

}
