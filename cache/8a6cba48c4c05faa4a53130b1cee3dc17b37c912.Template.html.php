<?php /*%%SmartyHeaderCode:2036455e507caa6da64-29474764%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a6cba48c4c05faa4a53130b1cee3dc17b37c912' => 
    array (
      0 => '.\\ADM\\Template.html',
      1 => 1441072992,
      2 => 'file',
    ),
    '78719ea17e6a9d042d5059a8fdd263f02826abee' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SAdmin\\ADM\\Header_Nav.html',
      1 => 1441071630,
      2 => 'file',
    ),
    '6f607cc43ed9fd3cef2b7939e7d072bf8f05d51e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SAdmin\\ADM\\Header_Logout.html',
      1 => 1441071766,
      2 => 'file',
    ),
    '3c5781104cbace7e72e6c387b610074adbd1e61a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SAdmin\\ADM\\menu_Lateral.html',
      1 => 1441071903,
      2 => 'file',
    ),
    '0aa10ee5f353fea98883e65f3fcf66d166544725' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SAdmin\\ADM\\page_Wrapper.html',
      1 => 1441072905,
      2 => 'file',
    ),
    '1947f05b154a1bb7f75134826c3e547224df0d12' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SAdmin\\ADM\\panel-body.html',
      1 => 1441073021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2036455e507caa6da64-29474764',
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e507caaed3b5_76503363',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e507caaed3b5_76503363')) {function content_55e507caaed3b5_76503363($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> Administração - Siga Web </title>

        <!-- Bootstrap Core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="./css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="./css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="./font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

                <div class="navbar-header">
    <!--Botão Home Administração-->
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index_admin.php">Siga Web</a>

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
            <a href="index_admin.php"><i class="fa fa-fw fa-dashboard"></i> Administração </a>
        </li>
        <li>
            <a href="usuario.php"><i class="fa fa-fw fa-bar-chart-o"></i> Usuários<i class="fa fa-fw fa-caret-down"></i></a>
        </li>
        <li>
            <a href="usuario.php"><i class="fa fa-fw fa-bar-chart-o"></i> Usuários<i class="fa fa-fw fa-caret-down"></i></a>
        </li>
        <li>
            <a href="usuario.php"><i class="fa fa-fw fa-bar-chart-o"></i> Usuários<i class="fa fa-fw fa-caret-down"></i></a>
        </li>
        <li>
            <a href="usuario.php"><i class="fa fa-fw fa-bar-chart-o"></i> Usuários<i class="fa fa-fw fa-caret-down"></i></a>
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
                            Administração - Siga Web
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Administração - Siga Web
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
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div>New Comments!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="usuario.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
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
                                        <div class="huge">12</div>
                                        <div>New Tasks!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
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
                                        <div class="huge">124</div>
                                        <div>New Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">13</div>
                                        <div>Support Tickets!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->

                <div class="row">
                    <!DOCTYPE html>
<!--Quadros de Ação -->
<!-- /.row -->
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
asdasd
            </div>
        </div>
    </div>
                </div>
                
            </div>

        </div>

        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Morris Charts JavaScript -->
        <script src="js/plugins/morris/raphael.min.js"></script>
        <script src="js/plugins/morris/morris.min.js"></script>
        <script src="js/plugins/morris/morris-data.js"></script>
    </body>
</html>
<?php }} ?>