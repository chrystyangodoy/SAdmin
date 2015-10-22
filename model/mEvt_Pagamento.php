<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mEvt_Pagamento
 *
 * @author Chrystyan Godoy <F1r3Black0ut>
 */
require_once './db/dbConnection.php';

class mEvt_Pagamento extends dbConnection {

    private $ID_Pagamento;
    private $DT_Transacao;
    private $DT_Pagamento;
    private $VLR_Transacao;
    private $VR_Pago;
    private $NUM_Recibo;
    private $COD_TipoFormaPagamento;
    private $COD_TipoOrigemInscricao;
    private $ID_EVT_Evento;
    private $ID_EVT_Pagamento_Pai;
    private $COD_Tipo_Situacao_Pagamento;
    private $QTD_Parcelas;
    private $NUM_Parcelas;
    private $QTD_Parcelas_Pagas;

    public function setID_Pagamento($ID_Pagamento)
    {
        $this->ID_Pagamento = $ID_Pagamento;
    }
    public function getID_Pagamento()
    {
        return $this->ID_Pagamento;
    }
    public function setDT_Transacao($DT_Transacao)
    {
        $this->DT_Transacao = $DT_Transacao;
    }
    public function getDT_Transacao()
    {
        return $this->DT_Transacao;
    }
    public function setDT_Pagamento($DT_Pagamento)
    {
        $this->DT_Transacao = $DT_Pagamento;
    }
    public function getDT_Pagamento()
    {
        return $this->DT_Pagamento;
    }
    public function setVLR_Transacao($VLR_Transacao)
    {
        $this->DT_Transacao = $VLR_Transacao;
    }
    public function getVLR_Transacao()
    {
        return $this->VLR_Transacao;
    }
    public function setVR_Pago($VR_Pago)
    {
        $this->VR_Pago = $VR_Pago;
    }
    public function getVR_Pago()
    {
        return $this->VR_Pago;
    }
    public function setNUM_Recibo($NUM_Recibo)
    {
        $this->NUM_Recibo = $NUM_Recibo;
    }
    public function getNUM_Recibo()
    {
        return $this->NUM_Recibo;
    }
    public function setCOD_TipoFormaPagamento($COD_TipoFormaPagamento)
    {
        $this->COD_TipoFormaPagamento = $COD_TipoFormaPagamento;
    }
    public function getCOD_TipoFormaPagamento()
    {
        return $this->COD_TipoFormaPagamento;
    }
    public function setCOD_TipoOrigemInscricao($COD_TipoOrigemInscricao)
    {
        $this->COD_TipoOrigemInscricao = $COD_TipoOrigemInscricao;
    }
    public function getCOD_TipoOrigemInscricao()
    {
        return $this->COD_TipoOrigemInscricao;
    }
    public function setID_EVT_Evento($ID_EVT_Evento)
    {
        $this->ID_EVT_Evento = $ID_EVT_Evento;
    }
    public function getID_EVT_Evento()
    {
        return $this->ID_EVT_Evento;
    }
    public function setID_EVT_Pagamento_Pai($ID_EVT_Pagamento_Pai)
    {
        $this->ID_EVT_Pagamento_Pai = $ID_EVT_Pagamento_Pai;
    }
    public function getID_EVT_Pagamento_Pai()
    {
        return $this->ID_EVT_Pagamento_Pai;
    }
    public function setCOD_Tipo_Situacao_Pagamento($COD_Tipo_Situacao_Pagamento)
    {
        $this->COD_Tipo_Situacao_Pagamento = $COD_Tipo_Situacao_Pagamento;
    }
    public function getCOD_Tipo_Situacao_Pagamento()
    {
        return $this->COD_Tipo_Situacao_Pagamento;
    }
    public function setQTD_Parcelas($QTD_Parcelas)
    {
        $this->COD_Tipo_Situacao_Pagamento = $QTD_Parcelas;
    }
    public function getQTD_Parcelas()
    {
        return $this->QTD_Parcelas;
    }
    public function setNUM_Parcelas($NUM_Parcelas)
    {
        $this->COD_Tipo_Situacao_Pagamento = $NUM_Parcelas;
    }
    public function getNUM_Parcelas()
    {
        return $this->NUM_Parcelas;
    }
    public function setQTD_Parcelas_Pagas($QTD_Parcelas_Pagas)
    {
        $this->QTD_Parcelas_Pagas = $QTD_Parcelas_Pagas;
    }
    public function getQTD_Parcelas_Pagas()
    {
        return $this->QTD_Parcelas_Pagas;
    }
}
