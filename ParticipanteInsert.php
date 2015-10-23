<?php

require_once './smarty.php';

session_start();
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

$ID_Evento = $_GET['ID_EVT_Evento'];
$ID_Evento_Categoria = $_GET['ID_Evento_Categoria'];

if (isset($_POST['Cadastrar']))
{
    require_once './actions/aEvt_Evento_Participante.php';
    require_once ('./config/configs.php');
    require ('./actions/aBsc_Participante.php');

    $evtPart = new aEvt_Evento_Participante();
    $partic = new aBsc_Participante();

    $config = new configs();

    //limpa cpf
    $cpf = $config->limpaCPF($_POST['COD_CPF']);
    $email = $_POST['DSC_Email'];

    //validação do CPF
    if ($config->validaCPF($cpf))
    {
        //verifica se o CPF já foi cadastrado
        if ($evtPart->selectNotExistsEvtCPF($ID_Evento, $cpf))
        {

            //Insere participante

            $id_Participante = $config->idUnico();

            $partic->setID_Participante($id_Participante);
            $partic->setCOD_CPF($cpf);
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
            $partic->insert();

            //Insere Evento_Participante
            $evtPart->insertPartEvt($ID_Evento, $id_Participante, $ID_Evento_Categoria);

//Insere Informações para gerar o Boleto 
            $pagamento = new aEvt_Pagamento();
            $pagamento->selectInner($_SESSION['ID_Evento'], $_SESSION['CPF_Participante']);
            $pagamento->geraInfoPagamento();
//Informações para gerar o Boleto 
            
            $ass = "Cadastro efetuado com sucesso!";
            $mens = ("Você está inscrito no Evento");
            require_once './config/eMail.php';
            $emailObj = new eMail();

            $envio = $emailObj->enviarEMail($partic->getDSC_Email(), $partic->getDSC_Nome(), $ass, $mens);

            $FeedbackMessage->setMsg("Participante inserido com sucesso!");
            header("Location: Index.php");
            die();
        }
        else
        {
            $FeedbackMessage->setMsg("CPF já cadastrado para este Evento!");
            $FeedbackMessage->setType("error");
        }
    }
    else
    {
        $FeedbackMessage->setMsg("CPF inválido!");
        $FeedbackMessage->setType("error");
    }
}
else
{

    require_once './actions/aBsc_Empresa.php';
    require_once './actions/aBsc_Profissao.php';


    $emp = new aBsc_Empresa();
    $prof = new aBsc_Profissao();

    $smarty->assign("listEmp", $emp->select());
    $smarty->assign("listProf", $prof->select());
}

$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->display('./View/ParticipanteInsert.html');
