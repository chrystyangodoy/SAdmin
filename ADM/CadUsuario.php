    <!DOCTYPE html>
<?php
function __autoload($class_name){
    require_once '../actions/' . $class_name . '.php';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Usuários</title>
        <link href="css/StyleForm.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        $usuario = new aUsuarios();
        $grupo = new aGrupoUsuario();
        
        $combo[]=$grupo->select();
        
        if (isset($_POST['Cadastrar'])) {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $dataini = $_POST['dataini'];
        $datafim = $_POST['datafim'];
        $grupo= $_POST['grupo'];
        
        $usuario->setLogin($login);
        $usuario->setSenha($senha);
        $usuario->setDataIni($dataini);
        $usuario->setDatafim($datafim);
        $usuario->setGrupo($grupo);
        
        #Insert
        if($usuario->insert()){
            echo 'Inserido com sucesso!';
        }
}
        ?>
    <div class="box">
        <h1>Cadastro de Usuários</h1>
        <form id="Cadastrar" form method="post" action="">
            <fieldset>
                <label>
                <span>Login:</span>
                <input name="login" class="input_text" type="text">
                </label>
                <label>
                <span>Senha:</span>
                <input name="senha" class="input_text" type="password">
                </label>
                <label>
                <span>Data Inicial:</span>
                <input name="dataini" class="input_text" type="text">
                </label>
                <label>
                <span>Data Final:</span>
                <input  name="datafim" class="input_text" type="text">
                </label>
                <label>
                <span>Grupo:</span>
                <select name="cbx_grupo"><option selected="selected"></option>
                    <?php
                    while($row=$combo[])
                    {
                    $id=$row['idmun'];
                    $data=$row['munname'];
                    echo '<option value="'.$id.'">'.$data.'</option>';
                     }
                ?>  
                </select>
                <input  name="grupo" value="1" class="input_text" type="text">
                </label>
                <button><input type="submit" name="Cadastrar" value="Cadastrar" class="button"></button>
            </fieldset>
        </form>
    </div>   
    </body>
</html>
