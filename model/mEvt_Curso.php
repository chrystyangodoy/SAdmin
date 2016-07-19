<?php

require_once './db/dbConnection.php';

class mEvt_Curso extends dbConnection {

    private $ID_Curso;
    private $Curso;
    private $Titulo;
    private $Data_Hora;
    private $ID_EVT;

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

    public function setTitulo($Titulo) {
        $this->Titulo = $Titulo;
    }

    public function getTitulo() {
        return $this->Titulo;
    }

    public function setData_Hora($Data_Hora) {
        $this->Data_Hora = $Data_Hora;
    }

    public function getData_Hora() {
        return $this->Data_Hora;
    }

    public function setID_EVT($ID_EVT) {
        $this->ID_EVT = $ID_EVT;
    }

    public function getID_EVT() {
        return $this->ID_EVT;
    }

}
