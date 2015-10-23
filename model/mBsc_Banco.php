<?php

require_once './db/dbConnection.php';

class mBsc_Banco extends dbConnection {

    private $ID;
    private $Agencia;
    private $Conta;
    private $Cod_Banco;
    private $Convenio;
    private $Contrato;
    private $Carteira;
    private $Variacao_Carteira;
    private $numero_documento;
    private $ID_Evento;

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function getID()
    {
        return $this->ID;
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
        $this->DSC_Bairro = $Convenio;
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
    
    public function setID_Evento($ID_Evento)
    {
        $this->ID_Evento = $ID_Evento;
    }

    public function getID_Evento()
    {
        return $this->ID_Evento;
    }
}
