<?php
mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");
ob_start("mb_output_handler");
header("Content-Type: text/html; charset=UTF-8", true);

session_start();
require_once './smarty.php';
require_once './config/FeedbackMessage.php';

$FeedbackMessage = new FeedbackMessage();

if (isset($_POST['Cadastrar']))
{
    require_once ('./config/configs.php');
    require ('./actions/aBsc_Participante.php');
    require ('./actions/aUsuario.php');
    require_once './config/geraSenha.php';

    $partic = new aBsc_Participante();
    $gerasenha = new geraSenha();
    $user = new aUsuario();
    $config = new configs();
    //limpa cpf
    $cpf = $config->limpaCPF($_POST['COD_CPF']);
    $email = $_POST['DSC_Email'];
    $idUnico = '';
    $isParticipanteNovo = TRUE;

    //validação do CPF
    if ($config->validaCPF($cpf))
    {
        //verifica se o CPF já foi cadastrado
        if ($partic->selectNotExistsCPF($cpf) || $id_Participante != '')
        {
            try {
                //Gera data incial e final para o cadastro de usuário
                $datainicial = date("d/m/Y");
                $datafim = date('d/m/Y', strtotime("+7 days"));
                //Gera Senha Aleatória
                $senha = $gerasenha->geraSenha(6);
                //Gera o grupo padrão para Participantes
                $grupo = 99;
                //Gera e armazena ID Único Gerado.
                $idUnico = $config->idUnico();
                $user->setID_Usuario($idUnico);
                $user->setDSC_Login($cpf);
                $user->setDSC_Senha($senha);
                $user->setDTM_Inicio($datainicial);
                $user->setDTM_Fim($datafim);
                $user->setID_SEG_Grupo($grupo);
                $user->insert();
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
                $partic->setID_Usuario($idUnico);
                $partic->insert();
                $ass = "Cadastro efetuado com sucesso!";
                $msg = 'Cadastro efetuado com sucesso!<br/>
                            Usuário: ' . $cpf . '<br />
                            Senha: ' . $senha . " <br />";
                require_once './config/eMail.php';
                $emailObj = new eMail();
                $envio = $emailObj->enviarEMail($partic->getDSC_Email(), $partic->getDSC_Nome(), $ass, $msg);
                $msgFeedMessage = 'Cadastro efetuado com sucesso.</br>Verifique seu e-mail.';
                $FeedbackMessage->setMsg($msgFeedMessage);
                header("Location: ParticipanteList.php");
                die();
            } catch (Exception $e) {
                $FeedbackMessage->setMsg("Desculpe! Ocorreu um erro inesperado!");
                $FeedbackMessage->setType("error");
                header("Location: ParticipanteList.php");
            }
        }
    }
    else
    {
        $FeedbackMessage->setMsg("CPF inválido!");
        $FeedbackMessage->setType("error");
    }
}

require_once './actions/aBsc_Empresa.php';
require_once './actions/aBsc_Profissao.php';
require_once './actions/atb_Tipo_Estado.php';

$emp = new aBsc_Empresa();
$prof = new aBsc_Profissao();
$estado = new atb_Tipo_Estado();

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("listEmp", $emp->select());
$smarty->assign("listProf", $prof->select());
$smarty->assign("listEstado", $estado->select());
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("Titulo", " - Inserir Participante.");
$smarty->display('./View/ParticipanteInsert_BE.html');
