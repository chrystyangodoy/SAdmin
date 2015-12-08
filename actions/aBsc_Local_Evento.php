<?php

require './model/mBsc_Local_Evento.php';

class aBsc_Local_Evento extends mBsc_Local_Evento {

    protected $sqlInsert = "INSERT INTO bsc_local_evento(ID_Local, DSC_Nome, DSC_Endereco, DSC_Bairro, DSC_Cidade, NUM_CEO, NUM_Fone, NUM_FAX, DSC_EMAIL, DSC_Nome_Contato, COD_TIPOEstado) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update bsc_local_evento set DSC_Nome= '%s', DSC_Endereco= '%s', DSC_Bairro= '%s', DSC_Cidade= '%s', NUM_CEO= '%s', NUM_Fone= '%s', NUM_FAX= '%s', DSC_EMAIL= '%s', DSC_Nome_Contato= '%s', COD_TIPOEstado= '%s' where ID_Local = '%s'";
    protected $sqlDelete = "delete from bsc_local_evento where ID_Local = '%s'";
    protected $sqlSelect = "select * from bsc_local_evento where 1=1 %s %s";
    protected $sqlSelectInner = "SELECT bsc_local_evento.*, tb_tipo_estado.DSC_Nome FROM bsc_local_evento inner join tb_tipo_estado on bsc_local_evento.COD_TIPOEstado = tb_tipo_estado.COD_TIPOEstado where 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert,$this->getID_Local(), $this->getDSC_Nome(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEO(), $this->getNUM_Fone(), $this->getNUM_FAX(), $this->getDSC_EMAIL(), $this->getDSC_Nome_Contato(), $this->getCOD_TIPOEstado());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEO(), $this->getNUM_Fone(), $this->getNUM_FAX(), $this->getDSC_EMAIL(), $this->getDSC_Nome_Contato(), $this->getCOD_TIPOEstado(), $this->getID_Local());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_Local());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }
   

    public function load() {
        $rs = $this->select(sprintf("and ID_Local='%s'", $this->getID_Local()));
        $this->setID_Local($rs[0]['ID_Local']);
        $this->setDSC_Nome($rs[0]['DSC_Nome']);
        $this->setDSC_Endereco($rs[0]['DSC_Endereco']);
        $this->setDSC_Bairro($rs[0]['DSC_Bairro']);
        $this->setDSC_Cidade($rs[0]['DSC_Cidade']);
        $this->setNUM_CEO($rs[0]['NUM_CEO']);
        $this->setNUM_Fone($rs[0]['NUM_Fone']);
        $this->setNUM_FAX($rs[0]['NUM_FAX']);
        $this->setDSC_EMAIL($rs[0]['DSC_EMAIL']);
        $this->setDSC_Nome_Contato($rs[0]['DSC_Nome_Contato']);
        $this->setCOD_TIPOEstado($rs[0]['COD_TIPOEstado']);
        return $this;
    }

    public function selectInner($where = '', $order = '') {
        $sql = sprintf($this->sqlSelectInner, $where, $order);
        return $this->RunSelect($sql);
    }
}
