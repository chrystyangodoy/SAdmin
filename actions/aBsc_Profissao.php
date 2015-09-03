<?php

require './model/mBsc_Profissao.php';

class aBsc_Empresa extends mBsc_Profissao {

    protected $sqlInsert = "INSERT INTO bsc_profissao(DSC_Nome, DSC_Descricao) VALUES ('%s','%s')";
    protected $sqlUpdate = "UPDATE bsc_profissao set DSC_Nome= '%s', DSC_Descricao= '%s' WHERE ID_Profissao = '%s'";
    protected $sqlDelete = "DELETE FROM bsc_profissao WHERE ID_Profissao = '%s'";
    protected $sqlSelect = "SELECT * FROM bsc_profissao WHERE 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert,$this->getDSC_Nome(), $this->getDSC_Descricao());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome(), $this->getDSC_Descricao());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_Profissao());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf("and ID_Profissao='%s'", $this->getID_Profissao()));
        $this->getID_Empresa($rs[0]['ID_Profissao']);
        $this->getID_Empresa($rs[0]['DSC_Nome']);
        $this->getID_Empresa($rs[0]['DSC_Descricao']);
        return $this;
    }

}
