<?php

require './model/mSeg_Detalhe_Transacao.php';

class aSeg_Detalhe_Transacao extends mSeg_Detalhe_Transacao {

    protected $sqlInsert = "INSERT INTO Seg_Detalhe_Transacao(COD_TIPO_Origem_Transacao, COD_Tipo_Sistema_Transacao, DTM_Transacao, ID_SEG_Usuario, DSC_Login_Transacao) VALUES ('%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update Seg_Detalhe_Transacao set COD_TIPO_Origem_Transacao= '%s', COD_Tipo_Sistema_Transacao= '%s', DTM_Transacao= '%s', ID_SEG_Usuario= '%s', DSC_Login_Transacao= '%s' where ID_Detalhe_Transacao = '%s'";
    protected $sqlDelete = "delete from Seg_Detalhe_Transacao where ID_Detalhe_Transacao = '%s'";
    protected $sqlSelect = "select * from Seg_Detalhe_Transacao where 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getCOD_TIPO_Origem_Transacao(), $this->getCOD_Tipo_Sistema_Transacao(), $this->getDTM_Transacao(), $this->getID_SEG_Usuario(), $this->getDSC_Login_Transacao());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getCOD_TIPO_Origem_Transacao(), $this->getCOD_Tipo_Sistema_Transacao(), $this->getDTM_Transacao(), $this->getID_SEG_Usuario(), $this->getDSC_Login_Transacao());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_Empresa());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf("and ID_Detalhe_Transacao='%s'", $this->getID_Empresa()));
        $this->getID_Detalhe_Transacao($rs[0]['ID_Detalhe_Transacao']);
        $this->getID_Detalhe_Transacao($rs[0]['COD_TIPO_Origem_Transacao']);
        $this->getID_Detalhe_Transacao($rs[0]['COD_Tipo_Sistema_Transacao']);
        $this->getID_Detalhe_Transacao($rs[0]['DTM_Transacao']);
        $this->getID_Detalhe_Transacao($rs[0]['ID_SEG_Usuario']);
        $this->getID_Detalhe_Transacao($rs[0]['DSC_Login_Transacao']);
        return $this;
    }

}
