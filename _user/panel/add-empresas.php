<?php
include ("funcao_usuario.php");
session_start();

if(usuarioLogado()){ 
	$usuario = retornaUsuario();
	?>
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GeoExplorer - Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body>
        <div id="wrapper">

          <!-- Navigation -->
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">GeoProspect</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $usuario[3]; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="perfil.php"><i class="fa fa-fw fa-user"></i> Perfil</a>
                  </li>
                  <li>
                    <a href="contato.php"><i class="fa fa-fw fa-envelope-o"></i> Contato</a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav side-nav">
                <li class="active">
                  <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                  <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Funil de vendas</a>
                </li>
                <li>
                  <a href="tables.html"><i class="fa fa-fw fa-suitcase"></i> Negocios</a>
                </li>
                <li>
                  <a href="pesquisa.php"><i class="fa fa-fw fa-building"></i> Empresas</a>
                </li>
                <li>
                  <a href="pesquisa.php"><i class="fa fa-fw fa-users"></i> Pessoas</a>
                </li>
                <li>
                  <a href="bootstrap-grid.html"><i class="fa fa-fw fa-history"></i> Follow-up</a>
                </li>
                <li>
                  <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-user-plus"></i> Descobrir clientes<i class="fa fa-fw fa-caret-down"></i></a>
                  <ul id="demo" class="collapse">
                    <li>
                      <a href="#"> Buscar novos clientes</a>
                    </li>
                    <li>
                      <a href="#"> Download de listas</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </nav>

          <div id="page-wrapper">

            <div id="main" class="container-fluid">
              <!-- Page Heading -->
              <div class="row">
                <div class="col-lg-12">
                  <h1 class="page-header">
                    Empresas
                    <small>adicione uma nova empresa</small>
                  </h1>
                  <ol class="breadcrumb">
                    <li>
                      <i class="fa fa-dashboard"></i>  <a href="index.html"> Dashboard</a>
                    </li>
                    <li>
                      <i class="fa fa-building"></i><a href="lista-empresas.php"> Empresas </a>
                    </li>
                    <li class="active">
                      <i class="fa fa-plus"></i> Nova Empresa
                    </li>
                  </ol>

                  <!-- Avisos aqui! -->

                </div>
              </div> 
              <!-- CONTEUDO -->
              <form class="form-group" action="empresas.php?status=add" method="post">
                <!-- area de campos do form -->
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" required>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="empresa">Rua</label>
                    <input type="text" class="form-control" name="rua" id="rua" required>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="numero">Numero</label>
                    <input type="text" class="form-control" name="numero" id="numero" required>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-2">
                    <label for="estado">Estado</label>
                    <select name="estado" class="form-control" id="estado" required>
                      <option selected="" value="">Selecione o Estado (UF)</option>
                      <option value="Acre">Acre</option>
                      <option value="Alagoas">Alagoas</option>
                      <option value="Amapá">Amapá</option>
                      <option value="Amazonas">Amazonas</option>
                      <option value="Bahia">Bahia</option>
                      <option value="Ceará">Ceará</option>
                      <option value="Distrito Federal">Distrito Federal</option>
                      <option value="Espírito Santo">Espírito Santo</option>
                      <option value="Goiás">Goiás</option>
                      <option value="Maranhão">Maranhão</option>
                      <option value="Mato Grosso">Mato Grosso</option>
                      <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                      <option value="Minas Gerais">Minas Gerais</option>
                      <option value="Pará">Pará</option>
                      <option value="Paraíba">Paraíba</option>
                      <option value="Paraná">Paraná</option>
                      <option value="Pernambuco">Pernambuco</option>
                      <option value="Piauí">Piauí</option>
                      <option value="Rio de Janeiro">Rio de Janeiro</option>
                      <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                      <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                      <option value="Rondônia">Rondônia</option>
                      <option value="Roraima">Roraima</option>
                      <option value="Santa Catarina">Santa Catarina</option>
                      <option value="São Paulo">São Paulo</option>
                      <option value="Sergipe">Sergipe</option>
                      <option value="Tocantins">Tocantins</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" required>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro">
                  </div>
                </div>
                <div class="row">    
                  <div class="form-group col-md-4">
                    <label for="empresa">Telefone</label>
                    <input type="tel" class="form-control" name="telefone" id="telefone" required>
                  </div>
                  <div class="form-group col-md-2">
                    <label class="pais">Pais</label>
                    <input type="text" class="form-control" name="pais" id="pais" value="Brasil">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-2">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep" maxlength="8">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" name="website" id="website">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="glus">Redes Sociais</label>
                    <input type="text" class="form-control" name="gplus" id="gplus">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="lista-empresas.php" class="btn btn-default">Cancelar</a>
                  </div>
                </div>
              </form>

              <!-- FIM CONTEUDO -->                   
            </div>
            <!-- /.container-fluid -->
          </div>
          <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
      </body>
      </html>
      <?php
    }else{
     verificaUsuario();
   }
   ?>