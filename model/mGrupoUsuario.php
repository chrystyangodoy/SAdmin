<?php
require_once './db/dbConnection.php';

class mGrupoUsuario extends dbConnection {
    private $ID_Grupo;
    private $DSC_Nome;
    private $DSC_Descricao;
    
    public function setID_Grupo($ID_Grupo) {
        $this->ID_Grupo = $ID_Grupo;
    }
    
    public function getID_Grupo() {
        return $this->ID_Grupo;
    }
    
    public function setDSC_Nome($DSC_Nome){
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
