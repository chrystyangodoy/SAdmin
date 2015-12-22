<?php

mb_internal_encoding("UTF-8"); 
mb_http_output( "iso-8859-1" );  
ob_start("mb_output_handler");   
header("Content-Type: text/html; charset=ISO-8859-1",true);

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

    //private $smtp = 'smtp.cs-consoft.com.br';
    private $smtp = 'smtp.atualpromocoes.com.br';

    public function sendEmail($remetente, $destinatario, $assunto, $mensagem)
    {

        // O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
        // O return-path deve ser ser o mesmo e-mail do remetente.
        $headers = "MIME-Version: 1.1\r\n";
        $headers .= "X-Priority: 3\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "From: " . $remetente . "\r\n"; // remetente
        $headers .= "Return-Path: " . $remetente . "\r\n"; // return-path

        if (mail($destinatario, $assunto, $mensagem, $headers))
        {
            echo "Mensagem enviada com sucesso";
            return true;
        }
        else
        {
            echo "A mensagem não pode ser enviada";
            return false;
        }
        return false;
    }

    public function enviarEMail($detinatario, $nome, $assunto, $mensagem)
    {
        header('Content-Type: text/html; charset=utf-8');
        // Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
        require_once './phpMailer/class.phpmailer.php';
        require_once './phpMailer/PHPMailerAutoload.php';
        
        require_once './actions/aConfig_Email.php';
        //$Config_Email = new aConfig_Email();
        //$Config_Email->loadAtivo();
        // Inicia a classe PHPMailer
        $mail = new PHPMailer();
        // ativa o envio de e-mails em HTML, se false, desativa.
        $mail->isMail();
        // Define os dados do servidor e tipo de conexão
        $mail->IsSMTP(); // Define que a mensagem será SMTP
//        $mail->SMTPDebug = 1;
        $mail->Port = 587;    
        //$mail->Port = $Config_Email->getport();
        $mail->Host = $this->smtp; // Endereço do servidor SMTP
        //$mail->Host =$Config_Email->getsmtp();
        $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
        //$mail->Username = $Config_Email->getuserName();
        //$mail->Password =$Config_Email->getPassword();
        //$mail->FromName = 'Administração'; // Seu nome
        //$mail->From = $Config_Email->getuserName();
        
        //Define o remetente
        $mail->Username = 'adm_sigaweb@atualpromocoes.com.br'; // Usuário do servidor SMTP     
        $mail->Password = 'adm1234adm'; // Senha do servidor SMTP
        $mail->From = 'adm_sigaweb@atualpromocoes.com.br'; // Seu e-mail
        $mail->FromName = 'Administração'; // Seu nome
        // Define os destinatário(s)        
        $mail->AddAddress($detinatario, $nome);
        //$mail->AddAddress('ciclano@site.net');
        //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
        //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
        // Define os dados técnicos da Mensagem
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
        $mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
        // Define a mensagem (Texto e Assunto)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        //$assunto  = $Config_Email->getassunto();
        //$mensagem =$Config_Email->getmensagem();
        $mail->Subject = $assunto; // Assunto da mensagem
        $mail->Body = $mensagem;
        $mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";
        // Define os anexos (opcional)
        //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
        // Envia o e-mail
        if ($mail->send())
        {
            echo "E-mail enviado com sucesso!";
            // Limpa os destinatários e os anexos
            $mail->ClearAllRecipients();
            $mail->ClearAttachments();
        }
        else
        {
            echo "<b>Não foi possível enviar o e-mail.</b>";
            echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
            // Limpa os destinatários e os anexos
            $mail->ClearAllRecipients();
            $mail->ClearAttachments();
        }
    }

}
