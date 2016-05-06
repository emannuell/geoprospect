<?php
session_start();

function usuarioLogado(){
	return isset($_SESSION['id']);
}

function verificaUsuario(){
	if(!usuarioLogado()){
		header("Location: ../index.php?login=1");
		die();
	}
}

function fazLogin($id, $email, $empresa, $nome){
	$_SESSION['id'] = $id;
	$_SESSION['email'] = $email;
	$_SESSION['empresa'] = $empresa;
	$_SESSION['nome'] = $nome;
}

function retornaUsuario(){
	$arr = array($_SESSION['id'], $_SESSION['email'], $_SESSION['empresa'], $_SESSION['nome']);
	return $arr;
}

function recuperaSenha($email){
	$db = Database::getInstance();
	$mysqli = $db->getConnection(); 
	$sql = "SELECT * FROM usuarios WHERE email = '$email'";
	$result = $mysqli->query($sql);
	$dados = $result->fetch_assoc();
	$email = $dados['email'];
	$nome = $dados['nome'];
	$senha = $dados['senha'];

	$mensagem = "Ola <strong>".$nome."</strong>,";
	$mensagem .= "<br><br>  Sua senha: ".$senha;
	$mensagem .= "<br> Atencao com seus dados de acesso!";
	$mensagem .= "<br><br>  Equipe GeoProspect.";
	$assunto = "Recuperar senha!";

	enviaEmail($email, $assunto, $mensagem, $nome);
}

function enviaEmail($para, $assunto, $mensagem, $nome){
	
	require 'phpmailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
	$mail = new PHPMailer;
//Set who the message is to be sent from
	$mail->setFrom('no-reply@geoprospect.com.br', 'GeoProspect');
//Set an alternative reply-to address
	$mail->addReplyTo('contato@geoprospect.com.br', 'GeoProspect');
//Set who the message is to be sent to
	$mail->addAddress($para, $nome);
//Set the subject line
	$mail->Subject = $assunto;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
	$mail->msgHTML($mensagem);
//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';
//send the message, check for errors
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
	}
}
?>