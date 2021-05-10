<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
date_default_timezone_set('America/Sao_Paulo');


require_once "../../../class/login-client.class.php"; 
require_once "../../../class/blog.class.php";
$user = new User;
$blog = new Blog;


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

$arrayBlog = $blog->getAll();
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
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="plugins/simplemde/simplemde.min.css">
  
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
          <!-- <i class="fas fa-search"></i> -->
          <?php echo date("d/m/Y H:i"); ?>
        </a>
        <div class="navbar-search-block">
          <form style="display:none;" class="form-inline">
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
      <li style="display:none;" class="nav-item dropdown">
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
          <i style="display:none;" class="far fa-bell"></i>
          <span style="display:none;" class="badge badge-warning navbar-badge">15</span>
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
          <i style="display:none;" class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i style="display:none;" class="fas fa-th-large"></i>
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
            <h1 class="m-0">Criação do Blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Criação do Blog</li>
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
                <h3 class="card-title">Criar um novo Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/registrar-blog.controller.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="titulo_post">Titulo do post</label>
                    <input type="text" name="titulo_post" class="form-control" id="titulo_post" placeholder="Título do Post">
                  </div>
                  <div class="form-group">
                    <label for="texto_blog">Texto do Blog</label><br>
                    <!-- <textarea maxlength="20000" class="form-control" name="texto_blog" id="texto_blog" cols="143" rows="5"></textarea> -->
                    <!-- Main content -->
                      <section class="content">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card card-outline card-info">
                              <!-- /.card-header -->
                              <div class="card-body">
                                <textarea maxlength="20000" id="summernote" cols="137" rows="5" class="form-control" name="texto_blog"></textarea>
                              </div>
                            </div>
                          </div>
                          <!-- /.col-->
                        </div>
                        <!-- ./row -->
                  </div>
                  <input type="hidden" name="date_post" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
              </form>
            </div>

            <?php if(isset($_GET['insertPost'])): ?>
              <div class="alert alert-success"><p class="text-center">Post criado com sucesso</p></div>
            <?php endif;?>

            
            <?php if(isset($_GET['emptyId'])): ?>
              <div class="alert alert-warning"><p class="text-center">Selecione um item antes para trocar de imagem</p></div>
            <?php endif;?>


            <?php if(isset($_GET['imgThumb'])): ?>
              <div class="alert alert-success"><p class="text-center">Nova Imagem thumb atualizada com sucesso id #<?php echo substr(md5($_GET['id']), 0, 3); ?></p></div>
            <?php endif;?>


            <?php if(isset($_GET['imgPrincipal1'])): ?>
              <div class="alert alert-success"><p class="text-center">Nova Imagem Principal 1 atualizada com sucesso id #<?php echo substr(md5($_GET['id']), 0, 3); ?></p></div>
            <?php endif;?>


            <?php if(isset($_GET['imgPrincipal2'])): ?>
              <div class="alert alert-success"><p class="text-center">Nova Imagem Principal 2 atualizada com sucesso id #<?php echo substr(md5($_GET['id']), 0, 3); ?></p></div>
            <?php endif;?>


            <?php if(isset($_GET['updateBlog'])): ?>
              <div class="alert alert-success"><p class="text-center">Post Atualizado com sucesso id #<?php echo substr(md5($_GET['id']), 0, 3); ?></p></div>
            <?php endif;?>


            <?php if(isset($_GET['deletePost'])): ?>
              <div class="alert alert-danger"><p class="text-center">Post Deletado com sucesso id #<?php echo substr(md5($_GET['id']), 0, 3); ?></p></div>
            <?php endif;?>
            <!-- /.card -->
          </section>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    <form class="row select--form-thumb-principal" enctype="multipart/form-data" action="controller/img_thumb_blog.controller.php" method="POST">
        <div class="form-group col-md-6">
          <label for="image_thumb">Selecione a thumb blog - 256px X 274px</label><br>
          <input type="file" id="imagemThumb" name="imagemThumb"><br><br>
          <input type="hidden" name="id_post" class="select--input-id">
          <img class="select--img-thumb" width="100" height="100" src="img-contest/default-image.png" alt="image_thumb">
        </div>
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
      </form>
      <form class="row select--form-thumb-principal" enctype="multipart/form-data" action="controller/img_principal_1_blog.controller.php" method="POST">
        <div class="form-group col-md-6">
          <label for="image_thumb">Selecione a imagem principal 1 - 1010px X 408px</label><br>
          <input type="file" id="imagemPrincipal1" name="imagemPrincipal1"><br><br>
          <input type="hidden" name="id_post" class="select--input-id">
          <img class="select--img-principal-1" width="100" height="100" src="img-contest/default-image.png" alt="image_thumb">
        </div>
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
      </form>
      <form class="row select--form-thumb-principal" enctype="multipart/form-data" action="controller/img_principal_2_blog.controller.php" method="POST">
        <div class="form-group col-md-6">
          <label for="image_thumb">Selecione a imagem principal 2 - 1010px X 481px</label><br>
          <input type="file" id="imagemPrincipal2" name="imagemPrincipal2" name="imagemPrincipal2"><br><br>
          <input type="hidden" name="id_post" class="select--input-id">
          <img class="select--img-principal-2" width="100" height="100" src="img-contest/default-image.png" alt="image_thumb">
        </div>
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
      </form>

      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabela do blog</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 320px;">
                    <input style="width:40%;" type="text" name="table_search" class="form-control float-right select--inp-search-title select--inp-search-nome" placeholder="Procurar por título">
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
                      <th>Titulo</th>
                      <th>Texto</th>
                      <th>Data</th>
                      <th>Editar</th>
                      <th>Excluir</th>
                    </tr>
                  </thead>
                  <tbody id="select--t-body">
                  <?php if($arrayBlog != array()):?>
                    <?php foreach($arrayBlog as $blog): ?>
                    <tr class="select--tr tr_search">
                      <td class="td_search_id">
                        <span>#<?php echo substr(md5($blog['id']), 0, 3); ?></span>
                        <input type="hidden" value="<?php echo $blog['id']; ?>">
                      </td>
                      <td class="td_search_nome">
                        <div class="overflow-text"><?php echo $blog['titulo']; ?></div>
                        <input type="hidden" value="<?php echo $blog['id']; ?>">
                      </td>
                      <td>
                        <div class="overflow-text"><?php echo $blog['texto']; ?></div>
                        <input type="hidden" value="<?php echo $blog['id']; ?>">
                      </td>
                      <td>
                        <div><?php echo $blog['date_post']; ?></div>
                        <input type="hidden" value="<?php echo $blog['id']; ?>">
                      </td>
                      <td>
                        <a class="btn btn-primary" href="editar-blog.php?id=<?php echo $blog['id'] ?>">Editar</a>
                        <input type="hidden" value="<?php echo $blog['id']; ?>">
                      </td>
                      <td>
                        <a class="btn btn-danger" href="controller/excluir-blog.controller.php?id=<?php echo $blog['id'] ?>">Excluir</a>
                        <input type="hidden" value="<?php echo $blog['id']; ?>">
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </section>
          <!-- /.content -->
        </div>

    <style>
      .overflow-text{
        width:130px;
        height:50px;
        overflow-x:scroll;
      }
      .select--tr:hover{
        cursor:pointer;
      }
    </style>


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

    <!-- Get Input hidden id -->
      <script>
        document.querySelectorAll('.select--tr').forEach(($trSelected) => {
          $trSelected.addEventListener('click', (e) => {
              const itemInput = e.target.children
              document.querySelectorAll('.select--input-id').forEach(($inputHidden) => {
                $inputHidden.value = itemInput[1].value
              })

              const xhr = new XMLHttpRequest
              const formData = new FormData

              formData.append('id', itemInput[1].value)

              xhr.onreadystatechange = () => {
                if(xhr.status == 200 && xhr.readyState == 4){
                  
                  const objectImages = JSON.parse(xhr.response)
                  document.querySelector('.select--img-thumb').src = `../../../img-blog/${objectImages.imgThumb}`
                  document.querySelector('.select--img-principal-1').src = `../../../img-blog/${objectImages.imgPrincipal1}`
                  document.querySelector('.select--img-principal-2').src = `../../../img-blog/${objectImages.imgPrincipal2}`
                }
              }

              xhr.open("POST", "controller/get-images.controller.php")
              xhr.send(formData)
          })
        })
      </script>
    <!-- Get Input hidden id -->

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <script>
    window.history.replaceState({}, "Hide", "http://localhost/projetos/laborcode-clientes/rifa/vendor/almasaeed2010/adminlte/blog.php")
  </script>

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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="plugins/codemirror/codemirror.js"></script>
<script src="plugins/codemirror/mode/css/css.js"></script>
<script src="plugins/codemirror/mode/xml/xml.js"></script>
<script src="plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
</body>
</html>
