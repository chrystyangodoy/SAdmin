<?php

require './model/mBsc_Local_Evento.php';

class aBsc_Local_Evento extends mBsc_Local_Evento {

    protected $sqlInsert = "INSERT INTO bsc_local_evento(DSC_Nome, DSC_Endereco, DSC_Bairro, DSC_Cidade, NUM_CEO, NUM_Fone, NUM_FAX, DSC_EMAIL, DSC_Nome_Contato, COD_TIPOEstado) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update bsc_local_evento set DSC_Nome= '%s', DSC_Endereco= '%s', DSC_Bairro= '%s', DSC_Cidade= '%s', NUM_CEO= '%s', NUM_Fone= '%s', NUM_FAX= '%s', DSC_EMAIL= '%s', DSC_Nome_Contato= '%s', COD_TIPOEstado= '%s' where ID_Local = '%s'";
    protected $sqlDelete = "delete from bsc_local_evento where ID_Local = '%s'";
    protected $sqlSelect = "select * from bsc_local_evento where 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getDSC_Nome(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEO(), $this->getNUM_Fone(), $this->getNUM_FAX(), $this->getDSC_EMAIL(), $this->getDSC_Nome_Contato(), $this->getCOD_TIPOEstado());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEO(), $this->getNUM_Fone(), $this->getNUM_FAX(), $this->getDSC_EMAIL(), $this->getDSC_Nome_Contato(), $this->getCOD_TIPOEstado());
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
        $this->getID_Local($rs[0]['ID_Local']);
        $this->getID_Local($rs[0]['DSC_Nome']);
        $this->getID_Local($rs[0]['DSC_Endereco']);
        $this->getID_Local($rs[0]['DSC_Bairro']);
        $this->getID_Local($rs[0]['DSC_Cidade']);
        $this->getID_Local($rs[0]['NUM_CEO']);
        $this->getID_Local($rs[0]['NUM_Fone']);
        $this->getID_Local($rs[0]['NUM_FAX']);
        $this->getID_Local($rs[0]['DSC_EMAIL']);
        $this->getID_Local($rs[0]['DSC_Nome_Contato']);
        $this->getID_Local($rs[0]['COD_TIPOEstado']);
        return $this;
    }

}
