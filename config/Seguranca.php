<?php

class Seguranca {

    public function setLogar($ID_Usuario, $DSC_Login) {
        $_SESSION['ID_Usuario'] = $ID_Usuario;
        $_SESSION['DSC_Login'] = $DSC_Login;
    }

    public function getID_Usuario_Logado() {
        return $_SESSION['ID_Usuario'];
    }

    public function getDSC_Login_Logado() {
        return $_SESSION['DSC_Login'];
    }
    
    public function isLogado(){
        return isset($_SESSION['ID_Usuario']);
    }

}
