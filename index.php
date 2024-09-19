<?php

//Arquivo index responsável pela inicialização do sistema
require 'vendor/autoload.php';

require 'rotas.php';


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;



// $mail = new PHPMailer(true);

// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'ricardojso72@hotmail.com';                     //SMTP username
//     $mail->Password   = 'Ri230964';                               //SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 

//     //Recipients
//     $mail->setFrom('ricardojso72@hotmail.com', 'its');
//     $mail->addAddress('ricardojso72@hotmail.com', 'Ricardo');     //Add a recipient

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Assunto';
//     $mail->Body    = 'Corpo do E-mail';

//     $mail->send();
//     echo 'E-mail enviado com sucesso!';
// } catch (Exception $e) {
//     echo "Error:{$mail->ErrorInfo}";
// }