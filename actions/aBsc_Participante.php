<?php

require './model/mBsc_Participante.php';

class aBsc_Participante extends mBsc_Participante {

    protected $sqlInsert = "INSERT INTO bsc_participante(COD_CPF,COD_RG,DSC_Nome,DSC_Endereco,DSC_Bairro,DSC_Cidade,NUM_CEP,NUM_Fone,NUM_Celular,NUM_FAX,DSC_Profissao_Especialidade,DSC_Email,NUM_Registro,COD_Tipo_Estado,ID_BSC_Empresa,ID_BSC_Profissao) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "UPDATE bsc_participante SET COD_CPF= '%s',COD_RG= '%s',DSC_Nome= '%s',DSC_Endereco= '%s',DSC_Bairro= '%s',DSC_Cidade= '%s',NUM_CEP= '%s',NUM_Fone= '%s',NUM_Celular= '%s',NUM_FAX= '%s',DSC_Profissao_Especialidade= '%s',DSC_Email= '%s',NUM_Registro= '%s',COD_Tipo_Estado= '%s',ID_BSC_Empresa= '%s',ID_BSC_Profissao= '%s' WHERE ID_Participante = '%s'";
    protected $sqlDelete = "DELETE FROM bsc_participante WHERE ID_Participante = '%s'";
    protected $sqlSelect = "SELECT * FROM bsc_participante WHERE 1=1 %s %s";
    
    protected $sqlSelectExist = "SELECT count(*) FROM bsc_participante WHERE 1=1 and COD_CPF='%s'";
    protected $sqlinsertPartUs = "INSERT INTO bsc_participante(COD_CPF,COD_RG,DSC_Nome,DSC_Endereco,DSC_Bairro,DSC_Cidade,NUM_CEP,NUM_Fone,NUM_Celular,NUM_FAX,DSC_Profissao_Especialidade,DSC_Email,NUM_Registro,COD_Tipo_Estado,ID_BSC_Empresa,ID_BSC_Profissao) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getCOD_CPF(), $this->getCOD_RG(), $this->getDSC_Nome(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEP(), $this->getNUM_Fone(), $this->getNUM_Celular(), $this->getNUM_FAX(), $this->getDSC_Profissao_Especialidade(), $this->getDSC_Email(), $this->getNUM_Registro(), $this->getCOD_Tipo_Estado(), $this->getID_BSC_Empresa(), $this->getID_BSC_Profissao());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getCOD_CPF(), $this->getCOD_RG(), $this->getDSC_Nome(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEP(), $this->getNUM_Fone(), $this->getNUM_Celular(), $this->getNUM_FAX(), $this->getDSC_Profissao_Especialidade(), $this->getDSC_Email(), $this->getNUM_Registro(), $this->getCOD_Tipo_Estado(), $this->getID_BSC_Empresa(), $this->getID_BSC_Profissao());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_Participante());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf("and ID_Participante='%s'", $this->getID_Participante()));
        $this->getID_Participante($rs[0]['ID_Participante']);
        $this->getID_Participante($rs[0]['COD_CPF']);
        $this->getID_Participante($rs[0]['COD_RG']);
        $this->getID_Participante($rs[0]['DSC_Nome']);
        $this->getID_Participante($rs[0]['DSC_Endereco']);
        $this->getID_Participante($rs[0]['DSC_Bairro']);
        $this->getID_Participante($rs[0]['DSC_Cidade']);
        $this->getID_Participante($rs[0]['NUM_CEP']);
        $this->getID_Participante($rs[0]['NUM_Fone']);
        $this->getID_Participante($rs[0]['NUM_Celular']);
        $this->getID_Participante($rs[0]['NUM_FAX']);
        $this->getID_Participante($rs[0]['DSC_Profissao_Especialidade']);
        $this->getID_Participante($rs[0]['DSC_Email']);
        $this->getID_Participante($rs[0]['NUM_Registro']);
        $this->getID_Participante($rs[0]['COD_Tipo_Estado']);
        $this->getID_Participante($rs[0]['ID_BSC_Empresa']);
        $this->getID_Participante($rs[0]['ID_BSC_Profissao']);
        return $this;
    }

    public function insertPartUs() {
        $sql = sprintf($this->sqlinsertPartUs, $this->getCOD_CPF(), $this->getCOD_RG(), $this->getDSC_Nome(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEP(), $this->getNUM_Fone(), $this->getNUM_Celular(), $this->getNUM_FAX(), $this->getDSC_Profissao_Especialidade(), $this->getDSC_Email(), $this->getNUM_Registro(), $this->getCOD_Tipo_Estado(), $this->getID_BSC_Empresa(), $this->getID_BSC_Profissao());
        return $this->RunQuery($sql);
    }
    
    public function selectExists($COD_CPF) {
        $sql = sprintf($this->sqlSelectExist, $COD_CPF);
        return $this->RunQuery($sql);
    }

}
