<?php

$dbHost = "localhost";
$dbDatabase = "allblacks";
$dbPasswrod = "";
$dbUser = "root";
$mysqli = new mysqli($dbHost, $dbUser, $dbPasswrod, $dbDatabase);



$sql = "SELECT EMAIL FROM dados_torcedores";
$dadosEmail = $mysqli->query($sql);
$dados = $dadosEmail->fetch_all();
$emails = '';


foreach($dados as $d){
    $emails = $emails. $d[0]. ', ';
}


    

$mysqli->close();

$to      = $emails;
$subject = $_POST['titulo'];
$message = $_POST['corpoEmail'];
$headers = array(
    'From' => 'exemploemail@examplo.com',
    'Reply-To' => 'exemploemail@examplo.com',
    'X-Mailer' => 'PHP/' . phpversion()
);

mail($to, $subject, $message, $headers);

?>