<?php

require './model/mEvt_Curso_Participante.php';

class aEvt_Curso_Participante extends mEvt_Curso_Participante {

    protected $sqlInsert = "INSERT INTO evt_curso_participante (ID_EVT_Curso_Participante, Descricao,ID_Curso,ID_Participante,Status) VALUES ('%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_curso_participante set Descricao = '%s', ID_Curso = '%s', ID_Participante = '%s' ,Status = '%s'where ID_EVT_Curso_Participante = '%s'";
    protected $sqlDelete = "delete from evt_curso_participante where ID_EVT_Curso_Participante = '%s'";
    protected $sqlSelect = "select * from evt_curso_participante where 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getID_EVT_Curso_Participante(), $this->getDescricao(),$this->getID_Curso(), $this->getID_Participante(),$this->getStatus());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getDescricao(),$this->getID_Curso(), $this->getID_Participante(),$this->getStatus(), $this->getID_EVT_Curso_Participante());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_EVT_Curso_Participante());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf(" and ID_EVT_Curso_Participante = '%s'", $this->getID_EVT_Curso_Participante()));
        $this->setDescricao($rs[0]['Descricao']);
        $this->setID_Curso($rs[0]['ID_Curso']);
        $this->setID_Participante($rs[0]['ID_Participante']);
        $this->setStatus($rs[0]['Status']);
        return $this;
    }

}
