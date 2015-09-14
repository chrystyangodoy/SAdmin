<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aEvt_Evento_Categoria
 *
 * @author Chrystyan Godoy <F1r3Black0ut>
 */
require './model/mEvt_Evento_Categoria.php';

class aEvt_Evento_Categoria extends mEvt_Evento_Categoria {

    protected $sqlInsert = "INSERT INTO evt_evento_categoria(DSC_Nome, VLR_Inscricao, DT_Inicio_Valor, DT_Fim_Valor, ID_EVT_Evento) VALUES ('%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_evento_categoria set DSC_Nome='%s', VLR_Inscricao='%s', DT_Inicio_Valor='%s', DT_Fim_Valor='%s', ID_EVT_Evento='%' where ID_Evento_Categoria='%s'";
    protected $sqlDelete = "delete from evt_evento_categoria where ID_Evento_Categoria = '%s'";
    protected $sqlSelect = "select * from evt_evento_categoria where 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->DSC_Nome(), $this->VLR_Inscricao(), $this->DT_Inicio_Valor(), $this->DT_Fim_Valor(), $this->ID_EVT_Evento());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->DSC_Nome(), $this->VLR_Inscricao(), $this->DT_Inicio_Valor(), $this->DT_Fim_Valor(), $this->ID_EVT_Evento());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->ID_Evento_Categoria());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf("and ID_Empresa='%s'", $this->ID_Evento_Categoria()));
        $this->getID_Empresa($rs[0]['ID_Evento_Categoria']);
        $this->getID_Empresa($rs[0]['DSC_Nome']);
        $this->getID_Empresa($rs[0]['VLR_Inscricao']);
        $this->getID_Empresa($rs[0]['DT_Inicio_Valor']);
        $this->getID_Empresa($rs[0]['DT_Fim_Valor']);
        $this->getID_Empresa($rs[0]['ID_EVT_Evento']);
        return $this;
    }

}