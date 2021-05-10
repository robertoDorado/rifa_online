<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title>Rifa - Online</title>
<meta name="description" content="Login and Register Form Html Template">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="vendor/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<!-- Colors Css -->
<link id="color-switcher" type="text/css" rel="stylesheet" href="css/color-purple.css" />
<!-- Font awesome -->
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.min.css">
<!-- preloader -->
<link rel="stylesheet" href="css/preloader.css">
</head>
<body>

<!-- início do preloader -->
<div id="preloader">
    <div class="inner">
       <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
       <div class="bolas">
          <div></div>
          <div></div>
          <div></div>                    
       </div>
    </div>
</div>
<!-- fim do preloader --> 

<div id="main-wrapper" class="oxyy-login-register">
  <div class="hero-wrap d-flex align-items-center h-100">
    <div class="hero-mask opacity-8 bg-dark"></div>
    <div class="hero-bg hero-bg-scroll" style="background-image:url('assets/images/elements/login-bg-4.jpg');"></div>
    <div class="hero-content w-100 h-100">
      <div class="container">
        <div class="row no-gutters min-vh-100">
          <div class="col-lg-11 col-xl-9 mx-auto">
            <div class="row no-gutters min-vh-100"> 
              <!-- Welcome Text
      ========================= -->
              <div class="col-md-6">
                <div class="hero-wrap d-flex align-items-center h-100">
                  <div class="hero-mask opacity-7 bg-primary"></div>
                  <div class="hero-bg hero-bg-scroll" style="background-image:url('assets/images/elements/login-bg.jpg');"></div>
                  <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
                    <div class="row no-gutters">
                      <div class="col-10 col-lg-9 mx-auto">
                        <div class="logo mt-5 mb-5 mb-md-0"> <a class="d-flex" href="index.html" title="Oxyy"><img src="assets/images/icon/feature/logo-light.png" alt="Oxyy"></a> </div>
                      </div>
                    </div>
                    <div class="row no-gutters my-auto">
                      <div class="col-10 col-lg-9 mx-auto">
                        <h1 class="text-10 text-white font-weight-700 text-uppercase mb-4">Mantenha-se conectado para concorrer a milhares de prêmios!</h1>
                        <p class="text-white font-weight-300 line-height-4 mb-5">Junte-se ao nosso grupo em poucos minutos! Inscreva-se com seus detalhes para começar.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Welcome Text End --> 
              
              <!-- Register Form
      ========================= -->
              <div class="col-md-6 d-flex flex-column bg-light shadow-lg">
                <div class="container my-auto py-5">
                  <div class="row no-gutters">
                    <div class="col-11 col-lg-10 mx-auto">
                      <h3 class="text-6 font-weight-600">Inscreva-se</h3>
                      <p class="text-2 mb-5">Já possui uma conta? <a class="btn-link" href="login-client.php">Log in</a></p>
                      <form id="signupForm" action="pages/controller/register-client.controller.php" class="form-border" method="post" enctype="multipart/form-data">
                        <div class="form-group icon-group icon-group-right">
                          <input name="nome" type="text" class="form-control border-dark" id="fullName" required placeholder="Nome e Sobrenome">
                          <span class="icon-inside"><i class="fas fa-user"></i></span> </div>
                        <div class="form-group icon-group icon-group-right">
                          <input name="aniversario" type="date" class="form-control border-dark" id="aniversario" required placeholder="Data de aniversário">
                          <span class="icon-inside"><i class="fas fa-birthday-cake"></i></span>
                           </div>
                        <div class="form-group icon-group icon-group-right">
                          <input name="endereco" type="text" class="form-control border-dark" id="endereco" required placeholder="Endereço">
                          <span class="icon-inside"><i class="fas fa-address-card"></i></span> </div>
                        <div class="form-group icon-group icon-group-right">
                          <input name="telefone" data-js="telefone" type="text" class="form-control border-dark" id="telefone" placeholder="Telefone (Não obrigatório)">
                          <span class="icon-inside"><i class="fas fa-phone"></i></span> </div>
                        <div class="form-group icon-group icon-group-right">
                          <input name="celular" data-js="celular" type="text" class="form-control border-dark" id="celular" required placeholder="Celular">
                          <span class="icon-inside"><i class="fa fa-mobile" aria-hidden="true"></i></span> </div>
                        <div class="form-group icon-group icon-group-right">
                          <input name="email" type="email" class="form-control border-dark" id="emailAddress" required placeholder="Email">
                          <span class="icon-inside"><i class="fas fa-envelope"></i></span> </div>
                        <div class="form-group icon-group icon-group-right">
                          <input name="senha" type="password" class="form-control border-dark" id="loginPassword" required placeholder="Senha">
                          <span class="icon-inside"><i class="fas fa-lock"></i></span> </div>
                          <div class="form-group">
                            <label class="labelInput">
                              <input id="file" name="userPhoto" type="file" class="file_customizada form-control" required/>
                              <span class="span_file">Selecione uma foto de perfil</span><span class="icon-inside"><i class="fa fa-search icon-search"></i></span>
                            </label>
                          </div>
                        <div class="form-check custom-control custom-checkbox">
                          <input id="agree" name="agree" class="custom-control-input" type="checkbox" required>
                          <label class="custom-control-label rounded-0" for="agree">Eu concordo com os <a class="btn-link" href="politica-de-privacidade.php">Termos de serviço.</a></label>
                        </div>
                        <input type="hidden" name="token" value="<?php echo md5(time() . rand(0, 999) .rand(0, 999)); ?>">
                        <button class="btn btn-primary rounded-0 my-4" type="submit">Criar conta</button>
                      </form>
                      <?php
                        if(isset($_GET['errorEmail'])){
                          echo "<div class='alert alert-danger text-center'><p>Este email já possui uma conta<p></div>";
                        }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="container pt-2 pb-3">
                  <div class="row">
                    <div class="col-11 col-lg-10 mx-auto">
                      <p class="text-2 text-muted mb-0">Copyright © <?php echo date('Y'); ?> <a href="index.php">Rifa</a>. All Rights Reserved.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Register Form End --> 
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  input[type="date"]::-webkit-inner-spin-button,
  input[type="date"]::-webkit-calendar-picker-indicator {
      display: none;
      -webkit-appearance: none;
  }
</style>

<!-- Input masks -->
<script>
    const masks = {
        telefone(value){
            return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '($1) $2')
            .replace(/(\d{4})(\d)/, '$1-$2')
            .replace(/(\d{4})\d+?$/, '$1')
        },
        celular(value){
            return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '($1) $2')
            .replace(/(\d{5})(\d)/, '$1-$2')
            .replace(/(-\d{4})\d+?$/, '$1')
        }
    }

    document.querySelectorAll('input').forEach(($input) => {
        const field = $input.dataset.js
        $input.addEventListener('input', (e) => {
            e.target.value = masks[field](e.target.value)
        }, false)
    })
</script>
<!-- Input masks -->


<!-- tratamento da url -->
    <script>
      window.history.replaceState({}, "Hide", 'http://localhost/projetos/laborcode-clientes/rifa/register-client.php')
    </script>
<!-- tratamento da url -->


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
    /* border:1px solid #dae1e3; */
    border-bottom:1px solid #000;
    /* background-color:#fff; */
    cursor:pointer;
  }
  .icon-search{
    padding:15px;
    margin:0;
    /* background-color:#dae1e3; */
  }
  /* .span_file{
    margin-left:20px;
  } */
</style>

<style>
  .oxyy-login-register .bg-primary, .oxyy-login-register .badge-primary {
    background-color: #7e1462 !important;
}
.oxyy-login-register .text-primary, .oxyy-login-register .btn-link {
    color: #7e1462 !important;
}
.oxyy-login-register .btn-primary {
    background-color: #7e1462;
    border-color: #7e1462;
}
</style>

<!-- Video Modal
========================= -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content bg-transparent border-0">
      <button type="button" class="close text-white opacity-10 ml-auto mr-n3 font-weight-400" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div class="modal-body p-0">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" id="video" allow="autoplay"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Video Modal end --> 



<!-- Script --> 
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/bootstrap.bundle.min.js"></script> 
<!-- Style Switcher --> 
<script src="assets/js/switcher.min.js"></script> 
<script src="assets/js/theme.js"></script>
</body>
</html>

<script>

//<![CDATA[
$(window).on('load', function () {
  $('#preloader .inner').fadeOut();
  $('#preloader').delay(350).fadeOut('slow'); 
  $('body').delay(350).css({'overflow': 'visible'});
})
//]]>

</script>