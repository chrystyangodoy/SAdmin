<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-27 15:25:14
         compiled from ".\SWeb_Login\index.php" */ ?>
<?php /*%%SmartyHeaderCode:1959255df0fba20fb43-92049229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43d78c0bf45984025981cea591dd5841bb0daf7c' => 
    array (
      0 => '.\\SWeb_Login\\index.php',
      1 => 1440681899,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1959255df0fba20fb43-92049229',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55df0fba243a98_17208151',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55df0fba243a98_17208151')) {function content_55df0fba243a98_17208151($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php echo '<?php'; ?>

function __autoload($class_name){
    require_once 'Classes/' . $class_name . '.php';
}
<?php echo '?>'; ?>

<html>
<head>

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>

<!--STYLESHEETS-->
<link href="SWEB_Login/css/style.css" rel="stylesheet" type="text/css" />

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
<?php echo '<?php'; ?>

$usuario = new Usuarios();
        
        if (isset($_POST['Login'])) {
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
        
        $usuario->setLogin($Username);
        $usuario->setSenha($Password);
        if($usuario->login($Username, $Password)){
            header('Location: CadUsuario.php');
            echo 'Login Effetuado com sucesso!';
        }else {
            echo 'Usuário ou Senha incorretos!';
        }
        
    }
<?php echo '?>'; ?>

    
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
