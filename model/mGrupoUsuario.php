<?php
require './db/dbConnection.php';

class mGrupoUsuario extends dbConnection {
    private $ID_Grupo;
    private $DSC_Nome;
    private $DSC_Descricao;

    public function setID_Grupo($ID_Grupo){
        $this->ID_Grupo = $ID_Grupo;
    }
    
    public function getID_Grupo() {
        $this->ID_Grupo;
    }
    
    public function setDSC_Nome($DSC_Nome){
        $this->ID_Grupo = $DSC_Nome;
    }
    
    public function getDSC_Nome() {
        $this->DSC_Nome;
    }
    
    public function setDSC_Descricao($DSC_Descricao) {
        $this->DSC_Descricao = $DSC_Descricao;
    }

    public function getDSC_Descricao() {
        return $this->DSC_Descricao;
    }

}
