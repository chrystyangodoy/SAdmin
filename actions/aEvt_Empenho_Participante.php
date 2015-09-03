<?php

require './model/mEvt_Empenho_Participante.php';

class aEvt_Empenho_Participante extends mEvt_Empenho_Participante {

    protected $sqlInsert = "INSERT INTO evt_empenho_participante(COD_CPF, DSC_Nome, SIT_USUFRUI, VLR_Consumido, ID_EVT_Empenho) VALUES ('%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_empenho_participante set COD_CPF='%s', DSC_Nome='%s', SIT_USUFRUI='%s', VLR_Consumido='%s', ID_EVT_Empenho='%s' where ID_Empenho_Participante = '%s'";
    protected $sqlDelete = "delete from evt_empenho_participante where ID_Empenho_Participante = '%s'";
    protected $sqlSelect = "select * from evt_empenho_participante where 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getCOD_CPF(), $this->getDSC_Nome(), $this->getSIT_USUFRUI(), $this->getVLR_Consumido(), $this->getID_EVT_Empenho());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getCOD_CPF(), $this->getDSC_Nome(), $this->getSIT_USUFRUI(), $this->getVLR_Consumido(), $this->getID_EVT_Empenho());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_Empenho_Participante());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf("and ID_Empenho_Participante='%s'", $this->getID_Empenho_Participante()));
        $this->getID_Empenho_Participante($rs[0]['ID_Empenho_Participante']);
        $this->getID_Empenho_Participante($rs[0]['DSC_RazaoSocial']);
        $this->getID_Empenho_Participante($rs[0]['DSC_Endereco']);
        $this->getID_Empenho_Participante($rs[0]['DSC_Bairro']);
        $this->getID_Empenho_Participante($rs[0]['DSC_Cidade']);
        return $this;
    }

}
