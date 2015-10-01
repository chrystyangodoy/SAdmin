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

    //private $smtp = 'smtp.cs-consoft.com.br';
    private $smtp = 'mail-ssl.locaweb.com.br';

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
        // Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
        require_once './phpMailer/class.phpmailer.php';
        require_once './phpMailer/PHPMailerAutoload.php';
        // Inicia a classe PHPMailer
        $mail = new PHPMailer();
        // Define os dados do servidor e tipo de conexão
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsSMTP(); // Define que a mensagem será SMTP
        $mail->Host = $this->smtp; // Endereço do servidor SMTP
        $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
        $mail->Port = 587;
        $mail->Username = 'cleytonqueiroz@cs-consoft.com.br'; // Usuário do servidor SMTP
        $mail->Password = 'cq142536cq'; // Senha do servidor SMTP
        // Define o remetente
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->From = 'cleytonqueiroz@cs-consoft.com.br'; // Seu e-mail
        $mail->FromName = 'Administração'; // Seu nome
        // Define os destinatário(s)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->AddAddress($detinatario, $nome);
        //$mail->AddAddress('ciclano@site.net');
        //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
        //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
        // Define os dados técnicos da Mensagem
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
        //$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
        // Define a mensagem (Texto e Assunto)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->Subject = $assunto; // Assunto da mensagem
        $mail->Body = $mensagem;
        $mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";
        // Define os anexos (opcional)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
        // Envia o e-mail
        $enviado = $mail->Send();
        // Limpa os destinatários e os anexos
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();
        // Exibe uma mensagem de resultado
        if ($enviado)
        {
            echo "E-mail enviado com sucesso!";
        }
        else
        {
            echo "<b>Não foi possível enviar o e-mail.</b>";
            echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
        }
    }

}
