<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-27 14:29:02
         compiled from ".\template\login\index.html" */ ?>
<?php /*%%SmartyHeaderCode:214455df028e83d790-50407725%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b5d23fbb285c422f08eb04427173a2467eb99ae' => 
    array (
      0 => '.\\template\\login\\index.html',
      1 => 1425585459,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214455df028e83d790-50407725',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55df028e896265_29746932',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55df028e896265_29746932')) {function content_55df028e896265_29746932($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>WBAWS - Login</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="template/login/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<?php echo '<script'; ?>
 src="//html5shim.googlecode.com/svn/trunk/html5.js"><?php echo '</script'; ?>
>
		<![endif]-->
		<link href="template/login/css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Senha">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Entrar</button>
              <span class="pull-right"><a href="#">Registrar</a></span><span><a href="#">Necessita de Ajuda?</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<?php echo '<script'; ?>
 src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="template/login/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	</body>
</html><?php }} ?>
