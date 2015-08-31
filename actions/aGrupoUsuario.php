<?php

require '../model/mGrupoUsuario.php';

class aGrupoUsuario extends mGrupoUsuario{
    protected $sqlInsert = "INSERT INTO seg_grupo(ID_Grupo, DSC_Nome, DSC_Descricao) VALUES ('%s','%s','%s')";
    protected $sqlUpdate = "update seg_grupo set ID_Grupo = '%s',DSC_Nome= '%s',DSC_Descricao= '%s' where ID_Grupo = '%s'";
    protected $sqlDelete = "delete from seg_grupo where ID_Grupo = '%s'";
    protected $sqlSelect = "select * from seg_grupo where 1=1 %s %s"; 
    
    public function insert(){
        $sql = sprintf($this->sqlInsert,$this->getID_Grupo() ,$this->getDSC_Nome(), $this->getDSC_Descricao());
        return $this->RunQuery($sql);
    }
    
    public function update(){
        $sql = sprintf($this->sqlUpdate,$this->getID_Grupo() ,$this->getDSC_Nome(), $this->getDSC_Descricao());
        return $this->RunQuery($sql);
    }
    
    public function delete(){
        $sql = sprintf($this->sqlDelete, $this->getID_Grupo());
        return $this->RunQuery($sql);
    }
    
    public function select($where='',$order=''){
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }
    
    public function load(){
        $rs = $this->select(sprintf("and ID_Grupo='%s'",  $this->getID_Grupo()));
        $this->setUser_ID($rs[0]['ID_Grupo']);
        $this->setUser_ID($rs[0]['DSC_Nome']);
        $this->setUser_ID($rs[0]['DSC_Descricao']);
        return $this;
    }
}
