<?php

require_once './db/dbConnection.php';

class mEvt_Certificados extends dbConnection {

    private $Certificado_ID;
    private $Codigo_Certificado;
    private $Certificado;
    private $Area;
    private $Titulo;
    private $Categoria;
    private $EVT_ID;
    private $Participante_ID;

    public function setCertificado_ID($Certificado_ID) {
        $this->Certificado_ID = $Certificado_ID;
    }

    public function getCertificado_ID() {
        return $this->Certificado_ID;
    }

    public function setCodigo_Certificado($Codigo_Certificado) {
        $this->Codigo_Certificado = $Codigo_Certificado;
    }

    public function getID() {
        return $this->Codigo_Certificado;
    }

    public function setCertificado($Certificado) {
        $this->Certificado = $Certificado;
    }

    public function getCertificado() {
        return $this->Certificado;
    }

    public function setArea($Area) {
        $this->Area = $Area;
    }

    public function getArea() {
        return $this->Area;
    }

    public function setTitulo($Titulo) {
        $this->Titulo = $Titulo;
    }

    public function getTitulo() {
        return $this->Titulo;
    }

    public function setCategoria($Categoria) {
        $this->Categoria = $Categoria;
    }

    public function getCategoria() {
        return $this->Categoria;
    }

    public function setEVT_ID($EVT_ID) {
        $this->EVT_ID = $EVT_ID;
    }

    public function getEVT_ID() {
        return $this->EVT_ID;
    }

    public function setParticipante_ID($Participante_ID) {
        $this->Participante_ID = $Participante_ID;
    }

    public function getParticipante_ID() {
        return $this->Participante_ID;
    }

}
