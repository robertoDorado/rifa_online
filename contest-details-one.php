<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");

require_once "vendor/almasaeed2010/adminlte/class/sorteio.class.php";
require_once "class/login-client.class.php"; 
$user = new User;
$sorteio = new Sorteio;

if(isset($_SESSION['user'])){

  $id = $_SESSION['user'];
  $ip = $_SERVER['REMOTE_ADDR'];

  $user->getIdIp($id, $ip);

  if(isset($id) && !empty($id)){
    $dataUser = $user->getUserCostumer($id);
  }
}else{
  header('Location: ./');
}

if(!isset($_GET['id']) || empty($_GET['id'])){
  header('Location: ./');
}else{
  $id = $_GET['id'];

  $data = $sorteio->renderContestById($id); 
  $dataFimSorteio = substr($data['data_fim_sorteio'], 0, 10);
  $dataFimSorteioFormat = str_replace('-', '/', $dataFimSorteio);
    
}
?>
<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rifa - Online</title>
  <!-- site favicon -->
  <link rel="icon" type="image/png" href="assets/images/favicon.png" sizes="16x16">
  <!-- bootstrap 4  -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- fontawesome 5  -->
  <link rel="stylesheet" href="assets/css/all.min.css">
  <!-- line-awesome webfont -->
  <link rel="stylesheet" href="assets/css/line-awesome.min.css">
  <!-- custom select css -->
  <link rel="stylesheet" href="assets/css/nice-select.css">
  <!-- animate css  -->
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <!-- lightcase css -->
  <link rel="stylesheet" href="assets/css/lightcase.css">
  <!-- slick slider css -->
  <link rel="stylesheet" href="assets/css/slick.css">
  <!-- jquery ui css -->
  <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
  <!-- datepicker css -->
  <link rel="stylesheet" href="assets/css/datepicker.min.css">
  <!-- style main css -->
  <link rel="stylesheet" href="assets/css/main.css">
  <!-- preloader -->
  <link rel="stylesheet" href="css/preloader.css">
  <!-- md5 js -->
  <script src="js/md5.js"></script>
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

  <!-- <div class="preloader">
    <svg class="mainSVG" viewBox="0 0 800 600" xmlns="http://www.w3.org/2000/svg">
      <defs>   
        <path id="puff" d="M4.5,8.3C6,8.4,6.5,7,6.5,7s2,0.7,2.9-0.1C10,6.4,10.3,4.1,9.1,4c2-0.5,1.5-2.4-0.1-2.9c-1.1-0.3-1.8,0-1.8,0
        s-1.5-1.6-3.4-1C2.5,0.5,2.1,2.3,2.1,2.3S0,2.3,0,4.4c0,1.1,1,2.1,2.2,2.1C2.2,7.9,3.5,8.2,4.5,8.3z" fill="#fff"/>
        <circle id="dot"  cx="0" cy="0" r="5" fill="#fff"/>   
      </defs>
      
        <circle id="mainCircle" fill="none" stroke="none" stroke-width="2" stroke-miterlimit="10" cx="400" cy="300" r="130"/>
        <circle id="circlePath" fill="none" stroke="none" stroke-width="2" stroke-miterlimit="10" cx="400" cy="300" r="80"/>
      
      <g id="mainContainer" >
        <g id="car">
    <path id="carRot" fill="#FFF"  d="M45.6,16.9l0-11.4c0-3-1.5-5.5-4.5-5.5L3.5,0C0.5,0,0,1.5,0,4.5l0,13.4c0,3,0.5,4.5,3.5,4.5l37.6,0
      C44.1,22.4,45.6,19.9,45.6,16.9z M31.9,21.4l-23.3,0l2.2-2.6l14.1,0L31.9,21.4z M34.2,21c-3.8-1-7.3-3.1-7.3-3.1l0-13.4l7.3-3.1
      C34.2,1.4,37.1,11.9,34.2,21z M6.9,1.5c0-0.9,2.3,3.1,2.3,3.1l0,13.4c0,0-0.7,1.5-2.3,3.1C5.8,19.3,5.1,5.8,6.9,1.5z M24.9,3.9
      l-14.1,0L8.6,1.3l23.3,0L24.9,3.9z"/>      
        </g>
      </g>
    </svg>
  </div> -->

  <!-- scroll-to-top start -->
  <div class="scroll-to-top">
    <span class="scroll-icon">
      <i class="las la-arrow-up"></i>
    </span>
  </div>
  <!-- scroll-to-top end -->


  <!-- theme-switcher start -->
  <!-- <div class="theme-switcher">
    <div class="theme-switcher__icon">
      <i class="las la-cog"></i>
    </div>
    <div class="theme-switcher__body">
      <div class="single dark active">
        <a href="index.php">Dark Version</a>
      </div>
      <div class="single light mt-4">
        <a href="light-index.php">Light Version</a>
      </div>
    </div>
  </div> -->
  <!-- theme-switcher end -->
  <!-- page-wrapper start -->
  <div class="page-wrapper">
      <!-- login modal -->
  <div class="modal fade" id="loginModal" tabindex="1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-body">
          <div class="account-form-area">
            <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
            <h3 class="title">Welcome Back</h3>
            <div class="account-form-wrapper">
              <form>
                <div class="form-group">
                  <label>Email <sup>*</sup></label>
                  <input type="email" name="login_name" id="login_name" placeholder="Enter your Email">
                </div>
                <div class="form-group">
                  <label>password <sup>*</sup></label>
                  <input type="password" name="login_pass" id="login_pass" placeholder="password">
                </div>
                <div class="d-flex flex-wrap justify-content-between mt-2">
                  <div class="custom-checkbox">
                    <input type="checkbox" name="id-1" id="id-1" checked>
                    <label for="id-1">Remember Password</label>
                    <span class="checkbox"></span>
                  </div>
                  <a href="#0" class="link">Forgot Password?</a>
                </div>
                <div class="form-group text-center mt-5">
                  <button class="cmn-btn">log in</button>
                </div>
              </form>
              <p class="text-center mt-4">Don’t have an account? <a href="#0" data-toggle="modal" data-target="#signupModal"> Sign Up Now</a></p>
              <div class="divider">
                <span>or</span>
              </div>
              <ul class="social-link-list">
                <li><a href="#0"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#0"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#0"><i class="fab fa-google-plus-g"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Sign Up modal -->
  <div class="modal fade" id="signupModal" tabindex="1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-body">
          <div class="account-form-area">
            <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
            <h3 class="title">Open Free Account</h3>
            <div class="account-form-wrapper">
              <form>
                <div class="form-group">
                  <label>Email <sup>*</sup></label>
                  <input type="email" name="signup_name" id="signup_name" placeholder="Enter your Email">
                </div>
                <div class="form-group">
                  <label>password <sup>*</sup></label>
                  <input type="password" name="signup_pass" id="signup_pass" placeholder="password">
                </div>
                <div class="form-group">
                  <label>confirm password <sup>*</sup></label>
                  <input type="password" name="signup_re-pass" id="signup_re-pass" placeholder="Confirm Password">
                </div>
                <div class="d-flex flex-wrap mt-2">
                  <div class="custom-checkbox">
                    <input type="checkbox" name="id-2" id="id-2" checked>
                    <label for="id-2">I agree to the</label>
                    <span class="checkbox"></span>
                  </div>
                  <a href="#0" class="link ml-1">Terms, Privacy Policy and Fees</a>
                </div>
                <div class="form-group text-center mt-5">
                  <button class="cmn-btn">log in</button>
                </div>
              </form>
              <p class="text-center mt-4"> Already have an account? <a href="#0" data-target="#loginModal">Login</a></p>
              <div class="divider">
                <span>or</span>
              </div>
              <ul class="social-link-list">
                <li><a href="#0"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#0"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#0"><i class="fab fa-google-plus-g"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- header-section start  -->
  <header class="header">
    <div class="header__top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-6">
            <div class="left d-flex align-items-center">
              <a href="contact.php"><i class="las la-phone-volume"></i> Atendimento ao cliente</a>
              <!-- <div class="language">
                <i class="las la-globe-europe"></i>
                <select>
                  <option>En</option>
                  <option>Rus</option>
                  <option>Bn</option>
                  <option>Hp</option>
                  <option>Frn</option>
                </select>
              </div> -->
            </div>
          </div>
          <?php if(isset($_SESSION['user'])): ?>
          <div class="col-sm-6">
            <div class="right">
              <!-- <div class="product__cart">
                <span class="total__amount">0.00</span>
                <a href="cart.php"  class="amount__btn">
                  <i class="las la-shopping-basket"></i>
                  <span class="cart__num">08</span>
                </a>
              </div> -->
              <?php $arrayNome = explode(" ", $dataUser['nome']); ?>

              <span>Olá <?php echo $arrayNome[0]; ?>, Bem vindo novamente!</span>
                <a style="margin-left:30px;" href="pages/sair.php">Sair</a>
              <!-- User Btn -->
              <!-- <a href="#0" class="user__btn" data-toggle="modal" data-target="#loginModal"><i class="las la-user"></i></a> -->
              <!-- User Btn -->
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div><!-- header__top end -->
    <div class="header__bottom">
      <div class="container">
        <nav class="navbar navbar-expand-xl p-0 align-items-center">
          <a class="site-logo site-title" href="index.php"><img src="assets/images/logo.png" alt="site-logo"><span class="logo-icon"><i class="flaticon-fire"></i></span></a>
          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="menu-toggle"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav main-menu ml-auto">
              <li class="menu_has_children">
                <a href="index.php">Home</a>
                <!-- <ul class="sub-menu">
                  <li><a href="">Home One</a></li>
                  <li><a href="index-two.php">Home Two</a></li>
                  <li><a href="index-three.php">Home Three</a></li>
                  <li><a href="index-four.php">Home Four</a></li>
                </ul> -->
              </li>
              <li class="menu_has_children">
                <a href="#0">concursos</a>
                <ul class="sub-menu">
                  <li><a href="contest.php">Todos os concursos</a></li>
                  <!-- <li><a href="contest-details-one.php">sobre o concurso</a></li> -->
                  <!-- <li><a href="contest-details-two.php">Contest Details Two</a></li> -->
                  <!-- <li><a href="lottery-details.php">Detalhes do sorteio</a></li> -->
                  <!-- <li><a href="lottery-details-two.php">Lottery Details Two</a></li> -->
                </ul>
              </li>
              <!-- <li><a href="winner.php">Vencedores</a></li> -->
              <li class="menu_has_children">
                <a href="#">Rifas</a>
                <ul class="sub-menu">
                  <li><a href="about.php">sobre nós</a></li>
                  <li><a href="how-work.php">como funciona</a></li>
                </ul>
              </li>
              <?php if(isset($_SESSION['user'])): ?>
              <li class="menu_has_children">
              <!-- <li><a href="error-404.php">404 Page</a></li> -->
                <a href="#0">usuário</a>
                <ul class="sub-menu">
                  <li><a href="affiliate.php">Página de Afiliado</a></li>
                  <li><a href="user.php">Painel do usuário</a></li>
                  <!-- <li><a href="cart.php">Carrinho</a></li> -->
                  <!-- <li><a href="checkout.php">Checkout Page</a></li> -->
                  <!-- <li><a href="about.php">About Us</a></li>
                  <li><a href="affiliate.php">Affiliate Page</a></li>
                  <li><a href="how-work.php">como funciona</a></li>
                  <li><a href="user-referral.php">User Panel 2</a></li>
                  <li><a href="blog-single.php">Blog Single</a></li> -->
                </ul>
              </li>
            <?php endif; ?>
            <li><a href="blog.php">Blog</a></li> 
              <li><a href="contact.php">contato</a></li>
                  <li><a href="faq.php">FAQ</a></li>
            </ul>
            <?php if(!isset($_SESSION['user'])): ?>
              <div class="nav-right">
                <a href="login-client.php" class="cmn-btn style--three btn--sm"><i class="las la-user"></i> Faça o seu login</a>
              </div>
            <?php endif; ?>
          </div>
        </nav>
      </div>
    </div><!-- header__bottom end -->
  </header>
  <!-- header-section end  -->
  
    <!-- inner-hero-section start -->
    <div class="inner-hero-section">
      <div class="bg-shape"><img src="assets/images/elements/inner-hero-shape.png" alt="image"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <ul class="page-list">
              <li><a href="index.php">Home</a></li>
              <li><a href="#0">Lottery</a></li>
              <li class="select--id-contest active">Contest No: #<?php echo substr(md5($data['id']), 0, 3); ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- inner-hero-section end -->



    <!-- contest-details-section start -->
    <section class="pb-120 mt-minus-300">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="clock-wrapper">
              <p class="mb-2">A competição acaba em!</p>
              <div class="clock select--clock" data-clock="<?php echo $dataFimSorteioFormat; ?>"></div>
            </div><!-- clock-wrapper end -->
          </div>
          <div class="col-lg-12">
            <div class="contest-cart">
              <div class="contest-cart__left">
                <div class="select--base-carousel contest-cart__slider-area">
                  <div style="overflow-y:scroll;" class="contest-cart__thumb-slider">
                    <div class="single-slide"><img style="border-radius:20px;" class="select--principal-image" src="#" alt="image-principal"></div>
                    <div class="single-slide"><img style="border-radius:20px;" class="select--principal-image" src="#" alt="image-principal"></div>
                  </div><!-- contest-cart__thumb-slider end -->
                  <div class="contest-cart__nav-slider">

                    <div class="single-slide"><img width="108" height="60" style="border-radius:20px;" class="img--carousel-select" src="#" alt="image-carousel"></div>
                    <div class="single-slide"><img width="108" height="60" style="border-radius:20px;" class="img--carousel-select" src="#" alt="image-carousel"></div>
                    <div class="single-slide"><img width="108" height="60" style="border-radius:20px;" class="img--carousel-select" src="#" alt="image-carousel"></div>
                    <div class="single-slide"><img width="108" height="60" style="border-radius:20px;" class="img--carousel-select" src="#" alt="image-carousel"></div>

                  </div>
                  <!-- contest-cart__nav-slider end -->
                </div>
              </div><!-- contest-cart__left end -->
              <div class="contest-cart__right">
                <h4 class="subtitle">Entre agora e garanta a sua chance!</h4>
                <h3 class="contest-name"><?php echo $data['titulo_produto']; ?></h3>
                <div class="content-description">
                  <p style="text-align:justify;" class="description-contest"><?php echo $data['descricao_produto']; ?>.</p>                
                </div>
                <div class="contest-num">Concurso No: <span class="contest-code">#<?php echo substr(md5($data['id']), 0, 3); ?></span></div>
                <h4>Tickets Vendidos</h4>
                <div class="ticket-amount">
                  <span class="left">0</span>
                  <span class="select--total-tickets right"><?php echo $data['qtd_tickets']; ?></span>
                  <div class="progressbar" data-perc="70%">
                    <div class="bar"></div>
                  </div>
                  <!-- <p>Only 12045 remaining!</p> -->
                </div>
                <div class="ticket-price">
                  <span class="amount select--preco"><?php echo $data['preco_produto']; ?></span>
                  <small>Por ticket</small>
                </div>
                
                <style>
                  .content-description{
                    height:150px;
                    overflow-y:scroll;
                  }
                </style>

                <style>
                  ::-webkit-scrollbar-track {
                      background-color: #F4F4F4;
                      border-radius:5px;
                      
                  }
                  ::-webkit-scrollbar {
                      width: 6px;
                      background: #F4F4F4;
                      border-radius:5px;
                      
                  }
                  ::-webkit-scrollbar-thumb {
                      background:-webkit-linear-gradient(86deg, #ec038b 0%, #fb6468 44%, #fbb936 100%);
                      border-radius:5px;
                      
                  }
                </style>
                  <!-- select-quantity end -->
                  
                  <?php if(date('Y/m/d') < $dataFimSorteioFormat): ?>
                    <!-- <div class="mt-sm-0 mt-3"><a href="lottery-details.php" class="cmn-btn style--three select--comprar-numeros-link">Comprar números da sorte</a></div> -->
                    <form action="lottery-details.php" method="POST">
                        <input type="hidden" name="numeros-disponiveis" value="<?php echo $data['qtd_tickets']; ?>">
                        <input type="hidden" name="preco-numero" value="<?php echo $data['preco_produto']; ?>">
                        <input type="hidden" name="id-sorteio" value="<?php echo $data['id']; ?>">
                        <input type="hidden" name="id-usuario" value="<?php echo $dataUser['id']; ?>">
                        <button type="submit" class="cmn-btn style--three">Comprar números da sorte</button>
                    </form>
                  <?php else: ?>
                    <div class="mt-sm-0 mt-3"><a href="#0" class="cmn-btn style--three select--campanha-encerrada">Campanha Encerrada</a></div>
                  <?php endif; ?>
                  
                  <script>
                    document.querySelector('.select--campanha-encerrada').style.cursor = 'default'
                    document.querySelector('.select--campanha-encerrada').addEventListener('click', (e) => {
                      e.preventDefault()
                    })
                  </script>
                </div>
                <!-- <ul class="social-links align-items-center">
                  <li>Share :</li>
                  <li><a href="#0"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#0"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#0"><i class="fab fa-linkedin-in"></i></a></li>
                </ul> -->
              </div><!-- contest-cart__right end -->
            </div><!-- contest-cart end -->
          </div><!-- col-lg-12 end -->
          <div class="col-lg-10">
            <div class="contest-description">
              <ul class="nav nav-tabs justify-content-center mb-30 pb-4 border-0" id="myTab" role="tablist">
                <!-- <li class="nav-item" role="presentation">
                  <a class="cmn-btn active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true"><span class="mr-3"></span> description</a>
                </li> -->
              <?php if(date('Y/m/d') < $dataFimSorteioFormat): ?>
                <li style="display:none;" class="nav-item" role="presentation">
                <div class="text-center"><h3>Rsultado do Sorteio</h3></div>
                  <div class="area-result" align="center"><span class="numbers-contest">00</span></div>
                </li>
              <?php else: ?>
                <li class="nav-item" role="presentation">
                <div class="text-center"><h3>Resultado do Sorteio</h3></div>
                  <div class="area-result" align="center"><span class="numbers-contest"><?php echo $data['resultado_concurso']; ?></span></div>
                </li>
              <?php endif; ?>
              </ul>

              <style>
                .area-result{
                  background-color:#e82a7a;
                  width:500px;
                  height:auto;
                  border-radius:20px;
                }
                .numbers-contest{
                  font-size:25px;
                }
              </style>

              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                  <div class="content-block">
                    <h3 class="title"><?php echo $data['titulo_produto']; ?></h3>
                    <p style="text-align:justify;"><?php echo $data['descricao_produto']; ?></p>
                  </div><!-- content-block end -->
                  <!-- <div class="content-block">
                    <h3 class="title">Specifications</h3>
                    <div class="row mb-none-30">
                      <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="icon-item">
                          <div class="icon-item__thumb"><img src="assets/images/icon/specification/1.png" alt="image"></div>
                          <div class="icon-item__content">
                            <p>0-62mph</p>
                            <span>4.0 secs</span>
                          </div>
                      </div>
                    </div> -->
                        <!-- icon-item end -->
                      <!-- <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="icon-item">
                          <div class="icon-item__thumb"><img src="assets/images/icon/specification/2.png" alt="image"></div>
                          <div class="icon-item__content">
                            <p>Top Speed</p>
                            <span>181 mph</span>
                          </div>
                      </div>
                    </div> -->
                        <!-- icon-item end -->
                      <!-- <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="icon-item">
                          <div class="icon-item__thumb"><img src="assets/images/icon/specification/3.png" alt="image"></div>
                          <div class="icon-item__content">
                            <p>Power</p>
                            <span>542 bhp</span>
                          </div>
                      </div>
                    </div> -->
                        <!-- icon-item end -->
                      <!-- <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="icon-item">
                          <div class="icon-item__thumb"><img src="assets/images/icon/specification/4.png" alt="image"></div>
                          <div class="icon-item__content">
                            <p>Displacement</p>
                            <span>4.0ltr</span>
                          </div>
                      </div>
                    </div> -->
                        <!-- icon-item end -->
                      <!-- <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="icon-item">
                          <div class="icon-item__thumb"><img src="assets/images/icon/specification/5.png" alt="image"></div>
                          <div class="icon-item__content">
                            <p>bhp</p>
                            <span>691</span>
                          </div>
                      </div>
                    </div> -->
                        <!-- icon-item end -->
                      <!-- <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="icon-item">
                          <div class="icon-item__thumb"><img src="assets/images/icon/specification/6.png" alt="image"></div>
                          <div class="icon-item__content">
                            <p>Year</p>
                            <span>2019</span>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
              </div> -->
                  <!-- icon-item end -->
                  <!-- content-block end -->
                <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                  <div class="content-block">
                    <h3 class="title">Competition Details</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed ex eget mi sollicitudin consequat. Sed rhoncus ligula vel justo dignissim aliquam. Maecenas non est vitae ipsum luctus feugiat. Fusce purus nunc, sodales at condimentum sed, ullamcorper a nulla. Nam justo est, venenatis quis tellus in, volutpat eleifend nunc. Vestibulum congue laoreet mi non interdum. Ut ut dapibus tellus.</p>
                  </div><!-- content-block end -->
                </div>
              </div><!-- tab-content end -->
            </div><!-- contest-description end -->
          </div>
        </div>
      </div>
    </section>
    <!-- contest-details-section end  -->

    <script>
        let query = location.search.slice(1);
        let partes = query.split('&');
        let data = {};
        partes.forEach(function (parte) {
            let chaveValor = parte.split('=');
            let chave = chaveValor[0];
            let valor = chaveValor[1];
            data[chave] = valor;
        });

        window.addEventListener('load', () => {

          const xhr = new XMLHttpRequest
          const formData = new FormData

          formData.append('id_concurso', data.id)
          
          xhr.onreadystatechange = () => {

            if(xhr.status == 200 && xhr.readyState == 4){

              const objectImages = JSON.parse(xhr.response)
              
              document.querySelectorAll('.select--principal-image').forEach(($imgPrincipal) => {
                $imgPrincipal.src = `vendor/almasaeed2010/adminlte/img-contest/${objectImages.imgPrincipal}`
              })

              document.querySelectorAll('.img--carousel-select').forEach(($imgCarousel, $index) => {
                $imgCarousel.setAttribute('id', $index)
              })

              document.getElementById('0').src = `vendor/almasaeed2010/adminlte/img-contest/${objectImages.imgCarousel1}`
              document.getElementById('1').src = `vendor/almasaeed2010/adminlte/img-contest/${objectImages.imgCarousel2}`
              document.getElementById('2').src = `vendor/almasaeed2010/adminlte/img-contest/${objectImages.imgCarousel3}`
              document.getElementById('3').src = `vendor/almasaeed2010/adminlte/img-contest/${objectImages.imgCarousel4}`
              document.getElementById('4').src = `vendor/almasaeed2010/adminlte/img-contest/${objectImages.imgCarousel1}`
              document.getElementById('5').src = `vendor/almasaeed2010/adminlte/img-contest/${objectImages.imgCarousel2}`
              document.getElementById('6').src = `vendor/almasaeed2010/adminlte/img-contest/${objectImages.imgCarousel3}`
              document.getElementById('7').src = `vendor/almasaeed2010/adminlte/img-contest/${objectImages.imgCarousel4}`
              document.getElementById('8').src = `vendor/almasaeed2010/adminlte/img-contest/${objectImages.imgCarousel1}`
              document.getElementById('9').src = `vendor/almasaeed2010/adminlte/img-contest/${objectImages.imgCarousel2}`
              document.getElementById('10').src = `vendor/almasaeed2010/adminlte/img-contest/${objectImages.imgCarousel3}`
            }
          }
          xhr.open('POST', 'vendor/almasaeed2010/adminlte/controller/imagens-sorteio.controller.php')
          xhr.send(formData)
        })
    </script>
<?php require_once "pages/footer.php"; ?>