<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");


require_once "../../../class/login-client.class.php";
require_once "class/faq.class.php"; 
$user = new User;
$faq = new FAQ;

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

$arrayCategory = $faq->getAllCategory();
$arrayFaq = $faq->getAllFaq();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rifa - Online | Dashboard</title>

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
            <h1 class="m-0">FAQ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Faq</a></li>
              <li class="breadcrumb-item active">Área de Registro</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- general form elements -->
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registro de categoria</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/registrar-categoria-faq.controller.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nome-categoria">Nome da categoria</label>
                    <input type="text" name="nomeCategoria" class="form-control" id="nome-categoria" placeholder="Nome da Categoria">
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
              </form>
              
            </div>
            </div>
          <!-- /.card -->

          <?php if(isset($_GET['registerCategory'])): ?>
            <div class="text-center alert alert-success">Categoria cadastrada com sucesso</div>
          <?php endif; ?>

          <?php if(isset($_GET['limitCategory'])): ?>
            <div class="text-center alert alert-danger">Limite de categorias atingido</div>
          <?php endif; ?>

          <?php if(isset($_GET['updateCategory'], $_GET['id'])): ?>
            <div class="text-center alert alert-success">Categoria atualizada com sucesso id #<?php echo substr(md5($_GET['id']), 0, 3); ?></div>
          <?php endif; ?>


          <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registro das perguntas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/registrar-faq.controller.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="pergunta">Registro da pergunta</label>
                    <input required type="text" name="pergunta" class="form-control" id="pergunta" placeholder="Registro da pergunta">
                  </div>
                  <div class="form-group">
                    <label for="resposta">Registro da resposta</label><br>
                    <textarea required name="resposta" id="resposta" cols="143" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="quantidade-de-tickets">Selecione a categoria da pergunta</label>
                    <?php if($arrayCategory != array()): ?>
                    <?php foreach($arrayCategory as $category): ?>
                      <div id="form-check" class="form-check">
                        <input required class="form-check-input select--input-radio" name="id_categoria" type="radio" value="<?php echo $category['id']; ?>">
                        <label class="form-check-label"><?php echo $category['categoria']; ?></label>
                      </div>
                    <?php endforeach; ?>
                    <?php endif; ?>

                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
              </form>
              
            </div>
            </div>
          <!-- /.card -->

          <?php if(isset($_GET['registerFaq'])): ?>
            <div class="alert alert-success text-center">FAQ registrado com sucesso</div>
          <?php endif; ?>

          <?php if(isset($_GET['updateFaq'])): ?>
            <div class="alert alert-warning text-center">FAQ atualizado com sucesso</div>
          <?php endif; ?>

          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabela de categorias</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 320px;">
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap tr_search">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Categoria</th>
                      <th>Editar</th>
                      <th>Excluir</th>
                    </tr>
                  </thead>
                  <tbody id="select--t-body">
                  <?php if($arrayCategory != array()): ?>
                  <?php foreach($arrayCategory as $category): ?>
                    <tr id="select--tr">
                      <td>#<?php echo substr(md5($category['id']), 0, 3); ?></td>
                      <td><?php echo $category['categoria']; ?></td>
                      <td><a href="editar-categoria.php?id=<?php echo $category['id']; ?>" class="btn btn-primary">Editar</a></td>
                      <td><a id="link-excluir-categoria" href="controller/excluir-categoria.controller.php?id=<?php echo $category['id']; ?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                  <?php endforeach; ?>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Ajax delete -->
              <script>
                const xhr = new XMLHttpRequest
                const formData = new FormData

                document.querySelectorAll("#link-excluir-categoria").forEach(($link) => {
                  $link.addEventListener('click', (e) => {
                    e.preventDefault()
                    const tRow = e.target.parentNode.parentNode

                    let link = e.target.getAttribute('href')
                    link = link.substr(47)
                    const data = {
                      id:link
                    }

                    formData.append('id', data.id)
                    xhr.onreadystatechange = () => {
                      if(xhr.readyState == 4 && xhr.status == 200){

                        if(xhr.response == 0){

                            tRow.style.display = 'none'
                        }
                      }
                    }

                    xhr.open("POST", "controller/excluir-categoria.controller.php")
                    xhr.send(formData)
                  })
                })      
                  
              </script>
            <!-- Ajax delete -->


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabela de perguntas</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 320px;">
                    <input style="width:40%;" type="text" name="table_search" class="form-control float-right select--inp-search-title" placeholder="Procurar por pergunta">
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
                <table class="table table-hover text-nowrap tr_search">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Pergunta</th>
                      <th>Resposta</th>
                      <th>Categoria</th>
                      <th>Editar</th>
                      <th>Excluir</th>
                    </tr>
                  </thead>
                  <tbody id="table">
                  <?php if($arrayFaq != array()): ?>
                  <?php foreach($arrayFaq as $faqNames): ?>
                  <?php $arrayCategoryName = $faq->getCategoriaName($faqNames['id_categoria']); ?>
                    <tr class="tr_search">
                      <td class="span_search-id">#<?php echo substr(md5($faqNames['id']), 0, 3) ?></td>
                      <td class="span_search-title"><?php echo $faqNames['pergunta']; ?></td>
                      <td><?php echo $faqNames['resposta']; ?></td>
                      <?php if($arrayCategoryName != array()): ?>
                      <?php foreach($arrayCategoryName as $categoryName): ?>
                        <td><?php echo $categoryName['categoria']; ?></td>
                      <?php endforeach; ?>
                      <?php endif; ?>
                      <td><a href="editar-pergunta.php?id=<?php echo $faqNames['id']; ?>" class="btn btn-primary">Editar</a></td>
                      <td><a href="controller/excluir-pergunta.controller.php?id=<?php echo $faqNames['id'];?>" class="btn btn-danger select--link-excluir-pergunta">Excluir</a></td>
                    </tr>
                  <?php endforeach; ?>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Ajax FAQ Delete -->
              <script>
                const xhrFaq = new XMLHttpRequest
                const formDataFaq = new FormData
                
                document.querySelectorAll(".select--link-excluir-pergunta").forEach(($link) => {
                  $link.addEventListener('click', (e) => {
                    e.preventDefault()
                    const trFaq = e.target.parentNode.parentNode

                    let link = e.target.getAttribute('href')
                    link = link.substr(46)

                    const linkObj = {
                      id:link
                    }

                    formDataFaq.append('id', linkObj.id)

                    xhrFaq.onreadystatechange = () => {
                      if(xhrFaq.readyState == 4 && xhrFaq.status == 200){
                        if(xhrFaq.response == 0){

                          trFaq.style.display = 'none'
                        }
                      }
                    }

                    xhrFaq.open("POST", "controller/excluir-pergunta.controller.php")
                    xhrFaq.send(formDataFaq)

                  })
                })
              </script>
            <!-- Ajax FAQ Delete -->


            

            <!-- Seach table -->
            <script>
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
            </script>
            <!-- Seach table -->

          <style>
            .overflow{
              width:170px;
              overflow-x:scroll;
            }
          </style>
          
      </div><!-- /.container-fluid -->
    </div>
  </section>
    <!-- /.content -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </div>
  </section>
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
