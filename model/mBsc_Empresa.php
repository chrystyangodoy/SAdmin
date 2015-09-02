<?php

require_once './db/dbConnection.php';

class mBsc_Empresa extends dbConnection {

    private $ID_Empresa;
    private $COD_CNPJ;
    private $DSC_RazaoSocial;
    private $DSC_Endereco;
    private $DSC_Bairro;
    private $DSC_Cidade;
    private $NUM_CEP;
    private $NUM_InscricaoEstadual;
    private $NUM_Fone;
    private $NUM_FAX;
    private $DSC_EMAIL;
    private $COD_TipoEstado;

    public function setID_Empresa($ID_Empresa) {
        $this->ID_Empresa = $ID_Empresa;
    }

    public function getID_Empresa() {
        return $this->ID_Empresa;
    }

    public function setCOD_CNPJ($COD_CNPJ) {
        $this->COD_CNPJ = $COD_CNPJ;
    }

    public function getCOD_CNPJ() {
        return $this->COD_CNPJ;
    }
public function setDSC_RazaoSocial($DSC_RazaoSocial) {
        $this->DSC_RazaoSocial = $DSC_RazaoSocial;
    }

    public function getDSC_RazaoSocial() {
        return $this->DSC_RazaoSocial;
    }
    public function setDSC_DSC_Endereco($DSC_Endereco) {
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
    public function setNUM_CEP($NUM_CEP) {
        $this->NUM_CEP = $NUM_CEP;
    }

    public function getNUM_CEP() {
        return $this->NUM_CEP;
    }
    public function setNUM_InscricaoEstadual($NUM_InscricaoEstadual) {
        $this->NUM_InscricaoEstadual = $NUM_InscricaoEstadual;
    }

    public function getNUM_InscricaoEstadual() {
        return $this->NUM_InscricaoEstadual;
    }
    public function setNUM_Fone($NUM_Fone) {
        $this->NUM_Fone = $NUM_Fone;
    }

    public function getNUM_Fone() {
        return $this->NUM_Fone;
    }
    public function setNUM_FAX($NUM_FAX) {
        $this->NUM_Fone = $NUM_FAX;
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
    public function setCOD_TipoEstado($COD_TipoEstado) {
        $this->COD_TipoEstado = $COD_TipoEstado;
    }

    public function getCOD_TipoEstado() {
        return $this->COD_TipoEstado;
    }
    
    
}
