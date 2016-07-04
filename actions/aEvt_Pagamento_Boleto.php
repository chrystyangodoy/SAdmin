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
require './model/mEvt_Pagamento_Boleto.php';

class aEvt_Pagamento_Boleto extends mEvt_Pagamento_Boleto {

    protected $sqlInsert = "INSERT INTO evt_Pagamento_Boleto(ID_Pagamento_Boleto, NUM_Boleto, COD_Barras_Boleto, ID_EVT_Pagamento) VALUES ('%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_Pagamento_Boleto set NUM_Boleto = '%s', COD_Barras_Boleto = '%s', ID_EVT_Pagamento = '%s' WHERE ID_Pagamento_Boleto = '%s'";
    protected $sqlDelete = "delete from evt_Pagamento_Boleto where ID_Pagamento_Boleto = '%s'";
    protected $sqlSelect = "select * from evt_Pagamento_Boleto where 1=1 %s %s";
    protected $sqlSelectInner = "SELECT evt_evento_participante.ID_EVT_Evento,evt_evento_categoria.VLR_Inscricao FROM `evt_evento_participante` INNER JOIN bsc_participante ON evt_evento_participante.ID_BSC_Participante = bsc_participante.ID_Participante INNER JOIN evt_evento_categoria ON evt_evento_participante.ID_EVT_Categoria = evt_evento_categoria.ID_Evento_Categoria WHERE evt_evento_participante.ID_EVT_Evento = '%s' AND bsc_participante.COD_CPF = '%s'";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getID_Pagamento_Boleto(), $this->getNUM_Boleto(), $this->getCOD_Barras_Boleto(), $this->getID_EVT_Pagamento());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getNUM_Boleto(), $this->getCOD_Barras_Boleto(), $this->getID_EVT_Pagamento(), $this->setID_Pagamento_Boleto());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_Pagamento_Boleto());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf("and ID_Pagamento_Boleto='%s'", $this->getID_Pagamento_Boleto()));
        $this->setID_Pagamento_Boleto($rs[0]['ID_Pagamento_Boleto']);
        $this->setNUM_Boleto($rs[0]['NUM_Boleto']);
        $this->setCOD_Barras_Boleto($rs[0]['COD_Barras_Boleto']);
        $this->setID_EVT_Pagamento($rs[0]['ID_EVT_Pagamento']);
        return $this;
    }

    public function geraParcelasPagto($id_Pagamento, $Nro_Documento) {
        require_once ('./config/configs.php');
        $config = new configs();
        $idNovo = $config->idUnico();
        
        $this->setID_Pagamento_Boleto($idNovo);
        $this->setID_EVT_Pagamento($id_Pagamento);
        $this->setNUM_Boleto($Nro_Documento);
        //Verificar onde implementar o Codigo de barras.
        $this->setCOD_Barras_Boleto(0);
        $this->insert();
    }

}
