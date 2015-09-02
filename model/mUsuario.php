<?php
require_once './db/dbConnection.php';

class mUsuario extends dbConnection {

    private $ID_Usuario;
    private $DSC_Login;
    private $DSC_Senha;
    private $DTM_Inicio;
    private $DTM_Fim;
    private $ID_SEG_Grupo;

    public function setID_Usuario($ID_Usuario) {
        $this->ID_Usuario = $ID_Usuario;
    }

    public function getID_Usuario() {
        $this->ID_Usuario;
    }

    public function setDSC_Login($DSC_Login) {
        $this->DSC_Login = $DSC_Login;
    }

    public function getDSC_Login() {
        return $this->DSC_Login;
    }

    public function setDSC_Senha($DSC_Senha) {
        $this->DSC_Senha = $DSC_Senha;
    }

    public function getDSC_Senha() {
        return $this->DSC_Senha;
    }

    public function setDTM_Inicio($DTM_Inicio) {
        $this->DTM_Inicio = $this->dateToUS($DTM_Inicio);
    }

    public function getDTM_Inicio($us = false) {
        if ($us) {
            return $this->DTM_Inicio;
        } else {
            return $this->dateToBR(DTM_Inicio);
        }
    }

    public function setDTM_Fim($DTM_Fim) {
        $this->DTM_Fim = $this->dateToUS($DTM_Fim);
    }

    public function getDTM_Fim($us = false) {
        if ($us) {
            return $this->DTM_Fim;
        } else {
            return $this->dateToBR(DTM_Fim);
        }
    }

    public function setID_SEG_Grupo($ID_SEG_Grupo) {
        $this->ID_SEG_Grupo = $ID_SEG_Grupo;
    }

    public function getID_SEG_Grupo() {
        return $this->ID_SEG_Grupo;
    }

}
