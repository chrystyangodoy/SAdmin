<?php

require './model/mBsc_Banco.php';

class aBsc_Banco extends mBsc_Banco {

    protected $sqlInsert = "INSERT INTO bsc_banco(ID, Agencia, Conta, Cod_Banco, Convenio, Contrato, Carteira, Variacao_Carteira, numero_documento, ID_Evento) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update bsc_banco set Agencia= '%s', Conta= '%s', Cod_Banco= '%s', Convenio= '%s', Contrato= '%s', Carteira= '%s', Variacao_Carteira= '%s', numero_documento= '%s', ID_Evento= '%s' where ID= '%s'";
    protected $sqlDelete = "delete from bsc_banco where ID = '%s'";
    protected $sqlSelect = "select * from bsc_banco where 1=1 %s %s";

    public function insert()
    {
        $sql = sprintf($this->sqlInsert, $this->getID(), $this->getAgencia(), $this->getConta(), $this->getCod_Banco(), $this->getConvenio(), $this->getContrato(), $this->getCarteira(), $this->getVariacao_Carteira(), $this->getnumero_documento(), $this->getID_Evento());
        return $this->RunQuery($sql);
    }

    public function update()
    {
        $sql = sprintf($this->sqlUpdate, $this->getAgencia(), $this->getConta(), $this->getCod_Banco(), $this->getConvenio(), $this->getContrato(), $this->getCarteira(), $this->getVariacao_Carteira(), $this->getnumero_documento(), $this->getID_Evento(), $this->getID());
        return $this->RunQuery($sql);
    }

    public function delete()
    {
        $sql = sprintf($this->sqlDelete, $this->getID());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load()
    {
        $rs = $this->select(sprintf("and ID='%s'", $this->getID()));
        $this->setID($rs[0]['ID']);
        $this->setAgencia($rs[0]['Agencia']);
        $this->setConta($rs[0]['Conta']);
        $this->setCod_Banco($rs[0]['Cod_Banco']);
        $this->setConvenio($rs[0]['Convenio']);
        $this->setContrato($rs[0]['Contrato']);
        $this->setCarteira($rs[0]['Carteira']);
        $this->setVariacao_Carteira($rs[0]['Variacao_Carteira']);
        $this->setnumero_documento($rs[0]['numero_documento']);
        $this->setID_Evento($rs[0]['ID_Evento']);
        return $this;
    }

}