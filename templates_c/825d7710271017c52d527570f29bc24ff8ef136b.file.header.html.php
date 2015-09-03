<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-03 22:33:13
         compiled from "C:\xampp\htdocs\SAdmin\View\Template\header.html" */ ?>
<?php /*%%SmartyHeaderCode:1754955e8a927580b78-47002233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '825d7710271017c52d527570f29bc24ff8ef136b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SAdmin\\View\\Template\\header.html',
      1 => 1441312390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1754955e8a927580b78-47002233',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e8a927589f42_13178013',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e8a927589f42_13178013')) {function content_55e8a927589f42_13178013($_smarty_tpl) {?><!DOCTYPE html>
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
        <div id="wrapper">
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
                <!--Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active">
                            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>Administração </a>
                        </li>
                        <li>
                            <a href="UsuarioList.php"><i class="fa fa-fw fa-bar-chart-o"></i>Usuários<i class="fa fa-fw fa-caret-down"></i></a>
                        </li>
                        <li>
                            <a href="GrupoList.php"><i class="fa fa-fw fa-bar-chart-o"></i>Grupo de Usuários<i class="fa fa-fw fa-caret-down"></i></a>
                        </li>
                        <li>
                            <a href="EventoList.php"><i class="fa fa-fw fa-bar-chart-o"></i>Evento<i class="fa fa-fw fa-caret-down"></i></a>
                        </li>
                        <li>
                            <a href="EmpresaList.php"><i class="fa fa-fw fa-bar-chart-o"></i>Empresa<i class="fa fa-fw fa-caret-down"></i></a>
                        </li>
                        <li>
                            <a href="ParticipanteList.php"><i class="fa fa-fw fa-bar-chart-o"></i>Participante<i class="fa fa-fw fa-caret-down"></i></a>
                        </li>
                        <li>
                            <a href="ProfissaoList.php"><i class="fa fa-fw fa-bar-chart-o"></i>Profissão<i class="fa fa-fw fa-caret-down"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Usuários - Siga Web
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Usuários - Siga Web
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body"><?php }} ?>
