<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-03 22:29:48
         compiled from "index.php" */ ?>
<?php /*%%SmartyHeaderCode:3187255e8adbcad2947-05905812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16b0580359ab000c92207b46899b6528c36680b3' => 
    array (
      0 => 'index.php',
      1 => 1441312185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3187255e8adbcad2947-05905812',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e8adbcb0a568_33355529',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e8adbcb0a568_33355529')) {function content_55e8adbcb0a568_33355529($_smarty_tpl) {?><?php echo '<?php'; ?>

include 'smarty.php';
session_start();
require_once './actions/aUsuario.php';
$usuario = new aUsuario();

$msg = "";

if (isset($_POST['Login'])) {
    
    $Username = trim($_POST['Username']);
    $Password = trim($_POST['Password']);
    
    if ($usuario->login($Username, $Password)) {
        $_SESSION['Username'] = $Username;
        $_SESSION['Password'] = $Password;
        
        $smarty->display('./View/Administracao.html');
    } else {
        unset($_SESSION['Username']);
        unset($_SESSION['Password']);
        $msg = "Usuário ou Senha incorretos!";
        $smarty->assign("msglogado", $msg);
        
        $smarty->display('index.php');
        session_destroy();
    }
} else {
        $msg = "Bem Vindo, Visitante!";
        $smarty->assign("msglogado", $msg);
        $smarty->display('./View/login.html');
}<?php }} ?>
