<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-03 21:48:13
         compiled from ".\View\ParticipanteInsert.html" */ ?>
<?php /*%%SmartyHeaderCode:1283155e891451151c0-27187152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e82dd0e4fa747146317703a89132f4847f84a1e4' => 
    array (
      0 => '.\\View\\ParticipanteInsert.html',
      1 => 1441309681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1283155e891451151c0-27187152',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e89145270ca2_69392161',
  'variables' => 
  array (
    'listEmp' => 0,
    'row' => 0,
    'listProf' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e89145270ca2_69392161')) {function content_55e89145270ca2_69392161($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> Administração - Siga Web </title>
        <!-- Bootstrap Core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="./css/sb-admin.css" rel="stylesheet">
        <!-- Morris Charts CSS 
        <link href="./css/plugins/morris.css" rel="stylesheet">
        -->
        <!-- Custom Fonts -->
        <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="./DataTables-1.10.9/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

        <!-- fancybox 1.3.4 -->
        <?php echo '<script'; ?>
 src="./View/fancybox/jquery-1.4.3.min.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./View/fancybox/jquery.fancybox-1.3.4.pack.js" type="text/javascript"><?php echo '</script'; ?>
>
        <link href="./View/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css" media="screen"/>
        <!-- Arquivo para Abrir fancybox Próprio-->
        <?php echo '<script'; ?>
 src="./View/general.js" type="text/javascript"><?php echo '</script'; ?>
>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- jQuery -->
        <?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
>
        <!-- Bootstrap Core JavaScript -->
        <?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <!-- Morris Charts JavaScript 
        <?php echo '<script'; ?>
 src="js/plugins/morris/raphael.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="js/plugins/morris/morris.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="js/plugins/morris/morris-data.js"><?php echo '</script'; ?>
>
        -->
        <!-- Custom JQuery -->
        <?php echo '<script'; ?>
 src="./DataTables-1.10.9/js/jquery.dataTables.min.js" type="text/javascript"><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
>
            $(document).ready(function () {

                function limpa_formulário_cep() {
                    // Limpa valores do formulário de cep.
                    $("#DSC_Endereco").val("");
                    $("#DSC_Bairro").val("");
                    $("#DSC_Cidade").val("");
                    $("#uf").val("");
                    $("#ibge").val("");
                }

                //Quando o campo cep perde o foco.
                $("#NUM_CEP").blur(function () {

                    //Nova variável "cep" somente com dígitos.
                    var cep = $(this).val().replace(/\D/g, '');

                    //Verifica se campo cep possui valor informado.
                    if (cep != "") {

                        //Expressão regular para validar o CEP.
                        var validacep = /[0-9]<?php echo 8;?>
/;

                        //Valida o formato do CEP.
                        if (validacep.test(cep)) {

                            //Preenche os campos com "..." enquanto consulta webservice.
                            $("#DSC_Endereco").val("...")
                            $("#DSC_Bairro").val("...")
                            $("#DSC_Cidade").val("...")
                            $("#uf").val("...")
                            $("#ibge").val("...")

                            //Consulta o webservice viacep.com.br/
                            $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                                if (!("erro" in dados)) {
                                    //Atualiza os campos com os valores da consulta.
                                    $("#DSC_Endereco").val(dados.logradouro);
                                    $("#DSC_Bairro").val(dados.bairro);
                                    $("#DSC_Cidade").val(dados.localidade);
                                    $("#uf").val(dados.uf);
                                    $("#ibge").val(dados.ibge);
                                } //end if.
                                else {
                                    //CEP pesquisado não foi encontrado.
                                    limpa_formulário_cep();
                                    alert("CEP não encontrado.");
                                }
                            });
                        } //end if.
                        else {
                            //cep é inválido.
                            limpa_formulário_cep();
                            alert("Formato de CEP inválido.");
                        }
                    } //end if.
                    else {
                        //cep sem valor, limpa formulário.
                        limpa_formulário_cep();
                    }
                });
            });
        <?php echo '</script'; ?>
>


        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
        <![endif]-->
    </head>
    <body>
        <div >
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!--Botão Home Administração-->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Siga Web</a>
                </div>






            </nav>


            <div id="page-wrapper">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Usuários - Siga Web
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form id="Cadastrar" form method="post">
                                    <div class="form-group col-lg-12 row">
                                        <label >Nome</label>
                                        <input type="text" class="form-control" name="DSC_Nome" placeholder="Nome">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>CPF</label>
                                            <input type="text" class="form-control" name="COD_CPF" placeholder="CPF">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label >RG</label>
                                            <input type="text" class="form-control"  name="COD_RG" placeholder="RG">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3 row">
                                        <label >CEP</label>
                                        <input type="text" id="NUM_CEP" class="form-control" name="NUM_CEP" placeholder="CEP">
                                    </div>
                                    <div class="form-group col-lg-12 row">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" id="DSC_Endereco" name="DSC_Endereco" placeholder="Endereço ">
                                    </div>
                                    <div class="form-group">
                                        <label >Bairro</label>
                                        <input type="text" class="form-control" id="DSC_Bairro" name="DSC_Bairro" placeholder="Bairro">
                                    </div>

                                    <div class="form-group">
                                        <label >Cidade</label>
                                        <input type="text" class="form-control" id="DSC_Cidade" name="DSC_Cidade" placeholder="Cidade">
                                    </div>
                                    <div class="form-group">
                                        <label >Presidente Promotora</label>
                                        <input type="text" class="form-control" name="DSC_Presidente_Promotora" placeholder="Presidente Promotora">
                                    </div>
                                    <div class="form-group">
                                        <label >Telefone Residencial</label>
                                        <input type="text" class="form-control" name="NUM_Fone" placeholder="Telefone">
                                    </div>
                                    <div class="form-group">
                                        <label >Celular</label>
                                        <input type="text" class="form-control" name="NUM_Celular" placeholder="Celular">
                                    </div>
                                    <div class="form-group">
                                        <label >Fax</label>
                                        <input type="text" class="form-control" name="NUM_FAX" placeholder="Fax">
                                    </div>
                                    <div class="form-group">
                                        <label >Nª Fax</label>
                                        <input type="text" class="form-control" name="NUM_FAX_Promotora" placeholder="Nº Fax Promotora">
                                    </div>
                                    <div class="form-group">
                                        <label >Profissão</label>
                                        <input type="text" class="form-control" name="DSC_Profissao_Especialidade" placeholder="Profissão">
                                    </div>
                                    <div class="form-group">
                                        <label >Email</label>
                                        <input type="email" class="form-control" name="DSC_Email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Nº Registro</label>
                                        <input type="text" class="form-control" name="NUM_Registro" placeholder="Número Registro">
                                    </div>
                                    <div class="form-group">
                                        <label>Tipo Estado</label>
                                        <input type="text" class="form-control" name="COD_Tipo_Estado" placeholder="Tipo Estado">
                                    </div>
                                    <div class="form-group">
                                        <label>Empresa</label>
                                        <select name="ID_BSC_Empresa">
                                            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listEmp']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ID_Empresa'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['DSC_RazaoSocial'];?>
</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Profissão</label>
                                        <select name="ID_BSC_Profissao">
                                            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listProf']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ID_Profissao'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['DSC_Nome'];?>
</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn" name="Cadastrar" value="Cadastrar">Cadastrar</button>    
                                </form>

                                <!DOCTYPE html>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html><?php }} ?>
