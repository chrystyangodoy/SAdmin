<?php

require './model/mBsc_Empresa.php';

class aBsc_Empresa extends mBsc_Empresa {

    protected $sqlInsert = "INSERT INTO bsc_empresa(COD_CNPJ, DSC_RazaoSocial, DSC_Endereco, DSC_Bairro, DSC_Cidade, NUM_CEP, NUM_InscricaoEstadual, NUM_Fone, NUM_FAX, DSC_EMAIL, COD_TipoEstado) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update bsc_empresa set COD_CNPJ= '%s', DSC_RazaoSocial= '%s', DSC_Endereco= '%s', DSC_Bairro= '%s', DSC_Cidade= '%s', NUM_CEP= '%s', NUM_InscricaoEstadual= '%s', NUM_Fone= '%s', NUM_FAX= '%s', DSC_EMAIL= '%s', COD_TipoEstado= '%s' where ID_Empresa = '%s'";
    protected $sqlDelete = "delete from bsc_empresa where ID_Empresa = '%s'";
    protected $sqlSelect = "select * from bsc_empresa where 1=1 %s %s";

    public function insert()
    {
        $sql = sprintf($this->sqlInsert, $this->getCOD_CNPJ(), $this->getDSC_RazaoSocial(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEP(), $this->getNUM_InscricaoEstadual(), $this->getNUM_Fone(), $this->getNUM_FAX(), $this->getDSC_EMAIL(), $this->getCOD_TipoEstado());
        return $this->RunQuery($sql);
    }

    public function update()
    {
        $sql = sprintf($this->sqlUpdate, $this->getCOD_CNPJ(), $this->getDSC_RazaoSocial(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEP(), $this->getNUM_InscricaoEstadual(), $this->getNUM_Fone(), $this->getNUM_FAX(), $this->getDSC_EMAIL(), $this->getCOD_TipoEstado());
        return $this->RunQuery($sql);
    }

    public function delete()
    {
        $sql = sprintf($this->sqlDelete, $this->getID_Empresa());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load()
    {
        $rs = $this->select(sprintf("and ID_Empresa='%s'", $this->getID_Empresa()));
        $this->setID_Empresa($rs[0]['ID_Empresa']);
        $this->setCOD_CNPJ($rs[0]['COD_CNPJ']);
        $this->setDSC_RazaoSocial($rs[0]['DSC_RazaoSocial']);
        $this->setDSC_Endereco($rs[0]['DSC_Endereco']);
        $this->setDSC_Bairro($rs[0]['DSC_Bairro']);
        $this->setDSC_Cidade($rs[0]['DSC_Cidade']);
        $this->setNUM_CEP($rs[0]['NUM_CEP']);
        $this->setNUM_InscricaoEstadual($rs[0]['NUM_InscricaoEstadual']);
        $this->setNUM_Fone($rs[0]['NUM_Fone']);
        $this->setNUM_FAX($rs[0]['NUM_FAX']);
        $this->setDSC_EMAIL($rs[0]['DSC_EMAIL']);
        $this->setCOD_TipoEstado($rs[0]['COD_TipoEstado']);       
        return $this;
    }

}
