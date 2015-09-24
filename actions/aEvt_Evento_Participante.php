<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aEvt_Evento_Participante
 *
 * @author Chrystyan Godoy <F1r3Black0ut>
 */
require './model/mEvt_Evento_Participante.php';

class aEvt_Evento_Participante extends mEvt_Evento_Participante {

    protected $sqlInsert = "INSERT INTO evt_evento_participante(ID_EVT_Evento_Pariticipante, DSC_Nome_Crachav, COD_Barras_Cracha, VLR_Total, VLR_Total_Inscricao, QTD_CargaHoraria_Realizada, COD_Nivel_Participante, ID_EVT_Pagamento, ID_EVT_Categoria, ID_EVT_Evento, ID_BSC_Participante, ID_EVT_Participante_Pai, COD_Tipo_SIT_Certificado, DTM_Entrega_Certificado, ID_SEG_DetalheTransacao, SIT_EH_Parcelado, ID_EVT_EventoGrupo, COD_TipoSituacao_Material, DTM_EntregaMaterial, COD_InscricaoExterno) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_evento_participante set DSC_Nome_Crachav='%s', COD_Barras_Cracha='%s', VLR_Total='%s', VLR_Total_Inscricao='%s', QTD_CargaHoraria_Realizada='%s', COD_Nivel_Participante='%s', ID_EVT_Pagamento='%s', ID_EVT_Categoria='%s', ID_EVT_Evento='%s', ID_BSC_Participante='%s', ID_EVT_Participante_Pai='%s', COD_Tipo_SIT_Certificado='%s', DTM_Entrega_Certificado='%s', ID_SEG_DetalheTransacao='%s', SIT_EH_Parcelado='%s', ID_EVT_EventoGrupo='%s', COD_TipoSituacao_Material='%s', DTM_EntregaMaterial='%s', COD_InscricaoExterno='%s' where ID_EVT_Evento_Pariticipante='%s'";
    protected $sqlDelete = "delete from evt_evento_participante where ID_EVT = '%s'";
    protected $sqlSelect = "select * from evt_evento_participante where 1=1 %s %s";
    protected $sqlSelectExist = "SELECT count(0) AS COUNTCPF FROM evt_evento_participante WHERE 1=1 and ID_EVT='%s' and ID_BSC_Participante='%s'";

    public function insert()
    {
        $sql = sprintf($this->sqlInsert, $this->getID_EVT_Evento_Pariticipante(), $this->getDSC_Nome_Crachav(), $this->getCOD_Barras_Cracha(), $this->getVLR_Total(), $this->getVLR_Total_Inscricao(), $this->getQTD_CargaHoraria_Realizada(), $this->getCOD_Nivel_Participante(), $this->getID_EVT_Pagamento(), $this->getID_EVT_Categoria(), $this->getID_EVT_Evento(), $this->getID_BSC_Participante(), $this->getID_EVT_Participante_Pai(), $this->getCOD_Tipo_SIT_Certificado(), $this->getDTM_Entrega_Certificado(), $this->getID_SEG_DetalheTransacao(), $this->getSIT_EH_Parcelado(), $this->getID_EVT_EventoGrupo(), $this->getCOD_TipoSituacao_Material(), $this->getDTM_EntregaMaterial(), $this->getCOD_InscricaoExterno());
        return $this->RunQuery($sql);
    }

    public function update()
    {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome_Crachav(), $this->getCOD_Barras_Cracha(), $this->getVLR_Total(), $this->getVLR_Total_Inscricao(), $this->getQTD_CargaHoraria_Realizada(), $this->getCOD_Nivel_Participante(), $this->getID_EVT_Pagamento(), $this->getID_EVT_Categoria(), $this->getID_EVT_Evento(), $this->getID_BSC_Participante(), $this->getID_EVT_Participante_Pai(), $this->getCOD_Tipo_SIT_Certificado(), $this->getDTM_Entrega_Certificado(), $this->getID_SEG_DetalheTransacao(), $this->getSIT_EH_Parcelado(), $this->getID_EVT_EventoGrupo(), $this->getCOD_TipoSituacao_Material(), $this->getDTM_EntregaMaterial(), $this->getCOD_InscricaoExterno());
        return $this->RunQuery($sql);
    }

    public function delete()
    {
        $sql = sprintf($this->sqlDelete, $this->getID_EVT_Evento_Pariticipante());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load()
    {
        $rs = $this->select(sprintf("and ID_EVT_Evento_Pariticipante='%s'", $this->getID_EVT_Evento_Pariticipante()));
        $this->setID_EVT($rs[0]['ID_EVT_Evento_Pariticipante']);
        $this->setDSC_Nome_Crachav($rs[0]['DSC_Nome_Crachav']);
        $this->setCOD_Barras_Cracha($rs[0]['COD_Barras_Cracha']);
        $this->setVLR_Total($rs[0]['VLR_Total']);
        $this->setVLR_Total_Inscricao($rs[0]['VLR_Total_Inscricao']);
        $this->setQTD_CargaHoraria_Realizada($rs[0]['QTD_CargaHoraria_Realizada']);
        $this->setCOD_Nivel_Participante($rs[0]['COD_Nivel_Participante']);
        $this->setID_EVT_Pagamento($rs[0]['ID_EVT_Pagamento']);
        $this->setID_EVT_Categoria($rs[0]['ID_EVT_Categoria']);
        $this->setID_EVT_Evento($rs[0]['ID_EVT_Evento']);
        $this->setID_BSC_Participante($rs[0]['ID_BSC_Participante']);
        $this->setID_EVT_Participante_Pai($rs[0]['ID_EVT_Participante_Pai']);
        $this->setCOD_Tipo_SIT_Certificado($rs[0]['COD_Tipo_SIT_Certificado']);
        $this->setDTM_Entrega_Certificado($rs[0]['DTM_Entrega_Certificado']);
        $this->setID_SEG_DetalheTransacao($rs[0]['ID_SEG_DetalheTransacao']);
        $this->setSIT_EH_Parcelado($rs[0]['SIT_EH_Parcelado']);
        $this->setID_EVT_EventoGrupo($rs[0]['ID_EVT_EventoGrupo']);
        $this->setCOD_TipoSituacao_Material($rs[0]['COD_TipoSituacao_Material']);
        $this->setDTM_EntregaMaterial($rs[0]['DTM_EntregaMaterial']);
        $this->setCOD_InscricaoExterno($rs[0]['COD_InscricaoExterno']);
        return $this;
    }

    public function insertPart($id_Evt, $id_User)
    {

        require_once ('./config/configs.php');
        require_once './actions/aBsc_Participante.php';

        $partic = new aBsc_Participante();
        $config = new configs();

        $partic->selectInfoEvt($id_User);

            $this->setID_EVT_Evento_Pariticipante($config->idUnico());
            $this->setID_EVT_Evento($id_Evt);

            $this->setID_BSC_Participante($partic->getID_Participante());
            $this->setDSC_Nome_Crachav($partic->getDSC_Nome());
            $this->setCOD_Barras_Cracha($partic->getCOD_CPF());

            $sql = sprintf($this->sqlInsert, $this->getID_EVT_Evento_Pariticipante(), $this->getDSC_Nome_Crachav(), $this->getCOD_Barras_Cracha(), $this->getVLR_Total(), $this->getVLR_Total_Inscricao(), $this->getQTD_CargaHoraria_Realizada(), $this->getCOD_Nivel_Participante(), $this->getID_EVT_Pagamento(), $this->getID_EVT_Categoria(), $this->getID_EVT_Evento(), $this->getID_BSC_Participante(), $this->getID_EVT_Participante_Pai(), $this->getCOD_Tipo_SIT_Certificado(), $this->getDTM_Entrega_Certificado(), $this->getID_SEG_DetalheTransacao(), $this->getSIT_EH_Parcelado(), $this->getID_EVT_EventoGrupo(), $this->getCOD_TipoSituacao_Material(), $this->getDTM_EntregaMaterial(), $this->getCOD_InscricaoExterno());
            return $this->RunQuery($sql);
    }

    public function selectNotExistsEvt($id_Evt, $id_User)
    {
        $rs = $this->RunSelect(sprintf($this->sqlSelectExist, $id_Evt, $id_User));
        $count = $rs[0]['COUNT_EVT'];
        if ($count == 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}
