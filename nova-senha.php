<?php
require_once "class/login-client.class.php";
$user = new User;

if(isset($_GET['token'])){
    $token = $_GET['token'];

    $data = $user->selectCurrentToken($token);
}
?>

<?php if($data): ?>
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
<!-- preloader -->
<link rel="stylesheet" href="css/preloader.css">

<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="vendor/forawesome/font-awesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css" />
<!-- Colors Css -->
<link id="color-switcher" type="text/css" rel="stylesheet" href="css/color-purple.css" />
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
                        <h1 class="text-10 text-white font-weight-700 text-uppercase mb-4">To keep connected with Largest E-Commerce Company in the World</h1>
                        <p class="text-white font-weight-300 line-height-4 mb-5">We are glad to see you again! Get access to your Orders, Wishlist and Recommendations.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Welcome Text End --> 
              <!-- Login Form
      ========================= -->
              <div class="col-md-6 d-flex flex-column bg-light shadow-lg">
                <div class="container my-auto py-5">
                  <div class="row no-gutters">
                    <div class="col-11 col-lg-10 mx-auto">
                      <h3 class="text-6 font-weight-600">Mude a sua senha</h3>
                      <!-- <p class="text-2 mb-5">Você é novo aqui? <a class="btn-link" href="register-client.php">Mude a sua senha agora</a></p> -->
                      <form id="loginForm" class="form-border" method="POST" action="pages/controller/mudar-senha.controller.php">
                        <div class="form-group icon-group icon-group-right">
                          <input name="nova-senha" type="password" class="form-control border-dark" id="password" required placeholder="Nova senha">
                          <span class="icon-inside"><i class="fas fa-lock"></i></span> </div>
                        <div class="form-group icon-group icon-group-right">
                          <input name="confirmar-senha" type="password" class="form-control border-dark" id="confirmPassword" required placeholder="Confirmar senha">
                          <span class="icon-inside"><i class="fas fa-lock"></i></span> </div>
                        <!-- <div class="form-check custom-control custom-checkbox mt-4">
                          <input id="remember-me" name="remember" class="custom-control-input" type="checkbox">
                          <label class="custom-control-label rounded-0" for="remember-me">Remember Me</label>
                        </div> -->
                        <input type="hidden" id="idUser" name="id" value="<?php echo $_GET['id']; ?>">
                        <input type="hidden" id="token" name="token" value="<?php echo $_GET['token']; ?>">
                        <div class="form-group">
                          <button class="btn btn-primary rounded-0 my-4" type="submit">Mudar senha</button>
                        </div>
                      </form>
                        <div style="display:none" class="alert alert-danger text-center select--senhas-nao-batem">As senhas não batem</div>
                    </div>
                  </div>
                </div>
                <div class="container pt-2 pb-3">
                  <div class="row">
                    <div class="col-11 col-lg-10 mx-auto">
                      <p class="text-2 text-muted mb-0">Copyright © <?php echo date('Y'); ?> <a href="index.php">Rifa</a>. Todos os direitos reservados.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Login Form End --> 
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
    const formData = new FormData;
    const xhr = new XMLHttpRequest;

    document.querySelector('form').addEventListener('submit', (e) => {
        e.preventDefault()

        const senha = document.querySelector('#password').value
        const novaSenha = document.querySelector('#confirmPassword').value
        const idUser = document.querySelector('#idUser').value
        const token = document.querySelector('#token').value

        formData.append('novaSenha', novaSenha)
        formData.append('idUser', idUser)
        formData.append('token', token)

        if(senha != novaSenha){
            e.preventDefault()
            document.querySelector('.select--senhas-nao-batem').style.display = 'block'
        }else{

            xhr.onreadystatechange = () => {
                if(xhr.status == 200 && xhr.readyState == 4){
                    if(xhr.response == 1){
                        window.location.href = 'senha-alterada.php'
                    }

                }
            }

        }

        xhr.open('POST', 'pages/controller/mudar-senha.controller.php')
        xhr.send(formData)

    })
</script>


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
<?php else: ?>
<?php require_once "pages/header.php"; ?>
    <section class="text-center hero">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8">
                    <h2>Token inválido ou expirado</h2>
                    <p class="lead"> </p>
                </div>
            </div>
        </div>
    </section>
<?php require_once "pages/footer.php"; ?>
<?php endif; ?>
