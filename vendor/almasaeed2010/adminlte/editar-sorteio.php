<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
require_once "class/sorteio.class.php";

$sorteio = new Sorteio;

if(isset($_GET['id'])){
    $dataSorteio = $sorteio->selectSorteioToUpdate($_GET['id']);
}

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
              <li class="navigation-item"><a href="lista-de-participantes.php">Lista de participantes</a></li>
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
            <h1 class="m-0">Área de atualização dos sorteios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Atualizar sorteio</li>
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
            
          <script>
              window.history.replaceState({}, "Hide", "http://localhost/projetos/laborcode-clientes/rifa/vendor/almasaeed2010/adminlte/cadastrar-sorteio.php")
          </script>

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Atualize o sorteio aqui</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/atualizar-sorteio.controller.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="titulo-sorteio">Título do sorteio</label>
                    <input name="titulo_sorteio" value="<?php echo $dataSorteio['titulo_produto']; ?>" type="text" class="form-control" id="titulo-sorteio-2" placeholder="Título do Sorteio">
                  </div>
                  <div class="form-group">
                    <label for="descricao_sorteio">Descrição do Sorteio (Regras)</label><br>
                    <textarea name="descricao_sorteio" id="descricao_sorteio" cols="143" rows="5"><?php echo $dataSorteio['descricao_produto']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="preco-ticket">Preço do Ticket</label>
                    <input name="preco_sorteio" value="<?php echo $dataSorteio['preco_produto']; ?>" data-js="money" type="text" class="form-control" id="preco-ticket-2" placeholder="Preço do Ticket">
                  </div>
                  <div class="form-group">
                    <label for="quantidade-de-premios">Quantidade de Prêmios</label>
                    <input name="qtd_premios" value="<?php echo $dataSorteio['qtd_produto']; ?>" data-js="numero" type="text" class="form-control" id="quantidade-premios-2" placeholder="Quantidade de Prêmios">
                  </div>
                  <div class="form-group">
                    <label for="quantidade-de-tickets">Quantidade de tickets disponível</label>
                    <input name="qtd_tickets" value="<?php echo $dataSorteio['qtd_tickets']; ?>" type="text" class="form-control" id="quantidade-de-tickets-2" placeholder="Quantidade de Tickets">
                  </div>
                  <div class="form-group">
                    <label for="data-inicio-sorteio">Data Início do Sorteio</label>
                    <input name="data_inicio_sorteio" value="<?php echo $dataSorteio['data_inicio_sorteio']; ?>" type="datetime-local" class="form-control" id="data-inicio-sorteio-2" placeholder="Data Início do Sorteio">
                  </div>
                  <div class="form-group">
                    <label for="data-fim-sorteio">Data Fim do Sorteio</label>
                    <input name="data_fim_sorteio" value="<?php echo $dataSorteio['data_fim_sorteio']; ?>" type="datetime-local" class="form-control" id="data-fim-sorteio-2" placeholder="Data Fim do Sorteio">
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                    <div class="form-group">
                        <label class="labelInput">
                          <input id="file-2" name="userPhoto" type="file" class="file_customizada form-control" required/>
                          <span class="span_file">Selecione a imagem do produto sorteado</span><span class="icon-inside"><i class="fa fa-search icon-search"></i></span>
                        </label>
                    </div>
                    </div>
                  </div> -->
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                  <input type="hidden" name="id" value="<?php echo $dataSorteio['id']; ?>">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
              </form>

              </div>
            <!-- /.card -->
            
          </section>
        <!-- /.row (main row) -->

        </div><!-- /.container-fluid -->
      
    </div>
    </section>
    <!-- /.content -->
  </div>



          
      

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

<script>
    document.getElementById('file').addEventListener('change', ($evt) => {
        const onlyName = $evt.target.value.substr(12)
        const spanFile = document.querySelector('.span_file')
        spanFile.innerHTML = onlyName
    })
</script>

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
</body>
</html>