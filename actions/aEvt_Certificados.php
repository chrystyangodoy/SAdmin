<?php

require './model/mEvt_Certificados.php';

class aEvt_Certificados extends mEvt_Certificados {

    protected $sqlInsert = "INSERT INTO Evt_Certificados(Certificado_ID, Codigo_Certificado, Certificado, Area, Titulo, Categoria, EVT_ID, Participante_ID) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update Evt_Certificados set Codigo_Certificado = '%s', Certificado = '%s', Area = '%s', Titulo = '%s', Categoria = '%s', EVT_ID = '%s', Participante_ID = '%s' where Certificado_ID = '%s'";
    protected $sqlDelete = "delete from Evt_Certificados where Certificado_ID = '%s'";
    protected $sqlSelect = "select * from Evt_Certificados where 1=1 %s %s";

    public function insert()
    {
        $sql = sprintf($this->sqlInsert, $this->getCertificado_ID(), $this->getCodigo_Certificado(), $this->getCertificado_ID(), $this->getArea(), $this->getTitulo(), $this->getCategoria(), $this->getEVT_ID(), $this->getParticipante_ID());
        return $this->RunQuery($sql);
    }

    public function update()
    {
        $sql = sprintf($this->sqlUpdate, $this->getCodigo_Certificado(), $this->getCertificado_ID(), $this->getArea(), $this->getTitulo(), $this->getCategoria(), $this->getEVT_ID(), $this->getParticipante_ID(),$this->getCertificado_ID());
        return $this->RunQuery($sql);
    }

    public function delete()
    {
        $sql = sprintf($this->sqlDelete, $this->getCertificado_ID());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load()
    {
        $rs = $this->select(sprintf(" and Certificado_ID='%s'", $this->getCertificado_ID()));
        $this->setCertificado_ID($rs[0]['Certificado_ID']);
        $this->setCodigo_Certificado($rs[0]['Codigo_Certificado']);
        $this->setCertificado($rs[0]['Certificado']);
        $this->setArea($rs[0]['Area']);
        $this->setTitulo($rs[0]['Titulo']);
        $this->setCategoria($rs[0]['Categoria']);
        $this->setEVT_ID($rs[0]['EVT_ID']);
        $this->setParticipante_ID($rs[0]['Participante_ID']);
        return $this;
    }

}
