<?php
include "conect.php";
$email = $_POST['email'];
$status = $_GET['status'];
$db = Database::getInstance();
$mysqli = $db->getConnection(); 
$sql_query = "INSERT INTO emails_capturados(email, date_add) values ('$email', now())";
$result = $mysqli->query($sql_query);
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Uma ferramenta online que auxília na prospecção de clientes, ajudando a equipe de vendas no processo de identificação dos clientes potenciais para a gestão de seus negócios.">
  <meta name="author" content="GeoProspect">
  <title>GeoProspect - Cadastre-se agora!</title>
  <link href="assets/bootstrap.css" rel="stylesheet">
  <link href="assets/main.css" rel="stylesheet">
  <link href="assets/fonts.css" rel="stylesheet">
  <style type="text/css">
    .imagem{
      max-width: 600px;
      float: right;
    }
  </style>
</head>
<body>
  <!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><b>Geoprospect</b></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/_user">Já é cadastrado?</a></li>
        </ul>
      </div><!--/.nav-collapse -->   
    </div>
  </div>

  <div class="fundo">
    <div class="container">
      <p>
        <?php
        if($status == '1'){ ?>
        <div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="fa fa-info-circle"></i>  Seu e-mail ja esta cadastrado! Entre em <a href="contato.html"><strong>contato</strong></a> para recuperar sua senha!
        </div>
        <?php }
        ?>
      </p>
      <div class="col-lg-6">
        <h1>Cadastre seu negócio</h1>
        <h3>Comece sua avaliação, é grátis!</h3>
        <div class="form-largo"> 
         <form method="post" class="form-inline" role="form" action="salva.php">
          <div class="form-group">
            <p><input type="text" class="form-largo input-lg" id="nome" name="nome" placeholder="Seu nome" required></p>
          </div>
          <div class="form-group">
            <p><input type="text" class="form-largo input-lg" id="empresa" name="empresa" placeholder="Empresa" required></p>
          </div>
          <div class="form-group">
            <p><input type="email" class="form-largo input-lg" id="email" name="email" placeholder="E-mail" value="<?php echo $email ?>" required></p>
          </div>    
          <div class="form-group">
            <p>
              <input type="tel" class="form-largo input-lg" id="telefone" name="telefone" placeholder="Telefone" required>
            </p>
          </div>
          <div class="form-group">
            <p>
              <input type="password" class="form-largo input-lg" id="senha" name="senha" placeholder="Senha" required></p>
            </div>
            <p><button type="submit" class="btn btn-warning btn-lg btn-block">Cadastrar</button></p>
          </form>
        </div>
      </div>
      <div class="col-lg-6">
        <img class="imagem img-responsive" src="assets/reuniao.png">
      </div>
    </div>
  </div><!-- /container -->
</div><!-- /headerwrap -->
</body>
</html>