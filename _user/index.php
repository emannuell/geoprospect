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
      max-width: 500px;
    } 
  </style>
</head>
<body>
  <div class="container">
    <div class="centraliza">
      <?php
      include ("panel/funcao_usuario.php");
      if (isset($_GET['login'])){
        if ($_GET['login'] == '0') { ?>
        <div class="alert alert-warning" role="alert">Login ou senha incorreto.</div>
        <?php }
        if($_GET['login'] == '1'){ ?>
        <div class="alert alert-danger" role="alert">Logout, insira um usuario e senha.</div>
        <?php
      } 
    }
    if(usuarioLogado()){
      header("Location: pesquisa.php");
    }
    ?>
    <div class="panel panel-default">
      <div class="panel-heading">Painel de controle</div>
      <div class="panel-body">
        <form class="form-group" action="login.php" method="post">
          <p>
            <input type="email" class="form-largo input-lg" id="email" name="email" placeholder="E-mail" required>
          </p>
          <p>
            <input type="password" class="form-largo input-lg" id="senha" name="senha" placeholder="Senha" required>
          </p>
          <p>
            <button type="submit" class="btn btn-warning btn-block btn-lg">Entrar</button>
          </p>
        </form>
        <a href="recuperar.php"> Esqueceu a senha?</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>
