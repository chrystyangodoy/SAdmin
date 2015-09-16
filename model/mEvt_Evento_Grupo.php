<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mEvt_Evento_Grupo
 *
 * @author Chrystyan Godoy <F1r3Black0ut>
 */
require_once './db/dbConnection.php';

class mEvt_Evento_Grupo extends dbConnection {

    private $ID_EVT_EventoGrupo;
    private $DSC_Nome;
    private $DSC_Nome_Resp;
    private $COD_CPF_Resp;
    private $DSC_Email_Resp;
    private $NUM_Tel_Resp;
    private $NUM_Celular_Resp;
    private $DSC_Endereco_Resp;
    private $DSC_Bairro;
    private $NUM_CEP_Resp;
    private $DSC_Cidade_Resp;
    private $COD_TipoEstado_Resp;
    private $SIT_EH_Parcelado;
    private $VLR_Total;
    private $VLR_Total_Inscricao;
    private $COD_Inscricao_APAE;
    private $ID_EVT_Evento;
    private $ID_EVT_Pagamento;
    private $ID_SEG_Detalhe_transacao;
    
    public function setID_EVT_EventoGrupo($ID_EVT_EventoGrupo) {
        $this->ID_EVT_EventoGrupo = $ID_EVT_EventoGrupo;
    }
    public function getID_EVT_EventoGrupo() {
        return $this->ID_EVT_EventoGrupo;
    }
    public function setDSC_Nome($DSC_Nome) {
        $this->DSC_Nome = $DSC_Nome;
    }
    public function getDSC_Nome() {
        return $this->DSC_Nome;
    }
    public function setDSC_Nome_Resp($DSC_Nome_Resp) {
        $this->DSC_Nome_Resp = $DSC_Nome_Resp;
    }
    public function getDSC_Nome_Resp() {
        return $this->DSC_Nome_Resp;
    }
    public function setCOD_CPF_Resp($COD_CPF_Resp) {
        $this->COD_CPF_Resp = $COD_CPF_Resp;
    }
    public function getCOD_CPF_Resp() {
        return $this->COD_CPF_Resp;
    }
    public function setDSC_Email_Resp($DSC_Email_Resp) {
        $this->DSC_Email_Resp = $DSC_Email_Resp;
    }
    public function getDSC_Email_Resp() {
        return $this->DSC_Email_Resp;
    }
    public function setNUM_Tel_Resp($NUM_Tel_Resp) {
        $this->NUM_Tel_Resp = $NUM_Tel_Resp;
    }
    public function getNUM_Tel_Resp() {
        return $this->NUM_Tel_Resp;
    }
    public function setNUM_Celular_Resp($NUM_Celular_Resp) {
        $this->NUM_Celular_Resp = $NUM_Celular_Resp;
    }
    public function getNUM_Celular_Resp() {
        return $this->NUM_Celular_Resp;
    }
    public function setDSC_Endereco_Resp($DSC_Endereco_Resp) {
        $this->DSC_Endereco_Resp = $DSC_Endereco_Resp;
    }
    public function getDSC_Endereco_Resp() {
        return $this->DSC_Endereco_Resp;
    }
    public function setDSC_Bairro($DSC_Bairro) {
        $this->DSC_Bairro = $DSC_Bairro;
    }
    public function getDSC_Bairro() {
        return $this->DSC_Bairro;
    }
    public function setNUM_CEP_Resp($NUM_CEP_Resp) {
        $this->NUM_CEP_Resp = $NUM_CEP_Resp;
    }
    public function getNUM_CEP_Resp() {
        return $this->NUM_CEP_Resp;
    }
    public function setDSC_Cidade_Resp($DSC_Cidade_Resp) {
        $this->DSC_Cidade_Resp = $DSC_Cidade_Resp;
    }
    public function getDSC_Cidade_Resp() {
        return $this->DSC_Cidade_Resp;
    }
    public function setCOD_TipoEstado_Resp($COD_TipoEstado_Resp) {
        $this->COD_TipoEstado_Resp = $COD_TipoEstado_Resp;
    }
    public function getCOD_TipoEstado_Resp() {
        return $this->COD_TipoEstado_Resp;
    }
    public function setSIT_EH_Parcelado($SIT_EH_Parcelado) {
        $this->SIT_EH_Parcelado = $SIT_EH_Parcelado;
    }
    public function getSIT_EH_Parcelado() {
        return $this->SIT_EH_Parcelado;
    }
    public function setVLR_Total($VLR_Total) {
        $this->VLR_Total = $VLR_Total;
    }
    public function getVLR_Total() {
        return $this->VLR_Total;
    }
    public function setVLR_Total_Inscricao($VLR_Total_Inscricao) {
        $this->VLR_Total_Inscricao = $VLR_Total_Inscricao;
    }
    public function getVLR_Total_Inscricao() {
        return $this->VLR_Total_Inscricao;
    }
    public function setCOD_Inscricao_APAE($COD_Inscricao_APAE) {
        $this->COD_Inscricao_APAE = $COD_Inscricao_APAE;
    }
    public function getCOD_Inscricao_APAE() {
        return $this->COD_Inscricao_APAE;
    }
    public function setID_EVT_Evento($ID_EVT_Evento) {
        $this->ID_EVT_Evento = $ID_EVT_Evento;
    }
    public function getID_EVT_Evento() {
        return $this->ID_EVT_Evento;
    }
    public function setID_EVT_Pagamento($ID_EVT_Pagamento) {
        $this->ID_EVT_Pagamento = $ID_EVT_Pagamento;
    }
    public function getID_EVT_Pagamento() {
        return $this->ID_EVT_Pagamento;
    }
    public function setID_SEG_Detalhe_transacao($ID_SEG_Detalhe_transacao) {
        $this->ID_SEG_Detalhe_transacao = $ID_SEG_Detalhe_transacao;
    }
    public function getID_SEG_Detalhe_transacao() {
        return $this->ID_SEG_Detalhe_transacao;
    }

}
