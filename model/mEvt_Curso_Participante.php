<?php

require_once './db/dbConnection.php';

class mEvt_Curso_Participante extends dbConnection {

    private $ID_EVT_Curso_Participante;
    private $Descricao;
    private $ID_Curso;
    private $ID_Participante;

    public function setID_EVT_Curso_Participante($ID_EVT_Curso_Participante) {
        $this->ID_EVT_Curso_Participante = $ID_EVT_Curso_Participante;
    }

    public function getID_EVT_Curso_Participante() {
        return $this->ID_EVT_Curso_Participante;
    }
    public function setDescricao($Descricao) {
        $this->Descricao = $Descricao;
    }

    public function getDescricao() {
        return $this->Descricao;
    }
    public function setID_Curso($ID_Curso) {
        $this->ID_Curso = $ID_Curso;
    }

    public function getID_Curso() {
        return $this->ID_Curso;
    }
    public function setID_Participante($ID_Participante) {
        $this->ID_Participante = $ID_Participante;
    }

    public function getID_Participante() {
        return $this->ID_Participante;
    }

}
