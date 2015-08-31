<?php

require 'model/mUser.php';
class aUser extends mUser{
    protected $sqlInsert = "insert into user (login,senha,email,nome) values ('%s','%s','%s','%s')";
    protected $sqlUpdate = "update user set login = '%s',senha= '%s',email= '%s',nome= '%s' where user_ID = '%s'";
    protected $sqlDelete = "delete from user where user_ID = '%s'";
    protected $sqlSelect = "select * from user where 1=1 '%s' '%s'";
    
    public function insert(){
        $sql = sprintf($this->sqlInsert, $this->getLogin(), $this->getSenha(), $this->getEmail(), $this->getNome());
        return $this->RunQuery($sql);
    }
    
    public function update(){
        $sql = sprintf($this->sqlUpdate, $this->getLogin(), $this->getSenha(), $this->getEmail(), $this->getNome(), $this->getUser_ID());
        return $this->RunQuery($sql);
    }
    
    public function delete(){
        $sql = sprintf($this->sqlDelete, $this->getUser_ID());
        return $this->RunQuery($sql);
    }
    
    public function select($where='',$order=''){
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }
    
    public function load(){
        $rs = $this->select(sprintf("and user_ID='%s'",  $this->getUser_ID()));
        $this->setUser_ID($rs[0]['user_ID']);
        $this->setUser_ID($rs[0]['login']);
        $this->setUser_ID($rs[0]['senha']);
        $this->setUser_ID($rs[0]['email']);
        $this->setUser_ID($rs[0]['nome']);
        return $this;
    }
}
