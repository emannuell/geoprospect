<?php
include ("funcao_usuario.php");
session_start();

if(usuarioLogado()){ 
    $usuario = retornaUsuario();
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <script type="text/javascript">
      var key = 'AIzaSyC9Yn9sN3t47d4iOQ1gL6mXoNd3BZp9FHQ';
      document.write('<script src="https://maps.googleapis.com/maps/api/js?key=' + key + '&libraries=places,visualization" async defer></\script>');
  </script>
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
    <script src="js/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
          html, body { height: 100%; margin: 0; padding: 0; }
          #map {
            height: 400px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Topo de pagina e menu -->
        <?php include ("menu.html"); ?>

        <div id="page-wrapper">
            <div id="main" class="container-fluid">
               <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard
                        <small>visao geral</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-list"></i> Nova busca
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <p>
                        <label>Cidade/bairro:</label>
                        <input type="text" class="form-control" id="search-input" name="search-input" value="" placeholder="São Paulo, Morumbi"/>
                    </p>
                    <p>
                        <label>Palavra Chave:</label>
                        <input type="text" class="form-control" id="search-place" name="search-place" value="" placeholder="Imobiliaria, Padaria, Escola"/>
                    </p>
                    <button type="submit" class="btn btn-info btn-block" id="search-button">Buscar</button>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-green painel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-9 text-left">
                                    <div class="huge"><p id="total">0</p></div>
                                    <div>Potenciais clientes</div>
                                </div>
                                <div class="col-xs-3">
                                    <i class="fa fa-line-chart fa-5x"></i>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-12">
                    <div id="map"></div>
                    <p> 
                        <button id="clickEnvia" class="btn btn-success btn-lg btn-block"> Salvar dados</button>
                    </p>
                </div>
            </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<script src="js/bootstrap.min.js"></script>
<script src="js/map-prospect.js"></script>
</body>
</html>
<?php
}else{
    verificaUsuario();
}
?>