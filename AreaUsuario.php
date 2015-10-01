<?php
session_start();
include_once './config/ValidaSessao.php';
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
require_once './actions/aEvt_Evento.php';


if (isset($_GET['idevt']))
{
    require_once './actions/aBsc_Participante.php';
    require_once './actions/aEvt_Evento_Participante.php';
    require_once ('./config/configs.php');

    $partic = new aBsc_Participante();
    $evtPart = new aEvt_Evento_Participante();
    $config = new configs();
    
    //Capturar informações do participante
    $partic->selectInfoPartic($_SESSION['ID_Usuario']);
    $IDEvto = $_GET['idevt'];

    $evtPart->setID_EVT_Evento_Pariticipante($config->idUnico());
    $evtPart->setDSC_Nome_Crachav($partic->getDSC_Nome());
    $evtPart->setCOD_Barras_Cracha($partic->getCOD_CPF());
//    $evtPart->setVLR_Total();
//    $evtPart->setVLR_Total_Inscricao();
//    $evtPart->setQTD_CargaHoraria_Realizada();
//    $evtPart->setCOD_Nivel_Participante();
//    $evtPart->setID_EVT_Pagamento();
//    $evtPart->setID_EVT_Categoria();
    $evtPart->setID_EVT_Evento($IDEvto);
    $evtPart->setID_BSC_Participante($partic->getID_Participante());
//    $evtPart->setID_EVT_Participante_Pai();
//    $evtPart->setCOD_Tipo_SIT_Certificado();
//    $evtPart->setDTM_Entrega_Certificado();
//    $evtPart->setID_SEG_DetalheTransacao();
//    $evtPart->setSIT_EH_Parcelado();
//    $evtPart->setID_EVT_EventoGrupo();
//    $evtPart->setCOD_TipoSituacao_Material();
//    $evtPart->setDTM_EntregaMaterial();
//    $evtPart->setCOD_InscricaoExterno();

    $evtPart->insert();
}

$FeedbackMessage = new FeedbackMessage();
require_once './actions/aEvt_Evento_Participante.php';
$evtPart = new aEvt_Evento_Participante();

$lista = $evtPart->select();

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista", $lista);

$smarty->display('./View_Participante/AreaParticipante.html');

//----------------------------------------------------------
