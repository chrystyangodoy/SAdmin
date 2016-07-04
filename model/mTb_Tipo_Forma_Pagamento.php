<?php

require_once './db/dbConnection.php';

class mTb_Tipo_Forma_Pagamento extends dbConnection {

    private $COD_Tipo_Forma_Pagamento;
    private $DSC_Nome;
    private $DSC_Descricao;
    private $Nro_Parcelas;
    private $Dias_Vencimento;
    public function getCOD_Tipo_Forma_Pagamento() {
        return $this->COD_Tipo_Forma_Pagamento;
    }

    public function setCOD_Tipo_Forma_Pagamento($COD_Tipo_Forma_Pagamento) {
        $this->COD_Tipo_Forma_Pagamento = $COD_Tipo_Forma_Pagamento;
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
    
    public function getNro_Parcelas(){
        return $this->Nro_Parcelas;
    }
        
    public function setNro_Parcelas($Nro_Parcelas){
        $this->Nro_Parcelas = $Nro_Parcelas;
    }
    
    public function getDias_Vencimento(){
        return $this->Dias_Vencimento;
    }
        
    public function setDias_Vencimento($Dias_Vencimento){
        $this->Dias_Vencimento = $DSC_Descricao;
    }
}
