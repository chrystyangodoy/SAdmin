<?php

require './model/mEvt_Evento.php';

class aEvt_Evento extends mEvt_Evento {

    protected $sqlInsert = "INSERT INTO evt_evento(DSC_Nome, DSC_Presidente, DT_Inicio, DT_Fim, COD_CNPJ_Promotora, DSC_Nome_Promotora, DSC_Presidente_Promotora, DSC_Endereco_Promotora, NUM_CEP_Promotora, DSC_Cidade_Promotora, NUM_Fone_Promotora, NUM_FAX_Promotora, DSC_EMAIL_Promotora, QTD_CargaHorariaMinima, ID_BSC_Local_Evento, COD_Tipo_Estado_promotora) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_evento set DSC_Nome= '%s', DSC_Presidente= '%s', DT_Inicio= '%s', DT_Fim= '%s', COD_CNPJ_Promotora= '%s', DSC_Nome_Promotora= '%s', DSC_Presidente_Promotora= '%s', DSC_Endereco_Promotora= '%s', NUM_CEP_Promotora= '%s', DSC_Cidade_Promotora= '%s', NUM_Fone_Promotora= '%s', NUM_FAX_Promotora= '%s', DSC_EMAIL_Promotora= '%s', QTD_CargaHorariaMinima= '%s', ID_BSC_Local_Evento= '%s', COD_Tipo_Estado_promotora= '%s' where ID_EVT = '%s'";
    protected $sqlDelete = "delete from evt_evento where ID_EVT = '%s'";
    protected $sqlSelect = "select * from evt_evento where 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getDSC_Nome(), $this->getDSC_Presidente(), $this->getDT_Inicio(), $this->getDT_Fim(), $this->getCOD_CNPJ_Promotora(), $this->getDSC_Nome_Promotora(), $this->getDSC_Presidente_Promotora(), $this->getDSC_Endereco_Promotora(), $this->getNUM_CEP_Promotora(), $this->getDSC_Cidade_Promotora(), $this->getNUM_Fone_Promotora(), $this->getNUM_FAX_Promotora(), $this->getDSC_EMAIL_Promotora(), $this->getQTD_CargaHorariaMinima(), $this->getID_BSC_Local_Evento(), $this->getCOD_Tipo_Estado_promotora());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome(), $this->getDSC_Presidente(), $this->getDT_Inicio(), $this->getDT_Fim(), $this->getCOD_CNPJ_Promotora(), $this->getDSC_Nome_Promotora(), $this->getDSC_Presidente_Promotora(), $this->getDSC_Endereco_Promotora(), $this->getNUM_CEP_Promotora(), $this->getDSC_Cidade_Promotora(), $this->getNUM_Fone_Promotora(), $this->getNUM_FAX_Promotora(), $this->getDSC_EMAIL_Promotora(), $this->getQTD_CargaHorariaMinima(), $this->getID_BSC_Local_Evento(), $this->getCOD_Tipo_Estado_promotora());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_EVT());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf("and ID_EVT='%s'", $this->getID_EVT()));
        $this->setID_EVT($rs[0]['ID_EVT']);
        $this->setID_EVT($rs[0]['DSC_Nome']);
        $this->setID_EVT($rs[0]['DSC_Presidente']);
        $this->setID_EVT($rs[0]['DT_Inicio']);
        $this->setID_EVT($rs[0]['DT_Fim']);
        $this->setID_EVT($rs[0]['COD_CNPJ_Promotora']);
        $this->setID_EVT($rs[0]['DSC_Nome_Promotora']);
        $this->setID_EVT($rs[0]['DSC_Presidente_Promotora']);
        $this->setID_EVT($rs[0]['DSC_Endereco_Promotora']);
        $this->setID_EVT($rs[0]['NUM_CEP_Promotora']);
        $this->setID_EVT($rs[0]['DSC_Cidade_Promotora']);
        $this->setID_EVT($rs[0]['NUM_Fone_Promotora']);
        $this->setID_EVT($rs[0]['NUM_FAX_Promotora']);
        $this->setID_EVT($rs[0]['DSC_EMAIL_Promotora']);
        $this->setID_EVT($rs[0]['QTD_CargaHorariaMinima']);
        $this->setID_EVT($rs[0]['ID_BSC_Local_Evento']);
        $this->setID_EVT($rs[0]['COD_Tipo_Estado_promotora']);
        return $this;
    }

}
