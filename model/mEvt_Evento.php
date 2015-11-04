<?php

require_once './db/dbConnection.php';

class mEvt_Evento extends dbConnection {

    private $ID_EVT;
    private $DSC_Nome;
    private $DSC_Presidente;
    private $DT_Inicio;
    private $DT_Fim;
    private $COD_CNPJ_Promotora;
    private $DSC_Nome_Promotora;
    private $DSC_Presidente_Promotora;
    private $DSC_Endereco_Promotora;
    private $NUM_CEP_Promotora;
    private $DSC_Cidade_Promotora;
    private $NUM_Fone_Promotora;
    private $NUM_FAX_Promotora;
    private $DSC_EMAIL_Promotora;
    private $QTD_CargaHorariaMinima;
    private $ID_BSC_Local_Evento;
    private $COD_Tipo_Estado_promotora;
    private $isPromotora;
    private $ID_Banco;

    public function setID_EVT($ID_EVT) {
        $this->ID_EVT = $ID_EVT;
    }

    public function getID_EVT() {
        return $this->ID_EVT;
    }

    public function setDSC_Nome($DSC_Nome) {
        $this->DSC_Nome = $DSC_Nome;
    }

    public function getDSC_Nome() {
        return $this->DSC_Nome;
    }

    public function setDSC_Presidente($DSC_Presidente) {
        $this->DSC_Presidente = $DSC_Presidente;
    }

    public function getDSC_Presidente() {
        return $this->DSC_Presidente;
    }

    public function setDT_Inicio($DT_Inicio) {
        $this->DT_Inicio = $DT_Inicio;
    }

    public function getDT_Inicio() {
        return $this->DT_Inicio;
    }

    public function setDT_Fim($DT_Fim) {
        $this->DT_Fim = $DT_Fim;
    }

    public function getDT_Fim() {
        return $this->DT_Fim;
    }

    public function setCOD_CNPJ_Promotora($COD_CNPJ_Promotora) {
        $this->COD_CNPJ_Promotora = $COD_CNPJ_Promotora;
    }

    public function getCOD_CNPJ_Promotora() {
        return $this->COD_CNPJ_Promotora;
    }

    public function setDSC_Nome_Promotora($DSC_Nome_Promotora) {
        $this->DSC_Nome_Promotora = $DSC_Nome_Promotora;
    }

    public function getDSC_Nome_Promotora() {
        return $this->DSC_Nome_Promotora;
    }

    public function setDSC_Presidente_Promotora($DSC_Presidente_Promotora) {
        $this->DSC_Presidente_Promotora = $DSC_Presidente_Promotora;
    }

    public function getDSC_Presidente_Promotora() {
        return $this->DSC_Presidente_Promotora;
    }

    public function setDSC_Endereco_Promotora($DSC_Endereco_Promotora) {
        $this->DSC_Endereco_Promotora = $DSC_Endereco_Promotora;
    }

    public function getDSC_Endereco_Promotora() {
        return $this->DSC_Endereco_Promotora;
    }

    public function setNUM_CEP_Promotora($NUM_CEP_Promotora) {
        $this->NUM_CEP_Promotora = $NUM_CEP_Promotora;
    }

    public function getNUM_CEP_Promotora() {
        return $this->NUM_CEP_Promotora;
    }

    public function setDSC_Cidade_Promotora($DSC_Cidade_Promotora) {
        $this->DSC_Cidade_Promotora = $DSC_Cidade_Promotora;
    }

    public function getDSC_Cidade_Promotora() {
        return $this->DSC_Cidade_Promotora;
    }

    public function setNUM_Fone_Promotora($NUM_Fone_Promotora) {
        $this->NUM_Fone_Promotora = $NUM_Fone_Promotora;
    }

    public function getNUM_Fone_Promotora() {
        return $this->NUM_Fone_Promotora;
    }

    public function setNUM_FAX_Promotora($NUM_FAX_Promotora) {
        $this->NUM_FAX_Promotora = $NUM_FAX_Promotora;
    }

    public function getNUM_FAX_Promotora() {
        return $this->NUM_FAX_Promotora;
    }

    public function setDSC_EMAIL_Promotora($DSC_EMAIL_Promotora) {
        $this->DSC_EMAIL_Promotora = $DSC_EMAIL_Promotora;
    }

    public function getDSC_EMAIL_Promotora() {
        return $this->DSC_EMAIL_Promotora;
    }

    public function setQTD_CargaHorariaMinima($QTD_CargaHorariaMinima) {
        $this->QTD_CargaHorariaMinima = $QTD_CargaHorariaMinima;
    }

    public function getQTD_CargaHorariaMinima() {
        return $this->QTD_CargaHorariaMinima;
    }

    public function setID_BSC_Local_Evento($ID_BSC_Local_Evento) {
        $this->ID_BSC_Local_Evento = $ID_BSC_Local_Evento;
    }

    public function getID_BSC_Local_Evento() {
        return $this->ID_BSC_Local_Evento;
    }

    public function setCOD_Tipo_Estado_promotora($COD_Tipo_Estado_promotora) {
        $this->COD_Tipo_Estado_promotora = $COD_Tipo_Estado_promotora;
    }

    public function getCOD_Tipo_Estado_promotora() {
        return $this->COD_Tipo_Estado_promotora;
    }

    public function setisPromotora($isPromotora) {
        $this->isPromotora = $isPromotora;
    }

    public function getisPromotora() {
        return $this->isPromotora;
    }
    
    public function setID_Banco($ID_Banco) {
        $this->ID_Banco = $ID_Banco;
    }

    public function getID_Banco() {
        return $this->ID_Banco;
    }
}
