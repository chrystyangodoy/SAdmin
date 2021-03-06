<?php

require '../model/mTransacaoUsuario.php';

class aTransUsuario extends mTransUsuario {

    protected $sqlInsert = "INSERT INTO seg_detalhe_transacao(ID_Detalhe_Transacao, COD_TIPO_Origem_Transacao,COD_Tipo_Sistema_Transacao,DTM_Transacao,ID_SEG_Usuario,DSC_Login_Transacao) VALUES ('%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update seg_detalhe_transacao set ID_Grupo = '%s',DSC_Nome= '%s',DSC_Descricao= '%s' where ID_Grupo = '%s'";
    protected $sqlDelete = "delete from seg_detalhe_transacao where ID_Grupo = '%s'";
    protected $sqlSelect = "select * from seg_detalhe_transacao where 1=1 %s %s";
    protected $sqlSelectInner = "select *,seg_usuario.DSC_Login from seg_detalhe_transacao inner join seg_usuario on (seg_usuario.ID_Usuario = seg_detalhe_transacao.ID_SEG_Usuario) where 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getCOD_TIPO_Origem_Transacao(), $this->getCOD_Tipo_Sistema_Transacao(), $this->getDTM_Transacao(true));
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getCOD_TIPO_Origem_Transacao(), $this->getCOD_Tipo_Sistema_Transacao(), $this->getDTM_Transacao(true),$this->getID_Detalhe_Transacao());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function selectInner($where = '', $order = '') {
        $sql = sprintf($this->sqlSelectInner, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf("and getID_Detalhe_Transacao='%s'", $this->getID_Detalhe_Transacao()));
        $this->setgetID_Detalhe_Transacao($rs[0]['ID_Detalhe_Transacao']);
        $this->setCOD_TIPO_Origem_Transacao($rs[0]['COD_TIPO_Origem_Transacao']);
        $this->setCOD_Tipo_Sistema_Transacao($rs[0]['COD_Tipo_Sistema_Transacao']);
        $this->setDTM_Transacao($rs[0]['DTM_Transacao']);
        $this->setID_SEG_Usuario($rs[0]['ID_SEG_Usuario']);
        $this->setDSC_Login_Transacao($rs[0]['DSC_Login_Transacao']);
        return $this;
    }

}
