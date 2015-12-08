<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mEvt_Evento_Categoria
 *
 * @author Chrystyan Godoy <F1r3Black0ut>
 */
require_once './db/dbConnection.php';

class mEvt_Evento_Categoria extends dbConnection {
    private $ID_Evento_Categoria;
    private $DSC_Nome;
    private $VLR_Inscricao;
    private $DT_Inicio_Valor;
    private $DT_Fim_Valor;
    private $ID_EVT_Evento;
    
    public function setID_Evento_Categoria($ID_Evento_Categoria) {
        $this->ID_Evento_Categoria = $ID_Evento_Categoria;
    }

    public function getID_Evento_Categoria() {
        return $this->ID_Evento_Categoria;
    }
    
    public function setDSC_Nome($DSC_Nome) {
        $this->DSC_Nome = $DSC_Nome;
    }

    public function getDSC_Nome() {
        return $this->DSC_Nome;
    }
    
    public function setVLR_Inscricao($VLR_Inscricao) {
        $this->VLR_Inscricao = $VLR_Inscricao;
    }

    public function getVLR_Inscricao() {
        return $this->VLR_Inscricao;
    }
    
    public function setDT_Inicio_Valor($DT_Inicio_Valor) {
        $this->DT_Inicio_Valor = $this->dateToUS($DT_Inicio_Valor);
    }

    public function getDT_Inicio_Valor($us = false) {
        if ($us) {
            return $this->DT_Inicio_Valor;
        } else {
            return $this->dateToBR($this->DT_Inicio_Valor);
        }
    }
    
    public function setDT_Fim_Valor($DT_Fim_Valor) {
        $this->DT_Fim_Valor = $this->dateToUS($DT_Fim_Valor);
    }

    public function getDT_Fim_Valor($us = false) {
        if ($us) {
            return $this->DT_Fim_Valor;
        } else {
            return $this->dateToBR($this->DT_Fim_Valor);
        }
    }
    
    public function setID_EVT_Evento($ID_EVT_Evento) {
        $this->ID_EVT_Evento = $ID_EVT_Evento;
    }

    public function getID_EVT_Evento() {
        return $this->ID_EVT_Evento;
    }
}
