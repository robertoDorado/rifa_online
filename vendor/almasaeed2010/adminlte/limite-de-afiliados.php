<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");


require_once "../../../class/login-client.class.php"; 
require_once "../../../class/affiliate.class.php"; 
$user = new User;
$affiliate = new Affiliate;

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
$arrayClientUsers = $user->selectAllUsersClient();
$arrayRulesAffiliate = $affiliate->getValuesAffiliate();
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
            <h1 class="m-0">Criar regra de afiliação</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Afiliados</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Formulário de regra</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/registrar-regra-afiliado.controller.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="valor">Valor a ser pago por afiliado</label>
                    <input data-js="dinheiro" type="text" name="valor" class="form-control select--input" id="valor" placeholder="Valor a ser pago" required>
                  </div>
                  <div class="form-group">
                    <label for="limite">Limite de afiliados</label>
                    <input maxlength="5" data-js="numero" type="text" name="limite" class="form-control select--input" id="exampleInputPassword1" placeholder="Limite de afiliados" required>
                  </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Criar</button>
                  </div>
                </div>
                <!-- /.card-body -->

              </form>
            </div>
            <!-- /.card -->

            <?php if(isset($_GET['insertValues'])): ?>
              <div class="alert alert-success"><p class="text-center">Informações inseridas com sucesso</p></div>
            <?php endif; ?>
              
            <?php if(isset($_GET['updateValues'])): ?>
              <div class="alert alert-warning"><p class="text-center">Informações atualizadas com sucesso</p></div>
            <?php endif; ?>

            <!-- Script da máscara -->
            <script>
              const mask = {
                dinheiro(value){
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
                }
              }
              document.querySelectorAll('.select--input').forEach(($input) => {
                const field = $input.dataset.js

                $input.addEventListener('input', (e) => {
                  e.target.value = mask[field](e.target.value)
                })
              })
            </script>
            <!-- Script da máscara -->

            <script>
              window.history.replaceState({}, "Hide", "http://localhost/projetos/laborcode-clientes/rifa/vendor/almasaeed2010/adminlte/limite-de-afiliados.php")
            </script>

        <?php if($arrayClientUsers != array()): ?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabela de usuários</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control float-right select--inp-search-id" placeholder="Procurar Id">
                    <input type="text" class="form-control float-right select--inp-search-nome" placeholder="Procurar Nome">

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
                <table id="table" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Aniversário</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Afiliados</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($arrayClientUsers as $clientUser): ?>
                    <?php $arrayAffiliate = $affiliate->getAllAffiliate($clientUser['id']); ?>
                    <tr class="tr_search">
                      <td class="td_search_id">#<?php echo substr(md5($clientUser['id']), 0, 3); ?></td>
                      <td class="td_search_nome"><?php echo $clientUser['nome']; ?></td>
                      <td><?php echo $clientUser['aniversario']; ?></td>
                      <td><?php echo $clientUser['email']; ?></td>
                      <td><?php echo ($clientUser['used'] == 1) ? "<span style='color:#28a745;'>Ativo</span>" : "<span style='color:#d39e00;'>Pendente</span>"; ?></td>
                      <?php if($arrayAffiliate != array()): ?>
                        <td><?php echo count($arrayAffiliate); ?></td>
                      <?php else: ?>
                          <td><?php echo 0; ?></td>
                      <?php endif; ?>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          <?php endif; ?>
            <!-- /.card -->

        <?php if($arrayRulesAffiliate != array()): ?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Regras para cada afiliado</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="table" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Valor a ser pago</th>
                      <th>Limite permitido</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $arrayRulesAffiliate['valor_pago']; ?></td>
                      <td><?php echo $arrayRulesAffiliate['limite_permitido']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          <?php endif; ?>
            <!-- /.card -->


            <!-- Pesquisa na Tabela -->
          <script>
              document.querySelector('.select--inp-search-id').addEventListener('input', ($input) => {
                // Declare variables
                let filter, tr, span, i, txtValue;
                filter = $input.target.value.toLowerCase();
                let table = document.getElementById("table");
                tr = table.getElementsByClassName('tr_search')

                // Loop through all list items, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                  span = tr[i].getElementsByClassName("td_search_id")[0];
                  txtValue = span.textContent || span.innerText;
                  if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }
              })
              document.querySelector('.select--inp-search-nome').addEventListener('input', ($input) => {
                // Declare variables
                let filter, tr, span, i, txtValue;
                filter = $input.target.value.toLowerCase();
                let table = document.getElementById("table");
                tr = table.getElementsByClassName('tr_search')

                // Loop through all list items, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                  span = tr[i].getElementsByClassName("td_search_nome")[0];
                  txtValue = span.textContent || span.innerText;
                  if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }
              })
            </script>
            <!-- Pesquisa na Tabela -->
            
          </section>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </div>
  <!-- </section> -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
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
