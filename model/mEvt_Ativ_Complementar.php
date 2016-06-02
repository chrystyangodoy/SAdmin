<?php

require_once './db/dbConnection.php';

class mEvt_Ativ_Complementar extends dbConnection {

    private $DSC_Nome;
    private $DSC_Ministrantes;
    private $QTD_CargaHoraria;
    private $DT_Realizacao;
    private $VLR_Inscricao;
    private $QTD_Vagas;
    private $Cod_Tipo_Abordagem_Ativ_Comp;
    private $ID_BSC_Local_Evento;
    private $ID_Evt_Evento;

    public function setDSC_Nome($DSC_Nome) {
        $this->DSC_Nome = $DSC_Nome;
    }

    public function getDSC_Nome() {
        return $this->DSC_Nome;
    }

    public function setDSC_Ministrantes($DSC_Ministrantes) {
        $this->DSC_Ministrantes = $DSC_Ministrantes;
    }

    public function getDSC_Ministrantes() {
        return $this->DSC_Ministrantes;
    }

    public function setQTD_CargaHoraria($QTD_CargaHoraria) {
        $this->QTD_CargaHoraria = $QTD_CargaHoraria;
    }

    public function getQTD_CargaHoraria() {
        return $this->QTD_CargaHoraria;
    }

    public function setDT_Realizacao($DT_Realizacao) {
        //$this->DTM_Inicio = $DTM_Inicio; 
        $this->DT_Realizacao = $this->dateToUS($DT_Realizacao);
    }

    public function getDT_Realizacao($us = false) {
        if ($us) {
            return $this->DT_Realizacao;
            //return $this->dateToUS($DTM_Inicio);
        } else {
            return $this->dateToBR($this->DT_Realizacao);
        }
    }

    public function setVLR_Inscricao($VLR_Inscricao) {
        $this->VLR_Inscricao = $VLR_Inscricao; 
    }

    public function getVLR_Inscricao() {
        return $this->VLR_Inscricao;
    }

    public function setQTD_Vagas($QTD_Vagas) {
        $this->QTD_Vagas = $QTD_Vagas;
    }

    public function getQTD_Vagas() {
        return $this->QTD_Vagas;
    }
    
    public function setCod_Tipo_Abordagem_Ativ_Comp($Cod_Tipo_Abordagem_Ativ_Comp) {
        $this->Cod_Tipo_Abordagem_Ativ_Comp = $Cod_Tipo_Abordagem_Ativ_Comp;
    }

    public function getCod_Tipo_Abordagem_Ativ_Comp() {
        return $this->Cod_Tipo_Abordagem_Ativ_Comp;
    }
    
    public function setID_BSC_Local_Evento($ID_BSC_Local_Evento) {
        $this->ID_BSC_Local_Evento = $ID_BSC_Local_Evento;
    }

    public function getID_BSC_Local_Evento() {
        return $this->ID_BSC_Local_Evento;
    }
    
    public function setID_Evt_Evento($ID_Evt_Evento) {
        $this->ID_Evt_Evento = $ID_Evt_Evento;
    }

    public function getID_Evt_Evento() {
        return $this->ID_Evt_Evento;
    }

}
