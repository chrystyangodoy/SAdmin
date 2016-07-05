<?php

require './model/mTb_Tipo_Forma_Pagamento.php';

class aTb_Tipo_Forma_Pagamento extends mTb_Tipo_Forma_Pagamento {

    protected $sqlInsert = "INSERT INTO tb_tipo_forma_pagamento ( COD_Tipo_Forma_Pagamento, DSC_Nome, DSC_Descricao,Nro_Parcelas,Dias_Vencimento)  VALUES ('%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "UPDATE tb_tipo_forma_pagamento SET DSC_Nome='%s',DSC_Descricao = '%s',Nro_Parcelas = '%s',Dias_Vencimento = '%s' WHERE COD_Tipo_Forma_Pagamento = '%s'";
    protected $sqlDelete = "DELETE FROM tb_tipo_forma_pagamento WHERE COD_Tipo_Forma_Pagamento = '%s'";
    protected $sqlSelect = "select * from tb_tipo_forma_pagamento where 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getCOD_Tipo_Forma_Pagamento(),$this->getDSC_Nome(), $this->getDSC_Descricao(),$this->getNro_Parcelas(),$this->getDias_Vencimento());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome(), $this->getDSC_Descricao(),$this->getNro_Parcelas(),$this->getDias_Vencimento(),$this->getCOD_Tipo_Forma_Pagamento());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getCOD_Tipo_Forma_Pagamento());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf(" and COD_Tipo_Forma_Pagamento='%s'", $this->getCOD_Tipo_Forma_Pagamento()));
        $this->setCOD_Tipo_Forma_Pagamento($rs[0]['COD_Tipo_Forma_Pagamento']);
        $this->setDSC_Nome($rs[0]['DSC_Nome']);
        $this->setDSC_Descricao($rs[0]['DSC_Descricao']);
        $this->setNro_Parcelas($rs[0]['Nro_Parcelas']);
        $this->setDias_Vencimento($rs[0]['Dias_Vencimento']);
        return $this;
    }

}
