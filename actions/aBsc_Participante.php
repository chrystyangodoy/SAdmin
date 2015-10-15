<?php

require './model/mBsc_Participante.php';

class aBsc_Participante extends mBsc_Participante {

    protected $sqlInsert = "INSERT INTO bsc_participante(ID_Participante, COD_CPF, COD_RG, DSC_Nome, DSC_Endereco, DSC_Bairro, DSC_Cidade, NUM_CEP, NUM_Fone, NUM_Celular, NUM_FAX, DSC_Profissao_Especialidade, DSC_Email, NUM_Registro, COD_Tipo_Estado, ID_BSC_Empresa, ID_BSC_Profissao, ID_Usuario) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "UPDATE bsc_participante SET COD_CPF= '%s',COD_RG= '%s',DSC_Nome= '%s',DSC_Endereco= '%s',DSC_Bairro= '%s',DSC_Cidade= '%s',NUM_CEP= '%s',NUM_Fone= '%s',NUM_Celular= '%s',NUM_FAX= '%s',DSC_Profissao_Especialidade= '%s',DSC_Email= '%s',NUM_Registro= '%s',COD_Tipo_Estado= '%s',ID_BSC_Empresa= '%s',ID_BSC_Profissao= '%s' WHERE ID_Participante = '%s'";
    protected $sqlDelete = "DELETE FROM bsc_participante WHERE ID_Participante = '%s'";
    protected $sqlSelect = "SELECT * FROM bsc_participante WHERE 1=1 %s %s";
    protected $sqlSelectExist = "SELECT count(0) AS COUNTCPF FROM bsc_participante WHERE 1=1 and COD_CPF='%s'";
    protected $sqlSelectExistEdit = "SELECT count(0) AS COUNTCPF FROM bsc_participante WHERE 1=1 and COD_CPF='%s' and ID_Participante <> '%s'";
    protected $sqlinsertPartUs = "INSERT INTO bsc_participante(COD_CPF,COD_RG,DSC_Nome,DSC_Endereco,DSC_Bairro,DSC_Cidade,NUM_CEP,NUM_Fone,NUM_Celular,NUM_FAX,DSC_Profissao_Especialidade,DSC_Email,NUM_Registro,COD_Tipo_Estado,ID_BSC_Empresa,ID_BSC_Profissao) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlSelectInfoEvt = "SELECT bsc_participante.ID_Participante, bsc_participante.DSC_Nome, bsc_participante.COD_CPF, bsc_participante.DSC_Email FROM bsc_participante LEFT JOIN seg_usuario ON bsc_participante.ID_Usuario = seg_usuario.ID_Usuario WHERE seg_usuario.ID_Usuario = '%s'";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getID_Participante(), $this->getCOD_CPF(), $this->getCOD_RG(), $this->getDSC_Nome(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEP(), $this->getNUM_Fone(), $this->getNUM_Celular(), $this->getNUM_FAX(), $this->getDSC_Profissao_Especialidade(), $this->getDSC_Email(), $this->getNUM_Registro(), $this->getCOD_Tipo_Estado(), $this->getID_BSC_Empresa(), $this->getID_BSC_Profissao(), $this->getID_Usuario());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getCOD_CPF(), $this->getCOD_RG(), $this->getDSC_Nome(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEP(), $this->getNUM_Fone(), $this->getNUM_Celular(), $this->getNUM_FAX(), $this->getDSC_Profissao_Especialidade(), $this->getDSC_Email(), $this->getNUM_Registro(), $this->getCOD_Tipo_Estado(), $this->getID_BSC_Empresa(), $this->getID_BSC_Profissao(), $this->getID_Participante());
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
        $this->setID_Participante($rs[0]['ID_Participante']);
        $this->setCOD_CPF($rs[0]['COD_CPF']);
        $this->setCOD_RG($rs[0]['COD_RG']);
        $this->setDSC_Nome($rs[0]['DSC_Nome']);
        $this->setDSC_Endereco($rs[0]['DSC_Endereco']);
        $this->setDSC_Bairro($rs[0]['DSC_Bairro']);
        $this->setDSC_Cidade($rs[0]['DSC_Cidade']);
        $this->setNUM_CEP($rs[0]['NUM_CEP']);
        $this->setNUM_Fone($rs[0]['NUM_Fone']);
        $this->setNUM_Celular($rs[0]['NUM_Celular']);
        $this->setNUM_FAX($rs[0]['NUM_FAX']);
        $this->setDSC_Profissao_Especialidade($rs[0]['DSC_Profissao_Especialidade']);
        $this->setDSC_Email($rs[0]['DSC_Email']);
        $this->setNUM_Registro($rs[0]['NUM_Registro']);
        $this->setCOD_Tipo_Estado($rs[0]['COD_Tipo_Estado']);
        $this->setID_BSC_Empresa($rs[0]['ID_BSC_Empresa']);
        $this->setID_BSC_Profissao($rs[0]['ID_BSC_Profissao']);
        $id_usuario = $rs[0]['ID_Usuario'];
        $this->setID_Usuario($id_usuario);
        return $this;
    }

    public function insertPartUs() {
        $sql = sprintf($this->sqlinsertPartUs, $this->getCOD_CPF(), $this->getCOD_RG(), $this->getDSC_Nome(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEP(), $this->getNUM_Fone(), $this->getNUM_Celular(), $this->getNUM_FAX(), $this->getDSC_Profissao_Especialidade(), $this->getDSC_Email(), $this->getNUM_Registro(), $this->getCOD_Tipo_Estado(), $this->getID_BSC_Empresa(), $this->getID_BSC_Profissao(), $this->getID_Usuario());
        return $this->RunQuery($sql);
    }

    public function selectNotExistsCPF($COD_CPF) {
        $rs = $this->RunSelect(sprintf($this->sqlSelectExist, $COD_CPF));
        $count = $rs[0]['COUNTCPF'];
        if ($count == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function selectNotExistsCPFEdit($COD_CPF, $ID_Participante) {
        $rs = $this->RunSelect(sprintf($this->sqlSelectExistEdit, $COD_CPF, $ID_Participante));
        $count = $rs[0]['COUNTCPF'];
        if ($count == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function selectInfoPartic($ID_Usuario) {
        $rs = $this->RunSelect(sprintf($this->sqlSelectInfoEvt, $ID_Usuario));
        //$rs = sprintf($this->sqlSelectInfoEvt, $ID_Usuario);
        $this->setID_Participante($rs[0]['ID_Participante']);
        $this->setDSC_Nome($rs[0]['DSC_Nome']);
        $this->setCOD_CPF($rs[0]['COD_CPF']);
        $this->setDSC_Email($rs[0]['DSC_Email']);
        //return $this->RunSelect($rs);
        return $this;
    }

    public function selectParticPorCPF() {
        $rs = $this->select(sprintf("and COD_CPF='%s'", $this->getCOD_CPF()));
        return $rs;
    }

    public function getIDParticipantePeloIDUsuario($ID_Usuario) {
        $rs = $this->select(sprintf("and ID_Usuario='%s'", $this->getCOD_CPF()));
        return $rs[0]['ID_Usuario'];
    }

}
