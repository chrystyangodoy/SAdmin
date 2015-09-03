<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-03 19:41:43
         compiled from ".\View\login.html" */ ?>
<?php /*%%SmartyHeaderCode:1301055e886577db710-77240762%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5026a0b959bed40bdd8dc71e9c0343a3219c6331' => 
    array (
      0 => '.\\View\\login.html',
      1 => 1441301458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1301055e886577db710-77240762',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e88657b84ff8_23808252',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e88657b84ff8_23808252')) {function content_55e88657b84ff8_23808252($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
 
<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<!--STYLESHEETS-->
<link href="./css/styleLogin.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<?php echo '<script'; ?>
 type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"><?php echo '</script'; ?>
>
<!--Slider-in icons-->
<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
<?php echo '</script'; ?>
>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="Login" class="login-form" action="" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1>SIGA-WEB Login</h1>
    <!--END TITLE-->
    <!--DESCRIPTION-->
    <span>Entre com seu nome de usuário e senha.</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><input name="Username" type="text" class="input username" value="Username" onfocus="this.value=''" /><!--END USERNAME-->
    <!--PASSWORD--><input name="Password" type="password" class="input password" value="Password" onfocus="this.value=''" /><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="Login" value="Login" class="button"  /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><!--END REGISTER BUTTON-->
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html><?php }} ?>
