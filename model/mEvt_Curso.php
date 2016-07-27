<?php

require_once './db/dbConnection.php';

class mEvt_Curso extends dbConnection {

    private $ID_Curso;
    private $Curso;
    private $TituloCurso;
    private $Data_Hora;
    private $ID_EVT;
    private $Valor_Curso;

    public function setID_Curso($ID_Curso) {
        $this->ID_Curso = $ID_Curso;
    }

    public function getID_Curso() {
        return $this->ID_Curso;
    }

    public function setCurso($Curso) {
        $this->Curso = $Curso;
    }

    public function getCurso() {
        return $this->Curso;
    }

    public function setTituloCurso($TituloCurso) {
        $this->TituloCurso = $TituloCurso;
    }

    public function getTituloCurso() {
        return $this->TituloCurso;
    }

    public function setData_Hora($Data_Hora) {
        $this->Data_Hora = $this->dateToUS($Data_Hora);
        //$this->Data_Hora = $Data_Hora;
    }

    public function getData_Hora($us = false) {
        if ($us)
        {
            return $this->Data_Hora;
        }
        else
        {
            return $this->dateToBR($this->Data_Hora);
        }
        //return $this->Data_Hora;
    }

    public function setID_EVT($ID_EVT) {
        $this->ID_EVT = $ID_EVT;
    }

    public function getID_EVT() {
        return $this->ID_EVT;
    }

    public function setValor_Curso($Valor_Curso) {
        $this->Valor_Curso = $Valor_Curso;
    }

    public function getValor_Curso() {
        return $this->Valor_Curso;
    }

}
