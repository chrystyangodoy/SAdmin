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

    protected $sqlInsert = "INSERT INTO evt_evento_participante(ID_EVT_Evento_Pariticipante, DSC_Nome_Cracha, COD_Barras_Cracha, VLR_Total, VLR_Total_Inscricao, QTD_CargaHoraria_Realizada, COD_Nivel_Participante, ID_EVT_Pagamento, ID_EVT_Categoria, ID_EVT_Evento, ID_BSC_Participante, ID_EVT_Participante_Pai, COD_Tipo_SIT_Certificado, DTM_Entrega_Certificado, ID_SEG_DetalheTransacao, SIT_EH_Parcelado, ID_EVT_EventoGrupo, COD_TipoSituacao_Material, DTM_EntregaMaterial, COD_InscricaoExterno, Num_Inscricao,DataInscricao) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_evento_participante set DSC_Nome_Cracha='%s', COD_Barras_Cracha='%s', VLR_Total='%s', VLR_Total_Inscricao='%s', QTD_CargaHoraria_Realizada='%s', COD_Nivel_Participante='%s', ID_EVT_Pagamento='%s', ID_EVT_Categoria='%s', ID_EVT_Evento='%s', ID_BSC_Participante='%s', ID_EVT_Participante_Pai='%s', COD_Tipo_SIT_Certificado='%s', DTM_Entrega_Certificado='%s', ID_SEG_DetalheTransacao='%s', SIT_EH_Parcelado='%s', ID_EVT_EventoGrupo='%s', COD_TipoSituacao_Material='%s', DTM_EntregaMaterial='%s', COD_InscricaoExterno='%s', Num_Inscricao='%s',DataInscricao='%s' where ID_EVT_Evento_Pariticipante='%s'";
    protected $sqlDelete = "delete from evt_evento_participante where ID_EVT = '%s'";
    protected $sqlSelect = "select * from evt_evento_participante where 1=1 %s %s";
    protected $sqlSelectExistEvt = "SELECT count(0) AS COUNT_EVT FROM evt_evento_participante WHERE 1=1 and ID_EVT_Evento='%s' and ID_BSC_Participante='%s'";
    protected $sqlSelectExistEvtCPF = "SELECT COUNT(0) AS COUNT
                                       FROM   evt_evento_participante INNER JOIN BSC_PARTICIPANTE ON (evt_evento_participante.ID_BSC_Participante = BSC_PARTICIPANTE.ID_Participante)
                                       WHERE  evt_evento_participante.ID_EVT_Evento = '%s' AND BSC_PARTICIPANTE.COD_CPF = '%s'";
    protected $sqlSelectExistEvtId_Estrangeiro = "SELECT COUNT(0) AS COUNT
                                       FROM   evt_evento_participante INNER JOIN BSC_PARTICIPANTE ON (evt_evento_participante.ID_BSC_Participante = BSC_PARTICIPANTE.ID_Participante)
                                       WHERE  evt_evento_participante.ID_EVT_Evento = '%s' AND BSC_PARTICIPANTE.Id_Estrangeiro = '%s'";
    protected $sqlSelectEvtPartc = "SELECT evt_evento.ID_EVT as ID_EVT, evt_evento.DSC_Nome as DSC_Nome, DATE_FORMAT(evt_evento.DT_Inicio , '%d/%m/%Y' ) as DT_Inicio, DATE_FORMAT(evt_evento.DT_Fim , '%d/%m/%Y' ) as DT_Fim, bsc_local_evento.DSC_Endereco as DSC_Endereco, bsc_local_evento.DSC_Bairro as DSC_Bairro, bsc_local_evento.DSC_Cidade as DSC_Cidade, bsc_local_evento.NUM_Fone as NUM_Fone, bsc_local_evento.DSC_EMAIL as DSC_EMAIL,  evt_evento.Cod_Evento AS Cod_Evento FROM evt_evento_participante INNER JOIN evt_evento ON evt_evento_participante.ID_EVT_Evento = evt_evento.ID_EVT INNER JOIN bsc_local_evento ON bsc_local_evento.ID_Local = evt_evento.ID_BSC_Local_Evento WHERE 1=1 %s %s";
    protected $SelectEvtP = "SELECT evt_evento.ID_EVT as ID_EVT, evt_evento.DSC_Nome as DSC_Nome, DATE_FORMAT(evt_evento.DT_Inicio , '%d/%m/%Y' ) as DT_Inicio, DATE_FORMAT(evt_evento.DT_Fim , '%d/%m/%Y' ) as DT_Fim, bsc_local_evento.DSC_Endereco as DSC_Endereco, bsc_local_evento.DSC_Bairro as DSC_Bairro, bsc_local_evento.DSC_Cidade as DSC_Cidade, bsc_local_evento.NUM_Fone as NUM_Fone, bsc_local_evento.DSC_EMAIL as DSC_EMAIL, evt_evento.Cod_Evento AS Cod_Evento FROM evt_evento_participante INNER JOIN evt_evento ON (evt_evento_participante.ID_EVT_Evento = evt_evento.ID_EVT) INNER JOIN bsc_local_evento ON (bsc_local_evento.ID_Local = evt_evento.ID_BSC_Local_Evento) WHERE 1=1 and ID_BSC_Participante='%s'";
    protected $SelectInnerBoleto = "SELECT COUNT(0) AS COUNT,bsc_participante.DSC_Nome, bsc_participante.DSC_Endereco, bsc_participante.DSC_Bairro, bsc_participante.DSC_Cidade, bsc_participante.NUM_CEP, evt_evento.COD_CNPJ_Promotora, evt_evento.DSC_Nome_Promotora, bsc_local_evento.DSC_Nome, bsc_local_evento.DSC_Endereco, bsc_local_evento.DSC_Bairro, bsc_local_evento.DSC_Cidade, bsc_local_evento.NUM_Fone FROM evt_evento_participante INNER JOIN bsc_participante ON evt_evento_participante.ID_BSC_Participante = bsc_participante.ID_Participante INNER JOIN evt_evento ON evt_evento_participante.ID_EVT_Evento = evt_evento.ID_EVT INNER JOIN bsc_local_evento ON evt_evento.ID_BSC_Local_Evento = bsc_local_evento.ID_Local WHERE evt_evento_participante.ID_EVT_Evento_Pariticipante = '%s'";

    public function insert()
    {
        $sql = sprintf($this->sqlInsert, $this->getID_EVT_Evento_Pariticipante(), $this->getDSC_Nome_Cracha(), $this->getCOD_Barras_Cracha(), $this->getVLR_Total(), $this->getVLR_Total_Inscricao(), $this->getQTD_CargaHoraria_Realizada(), $this->getCOD_Nivel_Participante(), $this->getID_EVT_Pagamento(), $this->getID_EVT_Categoria(), $this->getID_EVT_Evento(), $this->getID_BSC_Participante(), $this->getID_EVT_Participante_Pai(), $this->getCOD_Tipo_SIT_Certificado(), $this->getDTM_Entrega_Certificado(), $this->getID_SEG_DetalheTransacao(), $this->getSIT_EH_Parcelado(), $this->getID_EVT_EventoGrupo(), $this->getCOD_TipoSituacao_Material(), $this->getDTM_EntregaMaterial(), $this->getCOD_InscricaoExterno(),$this->getNum_Inscricao(),$this->getDataInscricao(true));
        return $this->RunQuery($sql);
    }

    public function update()
    {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome_Cracha(), $this->getCOD_Barras_Cracha(), $this->getVLR_Total(), $this->getVLR_Total_Inscricao(), $this->getQTD_CargaHoraria_Realizada(), $this->getCOD_Nivel_Participante(), $this->getID_EVT_Pagamento(), $this->getID_EVT_Categoria(), $this->getID_EVT_Evento(), $this->getID_BSC_Participante(), $this->getID_EVT_Participante_Pai(), $this->getCOD_Tipo_SIT_Certificado(), $this->getDTM_Entrega_Certificado(), $this->getID_SEG_DetalheTransacao(), $this->getSIT_EH_Parcelado(), $this->getID_EVT_EventoGrupo(), $this->getCOD_TipoSituacao_Material(), $this->getDTM_EntregaMaterial(), $this->getCOD_InscricaoExterno(),$this->getNum_Inscricao(),$this->getDataInscricao(True), $this->getID_EVT_Evento_Pariticipante());
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
        $this->setID_EVT_Evento_Pariticipante($rs[0]['ID_EVT_Evento_Pariticipante']);
        $this->setDSC_Nome_Cracha($rs[0]['DSC_Nome_Cracha']);
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
        $this->setNum_Inscricao($rs[0]['Num_Inscricao']);
        $this->setDataInscricao($rs[0]['DataInscricao']);
        return $this;
    }

    public function insertPart($id_Evt, $id_User, $ID_Categoria = null)
    {
        require_once ('./config/configs.php');
        require_once './actions/aBsc_Participante.php';

        $partic = new aBsc_Participante();
        $config = new configs();

        $partic->selectInfoPartic($id_User);

        $this->setID_EVT_Evento_Pariticipante($config->idUnico());
        $this->setID_EVT_Evento($id_Evt);


        $this->setID_EVT_Categoria($ID_Categoria);
        $this->setID_BSC_Participante($partic->getID_Participante());
        $this->setDSC_Nome_Cracha($partic->getDSC_Nome());
        $this->setCOD_Barras_Cracha($partic->getCOD_CPF());

        $sql = sprintf($this->sqlInsert, $this->getID_EVT_Evento_Pariticipante(), $this->getDSC_Nome_Cracha(), $this->getCOD_Barras_Cracha(), $this->getVLR_Total(), $this->getVLR_Total_Inscricao(), $this->getQTD_CargaHoraria_Realizada(), $this->getCOD_Nivel_Participante(), $this->getID_EVT_Pagamento(), $this->getID_EVT_Categoria(), $this->getID_EVT_Evento(), $this->getID_BSC_Participante(), $this->getID_EVT_Participante_Pai(), $this->getCOD_Tipo_SIT_Certificado(), $this->getDTM_Entrega_Certificado(), $this->getID_SEG_DetalheTransacao(), $this->getSIT_EH_Parcelado(), $this->getID_EVT_EventoGrupo(), $this->getCOD_TipoSituacao_Material(), $this->getDTM_EntregaMaterial(), $this->getCOD_InscricaoExterno());
        return $this->RunQuery($sql);
    }

    public function insertPartEvt($id_Evt, $id_Partic, $ID_Categoria = null)
    {
        require_once ('./config/configs.php');
        $config = new configs();
        $NewIDEvtPartic = $config->idUnico();
        require_once ('./actions/aBsc_Participante.php');
        $partic = new aBsc_Participante();
        $partic->setID_Participante($id_Partic);
        $partic->load();

        $this->setID_EVT_Evento_Pariticipante($NewIDEvtPartic);
        $this->setID_EVT_Evento($id_Evt);
        $this->setID_EVT_Categoria($ID_Categoria);
        
        require_once ('./actions/aEvt_Evento_Categoria.php');
        $evt_catg = new aEvt_Evento_Categoria();
        $evt_catg->setID_Evento_Categoria($ID_Categoria);
        $evt_catg->load();
        
        $this->setVLR_Total($evt_catg->getVLR_Inscricao());
        $this->setVLR_Total_Inscricao($evt_catg->getVLR_Inscricao());
        $this->setID_BSC_Participante($partic->getID_Participante());
        $this->setDSC_Nome_Cracha($partic->getNome_Cracha());
        $this->setCOD_Barras_Cracha($partic->getCOD_CPF());
        
        //Verificar uma forma de o número ser dinamico aleatórios e que não se repete como o newguid();
        require_once ('./actions/aEvt_Evento.php');
        $Evento = new aEvt_Evento();
        $Evento->getID_EVT($id_Evt);
        $Evento->load();
        
        $CodInscricao = $Evento->countEvt($id_Evt);
        $Evento->setCtrl_Inscricao($CodInscricao);
        
        $this->setCOD_InscricaoExterno($CodInscricao);
        $this->setNum_Inscricao($CodInscricao);
        $data_atual = date("Y/m/d", strtotime("now"));
        $this->setDataInscricao($data_atual);
        
        $sql = sprintf($this->sqlInsert, $this->getID_EVT_Evento_Pariticipante(), $this->getDSC_Nome_Cracha(), $this->getCOD_Barras_Cracha(), $this->getVLR_Total(), $this->getVLR_Total_Inscricao(), $this->getQTD_CargaHoraria_Realizada(), $this->getCOD_Nivel_Participante(), $this->getID_EVT_Pagamento(), $this->getID_EVT_Categoria(), $this->getID_EVT_Evento(), $this->getID_BSC_Participante(), $this->getID_EVT_Participante_Pai(), $this->getCOD_Tipo_SIT_Certificado(), $this->getDTM_Entrega_Certificado(), $this->getID_SEG_DetalheTransacao(), $this->getSIT_EH_Parcelado(), $this->getID_EVT_EventoGrupo(), $this->getCOD_TipoSituacao_Material(), $this->getDTM_EntregaMaterial(), $this->getCOD_InscricaoExterno(),$this->getNum_Inscricao(),$this->getDataInscricao());
        return $this->RunQuery($sql);
    }

    public function insertPartEvtId_Estrangeiro($id_Evt, $id_Partic, $ID_Categoria = null)
    {
        require_once ('./config/configs.php');
        require_once ('./actions/aBsc_Participante.php');

        $config = new configs();
        $partic = new aBsc_Participante();

        $partic->setID_Participante($id_Partic);
        $partic->load();

        $this->setID_EVT_Evento_Pariticipante($config->idUnico());
        $this->setID_EVT_Evento($id_Evt);

        $this->setID_EVT_Categoria($ID_Categoria);
        
        require_once ('./actions/aEvt_Evento_Categoria.php');
        $evt_catg = new aEvt_Evento_Categoria();
        $evt_catg->setID_Evento_Categoria($ID_Categoria);
        $evt_catg->load();
        
        $this->setVLR_Total($evt_catg->getVLR_Inscricao());
        $this->setVLR_Total_Inscricao($evt_catg->getVLR_Inscricao());
        $this->setID_BSC_Participante($partic->getID_Participante());
        $this->setDSC_Nome_Cracha($partic->getNome_Cracha());
        $this->setCOD_Barras_Cracha($partic->getId_Estrangeiro());
        //Verificar uma forma de o número ser dinamico aleatórios e que não se repete como o newguid();
        require_once ('./actions/aEvt_Evento.php');
        $Evento = new aEvt_Evento();
        $Evento->getID_EVT($id_Evt);
        $Evento->load();
        
        $CodInscricao = $Evento->countEvt($id_Evt);
        $Evento->setCtrl_Inscricao($CodInscricao);
        
        $this->setCOD_InscricaoExterno($CodInscricao);
        $CodInscricao2 = $Evento->NroInscricao($id_Evt);
        $this->setNum_Inscricao($CodInscricao2);
        $data_atual = date("Y/m/d", strtotime("now"));
        $this->setDataInscricao($data_atual);

        $sql = sprintf($this->sqlInsert, $this->getID_EVT_Evento_Pariticipante(), $this->getDSC_Nome_Cracha(), $this->getCOD_Barras_Cracha(), $this->getVLR_Total(), $this->getVLR_Total_Inscricao(), $this->getQTD_CargaHoraria_Realizada(), $this->getCOD_Nivel_Participante(), $this->getID_EVT_Pagamento(), $this->getID_EVT_Categoria(), $this->getID_EVT_Evento(), $this->getID_BSC_Participante(), $this->getID_EVT_Participante_Pai(), $this->getCOD_Tipo_SIT_Certificado(), $this->getDTM_Entrega_Certificado(), $this->getID_SEG_DetalheTransacao(), $this->getSIT_EH_Parcelado(), $this->getID_EVT_EventoGrupo(), $this->getCOD_TipoSituacao_Material(), $this->getDTM_EntregaMaterial(), $this->getCOD_InscricaoExterno(),$this->getDataInscricao());
        return $this->RunQuery($sql);
    }
    
    public function selectNotExistsEvt($id_Evt, $id_User)
    {
        require_once ('./actions/aBsc_Participante.php');
        $partic = new aBsc_Participante();
        $partic->selectInfoPartic($id_User);

        $rs = $this->RunSelect(sprintf($this->sqlSelectExistEvt, $id_Evt, $partic->getID_Participante()));
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

    public function selectNotExistsEvtCPF($id_Evt,$cpf)
    {
        $rs = $this->RunSelect(sprintf($this->sqlSelectExistEvtCPF, $id_Evt, $cpf));
        $count = $rs[0]['COUNT'];
        if ($count == 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function selectNotExistsEvtId_Estrangeiro($id_Evt,$Id_Estrangeiro)
    {
        $rs = $this->RunSelect(sprintf($this->sqlSelectExistEvtId_Estrangeiro, $id_Evt, $Id_Estrangeiro));
        $count = $rs[0]['COUNT'];
        if ($count == 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function SelectEvtPartc($id_User)
    {
        require_once ('./actions/aBsc_Participante.php');
        $partic = new aBsc_Participante();
        $partic->selectInfoPartic($id_User);
        $idParticipante = $partic->getID_Participante();
        try {
            //return $this->RunSelect("SELECT evt_evento_participante.ID_EVT_Evento_Pariticipante,evt_evento.ID_EVT as ID_EVT, evt_evento.DSC_Nome as DSC_Nome, DATE_FORMAT(evt_evento.DT_Inicio , '%d/%m/%Y' ) as DT_Inicio, DATE_FORMAT(evt_evento.DT_Fim , '%d/%m/%Y' ) as DT_Fim, bsc_local_evento.DSC_Endereco as DSC_Endereco, bsc_local_evento.DSC_Bairro as DSC_Bairro, bsc_local_evento.DSC_Cidade as DSC_Cidade, bsc_local_evento.NUM_Fone as NUM_Fone, bsc_local_evento.DSC_EMAIL as DSC_EMAIL,evt_evento.Logo_Evento as Logo_Evento FROM evt_evento_participante INNER JOIN evt_evento ON (evt_evento_participante.ID_EVT_Evento = evt_evento.ID_EVT) INNER JOIN bsc_local_evento ON (bsc_local_evento.ID_Local = evt_evento.ID_BSC_Local_Evento) WHERE 1=1 and ID_BSC_Participante='$idParticipante'");
            return $this->RunSelect("SELECT evt_evento_participante.ID_EVT_Evento_Pariticipante,evt_evento_participante.Num_Inscricao as Num_Inscricao,evt_evento.ID_EVT as ID_EVT, evt_evento.DSC_Nome as DSC_Nome, DATE_FORMAT(evt_evento.DT_Inicio , '%d/%m/%Y' ) as DT_Inicio, DATE_FORMAT(evt_evento.DT_Fim , '%d/%m/%Y' ) as DT_Fim, bsc_local_evento.DSC_Endereco as DSC_Endereco, bsc_local_evento.DSC_Bairro as DSC_Bairro, bsc_local_evento.DSC_Cidade as DSC_Cidade, bsc_local_evento.NUM_Fone as NUM_Fone, bsc_local_evento.DSC_EMAIL as DSC_EMAIL,evt_evento.Logo_Evento as Logo_Evento, evt_pagamento.COD_Tipo_Situacao_Pagamento AS COD_Tipo_Situacao_Pagamento FROM evt_evento_participante INNER JOIN evt_evento ON (evt_evento_participante.ID_EVT_Evento = evt_evento.ID_EVT) INNER JOIN bsc_local_evento ON (bsc_local_evento.ID_Local = evt_evento.ID_BSC_Local_Evento) INNER JOIN evt_pagamento ON (evt_evento_participante.ID_EVT_Evento_Pariticipante = evt_pagamento.ID_EVT_Evento) WHERE 1=1 and ID_BSC_Participante='$idParticipante'");
        } catch (Exception $ex) {
            return $ex . error_get_last();
        }
    }

    public function SelectInfoBoleto($ID_EVT_Evento_Pariticipante)
    {
        $rs = $this->RunSelect(sprintf($this->SelectInnerBoleto, $ID_EVT_Evento_Pariticipante));
        
        require_once ('./actions/aBsc_Participante.php');
        $partic = new aBsc_Participante();
        $partic->setDSC_Nome($rs[0]['DSC_Nome']);
        $partic->setNome_Cracha($rs[0]['DSC_Nome']);
        $partic->setDSC_Endereco($rs[0]['DSC_Endereco']);       
        $partic->setDSC_Bairro($rs[0]['DSC_Bairro']);
        $partic->setDSC_Cidade($rs[0]['DSC_Cidade']);
        $partic->setNUM_CEP($rs[0]['NUM_CEP']);
        
        require_once ('./actions/aEvt_Evento.php');
        $Evento = new aEvt_Evento();
        $Evento->setCOD_CNPJ_Promotora($rs[0]['COD_CNPJ_Promotora']);
        $Evento->setDSC_Nome_Promotora($rs[0]['DSC_Nome_Promotora']);
        
        require_once ('./actions/aBsc_Local_Evento.php');
        $LocalEvento = new absc_local_evento();
        $LocalEvento->setDSC_Nome($rs[0]['DSC_Nome']);
        $LocalEvento->setDSC_Endereco($rs[0]['DSC_Endereco']);
        $LocalEvento->setDSC_Bairro($rs[0]['DSC_Bairro']);
        $LocalEvento->setDSC_Cidade($rs[0]['DSC_Cidade']);
        $LocalEvento->setNUM_Fone($rs[0]['NUM_Fone']);
        
        $count = $rs[0]['COUNT'];
        if ($count == 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function loadParticPagto()
    {
        $rs = $this->select(sprintf("and ID_BSC_Participante='%s'", $this->getID_BSC_Participante()));
        $this->setID_EVT_Evento_Pariticipante($rs[0]['ID_EVT_Evento_Pariticipante']);
        $this->setID_EVT_Pagamento($rs[0]['ID_EVT_Pagamento']);
        $this->setID_BSC_Participante($rs[0]['ID_BSC_Participante']);
        return $this;
    }

    
    private function countInscricao($id_Evt){
        return $this->RunSelect("SELECT COUNT(`Num_Inscricao`) FROM `evt_evento_participante` WHERE 1=1 and ID_EVT_Evento='$id_Evt'");        
    }
}