<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-03 19:24:57
         compiled from ".\View\login.html" */ ?>
<?php /*%%SmartyHeaderCode:1339355e881feec79f9-92660438%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4179b1ae9e116c67ea3ba6595c91eb263384381c' => 
    array (
      0 => '.\\View\\login.html',
      1 => 1441301096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1339355e881feec79f9-92660438',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e881fef0dd37_10676405',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e881fef0dd37_10676405')) {function content_55e881fef0dd37_10676405($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
