    <!DOCTYPE html>
<?php
function __autoload($class_name){
    require_once '../actions/' . $class_name . '.php';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Grupo de Usuarios</title>
        <link href="css/StyleForm.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        $grupo = new aGrupoUsuario();
        
        if (isset($_POST['Cadastrar'])) {
        $ID_Grupo = uniqid();
        $DSC_Nome = $_POST['nome'];
        $DSC_Descricao = $_POST['descricao'];
        
        $grupo->setID_Grupo($ID_Grupo);
        $grupo->setDSC_Nome($DSC_Nome);
        $grupo->setDSC_Descricao($DSC_Descricao);
        
        #Insert
        if($usuario->insert()){
            echo 'Inserido com sucesso!';
        }
}
        ?>
    <div class="box">
        <h1>Grupo de Usuários</h1>
        <form id="Cadastrar" form method="post" action="">
            <fieldset>
                <label>
                <span>Nome:</span>
                <input name="nome" class="input_text" type="text">
                </label>
                <label>
                <span>Descrição:</span>
                <input name="senha" class="input_text" type="password">
                </label>
                <button><input type="submit" name="Cadastrar" value="Cadastrar" class="button"></button>
            </fieldset>
        </form>
    </div>   
    </body>
</html>
