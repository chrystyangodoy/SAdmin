<?php

if (isset($_POST['Cadastrar'])) {

    require_once './config/geraSenha.php';
    require ('./actions/aBsc_Participante.php');
    require_once './actions/aUsuario.php';
    require_once './config/configs.php';

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

            //Gera data incial e final para o cadastro de usuário
            $datainicial = date("d/m/Y");
            $datafim = date('d/m/Y', strtotime("+7 days"));
            //Gera Senha Aleatória
            $senha = $gerasenha->geraSenha(14);
            //Gera o grupo padrão para Participantes
            $grupo = 99;

            $user->setDSC_Login($cpf);
            $user->setDSC_Senha($senha);
            $user->setDTM_Inicio($datainicial);
            $user->setDTM_Fim($datafim);
            $user->setID_SEG_Grupo($grupo);

            $user->insert();

            require_once './config/eMail.php';
            $email = new eMail();
            
            $envio = $email->email("chrystyangodoy@gmail.com", $email,"Cadastro efetuado com sucesso!", "Seu usuário é ".$cpf." sua senha é ".$senha.".");
            
            $msg = "Participante inserido com sucesso!";
            $smarty->assign("msg", $msg);
            $smarty->display('./View/ParticipanteList.html');
        } else {
            $msg = "CPF já cadastrado!";
            $smarty->assign("msg", $msg);
        }
    } else {
        $msg = "CPF inválido!";
        $smarty->assign("msg", $msg);
    }
} else {


    require_once './actions/aBsc_Empresa.php';
    require_once './actions/aBsc_Profissao.php';
    require_once 'smarty.php';

    $emp = new aBsc_Empresa();
    $prof = new aBsc_Profissao();

    $smarty->assign("listEmp", $emp->select());
    $smarty->assign("listProf", $prof->select());

    $smarty->display('./View/ParticipanteInsert.html');
}
