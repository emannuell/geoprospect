<?php
$email = $_POST['email'];

include ("panel/funcao_usuario.php");
include ("../conect.php");

if(isset($email)){
	echo "Envia email!";
	recuperaSenha($email);
	header("Location: index.php");
}else{ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Uma ferramenta online que auxília na prospecção de clientes, ajudando a equipe de vendas no processo de identificação dos clientes potenciais para a gestão de seus negócios.">
  <meta name="author" content="GeoProspect">
  <title>GeoProspect - Login</title>
  <link href="../assets/bootstrap.css" rel="stylesheet">
  <link href="../assets/main.css" rel="stylesheet">
  <link href="../assets/fonts.css" rel="stylesheet">
  <style type="text/css">
    .centraliza{
      margin: 0 auto;
      margin-top: 50px;
      max-width: 650px;
    } 
  </style>
</head>
<body>
  <div class="container">
    <div class="centraliza">
      <div class="panel panel-default">
        <div class="panel-heading">Esqueceu sua senha?</div>
        <div class="panel-body">
          <form class="form-group" action="recuperar.php" method="post">
            <p>
              <input type="email" class="form-largo input-lg" id="email" name="email" placeholder="E-mail" required>
              <button type="submit" class="btn btn-warning btn-lg" value="enviar">Recuperar senha</button>
            </p>

          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php
}
?>