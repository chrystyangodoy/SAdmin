<?php

require_once './db/dbConnection.php';

class mTbTipoParticipacao extends dbConnection {

    private $COD_Tipo_Participacao;
    private $DSC_Nome;
    private $DSC_Descricao;

    public function getCOD_Tipo_Participacao() {
        return $this->COD_Tipo_Participacao;
    }

    public function setCOD_Tipo_Participacao($COD_Tipo_Participacao) {
        $this->COD_Tipo_Participacao = $COD_Tipo_Participacao;
    }

    public function getDSC_Nome(){
        return $this->DSC_Nome;
    }
    
    public function setDSC_Nome($DSC_Nome){
        $this->DSC_Nome = $DSC_Nome;
    }
    
    public function getDSC_Descricao(){
        return $this->DSC_Descricao;
    }
        
    public function setDSC_Descricao($DSC_Descricao){
        $this->DSC_Descricao = $DSC_Descricao;
    }
}
