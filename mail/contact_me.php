<?php

if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }


$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = 'contato@stefanoterraplenagem.com.br'; 

$email_subject = "Formulário de contato do site:  $name";
$email_body = "Você recebeu uma nova mensagem do formulário de contato do seu website.\n\n".
"Aqui estão os detalhes:\n\n
Nome:$name \n\n
Email: $email_address\n\n
Telefone: $phone\n\n
Mensagem: $message\n\n";

$headers = "From: contato@stefanoterraplenagem.com.br\n"; 
$headers .= "Reply-To: $email_address";   

mail($to,$email_subject,$email_body,$headers);
   header('Location: ../index.html');
return true;         
?>