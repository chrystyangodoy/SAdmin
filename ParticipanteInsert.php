<?php
require_once './smarty.php';
$msg = "";
$type = "";

if (isset($_POST['Cadastrar'])) {
    require_once ('./config/configs.php');
    require ('./config/geraSenha.php');
    require ('./actions/aBsc_Participante.php');
    require ('./actions/aUsuario.php');
    $partic = new aBsc_Participante();
    $user = new aUsuario();
    $gerasenha = new geraSenha();
    $config = new configs();

    //limpa cpf
    $cpf = $config->limpaCPF($_POST['COD_CPF']);
    $email = $_POST['DSC_Email'];

    //validação do CPF
    if ($config->validaCPF($cpf)) {
        //verifica se o CPF já foi cadastrado
        if ($partic->selectNotExistsCPF($cpf)) {
            //Gera data incial e final para o cadastro de usuário
            $datainicial = date("d/m/Y");
            $datafim = date('d/m/Y', strtotime("+7 days"));
            //Gera Senha Aleatória
            $senha = $gerasenha->geraSenha(14);
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
//          
            $ass ="Cadastro efetuado com sucesso!";
            $mens = ("Seu usuário é " . $cpf . " sua senha é " . $senha . ".");
            require_once './config/eMail.php';
            $email = new eMail();
            //$envio = mail($email, $ass,$mens);
            $remetente = "Testando Sistema Web - Confirmação";
            $envio = $email->sendEmail($remetente, $email, $ass ,$mens );

            $msg = "Participante inserido com sucesso!";
            $type = "success";
            /*
              $smarty->assign("msg", $msg);
              $smarty->assign("msg", $msg);
              $smarty->display('./View/ParticipanteList.html');
             * */
        } else {
            $msg = "CPF já cadastrado!";
            $type = "error";
        }
    } else {
        $msg = "CPF inválido!";
        $type = "error";
    }
} else {

    require_once './actions/aBsc_Empresa.php';
    require_once './actions/aBsc_Profissao.php';


    $emp = new aBsc_Empresa();
    $prof = new aBsc_Profissao();

    $smarty->assign("listEmp", $emp->select());
    $smarty->assign("listProf", $prof->select());
}

$smarty->assign("msg", $msg);
$smarty->assign("type", $type);
$smarty->display('./View/ParticipanteInsert.html');
