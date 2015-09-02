<?php

require_once './db/dbConnection.php';

class mBsc_Local_Evento extends dbConnection {

    private $ID_Local;
    private $DSC_Nome;
    private $DSC_Endereco;
    private $DSC_Bairro;
    private $DSC_Cidade;
    private $NUM_CEO;
    private $NUM_Fone;
    private $NUM_FAX;
    private $DSC_EMAIL;
    private $DSC_Nome_Contato;
    private $COD_TIPOEstado;

    public function setID_Local($ID_Local) {
        $this->ID_Local = $ID_Local;
    }
    public function getID_Local() {
        return $this->ID_Local;
    }
    public function setDSC_Nome($DSC_Nome) {
        $this->DSC_Nome = $DSC_Nome;
    }
    public function getDSC_Nome() {
        return $this->DSC_Nome;
    }
    public function setDSC_Endereco($DSC_Endereco) {
        $this->DSC_Endereco = $DSC_Endereco;
    }
    public function getDSC_Endereco() {
        return $this->DSC_Endereco;
    }
    public function setDSC_Bairro($DSC_Bairro) {
        $this->DSC_Bairro = $DSC_Bairro;
    }
    public function getDSC_Bairro() {
        return $this->DSC_Bairro;
    }
    public function setDSC_Cidade($DSC_Cidade) {
        $this->DSC_Cidade = $DSC_Cidade;
    }
    public function getDSC_Cidade() {
        return $this->DSC_Cidade;
    }
    public function setNUM_CEO($NUM_CEO) {
        $this->NUM_CEO = $NUM_CEO;
    }
    public function getNUM_CEO() {
        return $this->NUM_CEO;
    }
    public function setNUM_Fone($NUM_Fone) {
        $this->NUM_Fone = $NUM_Fone;
    }
    public function getNUM_Fone() {
        return $this->NUM_Fone;
    }
    public function setNUM_FAX($NUM_FAX) {
        $this->NUM_FAX = $NUM_FAX;
    }
    public function getNUM_FAX() {
        return $this->NUM_FAX;
    }
    public function setDSC_EMAIL($DSC_EMAIL) {
        $this->DSC_EMAIL = $DSC_EMAIL;
    }
    public function getDSC_EMAIL() {
        return $this->DSC_EMAIL;
    }
    public function setDSC_Nome_Contato($DSC_Nome_Contato) {
        $this->DSC_Nome_Contato = $DSC_Nome_Contato;
    }
    public function getDSC_Nome_Contato() {
        return $this->DSC_Nome_Contato;
    }
    public function setCOD_TIPOEstado($COD_TIPOEstado) {
        $this->COD_TIPOEstado = $COD_TIPOEstado;
    }
    public function getCOD_TIPOEstado() {
        return $this->COD_TIPOEstado;
    }

}
