<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of geraSenha
 *
 * @author Chrystyan Godoy <F1r3Black0ut>
 * 
 * @return string da Senha Gerada.
 */
class geraSenha {

    public function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false) {

        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        $retorno = '';
        $caracteres = '';

        $caracteres .= $lmin;
        if ($maiusculas) {
            $caracteres .= $lmai;
        }

        if ($numeros) {
            $caracteres .= $num;
        }

        if ($simbolos) {
            $caracteres .= $simb;
        }

        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        }
        return $retorno;
    }

}
