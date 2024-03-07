<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require_once 'vendor\autoload.php';
  
  $mail = new PHPMailer(true);

  try {
    $mail-> SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = "smtp.hostinger.com";
    $mail->SMTPAuth = true;
    $mail->Username = "umsa_pruebas";
    $mail->Password = "";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom("umsa_pruebas", "UMSA Pruebas");
    $mail->addAddress('novosrpf');
    $mail->addCC('ruben');
    $mail->isHTML(true);
    $mail->Subject = "Prueba de envio";
    $mail->Body = "Hola, esta es una <b>prueba</b> de envio de correo";
    $mail->addAttachment('documento.pdf');

    $mail->send();
    echo "Correo enviado";

  } catch (Exception $e){
    echo "Mensaje ".$mail->ErrorInfo;
  }

