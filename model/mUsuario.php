<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../db/dbConnection.php';

class mUsuario extends dbConnection {

    private $user_ID;
    private $Login;
    private $Senha;
    private $DTInicio;
    private $DTFim;
    private $Grupo;

    public function setUser_ID($user_ID) {
        $this->user_ID = $user_ID;
    }

    public function getUser_ID() {
        $this->user_ID;
    }

    public function setLogin($Login) {
        $this->login = $Login;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setSenha($Senha) {
        $this->senha = $Senha;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setDataIni($DTInicio) {
        $this->data_inicio = $this->dateToUS($DTInicio);
    }

    public function getDataIni($us = false) {
        if ($us) {
            return $this->data_inicio;
        } else {
            return $this->dateToBR(data_inicio);
        }
    }

    public function setDatafim($DTFim) {
        $this->data_fim = $this->dateToUS($DTFim);
    }

    public function getDatafim($us = false) {
        if ($us) {
            return $this->data_fim;
        } else {
            return $this->dateToBR(data_fim);
        }
    }

    public function setGrupo($Grupo) {
        $this->grupo = $Grupo;
    }

    public function getGrupo() {
        return $this->grupo;
    }

}
