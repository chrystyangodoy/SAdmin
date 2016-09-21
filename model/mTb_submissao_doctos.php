<?php

require_once './db/dbConnection.php';

class mtb_submissao_doctos extends dbConnection {

    private $COD_Submissao;
    private $Nome_Docto;
    private $Assunto;
    private $Parecer;
    private $Documento;
    private $Data_Envio;
    private $Idioma_Documento;
    private $ID_Usuario;
    private $COD_Participante;
    private $ID_EVT;

    public function getCOD_Submissao() {
        return $this->COD_Submissao;
    }

    public function setCOD_Submissao($COD_Submissao) {
        $this->COD_Submissao = $COD_Submissao;
    }

    public function getNome_Docto() {
        return $this->Nome_Docto;
    }

    public function setNome_Docto($Nome_Docto) {
        $this->Nome_Docto = $Nome_Docto;
    }

    public function getAssunto() {
        return $this->Assunto;
    }

    public function setAssunto($Assunto) {
        $this->Assunto = $Assunto;
    }

    public function getParecer() {
        return $this->Parecer;
    }

    public function setParecer($Parecer) {
        $this->Parecer = $Parecer;
    }

    public function getDocumento() {
        return $this->Documento;
    }

    public function setDocumento($Documento) {
        $this->Documento = $Documento;
    }

    public function getData_Envio($us = false) {
        //return $this->Data_Envio;
        if ($us)
        {
            return $this->Data_Envio;
        }
        else
        {
            return $this->dateToBR($this->Data_Envio);
        }
    }

    public function setData_Envio($Data_Envio) {
        //$this->Data_Envio = $Data_Envio;
        $this->Data_Envio = $this->dateToUS($Data_Envio);
    }

    public function getIdioma_Documento() {
        return $this->Idioma_Documento;
    }

    public function setIdioma_Documento($Idioma_Documento) {
        $this->Idioma_Documento = $Idioma_Documento;
    }

    public function getID_Usuario() {
        return $this->ID_Usuario;
    }

    public function setID_Usuario($ID_Usuario) {
        $this->ID_Usuario = $ID_Usuario;
    }

    public function getCOD_Participante() {
        return $this->COD_Participante;
    }

    public function setCOD_Participante($COD_Participante) {
        $this->COD_Participante = $COD_Participante;
    }

    public function getID_EVT() {
        return $this->ID_EVT;
    }

    public function setID_EVT($ID_EVT) {
        $this->ID_EVT = $ID_EVT;
    }

}
