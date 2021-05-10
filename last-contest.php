<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
date_default_timezone_set('America/Sao_Paulo');

require_once "class/login-client.class.php"; 
require_once "class/uri.class.php";
require_once "vendor/almasaeed2010/adminlte/class/sorteio.class.php";
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
$countLastList = $sorteio->getCountLastList();
$paginaAtual = (isset($_GET['p']) ? intval($_GET['p']) : 1);
$limit = 6;
$offset = ($paginaAtual * $limit) - $limit;
$qtdPaginas = ceil($countLastList / $limit);
$limitLastContest = $sorteio->getLastList($offset, $limit);
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
    <div class="inner-hero-section style--three">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="page-list">
              <li><a href="index.php">Home</a></li>
              <li><a href="#0">Lottery</a></li>
              <li class="active">Contest</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- inner-hero-section end -->

    <!-- contest section start  -->
    <section class="pb-120 mt-minus-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="contest-wrapper">
              <div class="contest-wrapper__header pt-120">
                <h2 class="contest-wrapper__title">Últimos sorteios</h2>
                <ul style="visibility:hidden;" class="nav nav-tabs winner-tab-nav" id="myTab" role="tablist">
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
              </div>
              <div class="contest-wrapper__body">

                <div class="row contest-filter-wrapper justify-content-center mt-30 mb-none-30">
                  <div style="visibility:hidden;" class="col-lg-2 col-sm-6 mb-30">
                    <select>
                      <option>SORT BY</option>
                      <option>Filter option</option>
                      <option>Filter option</option>
                      <option>Filter option</option>
                      <option>Filter option</option>
                      <option>Filter option</option>
                      <option>Filter option</option>
                    </select>
                  </div>
                  <div style="visibility:hidden;" class="col-lg-2 col-sm-6 mb-30">
                    <select>
                      <option>ALL MAKES</option>
                      <option>Filter option</option>
                      <option>Filter option</option>
                      <option>Filter option</option>
                      <option>Filter option</option>
                      <option>Filter option</option>
                      <option>Filter option</option>
                    </select>
                  </div>
                  <div class="col-lg-3 mb-30" style="visibility:hidden;">
                    <div class="rang-slider">
                      <span class="caption">Ticket Price</span>
                      <div id="slider-range-min-one" class="invest-range-slider" data-value="8" data-maxValue="16"></div>
                      <div class="amount-wrapper">
                        <span class="min-amount">0</span>
                        <div class="main-amount">
                          <input type="text" class="calculator-invest" id="basic-amount" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div style="visibility:hidden;" class="col-lg-2 col-sm-4 mb-30">
                    <div class="action-btn-wrapper">
                      <button type="button" class="action-btn"><i class="lar la-heart"></i></button>
                      <button type="button" class="action-btn"><i class="las la-redo-alt"></i></button>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-8 mb-30">
                    <form class="contest-search-form">
                      <input type="text" id="select--inp-search" placeholder="PROCURE AQUI">
                      <button><i class="fas fa-search"></i></button>
                    </form>
                  </div>
                </div><!-- row end -->

                <div class="tab-content mt-50" id="myTabContent">
                  <div class="tab-pane fade show active" id="dream" role="tabpanel" aria-labelledby="dream-tab">

                    <div id="select--area-contest" class="row mb-none-30 mt-50">
                    <?php if($limitLastContest != array()): ?>
                    <?php foreach($limitLastContest as $limitContest): ?>
                    
                    <!-- Img Thumb -->
                    <?php 
                      $imgThumb = $sorteio->renderImgThumb($limitContest['id']);
                      ?>
                      <!-- Img Thumb -->

                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php?id=<?php echo $limitContest['id']; ?>" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img width="315" heigth="178" src="vendor/almasaeed2010/adminlte/img-contest/<?php echo $imgThumb['img']; ?>" alt="image">
                            <a href="contest-details-one.php?id=<?php echo $limitContest['id']; ?>" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">#<?php echo substr(md5($limitContest['id']), 0, 3); ?></h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name"><?php echo $limitContest['titulo_produto']; ?></h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price"><?php echo $limitContest['preco_produto']; ?></span>
                              <p>Preço</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>Exp!</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span><?php echo $limitContest['qtd_produto']; ?></span>
                                <p>Prêmios</p>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <?php endforeach; ?>
                      <?php endif; ?>
                        <!-- contest-card end -->
                    </div>
                  </div>


                  <div class="base" style="margin-top:20px;">
                    <?php for($i = 1; $i <= $qtdPaginas; $i++): ?>
                          <?php if($paginaAtual == $i): ?>
                            <a class="btn btn-primary" href="<?php echo $uri->base() . "contest.php?p=" . $i; ?>"><?php echo $i; ?></a>
                            <?php else: ?>
                            <a href="<?php echo $uri->base() . "contest.php?p=" . $i; ?>"><?php echo $i; ?></a>
                          <?php endif; ?>
                    <?php endfor; ?>
                  </div>
                  <br><br>
                  
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <a href="contest.php" class="cmn-btn style--three">Todos os Concursos</a>
                      </div>
                    </div>
                  </div>
                      
                  
                    <!-- Pesquisa input -->
                    <script>
                      document.getElementById('select--inp-search').addEventListener('input', (e) => {
                        // Declare variables
                          let input, filter, tab, div, h5, i, txtValue;
                          input = e.target.value;
                          filter = input.toUpperCase();
                          tab = document.getElementById("myTabContent");
                          div = tab.getElementsByClassName('col-xl-4');

                          // Loop through all list items, and hide those who don't match the search query
                          for (i = 0; i < div.length; i++) {
                            h5 = div[i].getElementsByClassName("contest-card__name")[0];
                            txtValue = h5.textContent || h5.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              div[i].style.display = "";
                            } else {
                              div[i].style.display = "none";
                            }
                          }
                      })
                    </script>
                    <!-- Pesquisa input -->
                  <div class="tab-pane fade" id="bike" role="tabpanel" aria-labelledby="bike-tab">
                    <div class="row mb-none-30 mt-50">
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/9.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">b2t</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Breeze Zodiac IX</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                        <!-- contest-card end -->
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/10.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">x9u</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Del Sol Trailblazer</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/11.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">8y3</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Miata Dart IV</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/12.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">r9d</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Fabia Magnum</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/13.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">pr2</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Omega Navigator</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/14.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">w03</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">Shelby Cobra</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                    </div>

                  </div>
                  <div class="tab-pane fade" id="watch" role="tabpanel" aria-labelledby="watch-tab">


                    <div class="row mb-none-30 mt-50">
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/1.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">b2t</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Breeze Zodiac IX</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/2.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">x9u</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Del Sol Trailblazer</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/3.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">8y3</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Miata Dart IV</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/4.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">r9d</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Fabia Magnum</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/5.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">pr2</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Omega Navigator</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/6.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">w03</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">Shelby Cobra</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                    </div>

                  </div>
                  <div class="tab-pane fade" id="laptop" role="tabpanel" aria-labelledby="laptop-tab">

                    <div class="row mb-none-30 mt-50">
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/9.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">b2t</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Breeze Zodiac IX</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/10.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">x9u</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Del Sol Trailblazer</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/11.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">8y3</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Miata Dart IV</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/12.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">r9d</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Fabia Magnum</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/13.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">pr2</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Omega Navigator</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/14.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">w03</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">Shelby Cobra</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                    </div>

                  </div>
                  <div class="tab-pane fade" id="money" role="tabpanel" aria-labelledby="money-tab">


                    <div class="row mb-none-30 mt-50">
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/1.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">b2t</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Breeze Zodiac IX</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/2.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">x9u</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Del Sol Trailblazer</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/3.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">8y3</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Miata Dart IV</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/4.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">r9d</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Fabia Magnum</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/5.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">pr2</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">The Omega Navigator</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                      <div class="col-xl-4 col-md-6 mb-30">
                        <div class="contest-card">
                          <a href="contest-details-one.php" class="item-link"></a>
                          <div class="contest-card__thumb">
                            <img src="assets/images/contest/6.png" alt="image">
                            <a href="#0" class="action-icon"><i class="far fa-heart"></i></a>
                            <div class="contest-num">
                              <span>contest no:</span>
                              <h4 class="number">w03</h4>
                            </div>
                          </div>
                          <div class="contest-card__content">
                            <div class="left">
                              <h5 class="contest-card__name">Shelby Cobra</h5>
                            </div>
                            <div class="right">
                              <span class="contest-card__price">$3.99</span>
                              <p>ticket price</p>
                            </div>
                          </div>
                          <div class="contest-card__footer">
                            <ul class="contest-card__meta">
                              <li>
                                <i class="las la-clock"></i>
                                <span>5d</span>
                              </li>
                              <li>
                                <i class="las la-ticket-alt"></i>
                                <span>9805</span>
                                <p>Remaining</p>
                              </li>
                            </ul>
                          </div>
                        </div><!-- contest-card end -->
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div><!-- contest-wrapper end -->
          </div>
        </div>
      </div>
    </section>
    <!-- contest section end -->

    <!-- contest feature section start -->
    <section class="pb-120">
      <div class="container">
        <div class="row mb-none-30 justify-content-center">
          <div class="col-lg-4 col-sm-6 mb-30">
            <div class="icon-item2">
              <div class="icon-item2__icon">
                <img src="assets/images/icon/contest-feature/1.png" alt="image">
              </div>
              <div class="icon-item2__content">
                <h3 class="title">Secure Checkout</h3>
                <p>Pay with the world’s most popular and secure payment methods.</p>
              </div>
            </div><!-- icon-item2 end -->
          </div>
          <div class="col-lg-4 col-sm-6 mb-30">
            <div class="icon-item2">
              <div class="icon-item2__icon">
                <img src="assets/images/icon/contest-feature/2.png" alt="image">
              </div>
              <div class="icon-item2__content">
                <h3 class="title">Great Value</h3>
                <p>We offer competitive prices for every lottery tickets</p>
              </div>
            </div><!-- icon-item2 end -->
          </div>
          <div class="col-lg-4 col-sm-6 mb-30">
            <div class="icon-item2">
              <div class="icon-item2__icon">
                <img src="assets/images/icon/contest-feature/3.png" alt="image">
              </div>
              <div class="icon-item2__content">
                <h3 class="title">Free Worldwide Delivery</h3>
                <p>We are available for providing our services in major countries</p>
              </div>
            </div><!-- icon-item2 end -->
          </div>
        </div>
      </div>
    </section>
    <!-- contest feature section end -->
<?php require_once "pages/footer.php"; ?>