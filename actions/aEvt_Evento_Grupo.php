<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aEvt_Evento_Grupo
 *
 * @author Chrystyan Godoy <F1r3Black0ut>
 */
require './model/aEvt_Evento_Grupo.php';

class aEvt_Evento_Grupo extends aEvt_Evento_Grupo {

    protected $sqlInsert = "INSERT INTO evt_evento_grupo(ID_EVT_EventoGrupo, DSC_Nome, DSC_Nome_Resp, COD_CPF_Resp, DSC_Email_Resp, NUM_Tel_Resp, NUM_Celular_Resp, DSC_Endereco_Resp, DSC_Bairro, NUM_CEP_Resp, DSC_Cidade_Resp, COD_TipoEstado_Resp, SIT_EH_Parcelado, VLR_Total, VLR_Total_Inscricao, COD_Inscricao_APAE, ID_EVT_Evento, ID_EVT_Pagamento, ID_SEG_Detalhe_transacao) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_evento_grupo set ID_EVT_EventoGrupo='%s', DSC_Nome='%s', DSC_Nome_Resp='%s', COD_CPF_Resp='%s', DSC_Email_Resp='%s', NUM_Tel_Resp='%s', NUM_Celular_Resp='%s', DSC_Endereco_Resp='%s', DSC_Bairro='%s', NUM_CEP_Resp='%s', DSC_Cidade_Resp='%s', COD_TipoEstado_Resp='%s', SIT_EH_Parcelado='%s', VLR_Total='%s', VLR_Total_Inscricao='%s', COD_Inscricao_APAE='%s', ID_EVT_Evento='%s', ID_EVT_Pagamento='%s', ID_SEG_Detalhe_transacao='%s' where ID_EVT_EventoGrupo = '%s'";
    protected $sqlDelete = "delete from evt_evento_grupo where ID_EVT_EventoGrupo = '%s'";
    protected $sqlSelect = "select * from evt_evento_grupo where 1=1 %s %s";

    public function insert()
    {
        $sql = sprintf($this->sqlInsert, $this->getID_EVT_EventoGrupo(), $this->getDSC_Nome(), $this->getDSC_Nome_Resp(), $this->getCOD_CPF_Resp(), $this->getDSC_Email_Resp(), $this->getNUM_Tel_Resp(), $this->getNUM_Celular_Resp(), $this->getDSC_Endereco_Resp(), $this->getDSC_Bairro(), $this->getNUM_CEP_Resp(), $this->getDSC_Cidade_Resp(), $this->getCOD_TipoEstado_Resp(), $this->getSIT_EH_Parcelado(), $this->getVLR_Total(), $this->getVLR_Total_Inscricao(), $this->getCOD_Inscricao_APAE(), $this->getID_EVT_Evento(), $this->getID_EVT_Pagamento(), $this->getID_SEG_Detalhe_transacao());
        return $this->RunQuery($sql);
    }

    public function update()
    {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome(), $this->getDSC_Nome_Resp(), $this->getCOD_CPF_Resp(), $this->getDSC_Email_Resp(), $this->getNUM_Tel_Resp(), $this->getNUM_Celular_Resp(), $this->getDSC_Endereco_Resp(), $this->getDSC_Bairro(), $this->getNUM_CEP_Resp(), $this->getDSC_Cidade_Resp(), $this->getCOD_TipoEstado_Resp(), $this->getSIT_EH_Parcelado(), $this->getVLR_Total(), $this->getVLR_Total_Inscricao(), $this->getCOD_Inscricao_APAE(), $this->getID_EVT_Evento(), $this->getID_EVT_Pagamento(), $this->getID_SEG_Detalhe_transacao(), $this->getID_EVT_EventoGrupo());
        return $this->RunQuery($sql);
    }

    public function delete()
    {
        $sql = sprintf($this->sqlDelete, $this->getID_EVT_EventoGrupo());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load()
    {
        $rs = $this->select(sprintf("and ID_EVT_EventoGrupo='%s'", $this->getID_EVT_EventoGrupo()));
        $this->setID_EVT_EventoGrupo($rs[0]['ID_EVT_EventoGrupo']);
        $this->setDSC_Nome($rs[0]['DSC_Nome']);
        $this->setDSC_Nome_Resp($rs[0]['DSC_Nome_Resp']);
        $this->setCOD_CPF_Resp($rs[0]['COD_CPF_Resp']);
        $this->setDSC_Email_Resp($rs[0]['DSC_Email_Resp']);
        $this->setNUM_Tel_Resp($rs[0]['NUM_Tel_Resp']);
        $this->setNUM_Celular_Resp($rs[0]['NUM_Celular_Resp']);
        $this->setDSC_Endereco_Resp($rs[0]['DSC_Endereco_Resp']);
        $this->setDSC_Bairro($rs[0]['DSC_Bairro']);
        $this->setNUM_CEP_Resp($rs[0]['NUM_CEP_Resp']);
        $this->setDSC_Cidade_Resp($rs[0]['DSC_Cidade_Resp']);
        $this->setCOD_TipoEstado_Resp($rs[0]['COD_TipoEstado_Resp']);
        $this->setSIT_EH_Parcelado($rs[0]['SIT_EH_Parcelado']);
        $this->setVLR_Total($rs[0]['VLR_Total']);
        $this->setVLR_Total_Inscricao($rs[0]['VLR_Total_Inscricao']);
        $this->setCOD_Inscricao_APAE($rs[0]['COD_Inscricao_APAE']);
        $this->setID_EVT_Evento($rs[0]['ID_EVT_Evento']);
        $this->setID_EVT_Pagamento($rs[0]['ID_EVT_Pagamento']);
        $this->setID_SEG_Detalhe_transacao($rs[0]['ID_SEG_Detalhe_transacao']);
        return $this;
    }

}
