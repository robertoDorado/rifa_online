<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");


require_once "class/login-client.class.php"; 
require_once "vendor/almasaeed2010/adminlte/class/sorteio.class.php";
require_once "class/uri.class.php";
$user = new User;
$sorteio = new Sorteio;
$uri = new URI;

if(isset($_SESSION['user'])){

  $id = $_SESSION['user'];
  $ip = $_SERVER['REMOTE_ADDR'];

  $user->getIdIp($id, $ip);

  if(isset($id) && !empty($id)){
    $data = $user->getUserCostumer($id);
  }
}

$limit = 6;
$offset = 0;
$arrayContest = $sorteio->getList($offset, $limit);
?>
<!-- meta tags and other links -->
<!DOCTYPE html>
<html style="overflow-x:hidden;" lang="pt-br">
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
  <!-- momentJs -->
  <script src="assets/js/moment.js"></script>
  <script src="assets/js/moment-locales.js"></script>
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
              <?php $arrayNome = explode(" ", $data['nome']); ?>

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
                  <!-- <li><a href="how-work.php">sobre o concurso</a></li> -->
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
  
    <!-- hero start -->
    <section class="hero">
      <div class="hero__shape"><img src="assets/images/elements/hero-shape.jpg.png" alt="image"></div>
      <div class="hero__element"><img src="assets/images/elements/hero-building.png" alt="image"></div>
      <div class="hero__car wow bounceIn" data-wow-duration="0.5s" data-wow-delay="1s">
        <img src="assets/images/elements/premios.png" alt="image" class="car-shadow">
        <img src="assets/images/elements/car-ray.png" alt="image" class="car-ray">
        <img src="assets/images/elements/car-light.png" alt="image" class="car-light">
        <img src="assets/images/elements/premios.png" alt="image" class="hero-car">
        <img src="assets/images/elements/car-star.png" alt="image" class="car-star">
      </div>
      <div class="container">
        <div class="row justify-content-center justify-content-lg-start">
          <div class="col-lg-6 col-md-8">
            <div class="hero__content">
              <div class="hero__subtitle wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">Esta é a sua chance para ganhar diversos</div>
              <h2 class="hero__title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">prêmios</h2>
              <p class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">Agora é a sua chance de ganhar prêmios incríveis!</p>
              <div class="hero__btn wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.9s">
                <a href="contest.php" class="cmn-btn">Participe agora</a>
                <!-- <a class="video-btn" href="https://www.youtube.com/embed/d6xn5uflUjg" data-rel="lightcase:myCollection"><i class="fas fa-play"></i></a> -->
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="hero__thumb">
              <img src="assets/images/elements/premios.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- hero start -->

    <!-- how to play section start -->
    <section class="position-relative pt-120 pb-120 overflow-hidden">
      <div class="play-elements wow bounceIn" data-wow-duration="0.5s" data-wow-delay="0.7s">
        <img src="assets/images/elements/play-el.png" alt="image">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 text-sm-left text-center wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
            <div class="section-header">
              <span class="section-sub-title">O que é preciso saber</span>
              <h2 class="section-title">Como começar a ganhar prêmios!</h2>
              <p>Siga esses três simples passos! </p>
            </div>
          </div>
        </div>
        <div class="row mb-none-30 justify-content-xl-start justify-content-center">
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="play-card bg_img" data-background="assets/images/elements/card-bg-1.jpg">
              <div class="play-card__icon">
                <img src="assets/images/icon/play/1.png" alt="image-icon">
                <span class="play-card__number">01</span>
              </div>
              <div class="play-card__content">
                <h3 class="play-card__title">Escolha</h3>
                <p>Cadastre-se no RIFA e escolha o concurso que deseja participar.</p>
              </div>
            </div><!-- play-card end -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="play-card bg_img" data-background="assets/images/elements/card-bg-2.jpg">
              <div class="play-card__icon">
                <img src="assets/images/icon/play/2.png" alt="image-icon">
                <span class="play-card__number">02</span>
              </div>
              <div class="play-card__content">
                <h3 class="play-card__title">Compre</h3>
                <p>Adquira os seus números da sorte se cadastrando e comprando!</p>
              </div>
            </div><!-- play-card end -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="play-card bg_img" data-background="assets/images/elements/card-bg-3.jpg">
              <div class="play-card__icon">
                <img src="assets/images/icon/play/3.png" alt="image-icon">
                <span class="play-card__number">03</span>
              </div>
              <div class="play-card__content">
                <h3 class="play-card__title">Ganhe</h3>
                <p>Comece o seu sonho, você está quase lá, ganhe diversos prêmios!</p>
              </div>
            </div><!-- play-card end -->
          </div>
        </div>
      </div>
    </section>
    <!-- how to play section end -->

    <!-- contest section start -->
    <section class="position-relative pt-120 pb-120">
      <div class="bg-el"><img src="assets/images/elements/contest-bg.png" alt="image"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
            <div class="section-header text-center">
              <span class="section-sub-title">Tente a sua chance de se tornar um vencedor</span>
              <h2 class="section-title">Atuais Concursos</h2>
              <p>Os participantes compram ingressos e lotes são sorteados para determinar os vencedores.</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
          <div class="col-lg-12">
            <!-- <ul class="nav nav-tabs justify-content-center mb-30 border-0" id="contestTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="cmn-btn d-flex align-items-center active" id="car-tab" data-toggle="tab" href="#car" role="tab" aria-controls="car" aria-selected="true"><span class="mr-3"><img src="assets/images/icon/btn/car.png" alt="icon"></span> Dream Car</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="cmn-btn style--two d-flex align-items-center" id="lifestyle-tab" data-toggle="tab" href="#lifestyle" role="tab" aria-controls="lifestyle" aria-selected="false"><span class="mr-3"><img src="assets/images/icon/btn/box.png" alt="icon"></span>All lifestyle</a>
              </li>
            </ul> -->
            <div class="tab-content" id="contestTabContent">
              <div class="tab-pane fade show active" id="car" role="tabpanel" aria-labelledby="car-tab">
                <div class="row mb-none-30" id="select--area-contest">

                  <?php if($arrayContest != array()): ?>
                  <?php foreach($arrayContest as $list): ?>
                  <?php
                    $dataHoje = new DateTime(date("Y-m-d"));
                    $dataInicioSorteio = new DateTime(substr($list['data_inicio_sorteio'], 0, 10));
                    $intervalo = $dataInicioSorteio->diff($dataHoje);
                  ?>

                  <?php
                    $imgThumb = $sorteio->renderImgThumb($list['id']);
                  ?>
                  <div class="col-xl-4 col-md-6 mb-30">
                    <div class="contest-card">
                      <a href="contest-details-one.php?id=<?php echo $list['id']; ?>" class="item-link"></a>
                      <div class="contest-card__thumb">
                        <img src="vendor/almasaeed2010/adminlte/img-contest/<?php echo $imgThumb['img']; ?>" alt="image">
                        <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                        <div class="contest-num">
                          <span>contest no:</span>
                          <h4 class="number">#<?php echo substr(md5($list['id']), 0, 3); ?></h4>
                        </div>
                      </div>
                      <div class="contest-card__content">
                        <div class="left">
                          <h5 class="contest-card__name"><?php echo $list['titulo_produto']; ?></h5>
                        </div>
                        <div class="right">
                          <span class="contest-card__price"><?php echo $list['preco_produto']; ?></span>
                          <p>Preço</p>
                        </div>
                      </div>
                      <div class="contest-card__footer">
                        <ul class="contest-card__meta">
                          <li>
                            <i class="las la-clock"></i>
                            <?php if($intervalo->days == 0): ?>
                              <span>Hoje!</span>
                              <?php elseif($intervalo->days > 1): ?>
                                <span><?php echo $intervalo->days . " dias"; ?></span>
                                <?php elseif($intervalo->days == 1): ?>
                                  <span><?php echo $intervalo->days . " dia"; ?></span>
                            <?php endif; ?>
                          </li>
                          <li>
                            <i class="las la-ticket-alt"></i>
                            <span><?php echo $list['qtd_produto']; ?></span>
                            <p>Prêmios</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                  <?php endif; ?>
                  </div>
                </div>
              </div>
            </div><!-- table content end -->
          </div>
        </div><!-- row end-->
        <div class="row mt-30">
          <div class="col-lg-12">
            <div class="btn-grp">
              <a href="contest.php" class="btn-border">browse more</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- contest section end -->

    <!-- winner section start -->
    <section class="position-relative pt-120 pb-120">
      <div class="bg-el"><img src="assets/images/bg/winner.jpg" alt="image"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
            <div class="section-header text-center">
              <span class="section-sub-title">Os maiores ganhadores de loteria do mês</span>
              <h2 class="section-title">Top 10 ganhadores</h2>
              <p>Houve numerosos ganhos, mas alguns vencedores tiveram mais sorte do que outros</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row">
          <div class="col-lg-12">
            <div class="winner-wrapper">
              <div class="left">
                <div class="winner-prize-thumb wow bounceIn" data-wow-duration="0.5s" data-wow-delay="0.5s"><img src="assets/images/elements/participe.png" alt="image"></div>
              </div>
              <div class="right">
                <div class="winner-slider">
                  <div class="winner-slide-item">
                    <div class="winner-thumb"><img src="assets/images/winner/w-1.png" alt="image"></div>
                    <div class="winner-content bg_img" data-background="assets/images/elements/winner-content-bg.jpg">
                      <h6 class="winner-name">Breeze Zodiac</h6>
                      <p>Draw took place on 1</p>
                      <span class="draw-date">19/04/2020</span>
                    </div>
                  </div><!-- winner-slide-item end -->
                  <div class="winner-slide-item">
                    <div class="winner-thumb"><img src="assets/images/winner/w-1.png" alt="image"></div>
                    <div class="winner-content bg_img" data-background="assets/images/elements/winner-content-bg.jpg">
                      <h6 class="winner-name">Breeze Zodiac</h6>
                      <p>Draw took place on 2</p>
                      <span class="draw-date">19/04/2020</span>
                    </div>
                  </div><!-- winner-slide-item end -->
                  <div class="winner-slide-item">
                    <div class="winner-thumb"><img src="assets/images/winner/w-1.png" alt="image"></div>
                    <div class="winner-content bg_img" data-background="assets/images/elements/winner-content-bg.jpg">
                      <h6 class="winner-name">Breeze Zodiac</h6>
                      <p>Draw took place on 3</p>
                      <span class="draw-date">19/04/2020</span>
                    </div>
                  </div><!-- winner-slide-item end -->
                </div>
              </div>
            </div>
          </div>
        </div><!-- row end -->
      </div><!-- container end -->
    </section>
    <!-- winner section end -->

   

    <!-- overview section start -->
    <section class="overview-section pt-120">
      <div class="map-el"><img src="assets/images/elements/map.png" alt="image"></div>
      <div class="obj-1"><img src="assets/images/elements/overview-obj-1.png" alt="image"></div>
      <div class="obj-2"><img src="assets/images/elements/overview-obj-2.png" alt="image"></div>
      <div class="obj-3"><img src="assets/images/elements/overview-obj-3.png" alt="image"></div>
      <div class="obj-4"><img src="assets/images/elements/overview-obj-4.png" alt="image"></div>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
            <div class="section-header text-center">
              <span class="section-sub-title">Nossos usuários ao redor do mundo</span>
              <h2 class="section-title">Deixe os número falarem por nós</h2>
              <p>Ao longo dos anos, fornecemos bilhetes para loterias em todo o mundo a milhões de jogadores e gostamos de ter mais de um milhão de vencedores</p>
            </div>
          </div>
        </div><!-- row end -->
      </div><!-- container end -->
      <div class="map-pointer">
        <div class="pointer num-1"></div>
        <div class="pointer num-2"></div>
        <div class="pointer num-3"></div>
        <div class="pointer num-4"></div>
        <div class="pointer num-5"></div>
        <div class="pointer num-6"></div>
        <div class="pointer num-7"></div>
        <div class="pointer num-8"></div>
        <div class="pointer num-9"></div>
      </div>

      <div class="container">
        <div class="row justify-content-center mb-none-30">
          <div class="col-lg-4 col-sm-6 mb-30 wow bounceIn" data-wow-duration="0.5s" data-wow-delay="0.3s">
            <div class="overview-card hover--effect-1">
              <div class="overview-card__icon">
                <img src="assets/images/icon/overview/1.png" alt="">
              </div>
              <div class="overview-card__content">
                <span class="number">12000+</span>
                <p>Usuários verificados</p>
              </div>
            </div><!-- overview-card end -->
          </div>
          <div class="col-lg-4 col-sm-6 mb-30 wow bounceIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <div class="overview-card hover--effect-1">
              <div class="overview-card__icon">
                <img src="assets/images/icon/overview/2.png" alt="">
              </div>
              <div class="overview-card__content">
                <span class="number">1</span>
                <p>Mês no mercado</p>
              </div>
            </div><!-- overview-card end -->
          </div>
          <div class="col-lg-4 col-sm-6 mb-30 wow bounceIn" data-wow-duration="0.5s" data-wow-delay="0.7s">
            <div class="overview-card hover--effect-1">
              <div class="overview-card__icon">
                <img src="assets/images/icon/overview/3.png" alt="">
              </div>
              <div class="overview-card__content">
                <span class="number">98%</span>
                <p>Clientes satisfeitos</p>
              </div>
            </div><!-- overview-card end -->
          </div>
        </div>
      </div><!-- container end -->
    </section>
    <!-- overview section end -->

    <!-- features section start -->
    <section class="pt-120 pb-120">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-1 order-2">
            <div class="row mb-none-30">
              <div class="col-lg-6 mb-30">
                <div class="row mb-none-30">
                  <div class="col-lg-12 col-md-6 mb-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                    <div class="feature-card hover--effect-1">
                      <div class="feature-card__icon">
                        <img src="assets/images/icon/feature/1.png" alt="image">
                      </div>
                      <div class="feature-card__content">
                        <h3 class="feature-title">Serviço Seguro</h3>
                        <p>Os seus dados cadastrais estão protegidos e criptografados.</p>
                      </div>
                    </div><!-- feature-card end -->
                  </div><!-- feature-card end -->
                  <div class="col-lg-12 col-md-6 mb-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <div class="feature-card hover--effect-1">
                      <div class="feature-card__icon">
                        <img src="assets/images/icon/feature/3.png" alt="image">
                      </div>
                      <div class="feature-card__content">
                        <h3 class="feature-title">Conexão</h3>
                        <p>A nossa rede é totalmente segura a qualquer ameça externa</p>
                      </div>
                    </div><!-- feature-card end -->
                  </div><!-- feature-card end -->
                </div>
              </div>
              <div class="col-lg-6 mb-30 mt-lg-5">
                <div class="row mb-none-30">
                  <div class="col-lg-12 col-md-6 mb-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                    <div class="feature-card hover--effect-1">
                      <div class="feature-card__icon">
                        <img src="assets/images/icon/feature/2.png" alt="image">
                      </div>
                      <div class="feature-card__content">
                        <h3 class="feature-title">Segurança</h3>
                        <p>A nossa equipe está sempre disposta protegendo os seus dados.</p>
                      </div>
                    </div><!-- feature-card end -->
                  </div><!-- feature-card end -->
                  <div class="col-lg-12 col-md-6 mb-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <div class="feature-card hover--effect-1">
                      <div class="feature-card__icon">
                        <img src="assets/images/icon/feature/4.png" alt="image">
                      </div>
                      <div class="feature-card__content">
                        <h3 class="feature-title">Suporte</h3>
                        <p>A equipe de suporte ao atendimento está de prontidão para tirar as suas dúvidas.</p>
                      </div>
                    </div><!-- feature-card end -->
                  </div><!-- feature-card end -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 order-lg-2 order-1 text-lg-left text-center wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <div class="section-header">
              <span class="section-sub-title">Uma lista exaustiva de</span>
              <h2 class="section-title">NOSSOS RECURSOS.</h2>
              <p>Todos os participantes podem concorrer a qualquer prêmio que estiver disponível na nossa plataforma, crie agora mesmo a sua conta, compre alguns tickets e comece a ganhar agora mesmo!</p>
              <!-- <a href="#0" class="d-flex align-items-center mt-3 justify-content-lg-start justify-content-center">Show all features<i class="las la-angle-double-right text-danger"></i></a> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- features section end -->

    <!-- testimonial section start -->
    <section class="has-bg--shape pt-120 pb-120">
      <div class="bg-shape">
        <div class="round-shape d-sm-block d-none"><img src="assets/images/elements/round-shape.png" alt="image"></div>
        <div class="shape-1"></div>
        <div class="shape-2"></div>
        <div class="shape-3"></div>
        <div class="shape-4"></div>
        <div class="shape-5"></div>
        <div class="shape-6"></div>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-9 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
            <div class="section-header text-center">
              <span class="section-sub-title">Testemunhas</span>
              <h2 class="section-title">nossos clientes felizes em todo o mundo</h2>
              <p>Com mais de 12 anos de experiência como provedor líder mundial de serviços de loteria online. Descubra o que nossos membros têm a dizer sobre nós!</p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="testimonial-area bg_img" data-background="assets/images/elements/testimonial-single.jpg">
              <div class="testimonial-slider">
                <div class="testimonial-single">
                  <div class="testimonial-single__thumb">
                    <img src="assets/images/winner/2.png" alt="image">
                  </div>
                  <div class="testimonial-single__content">
                    <h4 class="client-name">Fábio Rangel</h4>
                    <p>“Inacreditável, este é um sonho que se tornou realidade, de jeito nenhum eu pensaria em ganhar tantos prêmios assim” </p>
                    <div class="ratings">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                  </div>
                </div><!-- testimonial-single end -->
                <div class="testimonial-single">
                  <div class="testimonial-single__thumb">
                    <img src="assets/images/winner/1.png" alt="image">
                  </div>
                  <div class="testimonial-single__content">
                    <h4 class="client-name">Carlos Souza</h4>
                    <p>“Estou vivendo um sonho, a minha sorte mudou deste dia em diante, este sim é um novo começo!” </p>
                    <div class="ratings">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                  </div>
                </div><!-- testimonial-single end -->
              </div><!-- testimonial-slider end -->
            </div><!-- testimonial-area end -->
          </div>
        </div>
      </div>
    </section>
    <!-- testimonial section end -->

    <!-- support section start  -->
    <section class="pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-header text-center">
              <span class="section-sub-title">Entre em contato com nosso suporte</span>
              <h2 class="section-title">Suporte ao cliente</h2>
              <p>Tem uma pergunta ou precisa de ajuda? Entre em contato com nossa equipe de suporte.</p>
            </div>
          </div>
        </div>
        <div class="row mb-none-30">
          <div class="col-lg-6 mb-30 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.3s">
            <div class="support-card">
              <div class="support-card__thumb">
                <img src="assets/images/icon/support/1.png" alt="image">
              </div>
              <div class="support-card__content">
                <h3 class="support-card__title">Fale com nossa equipe de suporte</h3>
                <p>Tem uma pergunta sobre loterias? Entre em contato com nossa simpática equipe.</p>
                <div class="btn-grp justify-content-xl-start mt-3">
                  <a href="contact.php" class="btn-border btn-sm text-capitalize">Fale conosco <i class="fas fa-phone-alt"></i></a>
                  <a href="contact.php" class="cmn-btn btn-sm text-capitalize">E-mail <i class="far fa-envelope"></i></a>
                </div>
              </div>
            </div><!-- support-card end -->
          </div>
          <div class="col-lg-6 mb-30 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <div class="support-card">
              <div class="support-card__thumb">
                <img src="assets/images/icon/support/2.png" alt="image">
              </div>
              <div class="support-card__content">
                <h3 class="support-card__title">Nosso guia para Rifa</h3>
                <p>Verifique nossas perguntas frequentes para ver se podemos ajudá-lo, fique a vontade para fazer as suas pergutas, a nossa equipe pode ajudar. </p>
                <div class="btn-grp justify-content-xl-start mt-3">
                  <a href="faq.php" class="btn-border btn-sm text-capitalize">FAQs & Ajuda</a>
                </div>
              </div>
            </div><!-- support-card end -->
          </div>
        </div>
      </div>
    </section>
    <!-- support section end  -->
<?php require_once "pages/footer.php"; ?>