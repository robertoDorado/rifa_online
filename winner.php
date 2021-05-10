<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");


require_once "class/login-client.class.php"; 
$user = new User;

if(isset($_SESSION['user'])){

  $id = $_SESSION['user'];
  $ip = $_SERVER['REMOTE_ADDR'];

  $user->getIdIp($id, $ip);

  if(isset($id) && !empty($id)){
    $data = $user->getUserCostumer($id);
  }
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
    <section class="inner-hero-section style--four">
      <div class="bg-shape"><img src="assets/images/elements/inner-hero-shape-2.png" alt="image"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="inner-page-content">
              <h2 class="title">Never miss a draw!</h2>
              <p>Easy way to buy tickets and win your dream car</p>
              <p>many others anytime, anywhere</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- inner-hero-section end -->

    <!-- winner details section start -->
    <section class="mt-minus-150">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="winner-details-wrapper bg_img" data-background="assets/images/elements/winner-details.jpg">
              <div class="left"><img src="assets/images/contest/1.png" alt="image"></div>
              <div class="body">
                <p class="contest-number">Contest No: B2T</p>
                <p class="contest-date"><span>Draw took place on :</span> Saturday May 20, 2020</p>
                <div class="line"></div>
                <h4 class="title">Latest  bigest Winning Numbers:</h4>
                <ul class="numbers">
                  <li>11</li>
                  <li>88</li>
                  <li>23</li>
                  <li>9</li>
                  <li>19</li>
                  <li>26</li>
                  <li>87</li>
                </ul>
                <div class="btn-grp">
                  <a href="#0" class="btn-border">Alerts</a>
                  <a href="#0" class="btn-border">How to Claim</a>
                </div>
              </div>
              <div class="right"><img src="assets/images/contest/7.png" alt="image"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- winner details section end -->

    <!-- latest winner section start  -->
    <section class="latest-winner-section position-relative pt-120 pb-120">
      <div class="el-1"><img src="assets/images/elements/w-el-1.png" alt="image"></div>
      <div class="el-2"><img src="assets/images/elements/w-el-2.png" alt="image"></div>
      <div class="el-3"><img src="assets/images/elements/w-el-3.png" alt="image"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
            <div class="section-header text-center">
              <span class="section-sub-title">Meet the latest winners from your favorite contest</span>
              <h2 class="section-title">Latest Winners</h2>
              <p>Check your ticket number's to see if you are a Winner in the Dream Lottery.</p>
            </div>
          </div>
        </div><!-- row end -->

        <div class="row wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
          <div class="col-lg-12">
            <ul class="nav nav-tabs winner-tab-nav" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="dream-tab" data-toggle="tab" href="#dream" role="tab" aria-controls="dream" aria-selected="true">
                  <div class="icon-thumb"><img src="assets/images/icon/winner-tab/1.png" alt="image"></div>
                  <span>Dream Car</span>
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="bike-tab" data-toggle="tab" href="#bike" role="tab" aria-controls="bike" aria-selected="false">
                  <div class="icon-thumb"><img src="assets/images/icon/winner-tab/2.png" alt="image"></div>
                  <span>bike</span>
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="watch-tab" data-toggle="tab" href="#watch" role="tab" aria-controls="watch" aria-selected="false">
                  <div class="icon-thumb"><img src="assets/images/icon/winner-tab/3.png" alt="image"></div>
                  <span>watch</span>
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="laptop-tab" data-toggle="tab" href="#laptop" role="tab" aria-controls="laptop" aria-selected="false">
                  <div class="icon-thumb"><img src="assets/images/icon/winner-tab/4.png" alt="image"></div>
                  <span>laptop</span>
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="money-tab" data-toggle="tab" href="#money" role="tab" aria-controls="money" aria-selected="false">
                  <div class="icon-thumb"><img src="assets/images/icon/winner-tab/5.png" alt="image"></div>
                  <span>Money</span>
                </a>
              </li>
            </ul>
            <div class="tab-content mt-50" id="myTabContent">
              <div class="tab-pane fade show active" id="dream" role="tabpanel" aria-labelledby="dream-tab">
                <div class="row mb-none-30">
                  <div class="col-lg-4 mb-30">
                    <div class="number-check-wrapper">
                      <h3 class="title">Check My Numbers</h3>
                      <p>Are you holding on to a winning ticket? Here's an easy way to find out.</p>
                      <form class="check-number-form">
                        <input type="tel" class="form-control mt-30 mb-30" name="check-number1" id="check-number1" placeholder="Enter Contest No">
                        <div class="number-list-wrapper">
                          <p>Enter Your Lottery Numbers</p>
                          <div class="number-list mt-3 mb-3">
                            <input type="text" name="text1" id="text1" placeholder="00">
                            <input type="text" name="text2" id="text2" placeholder="00">
                            <input type="text" name="text3" id="text3" placeholder="00">
                            <input type="text" name="text4" id="text4" placeholder="00">
                            <input type="text" name="text5" id="text5" placeholder="00">
                            <input type="text" name="text6" id="text6" placeholder="00">
                            <input type="text" name="text7" id="text7" placeholder="00">
                          </div><!-- number-list end -->
                          <select class="nice-select">
                            <option>Last 7 days</option>
                            <option>Last 6 days</option>
                            <option>Last 5 days</option>
                            <option>Last 4 days</option>
                            <option>Last 3 days</option>
                          </select>
                          <div class="text-center mt-100">
                            <button type="submit" class="cmn-btn">check my numbers</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-8 mb-30">
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/6.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/1.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/4.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/2.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/3.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/3.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/4.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/4.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/5.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/5.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/6.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/6.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="btn-grp">
                      <a href="winner.php" class="btn-border">browse more</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="bike" role="tabpanel" aria-labelledby="bike-tab">
                <div class="row mb-none-30">
                  <div class="col-lg-4 mb-30">
                    <div class="number-check-wrapper">
                      <h3 class="title">Check My Numbers</h3>
                      <p>Are you holding on to a winning ticket? Here's an easy way to find out.</p>
                      <form class="check-number-form">
                        <input type="tel" class="form-control mt-30 mb-30" name="check-number2" id="check-number2" placeholder="Enter Contest No">
                        <div class="number-list-wrapper">
                          <p>Enter Your Lottery Numbers</p>
                          <div class="number-list mt-3 mb-3">
                            <input type="text" name="text8" id="text8" placeholder="00">
                            <input type="text" name="text9" id="text9" placeholder="00">
                            <input type="text" name="text10" id="text10" placeholder="00">
                            <input type="text" name="text11" id="text11" placeholder="00">
                            <input type="text" name="text12" id="text12" placeholder="00">
                            <input type="text" name="text13" id="text13" placeholder="00">
                            <input type="text" name="text14" id="text14" placeholder="00">
                          </div><!-- number-list end -->
                          <select class="nice-select">
                            <option>Last 7 days</option>
                            <option>Last 6 days</option>
                            <option>Last 5 days</option>
                            <option>Last 4 days</option>
                            <option>Last 3 days</option>
                          </select>
                          <div class="text-center mt-100">
                            <button type="submit" class="cmn-btn">check my numbers</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-8 mb-30">
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/5.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/1.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/6.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/2.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/3.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/3.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/4.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/4.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/5.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/5.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/6.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/6.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="btn-grp">
                      <a href="winner.php" class="btn-border">browse more</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="watch" role="tabpanel" aria-labelledby="watch-tab">
                <div class="row mb-none-30">
                  <div class="col-lg-4 mb-30">
                    <div class="number-check-wrapper">
                      <h3 class="title">Check My Numbers</h3>
                      <p>Are you holding on to a winning ticket? Here's an easy way to find out.</p>
                      <form class="check-number-form">
                        <input type="tel" class="form-control mt-30 mb-30" name="check-number3" id="check-number3" placeholder="Enter Contest No">
                        <div class="number-list-wrapper">
                          <p>Enter Your Lottery Numbers</p>
                          <div class="number-list mt-3 mb-3">
                            <input type="text" name="text15" id="text15" placeholder="00">
                            <input type="text" name="text16" id="text16" placeholder="00">
                            <input type="text" name="text17" id="text17" placeholder="00">
                            <input type="text" name="text18" id="text18" placeholder="00">
                            <input type="text" name="text19" id="text19" placeholder="00">
                            <input type="text" name="text20" id="text20" placeholder="00">
                            <input type="text" name="text21" id="text21" placeholder="00">
                          </div><!-- number-list end -->
                          <select class="nice-select">
                            <option>Last 7 days</option>
                            <option>Last 6 days</option>
                            <option>Last 5 days</option>
                            <option>Last 4 days</option>
                            <option>Last 3 days</option>
                          </select>
                          <div class="text-center mt-100">
                            <button type="submit" class="cmn-btn">check my numbers</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-8 mb-30">
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/3.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/1.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/2.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/2.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/3.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/3.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/4.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/4.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/5.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/5.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/6.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/6.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="btn-grp">
                      <a href="winner.php" class="btn-border">browse more</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="laptop" role="tabpanel" aria-labelledby="laptop-tab">
                <div class="row mb-none-30">
                  <div class="col-lg-4 mb-30">
                    <div class="number-check-wrapper">
                      <h3 class="title">Check My Numbers</h3>
                      <p>Are you holding on to a winning ticket? Here's an easy way to find out.</p>
                      <form class="check-number-form">
                        <input type="tel" class="form-control mt-30 mb-30" name="check-number4" id="check-number4" placeholder="Enter Contest No">
                        <div class="number-list-wrapper">
                          <p>Enter Your Lottery Numbers</p>
                          <div class="number-list mt-3 mb-3">
                            <input type="text" name="text22" id="text22" placeholder="00">
                            <input type="text" name="text23" id="text23" placeholder="00">
                            <input type="text" name="text24" id="text24" placeholder="00">
                            <input type="text" name="text25" id="text25" placeholder="00">
                            <input type="text" name="text26" id="text26" placeholder="00">
                            <input type="text" name="text27" id="text27" placeholder="00">
                            <input type="text" name="text28" id="text28" placeholder="00">
                          </div><!-- number-list end -->
                          <select class="nice-select">
                            <option>Last 7 days</option>
                            <option>Last 6 days</option>
                            <option>Last 5 days</option>
                            <option>Last 4 days</option>
                            <option>Last 3 days</option>
                          </select>
                          <div class="text-center mt-100">
                            <button type="submit" class="cmn-btn">check my numbers</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-8 mb-30">
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/1.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/1.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/2.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/2.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/3.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/3.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/4.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/4.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/5.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/5.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/6.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/6.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="btn-grp">
                      <a href="winner.php" class="btn-border">browse more</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="money" role="tabpanel" aria-labelledby="money-tab">
                <div class="row mb-none-30">
                  <div class="col-lg-4 mb-30">
                    <div class="number-check-wrapper">
                      <h3 class="title">Check My Numbers</h3>
                      <p>Are you holding on to a winning ticket? Here's an easy way to find out.</p>
                      <form class="check-number-form">
                        <input type="tel" class="form-control mt-30 mb-30" name="check-number5" id="check-number5" placeholder="Enter Contest No">
                        <div class="number-list-wrapper">
                          <p>Enter Your Lottery Numbers</p>
                          <div class="number-list mt-3 mb-3">
                            <input type="text" name="text29" id="text29" placeholder="00">
                            <input type="text" name="text30" id="text30" placeholder="00">
                            <input type="text" name="text31" id="text31" placeholder="00">
                            <input type="text" name="text32" id="text32" placeholder="00">
                            <input type="text" name="text33" id="text33" placeholder="00">
                            <input type="text" name="text34" id="text34" placeholder="00">
                            <input type="text" name="text35" id="text35" placeholder="00">
                          </div><!-- number-list end -->
                          <select class="nice-select">
                            <option>Last 7 days</option>
                            <option>Last 6 days</option>
                            <option>Last 5 days</option>
                            <option>Last 4 days</option>
                            <option>Last 3 days</option>
                          </select>
                          <div class="text-center mt-100">
                            <button type="submit" class="cmn-btn">check my numbers</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-8 mb-30">
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/4.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/1.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/2.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/2.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/3.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/3.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/4.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/4.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/5.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/5.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="winner-card mb-30">
                      <div class="winner-card__thumb">
                        <img src="assets/images/win-car/6.png" alt="image">
                      </div>
                      <div class="winner-card__content">
                        <div class="winner-thumb"><img src="assets/images/winner/6.png" alt="image"></div>
                        <div class="content-top">
                          <div class="left">
                            <h5>The Breeze Zodiac IX</h5>
                          </div>
                          <div class="right">
                            <span>Draw took place on</span>
                            <p>Saturday April 20, 2020</p>
                          </div>
                        </div>
                        <div class="content-bottom">
                          <div class="number-list-wrapper">
                            <p>Winning Numbers:</p>
                            <ul class="number-list mt-2">
                              <li>11</li>
                              <li>88</li>
                              <li>23</li>
                              <li>9</li>
                              <li>19</li>
                              <li>26</li>
                              <li>87</li>
                            </ul><!-- number-list end -->
                          </div>
                          <div class="right">
                            <p>Contest No:</p>
                            <span class="contest-num">B2T</span>
                          </div>
                        </div>
                      </div>
                    </div><!-- winner-card end -->
                    <div class="btn-grp">
                      <a href="winner.php" class="btn-border">browse more</a>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- tab-content end -->
          </div>
        </div><!-- row end -->
      </div>
    </section>
    <!-- latest winner section end  -->

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
              <span class="section-sub-title">Testimonial</span>
              <h2 class="section-title">our Happy Customers All Around the World</h2>
              <p>With over 12 years of experience as the world’s leading online lottery service provider. Find out what our members have to say about us!</p>
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
                    <h4 class="client-name">Dave Ford</h4>
                    <p>“Unbelievable this is a dream come true,no way would I ever think I would own a car like this” </p>
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
                    <h4 class="client-name">Dave Ford</h4>
                    <p>“Unbelievable this is a dream come true,no way would I ever think I would own a car like this” </p>
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
              <span class="section-sub-title">Get in touch with our friendly support</span>
              <h2 class="section-title">Customer Support</h2>
              <p>Have a question or need help? Contact our friendly support team.</p>
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
                <h3 class="support-card__title">Talk to our support team</h3>
                <p>Got a question about Lotteries? Get in touch with our friendly staff.</p>
                <div class="btn-grp justify-content-xl-start mt-3">
                  <a href="tel:6564545" class="btn-border btn-sm text-capitalize">Call us <i class="fas fa-phone-alt"></i></a>
                  <a href="mailto:dhdj@gmail.com" class="cmn-btn btn-sm text-capitalize">Email us <i class="far fa-envelope"></i></a>
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
                <h3 class="support-card__title">Our Guide to Rifa</h3>
                <p>Check out our FAQs to see if we can help you out. </p>
                <div class="btn-grp justify-content-xl-start mt-3">
                  <a href="faq.php" class="btn-border btn-sm text-capitalize">FAQs & Help</a>
                </div>
              </div>
            </div><!-- support-card end -->
          </div>
        </div>
      </div>
    </section>
    <!-- support section end  -->
<?php require_once "pages/footer.php"; ?>