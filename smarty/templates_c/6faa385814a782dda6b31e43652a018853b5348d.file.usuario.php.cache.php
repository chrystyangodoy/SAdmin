<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-29 17:47:15
         compiled from ".\templateAdmin\usuario.php" */ ?>
<?php /*%%SmartyHeaderCode:3132255e148a25b4057-71512324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6faa385814a782dda6b31e43652a018853b5348d' => 
    array (
      0 => '.\\templateAdmin\\usuario.php',
      1 => 1440863233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3132255e148a25b4057-71512324',
  'function' => 
  array (
  ),
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e148a25efcc8_15237758',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e148a25efcc8_15237758')) {function content_55e148a25efcc8_15237758($_smarty_tpl) {?><!DOCTYPE html>
<html lang="br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> Usuários </title>

    <!-- Bootstrap Core CSS -->
    <link href="./TemplateAdmin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./TemplateAdmin/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="./TemplateAdmin/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./TemplateAdmin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
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

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <!--Botão Home Administração-->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Administração - Siga Web</a>

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
                            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Administração </a>
                        </li>
                        <li>
                            <a href="usuario.php"><i class="fa fa-fw fa-bar-chart-o"></i> Usuários</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Painel de Usuários
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class=""></i> Painel de Usuários
                                </li>
                            </ol>
                        </div>
                    </div>

                    <!-- /.row -->
                    <!-- Quadros de Ação -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-anchor fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div>Lista de Usuários!</div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="panel-footer">
                                         <form name='formListUsuario' action="_Self" method='get'> <a href="#" type="submit" name='listar' value='listar' ></form> 
                                        <span class="pull-left">Exibir Lista</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div>Cadastro de Usuários</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="TemplateAdmin/view/CadUsuario.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Cadastro de Usuários</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <!--<div class="huge">124</div>-->
                                            <div>Editar Usuários</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">Editar</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--Quadros de Ação -->
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="box">
                                        <?php echo '<?php'; ?>
 echo 'kasdlkansdlkn' <?php echo '?>'; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /#page-wrapper -->
            </div>
            <!-- /#wrapper -->

            <!-- jQuery -->
            <?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
>

            <!-- Bootstrap Core JavaScript -->
            <?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>

            <!-- Morris Charts JavaScript -->
            <?php echo '<script'; ?>
 src="js/plugins/morris/raphael.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="js/plugins/morris/morris.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="js/plugins/morris/morris-data.js"><?php echo '</script'; ?>
>

    </body>

</html>

<?php }} ?>
