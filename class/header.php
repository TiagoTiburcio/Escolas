<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta lang="pt-BR">  
  <title>Sistema Cadastro Escolas CODIN</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <div class="row">
        <div class="col-xs-12 col-lg-2">
            <img src="../images/seed/seed_colorida.svg"/>                   
        </div>
        <div class="col-xs-12 col-lg-8 text-center">
            <h2>Atualização Cadastro Escolas CODIN</h2>
            <h2><small>Atualização de dados cadastrados sobre equipamentos de Informática Escolas</small></h2>
        </div>        
    </div>
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand">CODIN</a>
                </div>
                <ul class="nav navbar-nav">
                  <li><a href="../home/index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manuten&ccedil;&atilde;o Usu&aacute;rios<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../home/listarusuarios.php">Listar Todos os Usu&aacute;rios</a></li>
                        <li><a href="../home/novousuario.php">Novo Usu&aacute;rio</a></li>
                    </ul>
                  </li>                  
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="../home/novasenha.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nome_usuario']; ?></a></li>
                  <li><a href="../home/sairlogin.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                </ul>
              </div>
            </nav>  
        </div>
