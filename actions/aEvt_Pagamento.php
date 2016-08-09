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
    protected $sqlSelectInnerPagto = "SELECT evt_evento_participante.DSC_Nome_Crachav,evt_evento_participante.VLR_Total_Inscricao,evt_pagamento.COD_Tipo_Situacao_Pagamento FROM evt_evento_participante INNER JOIN evt_pagamento ON evt_pagamento.ID_EVT_Evento = evt_evento_participante.ID_EVT_Evento_Pariticipante WHERE evt_evento_participante.ID_EVT_Evento = '%s'";
    protected $sqlUpdateSituacao = "update evt_pagamento set COD_Tipo_Situacao_Pagamento='%s' WHERE ID_Pagamento='%s'";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getID_Pagamento(), $this->getDT_Transacao(True), $this->getDT_Pagamento(True), $this->getVLR_Transacao(), $this->getVR_Pago(), $this->getNUM_Recibo(), $this->getCOD_TipoFormaPagamento(), $this->getCOD_TipoOrigemInscricao(), $this->getID_EVT_Evento(), $this->getID_EVT_Pagamento_Pai(), $this->getCOD_Tipo_Situacao_Pagamento(), $this->getQTD_Parcelas(), $this->getNUM_Parcelas(), $this->getQTD_Parcelas_Pagas());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getDT_Transacao(True), $this->getDT_Pagamento(True), $this->getVLR_Transacao(), $this->getVR_Pago(), $this->getNUM_Recibo(), $this->getCOD_TipoFormaPagamento(), $this->getCOD_TipoOrigemInscricao(), $this->getID_EVT_Evento(), $this->getID_EVT_Pagamento_Pai(), $this->getCOD_Tipo_Situacao_Pagamento(), $this->getQTD_Parcelas(), $this->getNUM_Parcelas(), $this->getQTD_Parcelas_Pagas(), $this->getID_Pagamento());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_Pagamento());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
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

    public function selectInner($ID_EVT, $CPF_Participante) {
        //$sql = sprintf($this->selectInner,$ID_EVT,$CPF_Participante);
        $sql = "SELECT evt_evento_participante.ID_EVT_Evento_Pariticipante,
                evt_evento_participante.Num_Inscricao,evt_evento_categoria.VLR_Inscricao 
                FROM evt_evento_participante 
                INNER JOIN bsc_participante ON evt_evento_participante.ID_BSC_Participante = bsc_participante.ID_Participante 
                INNER JOIN evt_evento_categoria ON evt_evento_participante.ID_EVT_Categoria = evt_evento_categoria.ID_Evento_Categoria 
                WHERE evt_evento_participante.ID_EVT_Evento = '$ID_EVT' AND bsc_participante.COD_CPF = '$CPF_Participante'";
        $rs = $this->RunSelect($sql);
        if (!empty($rs)) {
            $this->setID_EVT_Evento($rs[0]['ID_EVT_Evento_Pariticipante']);
            $this->setVLR_Transacao($rs[0]['VLR_Inscricao']);
        }
        return $this;
    }

    public function selectInnerId_Estrangeiro($ID_EVT, $Id_Estrangeiro) {
        $sql = "SELECT evt_evento_participante.ID_EVT_Evento_Pariticipante,evt_evento_categoria.VLR_Inscricao FROM evt_evento_participante INNER JOIN bsc_participante ON evt_evento_participante.ID_BSC_Participante = bsc_participante.ID_Participante INNER JOIN evt_evento_categoria ON evt_evento_participante.ID_EVT_Categoria = evt_evento_categoria.ID_Evento_Categoria WHERE evt_evento_participante.ID_EVT_Evento = '$ID_EVT' AND bsc_participante.Id_Estrangeiro = '$Id_Estrangeiro'";
        $rs = $this->RunSelect($sql);
        if (!empty($rs)) {
            $this->setID_EVT_Evento($rs[0]['ID_EVT_Evento_Pariticipante']);
            $this->setVLR_Transacao($rs[0]['VLR_Inscricao']);
        }
        return $this;
    }

    public function geraInfoPagamento($Parcelas, $Valor_Pagar,$DataVencimento) {
        $this->setCOD_TipoFormaPagamento(0);
        $this->setCOD_Tipo_Situacao_Pagamento(0); //set igual a zero para Situação Aberto.
        $this->setDT_Pagamento('01-01-1980');
        //$data_atual = date("Y/m/d", strtotime("now"));
        $data_atual = $DataVencimento;
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
        //Efetuar teste em relação a implementação abaixo.....
        //$this->setQTD_Parcelas(1); //Apenas pagamento a vista, parcelamento não implementado
        $this->setQTD_Parcelas($Parcelas);
        $this->setQTD_Parcelas_Pagas(0);
        //Set feito no metodo selectInner $pagamento->setVLR_Transacao($VLR_Transacao);
        $this->setVR_Pago(0);
        $this->insert();

        $valorParcela = round($Valor_Pagar / $Parcelas, 2);
        for ($i = 0; $i < $Parcelas; $i++) {
            $nroParcela = $i + 1;
            $this->geraInfoPagamentoParcela($id_Pagamento, $Parcelas, $nroParcela, $valorParcela,$DataVencimento);
        }
    }

    private function geraInfoPagamentoParcela($id_PagamentoPai, $Parcelas, $nroParcela, $vlrParcela,$DataVencimento) {
        $this->setCOD_TipoFormaPagamento(0);
        $this->setCOD_Tipo_Situacao_Pagamento(0); //set igual a zero para Situação Aberto.
        $this->setDT_Pagamento('01-01-1980');
        //$data = date("Y/m/d", strtotime("now"));
        $data = date("Y-m-d", strtotime("+".$nroParcela." month", strtotime($DataVencimento)));
        $this->setDT_Transacao($data);
        $this->setCOD_TipoOrigemInscricao(0);
        //Set feito no metodo selectInner $pagamento->setID_EVT_Evento($ID_EVT_Evento);
        require_once ('./config/configs.php');
        $config = new configs();
        $id_PagamentoParc = $config->idUnico();

        $this->setID_EVT_Pagamento_Pai($id_PagamentoPai);
        $this->setID_Pagamento($id_PagamentoParc);
        $this->setNUM_Parcelas($nroParcela);
        $this->setNUM_Recibo(0);
        //Efetuar teste em relação a implementação abaixo.....
        //$this->setQTD_Parcelas(1); //Apenas pagamento a vista, parcelamento não implementado
        $this->setQTD_Parcelas($Parcelas);
        $this->setQTD_Parcelas_Pagas(0);
        //Set feito no metodo selectInner $pagamento->setVLR_Transacao($VLR_Transacao);
        $this->setVR_Pago(0);
        $this->setVLR_Transacao($vlrParcela);
        $this->insert();

        require_once './actions/aEvt_Evento.php';
        $Evento = new aEvt_Evento();
        require_once './actions/aEvt_Evento_Participante.php';
        $EvtPartic = new aEvt_Evento_Participante();
        $IDEVT = $this->getID_EVT_Evento();
        $EvtPartic->setID_EVT_Evento_Pariticipante($IDEVT);
        $EvtPartic->load();
        
        require_once './actions/aBsc_Banco.php';
        $Banco = new aBsc_Banco();
        
        $Evento->setID_EVT($EvtPartic->getID_EVT_Evento());
        $Evento->load();
        $codBanco = $Evento->getID_Banco();
        $Banco->setID($codBanco);
        $Banco->load();
        $nosso_Nro = $Banco->getnumero_documento() + 1;
        $Banco->setnumero_documento($nosso_Nro);
        $Banco->update();
        require_once './actions/aEvt_Pagamento_Boleto.php';
        $evtPagtParc = new aEvt_Pagamento_Boleto();
        $evtPagtParc->geraParcelasPagto($id_PagamentoParc, $nosso_Nro);
    }

    public function loadIDEvento() {
        $rs = $this->select(sprintf("and ID_EVT_Evento='%s'", $this->getID_EVT_Evento()));
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

    public function loadIDPagto() {
        $rs = $this->select(sprintf(" and ID_Pagamento = '%s'", $this->getID_Pagamento()));
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

    public function selectInnerPagto($ID_EVT) {
        $sql = "SELECT evt_evento_participante.DSC_Nome_Crachav,evt_evento_participante.VLR_Total_Inscricao,evt_pagamento.COD_Tipo_Situacao_Pagamento, evt_pagamento.ID_Pagamento FROM evt_evento_participante INNER JOIN evt_pagamento ON evt_pagamento.ID_EVT_Evento = evt_evento_participante.ID_EVT_Evento_Pariticipante WHERE evt_evento_participante.ID_EVT_Evento = '$ID_EVT' and evt_pagamento.COD_Tipo_Situacao_Pagamento=0";
        return $this->RunSelect($sql);
    }

    public function selectInnerPagtoPartic($ID_BSC_Participante) {
        $sql = "SELECT evt_evento.DSC_Nome,
                evt_evento_participante.Num_Inscricao, 
                evt_evento_participante.DSC_Nome_Cracha,
                evt_pagamento.VLR_Transacao,
                evt_pagamento.COD_Tipo_Situacao_Pagamento,
                evt_pagamento.ID_Pagamento 
                FROM evt_evento_participante 
                INNER JOIN evt_pagamento ON evt_pagamento.ID_EVT_Evento = evt_evento_participante.ID_EVT_Evento_Pariticipante 
                INNER JOIN evt_evento ON evt_evento.ID_EVT = evt_evento_participante.ID_EVT_Evento  
                WHERE evt_evento_participante.ID_BSC_Participante = '$ID_BSC_Participante'
                AND ID_EVT_Pagamento_Pai<>0";
        return $this->RunSelect($sql);
    }

    public function updateStatus() {
        $sql = sprintf($this->sqlUpdateSituacao, $this->getCOD_Tipo_Situacao_Pagamento(), $this->getID_Pagamento());
        return $this->RunQuery($sql);
    }

    
    public function ChecaPagtoEvento($ID_Pagamento) {
        $sql = "SELECT COUNT(ID_Pagamento) as COUNT
                FROM evt_Pagamento 
                WHERE 1=1 
                AND ID_Pagamento='$ID_Pagamento'
                AND COD_Tipo_Situacao_Pagamento NOT IN(1,2)
                AND ID_EVT_Pagamento_Pai<>0";
        $rs = $this->RunSelect($sql);
        return $rs[0]['COUNT'];
    }
}
