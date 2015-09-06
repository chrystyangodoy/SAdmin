<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of eMail
 *
 * @author Chrystyan Godoy <F1r3Black0ut>
 */
class eMail {

    public function email($remetente,$destinatario, $assunto, $mensagem) {

        // O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
        // O return-path deve ser ser o mesmo e-mail do remetente.
        $headers = "MIME-Version: 1.1\r\n";
        $headers .= "X-Priority: 3\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "From: ".$remetente."\r\n"; // remetente
        $headers .= "Return-Path: ".$remetente."\r\n"; // return-path
        $envio = mail($destinatario, $assunto, $mensagem, $headers);
        if ($envio){
            echo "Mensagem enviada com sucesso";
        }
        else{
            echo "A mensagem não pode ser enviada";
        }
            
    }

}
