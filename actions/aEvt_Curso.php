<?php

require './model/mEvt_Curso.php';

class aEvt_Curso extends mEvt_Curso {

    protected $sqlInsert = "INSERT INTO evt_curso (ID_Curso, Curso, TituloCurso, Data_Hora, ID_EVT,Valor_Curso,Status) VALUES ('%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_curso set Curso = '%s', TituloCurso = '%s', Data_Hora = '%s', ID_EVT = '%s', Valor_Curso = '%s', Status = '%s' where ID_Curso = '%s'";
    protected $sqlDelete = "delete from evt_curso where ID_Curso = '%s'";
    protected $sqlSelect = "select * from evt_curso where 1=1 %s %s";
    //protected $sqlSelectEVT = "select * from evt_curso where 1=1 and ID_EVT = '%s'";
    protected $sqlSelectEVT = "select * from evt_curso where evt_curso.ID_EVT = '%s' "
            . "AND evt_curso.ID_Curso NOT IN (SELECT evt_curso_participante.ID_Curso FROM evt_curso_participante "
            . "WHERE evt_curso_participante.ID_Participante = '%s')";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getID_Curso(), $this->getCurso(), $this->getTituloCurso(), $this->getData_Hora(), $this->getID_EVT(), $this->getValor_Curso(), $this->getStatus());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getCurso(), $this->getTituloCurso(), $this->getData_Hora(), $this->getID_EVT(), $this->getValor_Curso(), $this->getStatus(), $this->getID_Curso());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_Curso());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function selectID_EVT($ID_Participante) {
        $sql = sprintf($this->sqlSelectEVT, $this->getID_EVT(),$ID_Participante);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf(" and ID_Curso = '%s'", $this->getID_Curso()));
        $this->setID_Curso($rs[0]['ID_Curso']);
        $this->setCurso($rs[0]['Curso']);
        $this->setTituloCurso($rs[0]['TituloCurso']);
        $this->setData_Hora($rs[0]['Data_Hora']);
        $this->setID_EVT($rs[0]['ID_EVT']);
        $this->setValor_Curso($rs[0]['Valor_Curso']);
        $this->setStatus($rs[0]['Status']);
        return $this;
    }

}
