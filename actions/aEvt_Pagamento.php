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
require './model/mEvt_Pagamento.php';

class aEvt_Pagamento extends mEvt_Pagamento {

    protected $sqlInsert = "INSERT INTO evt_pagamento(ID_Pagamento, DT_Transacao, DT_Pagamento, VLR_Transacao, VR_Pago, NUM_Recibo, COD_TipoFormaPagamento, COD_TipoOrigemInscricao, ID_EVT_Evento, ID_EVT_Pagamento_Pai, COD_Tipo_Situacao_Pagamento, QTD_Parcelas, NUM_Parcelas, QTD_Parcelas_Pagas) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_pagamento set DT_Transacao='%s', DT_Pagamento='%s', VLR_Transacao='%s', VR_Pago='%s', NUM_Recibo='%s', COD_TipoFormaPagamento='%s', COD_TipoOrigemInscricao='%s', ID_EVT_Evento='%s', ID_EVT_Pagamento_Pai='%s', COD_Tipo_Situacao_Pagamento='%s', QTD_Parcelas='%s', NUM_Parcelas='%s', QTD_Parcelas_Pagas='%s' WHERE ID_Pagamento='%s'";
    protected $sqlDelete = "delete from evt_pagamento where ID_Pagamento='%s'";
    protected $sqlSelect = "select * from evt_pagamento where 1=1 %s %s";
    protected $sqlSelectInner = "SELECT evt_evento_participante.ID_EVT_Evento,evt_evento_categoria.VLR_Inscricao FROM `evt_evento_participante` INNER JOIN bsc_participante ON evt_evento_participante.ID_BSC_Participante = bsc_participante.ID_Participante INNER JOIN evt_evento_categoria ON evt_evento_participante.ID_EVT_Categoria = evt_evento_categoria.ID_Evento_Categoria WHERE evt_evento_participante.ID_EVT_Evento = '%s' AND bsc_participante.COD_CPF = '%s'";

    public function insert()
    {
        $sql = sprintf($this->sqlInsert, $this->getID_Pagamento(), $this->getDT_Transacao(), $this->getDT_Pagamento(), $this->getVLR_Transacao(), $this->getVR_Pago(), $this->getNUM_Recibo(), $this->getCOD_TipoFormaPagamento(), $this->getCOD_TipoOrigemInscricao(), $this->getID_EVT_Evento(), $this->getID_EVT_Pagamento_Pai(), $this->getCOD_Tipo_Situacao_Pagamento(), $this->getQTD_Parcelas(), $this->getNUM_Parcelas(), $this->getQTD_Parcelas_Pagas());
        return $this->RunQuery($sql);
    }

    public function update()
    {
        $sql = sprintf($this->sqlUpdate, $this->getDT_Transacao(), $this->getDT_Pagamento(), $this->getVLR_Transacao(), $this->getVR_Pago(), $this->getNUM_Recibo(), $this->getCOD_TipoFormaPagamento(), $this->getCOD_TipoOrigemInscricao(), $this->getID_EVT_Evento(), $this->getID_EVT_Pagamento_Pai(), $this->getCOD_Tipo_Situacao_Pagamento(), $this->getQTD_Parcelas(), $this->getNUM_Parcelas(), $this->getQTD_Parcelas_Pagas(), $this->getID_Pagamento());
        return $this->RunQuery($sql);
    }

    public function delete()
    {
        $sql = sprintf($this->sqlDelete, $this->getID_Pagamento());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load()
    {
        $rs = $this->select(sprintf("and ID_Pagamento='%s'", $this->getID_Pagamento()));
        $this->setID_Pagamento($rs[0]['ID_Pagamento']);
        $this->setDT_Transacao($rs[0]['DT_Transacao']);
        $this->setDT_Pagamento($rs[0]['DT_Pagamento']);
        $this->setVLR_Transacao($rs[0]['VLR_Transacao']);
        $this->setVR_Pago($rs[0]['VR_Pago']);
        $this->setNUM_Recibo($rs[0]['NUM_Recibo']);
        $this->setCOD_TipoFormaPagamento($rs[0]['COD_TipoFormaPagamento']);
        $this->setCOD_TipoOrigemInscricao($rs[0]['COD_TipoOrigemInscricao']);
        $this->setID_EVT_Evento($rs[0]['ID_EVT_Evento']);
        $this->setID_EVT_Pagamento_Pai($rs[0]['ID_EVT_Pagamento_Pai']);
        $this->setCOD_Tipo_Situacao_Pagamento($rs[0]['COD_Tipo_Situacao_Pagamento']);
        $this->setQTD_Parcelas($rs[0]['QTD_Parcelas']);
        $this->setNUM_Parcelas($rs[0]['NUM_Parcelas']);
        $this->setQTD_Parcelas_Pagas($rs[0]['QTD_Parcelas_Pagas']);
        return $this;
    }

    public function selectInner($ID_EVT, $CPF_Participante)
    {
        $rs = $this->RunSelect(sprintf($this->sqlSelectInner, $ID_EVT, $CPF_Participante));
        $this->setID_EVT_Evento($rs[0]['ID_EVT_Evento']);
        $this->setVLR_Transacao($rs[0]['VLR_Inscricao']);
        return $this;
    }

    public function geraInfoPagamento()
    {

        $this->setCOD_TipoFormaPagamento(0);
        $this->setCOD_Tipo_Situacao_Pagamento(0); //set igual a zero para Situação Aberto.
        $this->setDT_Pagamento('01-01-1980');
        $data_atual = date("Y/m/d", strtotime("now"));
        $this->setCOD_TipoOrigemInscricao(0);
        $this->setDT_Transacao($data_atual);
        //Set feito no metodo selectInner $pagamento->setID_EVT_Evento($ID_EVT_Evento);
        require_once ('./config/configs.php');
        $config = new configs();
        $id_Pagamento = $config->idUnico();
        $this->setID_EVT_Pagamento_Pai(0);
        $this->setID_Pagamento($id_Pagamento);
        $this->setNUM_Parcelas(0);
        $this->setNUM_Recibo(0);
        $this->setQTD_Parcelas(1); //Apenas pagamento a vista, parcelamento não implementado
        $this->setQTD_Parcelas_Pagas(0);
        //Set feito no metodo selectInner $pagamento->setVLR_Transacao($VLR_Transacao);
        $this->setVR_Pago(0);
        $this->insert();
    }

    public function loadIDEvento()
    {
        $rs = $this->select(sprintf("and ID_EVT_Evento='%s'", $this->getID_Pagamento()));
        $this->setID_Pagamento($rs[0]['ID_Pagamento']);
        $this->setDT_Transacao($rs[0]['DT_Transacao']);
        $this->setDT_Pagamento($rs[0]['DT_Pagamento']);
        $this->setVLR_Transacao($rs[0]['VLR_Transacao']);
        $this->setVR_Pago($rs[0]['VR_Pago']);
        $this->setNUM_Recibo($rs[0]['NUM_Recibo']);
        $this->setCOD_TipoFormaPagamento($rs[0]['COD_TipoFormaPagamento']);
        $this->setCOD_TipoOrigemInscricao($rs[0]['COD_TipoOrigemInscricao']);
        $this->setID_EVT_Evento($rs[0]['ID_EVT_Evento']);
        $this->setID_EVT_Pagamento_Pai($rs[0]['ID_EVT_Pagamento_Pai']);
        $this->setCOD_Tipo_Situacao_Pagamento($rs[0]['COD_Tipo_Situacao_Pagamento']);
        $this->setQTD_Parcelas($rs[0]['QTD_Parcelas']);
        $this->setNUM_Parcelas($rs[0]['NUM_Parcelas']);
        $this->setQTD_Parcelas_Pagas($rs[0]['QTD_Parcelas_Pagas']);
        return $this;
    }
    
    
}
