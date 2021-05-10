<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");


require_once "../../../class/login-client.class.php"; 
$user = new User;

if(isset($_SESSION['user_admin'])){

  $id = $_SESSION['user_admin'];
  $ip = $_SERVER['REMOTE_ADDR'];

  $user->getIdIpAdmin($id, $ip);

  if(isset($id) && !empty($id)){
    $data = $user->getUserAdmin($id);
  }
}else{
  header('Location: pages/examples/login.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <!-- Crypt Md5 -->
  <script src="js/md5.js"></script>
  
  <!-- Chart -->
  <script src="js/chart.min.js"></script>
  <script src="js/utils.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="sair.php" class="nav-link">Sair</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../../assets/images/favicon.png" alt="Rifa Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminRifa - Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/marcel.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Olá <?php echo $data['nome']; ?>, Bem Vindo!</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input id="inp-search" class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <ul class="navigation-admin">
              <li class="navigation-item"><a href="index.php">Página inicial</a></li>
              <li class="navigation-item"> <a href="cadastrar-sorteio.php">Cadastrar sorteios</a></li>
              <li class="navigation-item"><a href="blog.php">Blog</a></li>
              <li class="navigation-item"><a href="lista-de-participantes.php">Lista de usuários</a></li>
              <li class="navigation-item"><a href="limite-de-afiliados.php">Limite de Afiliados</a></li>
              <li class="navigation-item"><a href="faq-admin.php">FAQ</a></li>
              <li class="navigation-item"><a href="politica-privacidade-admin.php">Política de Privacidade</a></li>
          </ul>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <style>
    .navigation-admin li{
      list-style:none;
      border-bottom: 1px solid #fff;
      color:#fff;
      height:30px;
      margin-top:10px;
      width:100%;
    }
    .navigation-admin{
      padding-left:0;
    }
  </style>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Área de cadastro dos sorteios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Cadastrar sorteio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php date_default_timezone_set("America/Sao_Paulo"); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registre o sorteio aqui</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="select--form-registrar-sorteio" method="POST" action="controller/registrar-sorteio.controller.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="titulo-sorteio">Título do sorteio</label>
                    <input type="text" name="tituloSorteio" class="form-control" id="titulo-sorteio" placeholder="Título do Sorteio">
                  </div>
                  <div class="form-group">
                    <label for="descricao-sorteio">Descrição do Sorteio (Regras)</label><br>
                    <textarea name="descricaoSorteio" id="descricao-sorteio" cols="143" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="preco-ticket">Preço por número</label>
                    <input data-js="money" name="precoTicket" type="text" class="form-control" id="preco-ticket" placeholder="Preço do Ticket">
                  </div>
                  <div class="form-group">
                    <label for="quantidade-de-premios">Quantidade de Prêmios</label>
                    <input data-js="numero" name="quantidadeDePremios" type="text" class="form-control" id="quantidade-premios" placeholder="Quantidade de Prêmios">
                  </div>
                  <div class="form-group">
                    <label for="quantidade-de-tickets">Quantidade de números disponíveis</label>
                    <!-- <span>50</span>
                    <input data-js="numero" name="quantidadeDeTickets" type="radio" class="form-control" id="quantidade-de-tickets" placeholder="Quantidade de Números"> -->
                    <div class="form-check">
                      <input class="form-check-input select--input-radio" name="number" type="radio" value="50">
                      <label class="form-check-label">50 números</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input select--input-radio" name="number" type="radio" value="100">
                      <label class="form-check-label">100 números</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input select--input-radio" name="number" type="radio" value="150">
                      <label class="form-check-label">150 números</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input select--input-radio" name="number" type="radio" value="300">
                      <label class="form-check-label">300 números</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input select--input-radio" name="number" type="radio" value="500">
                      <label class="form-check-label">500 números</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input select--input-radio" name="number" type="radio" value="1000">
                      <label class="form-check-label">1000 números</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="data-inicio-sorteio">Data Início do Sorteio</label>
                    <input name="dataInicioSorteio" type="datetime-local" class="form-control" id="data-inicio-sorteio" placeholder="Data Início do Sorteio">
                  </div>
                  <div class="form-group">
                    <label for="data-fim-sorteio">Data Fim do Sorteio</label>
                    <input name="dataFimSorteio" type="datetime-local" class="form-control" id="data-fim-sorteio" placeholder="Data Fim do Sorteio">
                  </div>
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
              </form>
              
            </div>
          <!-- /.card -->
          </section>
          <!-- /.row (main row) -->

            <?php  if(isset($_GET['registerContest'])): ?>
                <div class="alert alert-success text-center">Sorteio cadastrado com Sucesso</div>
            <?php endif; ?>
            <?php  if(isset($_GET['errorContest'])): ?>
                <div class="alert alert-danger text-center">Erro no cadastro do Sorteio</div>
            <?php endif; ?>


            <?php if(isset($_GET['successUpdate'])): ?>
                <div class="alert alert-success text-center">Atualização feita com sucesso.</div>
            <?php endif; ?>

            <?php if(isset($_GET['errorUpdate'])): ?>
                <div class="alert alert-danger text-center">Erro na atualização do sorteio.</div>
            <?php endif; ?>
            
          <?php if(isset($_GET['errorIdContest'])): ?>
            <div class="text-center alert alert-danger">Selecione um concurso antes para inserir as imagens</div>
          <?php endif; ?>

          <?php if(isset($_GET['imageRegister'])): ?>
            <div class="text-center alert alert-success">Imagem resgistrada com sucesso</div>
          <?php endif; ?>

          <?php 
            if(isset($_GET['id'])){
              $idContestNumbers = $_GET['id'];
              echo "<div class='alert alert-success text-center'>Concurso id número #" . substr(md5($idContestNumbers), 0, 3) . " sorteado com sucesso</div>";
            }
          ?>
          
            <!-- Máscara de dinheiro -->
          <script>
            const mask = {
              money(value){
                return value
                .replace(/\D/g, '')
                .replace(/(\d{1})(\d{1})(\d)/, 'R$ $1,$2$3')
                .replace(/(\d{1}),(\d{1})(\d{1})(\d)/, '$1$2,$3$4')
                .replace(/(\d{1})(\d{1}),(\d{1})(\d{1})(\d)/, '$1$2$3,$4$5')
                .replace(/(\d{1})(\d{1})(\d{1}),(\d{1})(\d{1})(\d)/, '$1.$2$3$4,$5$6')
                .replace(/(\d{1}).(\d{1})(\d{1})(\d{1}),(\d{1})(\d{1})(\d)/, '$1$2.$3$4$5,$6$7')
                .replace(/(\d{1})(\d{1}).(\d{1})(\d{1})(\d{1}),(\d{1})(\d{1})(\d)/, '$1$2$3.$4$5$6,$7$8')
                .replace(/(\d{1})(\d{1})(\d{1}).(\d{1})(\d{1})(\d{1}),(\d{1})(\d{1})(\d)/, '$1.$2$3$4.$5$6$7,$8$9')
                .replace(/(\d{1}).(\d{1})(\d{1})(\d{1}).(\d{1})(\d{1})(\d{1}),(\d{1})(\d{1})(\d)/, '$1$2.$3$4$5.$6$7$8,$9$10')
                .replace(/(,\d{2})\d+?$/, '$1')
              },

              numero(value){
                return value
                .replace(/\D/g, '')
              },

              data(value){
                return value
                .replace(/\D/g, '')
                .replace(/(\d{2})(\d)/, '$1/$2')
                .replace(/(\d{2})(\d)/, '$1/$2')
                .replace(/(\d{4})(\d+?$)/, '$1')
              }
            }


              document.querySelectorAll('input').forEach(($input) => {
                const field = $input.dataset.js
                $input.addEventListener('input', (e) => {
                    e.target.value = mask[field](e.target.value)
                }, false)
              })
          </script>
          <!-- Máscara de dinheiro -->
          
          <div class="container-fluid">
            <form class="row select--form-thumb-principal" enctype="multipart/form-data" action="controller/registrar-imagethumb.controller.php" method="POST">
                <div class="form-group col-md-6">
                  <label for="image_thumb">Selecione a thumb principal - menor ou igual a 1091px X 1091px</label><br>
                  <input style="margin-bottom:10px;" type="file" name="image_thumb" id="image_thumb"><br>
                  <img class="select--img-thumb" width="100" height="100" src="img-contest/default-image.png" alt="image_thumb">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </form>
  
            <form class="row select--form-imagem-principal" enctype="multipart/form-data" action="controller/registrar-imagemprincipal.controller.php" method="POST">
                <div class="form-group col-md-6">
                  <label for="imagem_principal">Selecione a imagem principal - menor ou igual a 1091px X 1091px</label><br>
                  <input style="margin-bottom:10px;" type="file" name="imagem_principal" id="imagem_principal"><br>
                  <img class="select--imagem-principal" width="100" height="100" src="img-contest/default-image.png" alt="imagem_principal">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </form>


            <form class="row select--form-carrousel-1" enctype="multipart/form-data" action="controller/registrar-carousel-1.controller.php" method="POST">
                <div class="form-group col-md-6">
                  <label for="imagem_carousel_1">Selecione a imagem carrossel 1 - menor ou igual a 1091px X 1091px</label><br>
                  <input style="margin-bottom:10px;" type="file" name="imagem_carousel_1" id="imagem_carrousel_1"><br>
                  <img class="select--imagem_carousel_1" height="100" width="100" src="img-contest/default-image.png" alt="imagem_carousel_1">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </form>

            <form class="row select--form-carrousel-2" enctype="multipart/form-data" action="controller/registrar-carousel-2.controller.php" method="POST">
                <div class="form-group col-md-6">
                  <label for="imagem_carousel_2">Selecione a imagem carrossel 2 - menor ou igual a 1091px X 1091px</label><br>
                  <input style="margin-bottom:10px;" type="file" name="imagem_carousel_2" id="imagem_carousel_2"><br>
                  <img class="select--imagem_carousel_2" height="100" width="100" src="img-contest/default-image.png" alt="imagem_carousel_2">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </form>

            <form class="row select--form-carrousel-3" enctype="multipart/form-data" action="controller/registrar-carousel-3.controller.php" method="POST">
                <div class="form-group col-md-6">
                  <label for="imagem_carousel_3">Selecione a imagem carrossel 3 - menor ou igual a 1091px X 1091px</label><br>
                  <input style="margin-bottom:10px;" type="file" name="imagem_carousel_3" id="imagem_carousel_3"><br>
                  <img class="select--imagem_carousel_3" height="100" width="100" src="img-contest/default-image.png" alt="imagem_carousel_3">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>


            <form class="row select--form-carrousel-4" enctype="multipart/form-data" action="controller/registrar-carousel-4.controller.php" method="POST">
                <div class="form-group col-md-6">
                  <label for="imagem_carousel_4">Selecione a imagem carrossel 4 - menor ou igual a 1091px X 1091px</label><br>
                  <input style="margin-bottom:10px;" type="file" name="imagem_carousel_4" id="imagem_carousel_4"><br>
                  <img class="select--imagem_carousel_4" height="100" width="100" src="img-contest/default-image.png" alt="imagem_carousel_4">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </form>

          </div>

              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sorteios cadastrados</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 320px;">
                    <input style="width:40%;" type="text" name="table_search" class="form-control float-right select--inp-search-title" placeholder="Procurar por título">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                    <input style="width:40%;" type="text" name="table_search" class="form-control float-right select--inp-search-id" placeholder="Procurar por Id">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="table" class="table table-hover text-nowrap tr_search">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Titulo do sorteio</th>
                      <th>Descrição do Sorteio (Regras)</th>
                      <th>Preço do Ticket</th>
                      <th>Quantidade de Prêmios</th>
                      <th>Quantidade de números disponíveis</th>
                      <th>Data Início do Sorteio</th>
                      <th>Data Fim do Sorteio</th>
                      <th>Números sorteados</th>
                      <th>Excluir</th>
                      <th>Editar</th>
                      <th>Btn Sorteio</th>
                    </tr>
                  </thead>
                  <tbody id="select--t-body">
                    <!-- <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td>11-7-2014</td>
                      <td>11-7-2014</td>
                      <td>11-7-2014</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td><button class="btn btn-primary">Visualizar Sorteio</button></td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          <!-- Input hidden -->
          <script>
            const formThumbPrincipal = document.querySelector('.select--form-thumb-principal')
            const formImagemPrincipal = document.querySelector('.select--form-imagem-principal')
            const formCarrousel1 = document.querySelector('.select--form-carrousel-1')
            const formCarrousel2 = document.querySelector('.select--form-carrousel-2')
            const formCarrousel3 = document.querySelector('.select--form-carrousel-3')
            const formCarrousel4 = document.querySelector('.select--form-carrousel-4')

            const inputThumbPrincipal = document.createElement('input')
            const inputImagemPrincipal = document.createElement('input')
            const inputCarrousel1 = document.createElement('input')
            const inputCarrousel2 = document.createElement('input')
            const inputCarrousel3 = document.createElement('input')
            const inputCarrousel4 = document.createElement('input')

            formThumbPrincipal.append(inputThumbPrincipal)
            inputThumbPrincipal.setAttribute('type', 'hidden')
            inputThumbPrincipal.setAttribute('name', 'id_imagem_thumb')
            inputThumbPrincipal.setAttribute('class', 'select--input-thumb-principal')

            formImagemPrincipal.append(inputImagemPrincipal)
            inputImagemPrincipal.setAttribute('type', 'hidden')
            inputImagemPrincipal.setAttribute('name', 'id_imagem_principal')
            inputImagemPrincipal.setAttribute('class', 'select--input-imagem-principal')

            formCarrousel1.append(inputCarrousel1)
            inputCarrousel1.setAttribute('type', 'hidden')
            inputCarrousel1.setAttribute('name', 'id_carousel_primeiro')
            inputCarrousel1.setAttribute('class', 'select--input-carrousel-1')

            formCarrousel2.append(inputCarrousel2)
            inputCarrousel2.setAttribute('type', 'hidden')
            inputCarrousel2.setAttribute('name', 'id_carousel_segundo')
            inputCarrousel2.setAttribute('class', 'select--input-carrousel-2')
            
            formCarrousel3.append(inputCarrousel3)
            inputCarrousel3.setAttribute('type', 'hidden')
            inputCarrousel3.setAttribute('name', 'id_carousel_terceiro')
            inputCarrousel3.setAttribute('class', 'select--input-carrousel-3')

            formCarrousel4.append(inputCarrousel4)
            inputCarrousel4.setAttribute('type', 'hidden')
            inputCarrousel4.setAttribute('name', 'id_carousel_quarto')
            inputCarrousel4.setAttribute('class', 'select--input-carrousel-4')
          </script>
          <!-- Input hidden -->

          <!-- Ajax Get -->
          <script>
            const xhrGet = new XMLHttpRequest;
                    
                    xhrGet.onreadystatechange = () => {

                      if(xhrGet.status == 200 && xhrGet.readyState == 4){

                        const objectContest = JSON.parse(xhrGet.response)

                        objectContest.forEach(($objectContest) => {

                            const tBody = document.querySelector('#select--t-body')
                            const tRow = document.createElement('tr')
                            const tdId = document.createElement('td')
                            const tdTitulo = document.createElement('td')
                            const tdDescricao = document.createElement('td')
                            const tdPreco = document.createElement('td')
                            const tdQuantidadePremios = document.createElement('td')
                            const tdQuantidadeTickets = document.createElement('td')
                            const tdDataInicio = document.createElement('td')
                            const tdDataFim = document.createElement('td')
                            const tdNumeroSorteio = document.createElement('td')
                            const tdExcluirSorteio = document.createElement('td')
                            const btnExcluirSorteio = document.createElement('a')
                            const tdEditarSorteio = document.createElement('td')
                            const btnEditarSorteio = document.createElement('a')
                            const tdBtnSortearNumero = document.createElement('td')
                            const btnSortearNumero = document.createElement('a')
                            const spanTitle = document.createElement('span')
                            const spanId = document.createElement('span')

                            tBody.append(tRow)
                            tRow.append(tdId)
                            tRow.append(tdTitulo)
                            tRow.append(tdDescricao)
                            tRow.append(tdPreco)
                            tRow.append(tdQuantidadePremios)
                            tRow.append(tdQuantidadeTickets)
                            tRow.append(tdDataInicio)
                            tRow.append(tdDataFim)
                            tRow.append(tdNumeroSorteio)
                            tRow.append(tdExcluirSorteio)
                            tRow.append(tdEditarSorteio)
                            tRow.append(tdBtnSortearNumero)
                            tdExcluirSorteio.append(btnExcluirSorteio)
                            tdEditarSorteio.append(btnEditarSorteio)
                            tdBtnSortearNumero.append(btnSortearNumero)
                            tdTitulo.append(spanTitle)
                            tdId.append(spanId)

                            btnExcluirSorteio.setAttribute('class', 'btn btn-danger')
                            btnExcluirSorteio.setAttribute('href', `controller/excluir-sorteio.controller.php?id=${$objectContest.id}`)
                            btnEditarSorteio.setAttribute('class', 'btn btn-primary select--btn-editar')
                            btnSortearNumero.setAttribute('href', `controller/numero-sorteio.controller.php?idSorteio=${$objectContest.id}&numero=${$objectContest.qtd_tickets}&premios=${$objectContest.qtd_produto}`)
                            btnEditarSorteio.setAttribute('href', `editar-sorteio.php?id=${$objectContest.id}`)
                            btnSortearNumero.setAttribute('class', 'btn btn-success')
                            spanTitle.setAttribute('class', 'span_search-title')
                            spanId.setAttribute('class', 'span_search-id')
                            tRow.setAttribute('class', 'tr_search')

                            const crypt = new Crypt()
                            let hashMd5 = crypt.HASH.md5($objectContest.id)

                            hashMd5 = hashMd5.toString()
                            hashMd5 = hashMd5.substr(0, 3)

                            spanId.innerHTML = `#${hashMd5}`
                            spanTitle.innerHTML = $objectContest.titulo_produto
                            tdDescricao.innerHTML = `<div class="overflow">${$objectContest.descricao_produto}</div>`
                            tdPreco.innerHTML = $objectContest.preco_produto
                            tdQuantidadePremios.innerHTML = $objectContest.qtd_produto
                            tdQuantidadeTickets.innerHTML = $objectContest.qtd_tickets
                            tdDataInicio.innerHTML = $objectContest.data_inicio_sorteio
                            tdDataFim.innerHTML = $objectContest.data_fim_sorteio
                            tdNumeroSorteio.innerHTML = $objectContest.resultado_concurso
                            btnExcluirSorteio.innerHTML = 'Excluir'
                            btnEditarSorteio.innerHTML = 'Editar'
                            btnSortearNumero.innerHTML = 'Sortear'

                            if(tdNumeroSorteio.innerText != ''){
                              btnSortearNumero.addEventListener('click', (e) => {
                                e.preventDefault()
                                alert('A Campanha já foi sorteada')
                              })
                            }

                            btnExcluirSorteio.addEventListener('click', (e) => {
                              e.preventDefault()
                              
                              const xhrPost = new XMLHttpRequest;
                              const formData = new FormData;

                              formData.append('id', $objectContest.id)

                              xhrPost.onreadystatechange = () => {

                                if(xhrPost.status == 200 && xhrPost.readyState == 4){

                                  tRow.style.display = 'none'
                                }
                              }

                              xhrPost.open('POST', `controller/excluir-sorteio.controller.php`)
                              xhrPost.send(formData)
                            })

                            document.querySelector('.select--inp-search-title').addEventListener('input', ($input) => {
                              // Declare variables
                              let filter, tr, span, i, txtValue;
                              filter = $input.target.value.toLowerCase();
                              let table = document.getElementById("table");
                              tr = table.getElementsByClassName('tr_search')

                              // Loop through all list items, and hide those who don't match the search query
                              for (i = 0; i < tr.length; i++) {
                                span = tr[i].getElementsByClassName("span_search-title")[0];
                                txtValue = span.textContent || span.innerText;
                                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                                  tr[i].style.display = "";
                                } else {
                                  tr[i].style.display = "none";
                                }
                              }
                            })

                            document.querySelector('.select--inp-search-id').addEventListener('input', ($input) => {
                              // Declare variables
                              let filter, tr, span, i, txtValue;
                              filter = $input.target.value.toLowerCase();
                              let table = document.getElementById("table");
                              tr = table.getElementsByClassName('tr_search')

                              // Loop through all list items, and hide those who don't match the search query
                              for (i = 0; i < tr.length; i++) {
                                span = tr[i].getElementsByClassName("span_search-id")[0];
                                txtValue = span.textContent || span.innerText;
                                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                                  tr[i].style.display = "";
                                } else {
                                  tr[i].style.display = "none";
                                }
                              }
                            })

                            tRow.style.cursor = 'pointer'
                            
                            tRow.addEventListener('click', (event) => {

                              document.querySelector('.select--input-thumb-principal').value = $objectContest.id
                              document.querySelector('.select--input-imagem-principal').value = $objectContest.id
                              document.querySelector('.select--input-carrousel-1').value = $objectContest.id
                              document.querySelector('.select--input-carrousel-2').value = $objectContest.id
                              document.querySelector('.select--input-carrousel-3').value = $objectContest.id
                              document.querySelector('.select--input-carrousel-4').value = $objectContest.id
                              tRow.style.backgroundColor = '#dee2e6'

                              const xhrPostImagens = new XMLHttpRequest
                              const formDataImagens = new FormData

                              formDataImagens.append('id_concurso', $objectContest.id)

                              xhrPostImagens.onreadystatechange = () => {

                                if(xhrPostImagens.status == 200 && xhrPostImagens.readyState == 4){

                                  const objectImgsContest = JSON.parse(xhrPostImagens.response)
                                  
                                  document.querySelector('.select--img-thumb').src = `img-contest/${objectImgsContest.imgThumb}`
                                  document.querySelector('.select--imagem-principal').src = `img-contest/${objectImgsContest.imgPrincipal}`
                                  document.querySelector('.select--imagem_carousel_1').src = `img-contest/${objectImgsContest.imgCarousel1}`
                                  document.querySelector('.select--imagem_carousel_2').src = `img-contest/${objectImgsContest.imgCarousel2}`
                                  document.querySelector('.select--imagem_carousel_3').src = `img-contest/${objectImgsContest.imgCarousel3}`
                                  document.querySelector('.select--imagem_carousel_4').src = `img-contest/${objectImgsContest.imgCarousel4}`
                                }
                              }

                              xhrPostImagens.open('POST', 'controller/imagens-sorteio.controller.php')
                              xhrPostImagens.send(formDataImagens)
                              
                            })

                        })
                      }
                    }
                    xhrGet.open('GET', 'class/json-registrar-sorteio.class.php');
                    xhrGet.send()
          </script>
          <!-- Ajax Get -->

          <style>
            .overflow{
              width:170px;
              overflow-x:scroll;
            }
          </style>

          <script>
              window.history.replaceState({}, "Hide", "http://localhost/projetos/laborcode-clientes/rifa/vendor/almasaeed2010/adminlte/cadastrar-sorteio.php")
          </script>


            
          
      </div><!-- /.container-fluid -->
    </div>
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="https://adminlte.io">Rifa - Online</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<style>
  label.labelInput input[type="file"] {
    position: fixed;
    top: -1000px;
  }
  .labelInput{
    width:100%;
    border:1px solid #dae1e3;
    border-radius:5px;
    /* border:solid 1px gray; */
    /* background-color:#fff; */
    cursor:pointer;
  }
  .icon-search{
    padding:15px;
    margin:0;
    /* background-color:#dae1e3; */
  }
  .span_file{
    margin-left:20px;
  }
</style>

<style>
  #descricao-sorteio{
    border-color:#dae1e3;
    border-radius:5px;
  }
</style>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<!-- <script src="http://cryptojs.altervista.org/api/functions_cryptography.js"></script> -->
</body>
</html>
