<?php

require_once './db/dbConnection.php';

class mConfig_Email extends dbConnection {

    private $ID_Email;
    private $smtp;
    private $remetente;
    private $assunto;
    private $mensagem;
    private $userName;
    private $Password;
    
    public function setID_Email($ID_Email)
    {
        $this->ID_Email = $ID_Email;
    }

    public function getID_Email()
    {
        return $this->ID_Email;
    }
    
    public function setsmtp($smtp)
    {
        $this->smtp = $smtp;
    }
    
    public function getsmtp()
    {
        return $this->smtp;
    }
    
    public function setremetente($remetente)
    {
        $this->remetente = $remetente;
    }

    public function getremetente()
    {
        return $this->remetente;
    }
    
    public function setmensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    public function getmensagem()
    {
        return $this->mensagem;
    }
    
    public function setassunto($assunto)
    {
        $this->assunto = $assunto;
    }

    public function getassunto()
    {
        return $this->assunto;
    }
    
    public function setuserName($userName)
    {
        $this->userName = $userName;
    }

    public function getuserName()
    {
        return $this->userName;
    }
    
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    public function getPassword()
    {
        return $this->Password;
    }
}
