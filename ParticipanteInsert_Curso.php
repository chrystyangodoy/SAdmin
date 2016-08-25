<?php

mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");
ob_start("mb_output_handler");
header("Content-Type: text/html; charset=UTF-8", true);
session_start();
require_once './smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './actions/aEvt_Pagamento.php';

if (!isset($_GET['ID_Curso']) and ! isset($_GET['ID_EVT'])) {
    header("Location: Index.php");
    die();
}
//Capturando Parâmetros
$ID_Evento = $_GET['ID_EVT'];
$ID_Curso = $_GET['ID_Curso'];

//Fim da Captura de Parâmetros
//Chamadas de Requisitos 
require_once './actions/aBsc_Empresa.php';
$emp = new aBsc_Empresa();
require_once './actions/aBsc_Profissao.php';
$prof = new aBsc_Profissao();
require_once './actions/atb_Tipo_Estado.php';
$estado = new atb_Tipo_Estado();
require_once './actions/aEvt_Evento.php';
$evento = new aEvt_Evento();
require_once './actions/aEvt_Curso.php';
$Cursos = new aEvt_Curso();
require_once './actions/aTb_Tipo_Forma_Pagamento.php';
$FormaPagto = new aTb_Tipo_Forma_Pagamento();
//Fim das Chamadas de Requisitos 
// Chamada de Classe para Seleção de categorias.
require_once './actions/aEvt_Evento_Categoria.php';
$categoria = new aEvt_Evento_Categoria();
//Fim Chamada de Classe para Seleção de categorias.

if (isset($_POST['Cadastrar'])) {
    require_once ('./config/configs.php');
    $config = new configs();
    require_once './actions/aEvt_Evento_Participante.php';
    $evtPart = new aEvt_Evento_Participante();
    require_once ('./actions/aBsc_Participante.php');
    $partic = new aBsc_Participante();
    require_once ('./actions/aUsuario.php');
    $user = new aUsuario();
    require_once './config/geraSenha.php';
    $gerasenha = new geraSenha();
    require_once './actions/aEvt_Evento.php';
    $evento = new aEvt_Evento();
    //Set de Parâmetro para carregar valores.(Evento)
    $evento->setID_EVT($ID_Evento);
    $evento->load();
    //Fim do Set de Parâmetro para carregar valores. (Evento)
    //Função limpa CPF é aplicada para remover caracteres especiais.
    $CPF_Informado = $config->limpaCPF($_POST['COD_CPF']);
    //Função limpa CPF é aplicada para remover caracteres especiais.
    $email = $_POST['DSC_Email'];
//    $id_Participante = '';
//    if (isset($_COOKIE['ID_Participante'])) {
//        $id_Participante = $_COOKIE['ID_Participante'];
//    }
//    $idUnico = '';
//    if (isset($_COOKIE['ID_Usuario'])) {
//        $idUnico = $_COOKIE['ID_Usuario'];
//    }
    $isParticipanteNovo = TRUE;
//    if ($id_Participante == '') {
//        $isParticipanteNovo = TRUE;
//    } else {
//        $isParticipanteNovo = FALSE;
//    }
//    
//Verifica se Participante é Estrangeiro
//    if ($CPF_Informado == "") {
//        if (isset($_POST['Id_Estrangeiro'])) {
//            $Id_Estrangeiro = $_POST['Id_Estrangeiro'];
//        }
//        if ($partic->selectNotExistsId_Estrangeiro($Id_Estrangeiro) || $id_Participante != "") {
//            try {
//                if ($isParticipanteNovo) {
////Gera data incial e final para o cadastro de usuário
//                    $datainicial = date("d/m/Y");
//                    $datafim = date('d/m/Y', strtotime("+7 days"));
////Gera Senha Aleatória
//                    $senha = $gerasenha->geraSenha(6);
////Gera o grupo padrão para Participantes
//                    $grupo = 99;
////Gera e armazena ID Único Gerado.
//                    $idUnico = $config->idUnico();
//                    $user->setID_Usuario($idUnico);
//                    $user->setDSC_Login($Id_Estrangeiro);
//                    $user->setDSC_Senha($senha);
//                    $user->setDTM_Inicio($datainicial);
//                    $user->setDTM_Fim($datafim);
//                    $user->setID_SEG_Grupo($grupo);
//                    $user->insert();
////Insere participante
//                    $id_Participante = $config->idUnico();
//                }
//                $partic->setID_Participante($id_Participante);
//                $partic->setCOD_CPF($CPF_Informado);
//                $partic->setId_Estrangeiro($_POST['Id_Estrangeiro']);
//                $partic->setCOD_RG($_POST['COD_RG']);
//                $partic->setDSC_Nome($_POST['DSC_Nome']);
//                $partic->setNome_Cracha($_POST['Nome_Cracha']);
//                $partic->setDSC_Endereco($_POST['DSC_Endereco']);
//                $partic->setDSC_Bairro($_POST['DSC_Bairro']);
//                $partic->setDSC_Cidade($_POST['DSC_Cidade']);
//                $partic->setNUM_CEP($_POST['NUM_CEP']);
//                $partic->setNUM_Fone($_POST['NUM_Fone']);
//                $partic->setNUM_Celular($_POST['NUM_Celular']);
//                $partic->setNUM_FAX($_POST['NUM_FAX']);
//                $partic->setDSC_Profissao_Especialidade($_POST['DSC_Profissao_Especialidade']);
//                $partic->setDSC_Email($email);
//                $partic->setNUM_Registro($_POST['NUM_Registro']);
//                $partic->setCOD_Tipo_Estado($_POST['COD_Tipo_Estado']);
//                $partic->setID_BSC_Empresa($_POST['ID_BSC_Empresa']);
//                $partic->setID_BSC_Profissao($_POST['ID_BSC_Profissao']);
//                $partic->setID_Usuario($idUnico);
////Informa Código do Participante = Nro Atual do registro;
//                $Count = $partic->countPartic();
//                $partic->setCod_Participante($Count);
//                if ($isParticipanteNovo) {
//                    $partic->insert();
//                } else {
//                    $partic->update();
//                }
//                $FormaPagto->setCOD_Tipo_Forma_Pagamento($_POST['COD_Tipo_Forma_Pagamento']);
//                $FormaPagto->load();
//// Set a Condição de Pagto Informada pelo usuário
//                // 
//                $categoria->setID_Evento_Categoria($_POST['ID_Evento_Categoria']);
//                //
////Insere Evento_Participante
//                $evtPart->insertPartEvtId_Estrangeiro($ID_Evento, $id_Participante, $ID_Evento_Categoria, $_POST['COD_Tipo_Forma_Pagamento']);
//
//                $nroParcelas = $FormaPagto->getNro_Parcelas();
//                if ($nroParcelas == 0) {
//                    $nroParcelas = 1;
//                }
////Inscrever no curso
//                $Cursos->setID_Curso($_POST['ID_Curso']);
//                $Cursos->load();
//                require_once './actions/aEvt_Curso_Participante.php';
//                $CursosPartic = new aEvt_Curso_Participante();
//                if ($_POST['ID_Curso'] != NULL) {
//                    $CursosPartic->setID_EVT_Curso_Participante($config->idUnico());
//                    $CursosPartic->setDescricao($Cursos->getCurso());
//                    $CursosPartic->setID_Curso($Cursos->getID_Curso());
//                    $CursosPartic->setID_Participante($id_Participante);
//                    $CursosPartic->insert();
//                }
////Fim Bloco inscrever no curso
//                $vlrCurso = $Cursos->getValor_Curso();
//                $vlr_Evento = $evtPart->getVLR_Total();
//                $evtPart->setVLR_Total($vlr_Evento + $vlrCurso);
//                $evtPart->update();
//                //Insere Informações para gerar o Boleto 
//                $pagamento = new aEvt_Pagamento();
//                $pagamento->selectInnerId_Estrangeiro($ID_Evento, $Id_Estrangeiro);
//                $VlrTotalPag = $evtPart->getVLR_Total();
//                $pagamento->geraInfoPagamento($nroParcelas, $VlrTotalPag, $evento->getDT_Fim(True));
//
//                $ass = '';
//                $msg = '';
//                if ($isParticipanteNovo) {
//                    $ass = "Cadastro efetuado com sucesso!";
//                    $msg = 'Sua inscrição no evento ' . $evento->getCod_Evento() . '-' . $evento->getDSC_Nome() . ', será confirmada após pagamento do boleto.<br />Seus dados para acesso são <br />
//                            Usuário: ' . $Id_Estrangeiro . '<br />
//                            Senha: ' . $senha . " <br />
//                            Link: <a href='" . $_SERVER[HTTP_HOST] . "/SAdmin/Login.php" . "'>acesso acompanhamento</a>";
//                } else {
//                    $ass = "Cadastro efetuado com sucesso!";
//                    $msg = 'Sua inscrição no evento' + $evento->getCod_Evento() + '-' + $evento->getDSC_Nome() +
//                            ', será confirmada após pagamento do boleto.';
//                }
//                require_once './config/eMail.php';
//                $emailObj = new eMail();
//
//                $envio = $emailObj->enviarEMail($partic->getDSC_Email(), $partic->getDSC_Nome(), $ass, $msg);
//                $msgFeedMessage = 'Cadastro efetuado com sucesso.</br>Verifique seu e-mail.';
//                $FeedbackMessage->setMsg($msgFeedMessage);
//                header("Location: Index.php");
//                die();
//            } catch (Exception $e) {
//                $FeedbackMessage->setMsg("Desculpe! Ocorreu um erro inesperado!");
//                $FeedbackMessage->setType("error");
//                header("Location: Index.php");
//            }
//        } else {
//            $FeedbackMessage->setMsg("ID Estrangeiro já cadastrado para este Evento!");
//            $FeedbackMessage->setType("error");
//        }
//    }
//    else {
//validação do CPF
    if ($config->validaCPF($CPF_Informado)) {
//verifica se o CPF já foi cadastrado
        if ($partic->selectNotExistsCPF($CPF_Informado, $ID_Evento)) {
            try {
                if ($isParticipanteNovo) {
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
                    $user->setDSC_Login($CPF_Informado);
                    $user->setDSC_Senha($senha);
                    $user->setDTM_Inicio($datainicial);
                    $user->setDTM_Fim($datafim);
                    $user->setID_SEG_Grupo($grupo);
                    $user->insert();
//=====================================                        
//Gerar Novo ID_Participante quando é um novo usuário a ser cadastrado.
                    $id_Participante = $config->idUnico();
                }
//-----==================       Gerar Novo Participante         =====================================
                $partic->setID_Participante($id_Participante);
                if ($CPF_Informado != "") {
                    $partic->setCOD_CPF($CPF_Informado);
                } else {
                    $partic->setId_Estrangeiro($_POST['Id_Estrangeiro']);
                }
                $partic->setCOD_RG($_POST['COD_RG']);
                $partic->setDSC_Nome($_POST['DSC_Nome']);
                $partic->setNome_Cracha($_POST['Nome_Cracha']);
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
                //Captura o código do Participante = Nro Atual do registro;
                $Count = $partic->countPartic();
                $partic->setCod_Participante($Count);
                if ($isParticipanteNovo) {
                    $partic->insert();
                } else {
                    $partic->update();
                }
                // Set a Condição de Pagto Informada pelo usuário
                $FormaPagto->setCOD_Tipo_Forma_Pagamento($_POST['COD_Tipo_Forma_Pagamento']);
                $FormaPagto->load();
                // Set a Condição de Pagto Informada pelo usuário
                $categoria->setID_Evento_Categoria($_POST['ID_Evento_Categoria']);
                //Insere Evento_Participante
                $evtPart->insertPartEvt($ID_Evento, $id_Participante, $_POST['ID_Evento_Categoria'], $_POST['COD_Tipo_Forma_Pagamento']);
                $nroParcelas = $FormaPagto->getNro_Parcelas();
                if ($nroParcelas == 0) {
                    $nroParcelas = 1;
                }
                //Inscrever no curso
                $Cursos->setID_Curso($ID_Curso);
                $Cursos->load();
                require_once './actions/aEvt_Curso_Participante.php';
                $CursosPartic = new aEvt_Curso_Participante();
                if ($ID_Curso != NULL) {
                    $CursosPartic->setID_EVT_Curso_Participante($config->idUnico());
                    $CursosPartic->setDescricao($Cursos->getCurso());
                    $CursosPartic->setID_Curso($Cursos->getID_Curso());
                    $CursosPartic->setID_Participante($id_Participante);
                    $CursosPartic->insert();
                }
//Fim Bloco Inscrever no curso
                $vlrCurso = $Cursos->getValor_Curso();
                $vlr_Evento = $evtPart->getVLR_Total();
                $evtPart->setVLR_Total($vlr_Evento + $vlrCurso);
                $evtPart->update();
                //Inserir Informações para gerar o Boleto 
                $pagamento = new aEvt_Pagamento();
                $pagamento->selectInner($ID_Evento, $CPF_Informado);
                $VlrTotalPag = $evtPart->getVLR_Total();
                $pagamento->geraInfoPagamento($nroParcelas, $VlrTotalPag, $evento->getDT_Fim(True));
                $ass = '';
                $msg = '';
//Envia email para Participante            
                if ($isParticipanteNovo) {
                    $ass = "Cadastro efetuado com sucesso!";

                    $msg = 'Sua inscrição no evento ' . $evento->getCod_Evento() . '-' . $evento->getDSC_Nome() . ', será confirmada após pagamento do boleto.<br />Seus dados para acesso são <br />
                            Usuário: ' . $CPF_Informado . '<br />
                            Senha: ' . $senha . " <br />
                            Link: <a href='" . $_SERVER[HTTP_HOST] . "/SAdmin/Login.php" . "'>acesso acompanhamento</a>";
                } else {
                    $ass = "Cadastro efetuado com sucesso!";
                    $msg = 'Sua inscrição no evento' + $evento->getCod_Evento() + '-' + $evento->getDSC_Nome() +
                            ', será confirmada após pagamento do boleto.';
                }
                require_once './config/eMail.php';
                $emailObj = new eMail();
                $envio = $emailObj->enviarEMail($partic->getDSC_Email(), $partic->getDSC_Nome(), $ass, $msg);
                $msgFeedMessage = 'Cadastro efetuado com sucesso.</br>Verifique seu e-mail.';
                $FeedbackMessage->setMsg($msgFeedMessage);
                header("Location: Index.php");
                die();
//Fim do bloco que envia email para Participante
            } catch (Exception $e) {
                $FeedbackMessage->setMsg("Desculpe! Ocorreu um erro inesperado!");
                $FeedbackMessage->setType("error");
                header("Location: Index.php");
            }
        } else {
            $FeedbackMessage->setMsg("CPF já cadastrado para este Evento!");
            $FeedbackMessage->setType("error");
            header("Location: Login.php");
        }
    } else {
        $FeedbackMessage->setMsg("CPF inválido!");
        $FeedbackMessage->setType("error");
    }
}
//}

$evento->setID_EVT($ID_Evento);
$evento->load();

//$Cursos->setID_EVT($ID_Evento);

$smarty->assign("DSC_Evento", $evento->getDSC_Nome());
$smarty->assign("listEmp", $emp->select());
$smarty->assign("listProf", $prof->select());
$smarty->assign("listEstado", $estado->select());
$smarty->assign("listFPagto", $FormaPagto->select());
$smarty->assign("listCategoria", $categoria->selectCategoriasDoEvento($ID_Evento));

$smarty->assign("Titulo", " - Inserir Participante.");
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->display('./View/ParticipanteInsert_Curso.html');
