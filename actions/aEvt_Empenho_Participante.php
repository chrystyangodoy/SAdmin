<?php

require './model/mEvt_Empenho_Participante.php';

class aEvt_Empenho_Participante extends mEvt_Empenho_Participante {

    protected $sqlInsert = "INSERT INTO evt_empenho_participante(COD_CNPJ, DSC_RazaoSocial, DSC_Endereco, DSC_Bairro, DSC_Cidade, NUM_CEP, NUM_InscricaoEstadual, NUM_Fone, NUM_FAX, DSC_EMAIL, COD_TipoEstado) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_empenho_participante set COD_CNPJ= '%s', DSC_RazaoSocial= '%s', DSC_Endereco= '%s', DSC_Bairro= '%s', DSC_Cidade= '%s', NUM_CEP= '%s', NUM_InscricaoEstadual= '%s', NUM_Fone= '%s', NUM_FAX= '%s', DSC_EMAIL= '%s', COD_TipoEstado= '%s' where ID_Empresa = '%s'";
    protected $sqlDelete = "delete from evt_empenho_participante where ID_Empresa = '%s'";
    protected $sqlSelect = "select * from evt_empenho_participante where 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getCOD_CNPJ(), $this->getDSC_RazaoSocial(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEP(), $this->getNUM_InscricaoEstadual(), $this->getNUM_Fone(), $this->getNUM_FAX(), $this->getDSC_EMAIL(), $this->getCOD_TipoEstado());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getCOD_CNPJ(), $this->getDSC_RazaoSocial(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEP(), $this->getNUM_InscricaoEstadual(), $this->getNUM_Fone(), $this->getNUM_FAX(), $this->getDSC_EMAIL(), $this->getCOD_TipoEstado());
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
        $rs = $this->select(sprintf("and ID_Empresa='%s'", $this->getID_Empresa()));
        $this->getID_Empresa($rs[0]['ID_Empresa']);
        $this->getID_Empresa($rs[0]['COD_CNPJ']);
        $this->getID_Empresa($rs[0]['DSC_RazaoSocial']);
        $this->getID_Empresa($rs[0]['DSC_Endereco']);
        $this->getID_Empresa($rs[0]['DSC_Bairro']);
        $this->getID_Empresa($rs[0]['DSC_Cidade']);
        $this->getID_Empresa($rs[0]['NUM_CEP']);
        $this->getID_Empresa($rs[0]['NUM_InscricaoEstadual']);
        $this->getID_Empresa($rs[0]['NUM_Fone']);
        $this->getID_Empresa($rs[0]['NUM_FAX']);
        $this->getID_Empresa($rs[0]['DSC_EMAIL']);
        $this->getID_Empresa($rs[0]['COD_TipoEstado']);
        return $this;
    }

}
