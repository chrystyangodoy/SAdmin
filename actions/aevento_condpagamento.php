<?php

require './model/mevento_condpagamento.php';

class aevento_condpagamento extends mevento_condpagamento {

    protected $sqlInsert = "INSERT INTO evento_condpagamento(Cod_TipoPagamento, ID_EVT) VALUES ('%s','%s')";
    protected $sqlUpdate = "update evento_condpagamento set Cod_TipoPagamento= '%s', ID_EVT= '%s' where CodEvtPag = '%s'";
    protected $sqlDelete = "delete from evento_condpagamento where CodEvtPag = '%s'";
    protected $sqlSelect = "select * from evento_condpagamento where 1=1 %s %s";

    public function insert()
    {
        $sql = sprintf($this->sqlInsert, $this->getCod_TipoPagamento(), $this->getID_EVT());
        return $this->RunQuery($sql);
    }

    public function update()
    {
        $sql = sprintf($this->sqlUpdate, $this->getCod_TipoPagamento(), $this->getID_EVT(), $this->getCodEvtPag());
        return $this->RunQuery($sql);
    }

    public function delete()
    {
        $sql = sprintf($this->sqlDelete, $this->getCodEvtPag());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load()
    {
        $rs = $this->select(sprintf(" and getCodEvtPag='%s'", $this->getCodEvtPag()));
        $this->setCodEvtPag($rs[0]['CodEvtPag']);
        $this->setCod_TipoPagamento($rs[0]['Cod_TipoPagamento']);
        $this->setID_EVT($rs[0]['ID_EVT']);
        return $this;
    }

}
