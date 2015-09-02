<?php

require './model/mTbTipoParticipacao.php';

class aTbTipoParticipacao extends mTbTipoParticipacao {

    protected $sqlInsert = "INSERT INTO tb_tipo_participacao ( DSC_Nome, DSC_Descricao)  VALUES ('%s','%s')";
    protected $sqlUpdate = "UPDATE tb_tipo_participacao SET DSC_Nome='%s',DSC_Descricao = '%s' WHERE COD_Tipo_Participacao = '%s'";
    protected $sqlDelete = "DELETE FROM tb_tipo_participacao WHERE COD_Tipo_Participacao = '%s'";
    protected $sqlSelect = "select * from tb_tipo_participacao where 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getDSC_Nome(), $this->getDSC_Descricao());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome(), $this->getDSC_Descricao());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getCOD_Tipo_Participacao());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf("and COD_Tipo_Participacao='%s'", $this->getID_Grupo()));
        $this->setUser_ID($rs[0]['COD_Tipo_Participacao']);
        $this->setUser_ID($rs[0]['DSC_Nome']);
        $this->setUser_ID($rs[0]['DSC_Descricao']);
        return $this;
    }

}
