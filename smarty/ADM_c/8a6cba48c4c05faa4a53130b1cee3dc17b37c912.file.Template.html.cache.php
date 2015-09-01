<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-01 04:44:41
         compiled from ".\ADM\Template.html" */ ?>
<?php /*%%SmartyHeaderCode:2036455e507caa6da64-29474764%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a6cba48c4c05faa4a53130b1cee3dc17b37c912' => 
    array (
      0 => '.\\ADM\\Template.html',
      1 => 1441075477,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2036455e507caa6da64-29474764',
  'function' => 
  array (
  ),
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e507caac3b82_51455697',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e507caac3b82_51455697')) {function content_55e507caac3b82_51455697($_smarty_tpl) {?><!DOCTYPE html>
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

                
                
                <?php echo $_smarty_tpl->getSubTemplate ("./Template/menus.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

            </nav>

            <div id="page-wrapper">
                <?php echo $_smarty_tpl->getSubTemplate ("./Template/page_Wrapper.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

                <div class="row">
                    <?php echo $_smarty_tpl->getSubTemplate ("./Template/panel-body.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

                </div>
                
            </div>

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
