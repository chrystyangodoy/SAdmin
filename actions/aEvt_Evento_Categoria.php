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

    protected $sqlInsert = "INSERT INTO evt_evento_categoria(ID_Evento_Categoria, DSC_Nome, VLR_Inscricao, DT_Inicio_Valor, DT_Fim_Valor, ID_EVT_Evento) VALUES ('%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_evento_categoria set DSC_Nome='%s', VLR_Inscricao='%s', DT_Inicio_Valor='%s', DT_Fim_Valor='%s', ID_EVT_Evento='%s' where ID_Evento_Categoria='%s'";
    protected $sqlDelete = "delete from evt_evento_categoria where ID_Evento_Categoria = '%s'";
    protected $sqlSelect = "select * from evt_evento_categoria where 1=1 %s %s";
    protected $sqlSelecInner = "SELECT  evt_evento_categoria.ID_Evento_Categoria,
                                        evt_evento_categoria.DSC_Nome,
                                        evt_evento_categoria.VLR_Inscricao,
                                        DATE_FORMAT( evt_evento_categoria.DT_Inicio_Valor , '%d/%m/%Y' ) as DT_Inicio,
                                        DATE_FORMAT( evt_evento_categoria.DT_Fim_Valor , '%d/%m/%Y' ) as DT_Fim_Valor,
                                        evt_evento.DSC_Nome as evento 
                                FROM    evt_evento_categoria inner join evt_evento on evt_evento_categoria.ID_EVT_Evento = evt_evento.ID_EVT 
                                where   1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getID_Evento_Categoria(), $this->getDSC_Nome(), $this->getVLR_Inscricao(), $this->getDT_Inicio_Valor(true), $this->getDT_Fim_Valor(true), $this->getID_EVT_Evento());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome(), $this->getVLR_Inscricao(), $this->getDT_Inicio_Valor(true), $this->getDT_Fim_Valor(true), $this->getID_EVT_Evento(), $this->getID_Evento_Categoria());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_Evento_Categoria());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function selectCategoriasDoEvento($ID_EVT_Evento) {
        $rs = $this->select(sprintf(" and ID_EVT_Evento = '%s'  and now() > DT_Inicio_Valor and now() < DT_Fim_Valor", $ID_EVT_Evento));
        return $rs;
    }

    public function load() {
        $rs = $this->select(sprintf("and ID_Evento_Categoria='%s'", $this->getID_Evento_Categoria()));
        $this->setDSC_Nome($rs[0]['DSC_Nome']);
        $this->setVLR_Inscricao($rs[0]['VLR_Inscricao']);
        $this->setDT_Inicio_Valor($rs[0]['DT_Inicio_Valor']);
        $this->setDT_Fim_Valor($rs[0]['DT_Fim_Valor']);
        $this->setID_EVT_Evento($rs[0]['ID_EVT_Evento']);
        return $this;
    }

    public function selectInner($where = '', $order = '') {
        
        
        $sql = "SELECT  evt_evento_categoria.ID_Evento_Categoria,
                                        evt_evento_categoria.DSC_Nome,
                                        evt_evento_categoria.VLR_Inscricao,
                                        DATE_FORMAT( evt_evento_categoria.DT_Inicio_Valor , '%d/%m/%Y' ) as DT_Inicio,
                                        DATE_FORMAT( evt_evento_categoria.DT_Fim_Valor , '%d/%m/%Y' ) as DT_Fim_Valor,
                                        evt_evento.DSC_Nome as evento 
                                FROM    evt_evento_categoria inner join evt_evento on evt_evento_categoria.ID_EVT_Evento = evt_evento.ID_EVT ";
        
        return $this->RunSelect($sql);
    }

}
