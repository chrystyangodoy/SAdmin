<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mtb_Tipo_Estado
 *
 * @author Chrystyan Godoy <F1r3Black0ut>
 */
require_once './db/dbConnection.php';

class mtb_Tipo_Estado extends dbConnection {
    
    private $COD_TIPOEstado;
    private $DSC_Nome;
    private $DSC_Descricao;
    
    
    public function setCOD_TIPOEstado($COD_TIPOEstado) {
        $this->COD_TIPOEstado = $COD_TIPOEstado;
    }

    public function getCOD_TIPOEstado() {
        return $this->COD_TIPOEstado;
    }
    public function setDSC_Nome($DSC_Nome) {
        $this->DSC_Nome = $DSC_Nome;
    }

    public function getDSC_Nome() {
        return $this->DSC_Nome;
    }
    public function setDSC_Descricao($DSC_Descricao) {
        $this->DSC_Descricao = $DSC_Descricao;
    }

    public function getDSC_Descricao() {
        return $this->DSC_Descricao;
    }
    
}
