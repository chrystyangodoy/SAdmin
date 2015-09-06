<?php

require_once './smarty.php';
$msg = "";
$type = "";

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
            $partic->setDSC_Email($_POST['DSC_Email']);
            $partic->setNUM_Registro($_POST['NUM_Registro']);
            $partic->setCOD_Tipo_Estado($_POST['COD_Tipo_Estado']);
            $partic->setID_BSC_Empresa($_POST['ID_BSC_Empresa']);
            $partic->setID_BSC_Profissao($_POST['ID_BSC_Profissao']);
            $partic->insert();

            $data = new DateTime();
            $datafim = new DateTime();
            $datafim->modify("+7 day");

            $gerasenha->geraSenha(14);

            $user->setDSC_Login($cpf);
            $user->setDSC_Senha($gerasenha);
            $user->setDTM_Inicio($data);
            $user->setDTM_Fim($datafim);
            $user->setID_SEG_Grupo(99);
            $user->insert();

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
        ;
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
