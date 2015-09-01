<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-31 23:03:59
         compiled from "C:\xampp\htdocs\SAdmin\ADM\Navigation.html" */ ?>
<?php /*%%SmartyHeaderCode:1571255e4bd97827299-32681894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3e4d145698cbdff5c711eb68d4b68dc94c6e7fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SAdmin\\ADM\\Navigation.html',
      1 => 1441055038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1571255e4bd97827299-32681894',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e4bd9782d955_53553965',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e4bd9782d955_53553965')) {function content_55e4bd9782d955_53553965($_smarty_tpl) {?><body>

<div id="wrapper">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <!-- Brand and toggle get grouped for better mobile display -->
        <?php echo $_smarty_tpl->getSubTemplate ("./Header_Nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>
     
        <!--    
            <div class="navbar-header">
        <!--Botão Home Administração
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index_admin.php">Siga Web</a>

    </div>
        -->
        <!--Desabilitado Temporáriamente (Sem Função) -->
        <!--Top Menu Items -->
        <?php echo $_smarty_tpl->getSubTemplate ("./menu_Top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>
    
        <!--
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
        -->

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php echo $_smarty_tpl->getSubTemplate ("./menu_Lateral.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

        <!--MENU HTML
        
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
        
        -->
        <!-- /.navbar-collapse -->
    </nav>
</div>
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
</body><?php }} ?>
