<?php
require 'db/dbConnection.php';
class mUser extends dbConnection{
    private $user_ID;
    private $login;
    private $senha;
    private $email;
    private $nome;
    
    public function setUser_ID($user_ID){
        $this->user_ID = $user_ID;
    }
    
    public function setLogin($login){
        $this->login = $login;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getUser_ID(){
        return $this->user_ID;
    }
    public function getLogin(){
        return $this->login;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getNome(){
        return $this->nome;
    }
}
