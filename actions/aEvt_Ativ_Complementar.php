<?php

require './model/mEvt_Ativ_Complementar.php';

class aEvt_Ativ_Complementar extends mEvt_Ativ_Complementar {

    protected $sqlInsert = "INSERT INTO Evt_Ativ_Complementar(DSC_Nome, DSC_Ministrantes, QTD_CargaHoraria, DT_Realizacao, VLR_Inscricao,QTD_Vagas,COD_Tipo_Abordagem_Ativ_Comp,ID_BSC_Local_Evento,ID_EVT_Evento) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "UPDATE Evt_Ativ_Complementar set DSC_Nome = '%s', DSC_Ministrantes= '%s', QTD_CargaHoraria= '%s',DT_Realizacao= '%s', VLR_Inscricao='%s', QTD_Vagas='%s',COD_Tipo_Abordagem_Ativ_Comp='%s',ID_BSC_Local_Evento='%s',ID_EVT_Evento='%s' where COD_ATIV_Complementar = '%s'";
    protected $sqlDelete = "DELETE FROM Evt_Ativ_Complementar WHERE COD_ATIV_Complementar = '%s'";
    protected $sqlSelect = "SELECT *  FROM Evt_Ativ_Complementar WHERE 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getDSC_Nome(), $this->getDSC_Ministrantes(), $this->getQTD_CargaHoraria(), $this->getDT_Realizacao(true), $this->getVLR_Inscricao(), $this->getQTD_Vagas(), $this->getCOD_Tipo_Abordagem_Ativ_Comp(), $this->getID_BSC_Local_Evento(), $this->getID_EVT_Evento());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome(), $this->getDSC_Ministrantes(), $this->getQTD_CargaHoraria(), $this->getDT_Realizacao(true), $this->getVLR_Inscricao(), $this->getQTD_Vagas(), $this->getCOD_Tipo_Abordagem_Ativ_Comp(), $this->getID_BSC_Local_Evento(), $this->getID_EVT_Evento(), $this->getCOD_ATIV_Complementar());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_Usuario());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf("and COD_ATIV_Complementar='%s'", $this->getCOD_ATIV_Complementar()));
        $this->setCOD_ATIV_Complementar($rs[0]['COD_ATIV_Complementar']);
        $this->setDSC_Nome($rs[0]['DSC_Nome']);
        $this->setDSC_Ministrantes($rs[0]['DSC_Ministrantes']);
        $this->setQTD_CargaHoraria($rs[0]['QTD_CargaHoraria']);
        $this->setDT_Realizacao($rs[0]['DT_Realizacao']);
        $this->setVLR_Inscricao($rs[0]['VLR_Inscricao']);
        $this->setQTD_Vagas($rs[0]['QTD_Vagas']);
        $this->setCOD_Tipo_Abordagem_Ativ_Comp($rs[0]['COD_Tipo_Abordagem_Ativ_Comp']);
        $this->setID_BSC_Local_Evento($rs[0]['ID_BSC_Local_Evento']);
        $this->setID_EVT_Evento($rs[0]['ID_EVT_Evento']);
        return $this;
    }
}
