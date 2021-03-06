<?php

require './model/mBsc_Participante.php';

class aBsc_Participante extends mBsc_Participante {

    protected $sqlInsert = "INSERT INTO bsc_participante(ID_Participante, COD_CPF, COD_RG,Id_Estrangeiro,Nome_Cracha, DSC_Nome, DSC_Endereco, DSC_Bairro, DSC_Cidade, NUM_CEP, NUM_Fone, NUM_Celular, NUM_FAX, DSC_Profissao_Especialidade, DSC_Email, NUM_Registro, COD_Tipo_Estado, ID_BSC_Empresa, ID_BSC_Profissao, ID_Usuario, Cod_Participante) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "UPDATE bsc_participante SET COD_CPF= '%s',COD_RG= '%s',Id_Estrangeiro= '%s', Nome_Cracha= '%s', DSC_Nome= '%s',DSC_Endereco= '%s',DSC_Bairro= '%s',DSC_Cidade= '%s',NUM_CEP= '%s',NUM_Fone= '%s',NUM_Celular= '%s',NUM_FAX= '%s',DSC_Profissao_Especialidade= '%s',DSC_Email= '%s',NUM_Registro= '%s',COD_Tipo_Estado= '%s',ID_BSC_Empresa= '%s',ID_BSC_Profissao ='%s',ID_Usuario ='%s', Cod_Participante='%s' WHERE ID_Participante = '%s'";
    protected $sqlDelete = "DELETE FROM bsc_participante WHERE ID_Participante = '%s'";
    protected $sqlSelect = "SELECT * FROM bsc_participante WHERE 1=1 %s %s";
    //protected $sqlSelectExist = "SELECT count(0) AS COUNTCPF FROM bsc_participante INNER JOIN evt_evento_participante ON ID_BSC_Participante = ID_Participante WHERE 1=1 and COD_CPF='%s' and ID_EVT_Evento = '%s'";
    protected $sqlSelectExist = "SELECT count(0) AS COUNTCPF FROM bsc_participante WHERE 1=1 and COD_CPF='%s'";
    protected $sqlSelectExistIDEst = "SELECT count(0) AS COUNTIDEst FROM bsc_participante WHERE 1=1 and Id_Estrangeiro='%s'";
    protected $sqlSelectExistEdit = "SELECT count(0) AS COUNTCPF FROM bsc_participante WHERE 1=1 and COD_CPF='%s' and ID_Participante <> '%s'";
    protected $sqlSelectExistEditIDEst = "SELECT count(0) AS COUNTIDEst FROM bsc_participante WHERE 1=1 and Id_Estrangeiro='%s' and ID_Participante <> '%s'";
    protected $sqlinsertPartUs = "INSERT INTO bsc_participante(COD_CPF,COD_RG,Nome_Cracha,DSC_Nome,DSC_Endereco,DSC_Bairro,DSC_Cidade,NUM_CEP,NUM_Fone,NUM_Celular,NUM_FAX,DSC_Profissao_Especialidade,DSC_Email,NUM_Registro,COD_Tipo_Estado,ID_BSC_Empresa,ID_BSC_Profissao,Cod_Participante) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlSelectInfoEvt = "SELECT bsc_participante.ID_Participante, bsc_participante.DSC_Nome,bsc_participante.Nome_Cracha, bsc_participante.COD_CPF, bsc_participante.DSC_Email, bsc_participante.Cod_Participante FROM bsc_participante LEFT JOIN seg_usuario ON bsc_participante.ID_Usuario = seg_usuario.ID_Usuario WHERE seg_usuario.ID_Usuario = '%s'";
    protected $sqlSelectParticipanteEvento = "";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getID_Participante(), $this->getCOD_CPF(), $this->getCOD_RG(), $this->getId_Estrangeiro(), $this->getNome_Cracha(), $this->getDSC_Nome(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEP(), $this->getNUM_Fone(), $this->getNUM_Celular(), $this->getNUM_FAX(), $this->getDSC_Profissao_Especialidade(), $this->getDSC_Email(), $this->getNUM_Registro(), $this->getCOD_Tipo_Estado(), $this->getID_BSC_Empresa(), $this->getID_BSC_Profissao(), $this->getID_Usuario(), $this->getCod_Participante());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getCOD_CPF(), $this->getCOD_RG(), $this->getId_Estrangeiro(), $this->getNome_Cracha(), $this->getDSC_Nome(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEP(), $this->getNUM_Fone(), $this->getNUM_Celular(), $this->getNUM_FAX(), $this->getDSC_Profissao_Especialidade(), $this->getDSC_Email(), $this->getNUM_Registro(), $this->getCOD_Tipo_Estado(), $this->getID_BSC_Empresa(), $this->getID_BSC_Profissao(), $this->getID_Usuario(), $this->getCod_Participante(), $this->getID_Participante());
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
        $this->setId_Estrangeiro($rs[0]['Id_Estrangeiro']);
        $this->setNome_Cracha($rs[0]['Nome_Cracha']);
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
        $this->setId_usuario($rs[0]['ID_Usuario']);
        $this->setCod_Participante($rs[0]['Cod_Participante']);
        return $this;
    }

    public function insertPartUs() {
        $sql = sprintf($this->sqlinsertPartUs, $this->getCOD_CPF(), $this->getCOD_RG(), $this->getNome_Cracha(), $this->getDSC_Nome(), $this->getDSC_Endereco(), $this->getDSC_Bairro(), $this->getDSC_Cidade(), $this->getNUM_CEP(), $this->getNUM_Fone(), $this->getNUM_Celular(), $this->getNUM_FAX(), $this->getDSC_Profissao_Especialidade(), $this->getDSC_Email(), $this->getNUM_Registro(), $this->getCOD_Tipo_Estado(), $this->getID_BSC_Empresa(), $this->getID_BSC_Profissao(), $this->getID_Usuario(), $this->getCod_Participante());
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

    public function selectNotExistsId_Estrangeiro($Id_Estrangeiro) {
        $rs = $this->RunSelect(sprintf($this->sqlSelectExistIDEst, $Id_Estrangeiro));
        $count = $rs[0]['COUNTIDEst'];
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

    public function selectNotExistsId_EstrangeiroEdit($Id_Estrangeiro, $ID_Participante) {
        $rs = $this->RunSelect(sprintf($this->sqlSelectExistEditIDEst, $Id_Estrangeiro, $ID_Participante));
        $count = $rs[0]['COUNTIDEst'];
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
        $this->setNome_Cracha($rs[0]['Nome_Cracha']);
        $this->setCOD_CPF($rs[0]['COD_CPF']);
        $this->setDSC_Email($rs[0]['DSC_Email']);
        $this->setCod_Participante($rs[0]['Cod_Participante']);
        //return $this->RunSelect($rs);
        return $this;
    }

    public function selectParticPorCPF() {
        $rs = $this->select(sprintf("and COD_CPF='%s'", $this->getCOD_CPF()));
        return $rs;
    }

    public function selectParticPorID() {
        $rs = $this->select(sprintf("and ID_Participante='%s'", $this->getID_Participante()));
        return $rs;
    }

    public function getIDParticipantePeloIDUsuario($ID_Usuario) {
        $rs = $this->select(sprintf("and ID_Usuario='%s'", $ID_Usuario));
        if (empty($rs)) {
            return null;
        } else {
            return $rs[0]['ID_Participante'];
        }
    }

    public function getParticipanteEvente($eventoID) {
        $rs = $this->select(sprintf($this->sqlSelectParticipanteEvento));
        return $rs;
    }

    public function SelectPartEvento() {
        //$idParticipante = $partic->getID_Participante();
        try {
            return $this->RunSelect("SELECT bsc_participante.ID_Participante, 
                    bsc_participante.Nome_Cracha as Nome_Cracha, 
                    bsc_participante.DSC_NOME AS DSC_Nome, bsc_participante.NUM_Celular AS NUM_Celular, 
                    evt_evento.DSC_Nome as DSC_NomeEv, evt_evento_participante.ID_EVT_Evento_Pariticipante,
                    evt_evento.ID_EVT as ID_EVT, DATE_FORMAT(evt_evento.DT_Inicio , '%d/%m/%Y' ) as DT_Inicio, 
                    DATE_FORMAT(evt_evento.DT_Fim , '%d/%m/%Y' ) as DT_Fim, 
                    bsc_local_evento.DSC_Endereco as DSC_Endereco, 
                    bsc_local_evento.DSC_Bairro as DSC_Bairro, bsc_local_evento.DSC_Cidade as DSC_Cidade, 
                    bsc_local_evento.NUM_Fone as NUM_Fone, bsc_local_evento.DSC_EMAIL as DSC_EMAIL,
                    evt_evento.Logo_Evento as Logo_Evento, 
                    evt_pagamento.COD_Tipo_Situacao_Pagamento AS COD_Tipo_Situacao_Pagamento 
                    FROM evt_evento_participante 
                    INNER JOIN evt_evento ON (evt_evento_participante.ID_EVT_Evento = evt_evento.ID_EVT) 
                    INNER JOIN bsc_local_evento ON (bsc_local_evento.ID_Local = evt_evento.ID_BSC_Local_Evento) 
                    INNER JOIN evt_pagamento ON (evt_evento_participante.ID_EVT_Evento_Pariticipante = evt_pagamento.ID_EVT_Evento) 
                    INNER JOIN bsc_participante ON (bsc_participante.ID_Participante = evt_evento_participante.ID_BSC_Participante) 
                    WHERE 1=1 AND ID_EVT_Pagamento_Pai=0");
        } catch (Exception $ex) {
            return $ex . error_get_last();
        }
    }

    public function SelectEventoParticipante() {
        //$idParticipante = $partic->getID_Participante();
        try {
            return $this->RunSelect("SELECT bsc_participante.ID_Participante, bsc_participante.Nome_Cracha as Nome_Cracha, bsc_participante.DSC_NOME AS DSC_Nome, bsc_participante.NUM_Celular AS NUM_Celular, evt_evento.DSC_Nome as DSC_NomeEv, evt_evento_participante.ID_EVT_Evento_Pariticipante, evt_evento.ID_EVT as ID_EVT, DATE_FORMAT(evt_evento.DT_Inicio , '%d/%m/%Y' ) as DT_Inicio, DATE_FORMAT(evt_evento.DT_Fim , '%d/%m/%Y' ) as DT_Fim, bsc_local_evento.DSC_Endereco as DSC_Endereco, bsc_local_evento.DSC_Bairro as DSC_Bairro, bsc_local_evento.DSC_Cidade as DSC_Cidade, bsc_local_evento.NUM_Fone as NUM_Fone, bsc_local_evento.DSC_EMAIL as DSC_EMAIL, evt_evento.Logo_Evento as Logo_Evento FROM evt_evento_participante INNER JOIN evt_evento ON (evt_evento_participante.ID_EVT_Evento = evt_evento.ID_EVT) INNER JOIN bsc_local_evento ON (bsc_local_evento.ID_Local = evt_evento.ID_BSC_Local_Evento) INNER JOIN bsc_participante ON (bsc_participante.ID_Participante = evt_evento_participante.ID_BSC_Participante) WHERE 1=1");
        } catch (Exception $ex) {
            return $ex . error_get_last();
        }
    }

    public function countPartic() {
        $COUNT = $this->RunSelect("SELECT COUNT(ID_Participante)+1 as COUNT FROM bsc_participante");
        return $COUNT[0]['COUNT'];
    }

}
