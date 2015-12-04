<?php

require_once './db/dbConnection.php';

class mBsc_Banco extends dbConnection {

    private $ID;
    private $Dsc_Banco;
    private $Agencia;
    private $Conta;
    private $Cod_Banco;
    private $Convenio;
    private $Contrato;
    private $Carteira;
    private $Variacao_Carteira;
    private $numero_documento;
    private $COD_CNPJ_Promotora;

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function getID()
    {
        return $this->ID;
    }
    
    public function setDsc_Banco($Dsc_Banco)
    {
        $this->Dsc_Banco = $Dsc_Banco;
    }

    public function getDsc_Banco()
    {
        return $this->Dsc_Banco;
    }

    public function setAgencia($Agencia)
    {
        $this->Agencia = $Agencia;
    }

    public function getAgencia()
    {
        return $this->Agencia;
    }

    public function setConta($Conta)
    {
        $this->Conta = $Conta;
    }

    public function getConta()
    {
        return $this->Conta;
    }

    public function setCod_Banco($Cod_Banco)
    {
        $this->Cod_Banco = $Cod_Banco;
    }

    public function getCod_Banco()
    {
        return $this->Cod_Banco;
    }

    public function setConvenio($Convenio)
    {
        $this->Convenio = $Convenio;
    }

    public function getConvenio()
    {
        return $this->Convenio;
    }

    public function setContrato($Contrato)
    {
        $this->Contrato = $Contrato;
    }

    public function getContrato()
    {
        return $this->Contrato;
    }
    
    public function setCarteira($Carteira)
    {
        $this->Carteira = $Carteira;
    }

    public function getCarteira()
    {
        return $this->Carteira;
    }

    public function setVariacao_Carteira($Variacao_Carteira)
    {
        $this->Variacao_Carteira = $Variacao_Carteira;
    }

    public function getVariacao_Carteira()
    {
        return $this->Variacao_Carteira;
    }
    
    public function setnumero_documento($numero_documento)
    {
        $this->numero_documento = $numero_documento;
    }

    public function getnumero_documento()
    {
        return $this->numero_documento;
    }
    public function setCOD_CNPJ_Promotora($COD_CNPJ_Promotora)
    {
        $this->COD_CNPJ_Promotora = $COD_CNPJ_Promotora;
    }

    public function getCOD_CNPJ_Promotora()
    {
        return $this->COD_CNPJ_Promotora;
    }
}
