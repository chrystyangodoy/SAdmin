<?php

if (!(isset($_SESSION['ID_EVT_Evento']))) {
    header("Location: Index.php");
    die();
}

require_once './smarty.php';
require ('./actions/aBsc_Participante.php');
require ('./actions/aUsuario.php');
require_once './actions/atb_Tipo_Estado.php';
$partic = new aBsc_Participante();
$user = new aUsuario();

$tipoestado = new atb_Tipo_Estado();

session_start();
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

$ID_Usuario = $_SESSION['ID_Usuario'];
$ID_Evento = $_SESSION['Id_Evento'];
$ID_Categoria = $_SESSION['ID_Evento_Categoria'];

$ID_Participante = $partic->getIDParticipantePeloIDUsuario($ID_Usuario);

$partic->setID_Participante($ID_Participante);
$partic->load();

$ID_Usuario = $partic->getID_Usuario();
$user->setID_Usuario($ID_Usuario);
$user->load();

if (isset($_POST['Cadastrar'])) {

    //limpa cpf
    $cpf = $config->limpaCPF($_POST['COD_CPF']);
    $email = $_POST['DSC_Email'];

    //Gera data incial e final para o cadastro de usuário
    $datainicial = date("d/m/Y");
    $datafim = date('d/m/Y', strtotime("+7 days"));
    //Gera o grupo padrão para Participantes
    $grupo = 99;

    //Gera e armazena ID Único Gerado.



    $user->setDTM_Inicio($datainicial);
    $user->setDTM_Fim($datafim);
    $user->setID_SEG_Grupo($grupo);
    $user->update();

    $partic->setID_Participante($ID_Participante);
    $partic->setCOD_RG($_POST['COD_RG']);
    $partic->setDSC_Nome($_POST['DSC_Nome']);
    $partic->setDSC_Endereco($_POST['DSC_Endereco']);
    $partic->setDSC_Bairro($_POST['DSC_Bairro']);
    $partic->setDSC_Cidade($_POST['DSC_Cidade']);
    $partic->setNUM_CEP($_POST['NUM_CEP']);
    $partic->setNUM_Fone($_POST['NUM_Fone']);
    $partic->setNUM_Celular($_POST['NUM_Celular']);
    $partic->setNUM_FAX($_POST['NUM_FAX']);
    $partic->setDSC_Profissao_Especialidade($_POST['DSC_Profissao_Especialidade']);
    $partic->setDSC_Email($email);
    $partic->setNUM_Registro($_POST['NUM_Registro']);
    $partic->setCOD_Tipo_Estado($_POST['COD_Tipo_Estado']);
    $partic->setID_BSC_Empresa($_POST['ID_BSC_Empresa']);
    $partic->setID_BSC_Profissao($_POST['ID_BSC_Profissao']);
    $partic->update();



    require_once './actions/aEvt_Evento_Participante.php';
    $evtPart = new aEvt_Evento_Participante();
    if ($evtPart->selectNotExistsEvt($ID_Evento, $ID_Usuario)) {
        $evtPart->insertPart($ID_Evento, $ID_Usuario, $ID_Categoria);
        require_once './actions/aEvt_Evento.php';
        $infoEvt = new aEvt_Evento();
        $ass = "Confirmação de Inscrição no Evento!";
        $mens = ("Sua inscrição no evento " . $infoEvt->getDSC_Nome() . " foi efetuada com sucesso!");
        //Load de informações para envio do email
        require_once './config/eMail.php';
        $emailObj = new eMail();
        require_once ('./actions/aBsc_Participante.php');
        $partic = new aBsc_Participante();
        $partic->selectInfoPartic($ID_Usuario);
        $envio = $emailObj->enviarEMail($partic->getDSC_Email(), $partic->getDSC_Nome(), $ass, $mens);

        $_SESSION['Id_Evento'] = null;
    } else {
        $FeedbackMessage->setMsg("Você já está inscrito neste evento!");
        $FeedbackMessage->setType("error");
        header("Location: Index.php");
        die();
    }


    $FeedbackMessage->setMsg("Participante inserido com sucesso!");
    header("Location: Index.php");
    die();
}

require_once './actions/aBsc_Empresa.php';
require_once './actions/aBsc_Profissao.php';


$emp = new aBsc_Empresa();
$prof = new aBsc_Profissao();

$smarty->assign("listEmp", $emp->select());
$smarty->assign("listProf", $prof->select());



$smarty->assign("ID_Participante", $partic->getID_Participante());
$smarty->assign("COD_CPF", $partic->getCOD_CPF());
$smarty->assign("COD_RG", $partic->getCOD_RG());
$smarty->assign("DSC_Nome", $partic->getDSC_Nome());
$smarty->assign("DSC_Endereco", $partic->getDSC_Endereco());
$smarty->assign("DSC_Bairro", $partic->getDSC_Bairro());
$smarty->assign("DSC_Cidade", $partic->getDSC_Cidade());
$smarty->assign("NUM_CEP", $partic->getNUM_CEP());
$smarty->assign("NUM_Fone", $partic->getNUM_Fone());
$smarty->assign("NUM_Celular", $partic->getNUM_Celular());
$smarty->assign("NUM_FAX", $partic->getNUM_FAX());
$smarty->assign("DSC_Profissao_Especialidade", $partic->getDSC_Profissao_Especialidade());
$smarty->assign("DSC_Email", $partic->getDSC_Email());
$smarty->assign("NUM_Registro", $partic->getNUM_Registro());
$smarty->assign("COD_Tipo_Estado", $partic->getCOD_Tipo_Estado());
$smarty->assign("ID_BSC_Empresa", $partic->getID_BSC_Empresa());
$smarty->assign("ID_BSC_Profissao", $partic->getID_BSC_Profissao());


$smarty->assign("listTpUF", $tipoestado->select());

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->display('./View/ParticipanteEdit.html');
