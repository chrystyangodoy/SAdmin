<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of atb_Tipo_Estado
 *
 * @author Chrystyan Godoy <F1r3Black0ut>
 */
require './model/mtb_Tipo_Estado.php';

class atb_Tipo_Estado extends mtb_Tipo_Estado {

    protected $sqlInsert = "INSERT INTO tb_tipo_estado(COD_TIPOEstado, DSC_Nome, DSC_Descricao) VALUES ('%s','%s','%s')";
    protected $sqlUpdate = "update tb_tipo_estado set DSC_Nome= '%s', DSC_Descricao= '%s' where COD_TIPOEstado = '%s'";
    protected $sqlDelete = "delete from tb_tipo_estado where COD_TIPOEstado = '%s'";
    protected $sqlSelect = "select * from tb_tipo_estado where 1=1 %s %s";

    public function insert()
    {
        $sql = sprintf($this->sqlInsert, $this->getCOD_TIPOEstado(), $this->getDSC_Nome(), $this->getDSC_Descricao());
        return $this->RunQuery($sql);
    }

    public function update()
    {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome(), $this->getDSC_Descricao(),$this->getCOD_TIPOEstado());
        return $this->RunQuery($sql);
    }

    public function delete()
    {
        $sql = sprintf($this->sqlDelete, $this->getCOD_TIPOEstado());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }
    
    public function load() {
        $rs = $this->select(sprintf("and COD_TIPOEstado='%s'", $this->getCOD_TIPOEstado()));
        $this->setCOD_TIPOEstado($rs[0]['COD_TIPOEstado']);
        $this->setDSC_Nome($rs[0]['DSC_Nome']);
        $this->setDSC_Descricao($rs[0]['DSC_Descricao']);
        return $this;
    }
}
