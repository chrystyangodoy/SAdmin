<?php

require_once './db/dbConnection.php';

class mBsc_Participante extends dbConnection {

    private $ID_Participante;
    private $COD_CPF;
    private $COD_RG;
    private $Id_Estrangeiro;
    private $Nome_Cracha;
    private $DSC_Nome;
    private $DSC_Endereco;
    private $DSC_Bairro;
    private $DSC_Cidade;
    private $NUM_CEP;
    private $NUM_Fone;
    private $NUM_Celular;
    private $NUM_FAX;
    private $DSC_Profissao_Especialidade;
    private $DSC_Email;
    private $NUM_Registro;
    private $COD_Tipo_Estado;
    private $ID_BSC_Empresa;
    private $ID_BSC_Profissao;
    private $ID_Usuario;

    public function setID_Participante($ID_Participante) {
        $this->ID_Participante = $ID_Participante;
    }

    public function getID_Participante() {
        return $this->ID_Participante;
    }

    public function setCOD_CPF($COD_CPF) {
        $this->COD_CPF = $COD_CPF;
    }

    public function getCOD_CPF() {
        return $this->COD_CPF;
    }

    public function setCOD_RG($COD_RG) {
        $this->COD_RG = $COD_RG;
    }

    public function getCOD_RG() {
        return $this->COD_RG;
    }

    public function setId_Estrangeiro($Id_Estrangeiro) {
        $this->Id_Estrangeiro = $Id_Estrangeiro;
    }

    public function getId_Estrangeiro() {
        return $this->Id_Estrangeiro;
    }
    
    public function setNome_Cracha($Nome_Cracha) {
        $this->Nome_Cracha = $Nome_Cracha;
    }

    public function getNome_Cracha() {
        return $this->Nome_Cracha;
    }
    
    public function setDSC_Nome($DSC_Nome) {
        $this->DSC_Nome = $DSC_Nome;
    }

    public function getDSC_Nome() {
        return $this->DSC_Nome;
    }

    public function setDSC_Endereco($DSC_Endereco) {
        $this->DSC_Endereco = $DSC_Endereco;
    }

    public function getDSC_Endereco() {
        return $this->DSC_Endereco;
    }

    public function setDSC_Bairro($DSC_Bairro) {
        $this->DSC_Bairro = $DSC_Bairro;
    }

    public function getDSC_Bairro() {
        return $this->DSC_Bairro;
    }

    public function setDSC_Cidade($DSC_Cidade) {
        $this->DSC_Cidade = $DSC_Cidade;
    }

    public function getDSC_Cidade() {
        return $this->DSC_Cidade;
    }

    public function setNUM_CEP($NUM_CEP) {
        $this->NUM_CEP = $NUM_CEP;
    }

    public function getNUM_CEP() {
        return $this->NUM_CEP;
    }

    public function setNUM_Fone($NUM_Fone) {
        $this->NUM_Fone = $NUM_Fone;
    }

    public function getNUM_Fone() {
        return $this->NUM_Fone;
    }

    public function setNUM_Celular($NUM_Celular) {
        $this->NUM_Celular = $NUM_Celular;
    }

    public function getNUM_Celular() {
        return $this->NUM_Celular;
    }

    public function setNUM_FAX($NUM_FAX) {
        $this->NUM_FAX = $NUM_FAX;
    }

    public function getNUM_FAX() {
        return $this->NUM_FAX;
    }

    public function setDSC_Profissao_Especialidade($DSC_Profissao_Especialidade) {
        $this->DSC_Profissao_Especialidade = $DSC_Profissao_Especialidade;
    }

    public function getDSC_Profissao_Especialidade() {
        return $this->DSC_Profissao_Especialidade;
    }

    public function setDSC_Email($DSC_Email) {
        $this->DSC_Email = $DSC_Email;
    }

    public function getDSC_Email() {
        return $this->DSC_Email;
    }

    public function setNUM_Registro($NUM_Registro) {
        $this->NUM_Registro = $NUM_Registro;
    }

    public function getNUM_Registro() {
        return $this->NUM_Registro;
    }

    public function setCOD_Tipo_Estado($COD_Tipo_Estado) {
        $this->COD_Tipo_Estado = $COD_Tipo_Estado;
    }

    public function getCOD_Tipo_Estado() {
        return $this->COD_Tipo_Estado;
    }

    public function setID_BSC_Empresa($ID_BSC_Empresa) {
        $this->ID_BSC_Empresa = $ID_BSC_Empresa;
    }

    public function getID_BSC_Empresa() {
        return $this->ID_BSC_Empresa;
    }

    public function setID_BSC_Profissao($ID_BSC_Profissao) {
        $this->ID_BSC_Profissao = $ID_BSC_Profissao;
    }

    public function getID_BSC_Profissao() {
        return $this->ID_BSC_Profissao;
    }

    public function setID_Usuario($ID_Usuario) {
        $this->ID_Usuario = $ID_Usuario;
    }

    public function getID_Usuario() {
        return $this->ID_Usuario;
    }

}
