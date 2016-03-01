<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mEvt_Evento_Participante
 *
 * @author Chrystyan Godoy <F1r3Black0ut>
 */
require_once './db/dbConnection.php';

class mEvt_Evento_Participante extends dbConnection {

    private $ID_EVT_Evento_Pariticipante;
    private $DSC_Nome_Crachav;
    private $COD_Barras_Cracha;
    private $VLR_Total;
    private $VLR_Total_Inscricao;
    private $QTD_CargaHoraria_Realizada;
    private $COD_Nivel_Participante;
    private $ID_EVT_Pagamento;
    private $ID_EVT_Categoria;
    private $ID_EVT_Evento;
    private $ID_BSC_Participante;
    private $ID_EVT_Participante_Pai;
    private $COD_Tipo_SIT_Certificado;
    private $DTM_Entrega_Certificado;
    private $ID_SEG_DetalheTransacao;
    private $SIT_EH_Parcelado;
    private $ID_EVT_EventoGrupo;
    private $COD_TipoSituacao_Material;
    private $DTM_EntregaMaterial;
    private $COD_InscricaoExterno;
    
    public function setID_EVT_Evento_Pariticipante($ID_EVT_Evento_Pariticipante) {
        $this->ID_EVT_Evento_Pariticipante = $ID_EVT_Evento_Pariticipante;
    }
    public function getID_EVT_Evento_Pariticipante() {
        return $this->ID_EVT_Evento_Pariticipante;
    }
    public function setDSC_Nome_Crachav($DSC_Nome_Crachav) {
        $this->DSC_Nome_Crachav = $DSC_Nome_Crachav;
    }
    public function getDSC_Nome_Crachav() {
        return $this->DSC_Nome_Crachav;
    }
    public function setCOD_Barras_Cracha($COD_Barras_Cracha) {
        $this->COD_Barras_Cracha = $COD_Barras_Cracha;
    }
    public function getCOD_Barras_Cracha() {
        return $this->COD_Barras_Cracha;
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
    public function setQTD_CargaHoraria_Realizada($QTD_CargaHoraria_Realizada) {
        $this->QTD_CargaHoraria_Realizada = $QTD_CargaHoraria_Realizada;
    }
    public function getQTD_CargaHoraria_Realizada() {
        return $this->QTD_CargaHoraria_Realizada;
    }
    public function setCOD_Nivel_Participante($COD_Nivel_Participante) {
        $this->COD_Nivel_Participante = $COD_Nivel_Participante;
    }
    public function getCOD_Nivel_Participante() {
        return $this->COD_Nivel_Participante;
    }
    public function setID_EVT_Pagamento($ID_EVT_Pagamento) {
        $this->ID_EVT_Pagamento = $ID_EVT_Pagamento;
    }
    public function getID_EVT_Pagamento() {
        return $this->ID_EVT_Pagamento;
    }
    public function setID_EVT_Categoria($ID_EVT_Categoria) {
        $this->ID_EVT_Categoria = $ID_EVT_Categoria;
    }
    public function getID_EVT_Categoria() {
        return $this->ID_EVT_Categoria;
    }
    public function setID_EVT_Evento($ID_EVT_Evento) {
        $this->ID_EVT_Evento = $ID_EVT_Evento;
    }
    public function getID_EVT_Evento() {
        return $this->ID_EVT_Evento;
    }
    public function setID_BSC_Participante($ID_BSC_Participante) {
        $this->ID_BSC_Participante = $ID_BSC_Participante;
    }
    public function getID_BSC_Participante() {
        return $this->ID_BSC_Participante;
    }
    public function setID_EVT_Participante_Pai($ID_EVT_Participante_Pai) {
        $this->ID_EVT_Participante_Pai = $ID_EVT_Participante_Pai;
    }
    public function getID_EVT_Participante_Pai() {
        return $this->ID_EVT_Participante_Pai;
    }
    public function setCOD_Tipo_SIT_Certificado($COD_Tipo_SIT_Certificado) {
        $this->COD_Tipo_SIT_Certificado = $COD_Tipo_SIT_Certificado;
    }
    public function getCOD_Tipo_SIT_Certificado() {
        return $this->COD_Tipo_SIT_Certificado;
    }
    public function setDTM_Entrega_Certificado($DTM_Entrega_Certificado) {
        $this->DTM_Entrega_Certificado = $DTM_Entrega_Certificado;
    }
    public function getDTM_Entrega_Certificado() {
        return $this->DTM_Entrega_Certificado;
    }
    public function setID_SEG_DetalheTransacao($ID_SEG_DetalheTransacao) {
        $this->ID_SEG_DetalheTransacao = $ID_SEG_DetalheTransacao;
    }
    public function getID_SEG_DetalheTransacao() {
        return $this->ID_SEG_DetalheTransacao;
    }
    public function setSIT_EH_Parcelado($SIT_EH_Parcelado) {
        $this->SIT_EH_Parcelado = $SIT_EH_Parcelado;
    }
    public function getSIT_EH_Parcelado() {
        return $this->SIT_EH_Parcelado;
    }
    public function setID_EVT_EventoGrupo($ID_EVT_EventoGrupo) {
        $this->ID_EVT_EventoGrupo = $ID_EVT_EventoGrupo;
    }
    public function getID_EVT_EventoGrupo() {
        return $this->ID_EVT_EventoGrupo;
    }
    public function setCOD_TipoSituacao_Material($COD_TipoSituacao_Material) {
        $this->COD_TipoSituacao_Material = $COD_TipoSituacao_Material;
    }
    public function getCOD_TipoSituacao_Material() {
        return $this->COD_TipoSituacao_Material;
    }
    public function setDTM_EntregaMaterial($DTM_EntregaMaterial) {
        $this->DTM_EntregaMaterial = $DTM_EntregaMaterial;
    }
    public function getDTM_EntregaMaterial() {
        return $this->DTM_EntregaMaterial;
    }
    public function setCOD_InscricaoExterno($COD_InscricaoExterno) {
        $this->COD_InscricaoExterno = $COD_InscricaoExterno;
    }
    public function getCOD_InscricaoExterno() {
        return $this->COD_InscricaoExterno;
    }
}
