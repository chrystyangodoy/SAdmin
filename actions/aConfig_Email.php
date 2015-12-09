<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aEvt_Evento_Grupo
 *
 * @author Chrystyan Godoy <F1r3Black0ut>
 */
require './model/mConfig_Email.php';

class aConfig_Email extends mConfig_Email {

    protected $sqlInsert = "INSERT INTO Config_Email(ID_Email, smtp, port, remetente, assunto, mensagem, userName, Password, isAtivo) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update Config_Email set smtp = '%s', port = '%s', remetente = '%s', assunto = '%s', mensagem = '%s', userName = '%s', Password = '%s', isAtivo='%s' WHERE ID_Email = '%s'";
    protected $sqlDelete = "delete from Config_Email where ID_Email = '%s'";
    protected $sqlSelect = "select * from Config_Email";
    protected $sqlSelectAtivo = "select * from Config_Email  where 1=1  and isAtivo=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getID_Email(),$this->getsmtp(),$this->getport(),$this->getremetente(),$this->getassunto(),$this->getmensagem(),$this->getuserName(),$this->getPassword(),$this->getisAtivo());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getsmtp(),$this->getport(),$this->getremetente(),$this->getassunto(),$this->getmensagem(),$this->getuserName(),$this->getPassword(),$this->getisAtivo(),$this->getID_Email());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_Email());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }
    
    public function selectAtivo() {
        $sql = sprintf($this->sqlSelectAtivo);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf("and ID_Email='%s'", $this->getID_Email()));
        $this->setID_Email($rs[0]['ID_Email']);
        $this->setsmtp($rs[0]['smtp']);
        $this->setport($rs[0]['Port']);
        $this->setremetente($rs[0]['remetente']);
        $this->setassunto($rs[0]['assunto']);
        $this->setmensagem($rs[0]['mensagem']);
        $this->setuserName($rs[0]['userName']);
        $this->setPassword($rs[0]['Password']);
        $this->setisAtivo($rs[0]['isAtivo']);
        return $this;
    }
    public function loadAtivo() {
        $rs = $this->selectAtivo();
        $this->setID_Email($rs[0]['ID_Email']);
        $this->setsmtp($rs[0]['smtp']);
        $this->setport($rs[0]['Port']);
        $this->setremetente($rs[0]['remetente']);
        $this->setassunto($rs[0]['assunto']);
        $this->setmensagem($rs[0]['mensagem']);
        $this->setuserName($rs[0]['userName']);
        $this->setPassword($rs[0]['Password']);
        $this->setisAtivo($rs[0]['isAtivo']);
        return $this;
    }
}
