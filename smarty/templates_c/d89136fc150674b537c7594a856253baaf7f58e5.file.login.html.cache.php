<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-29 07:22:01
         compiled from ".\template\login.html" */ ?>
<?php /*%%SmartyHeaderCode:1223255e14030be98e1-52515071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd89136fc150674b537c7594a856253baaf7f58e5' => 
    array (
      0 => '.\\template\\login.html',
      1 => 1440825718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1223255e14030be98e1-52515071',
  'function' => 
  array (
  ),
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e14030c25d47_64136182',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e14030c25d47_64136182')) {function content_55e14030c25d47_64136182($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
 
<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>

<!--STYLESHEETS-->
<link href="./template/css/styleN.css" rel="stylesheet" type="text/css" />

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
<form name="login-form" class="login-form" action="actions/autLogin.php" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE-->
    <h1>SIGA-WEB Login</h1>
    <!--END TITLE-->
    <!--DESCRIPTION--><span>Entre com seu nome de usuário e senha.</span><!--END DESCRIPTION-->
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
