<?php

require './model/mEvt_Curso.php';

class aEvt_Curso extends mEvt_Curso {

    protected $sqlInsert = "INSERT INTO evt_curso (ID_Curso, Curso, Titulo, Data_Hora, ID_EVT) VALUES ('%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_curso set Curso = '%s', Titulo = '%s', Data_Hora = '%s', ID_EVT = '%s' where ID_Curso = '%s'";
    protected $sqlDelete = "delete from evt_curso where ID_Curso = '%s'";
    protected $sqlSelect = "select * from evt_curso where 1=1 %s %s";

    public function insert()
    {
        $sql = sprintf($this->sqlInsert, $this->getID_Curso(),$this->getCurso(),$this->getTitulo(),$this->getData_Hora(),$this->getID_EVT());
        return $this->RunQuery($sql);
    }

    public function update()
    {
        $sql = sprintf($this->sqlUpdate, $this->getCurso(),$this->getTitulo(),$this->getData_Hora(),$this->getID_EVT(),$this->getID_Curso());
        return $this->RunQuery($sql);
    }

    public function delete()
    {
        $sql = sprintf($this->sqlDelete, $this->getID_Curso());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load()
    {
        $rs = $this->select(sprintf(" and D_Curso = '%s'", $this->getID_Curso()));
        $this->setID_Curso($rs[0]['ID_Curso']);
        $this->setCurso($rs[0]['Curso']);
        $this->setTitulo($rs[0]['Titulo']);
        $this->setData_Hora($rs[0]['Data_Hora']);
        $this->setID_EVT($rs[0]['ID_EVT']);
        return $this;
    }

}
