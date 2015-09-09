<?php

class FeedbackMessage {

    private $msg = "";
    private $type = "";

    function __construct() {
        if (isset($_SESSION['MSG'])) {
            $this->msg = $_SESSION['MSG'];
            $_SESSION['MSG'] = "";
        } else {
            $this->msg = "";
            $_SESSION['MSG'] = "";    
        }
        if (isset($_SESSION['TYPE'])) {
            $this->type = $_SESSION['TYPE'];
            $_SESSION['TYPE'] = "";
        } else {
            $this->type = ""; 
            $_SESSION['TYPE'] = "";
            
        }
    }

    public function getMsg() {
        return $this->msg;
    }

    public function getType() {
        if ($this->type == "") {
            return "success";
        } else {
            return $this->type;
        }
    }

    public function setMsg($msg) {
        $this->msg = $msg;
        $_SESSION['MSG'] = $msg;
    }

    public function setType($type) {
        $this->type = $type;
        $_SESSION['TYPE'] = $type;
    }

}
