<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");


require_once "class/login-client.class.php"; 
require_once "class/uri.class.php";
require_once "class/cart.class.php";
require_once "class/affiliate.class.php";

$uri = new URI;
$user = new User;
$cart = new Cart;
$affiliate = new Affiliate;

if(isset($_SESSION['user'])){

  $id = $_SESSION['user'];
  $ip = $_SERVER['REMOTE_ADDR'];

  $user->getIdIp($id, $ip);

  if(isset($id) && !empty($id)){
    $data = $user->getUserCostumer($id);
  }
}else{
  header('Location: ./');
}

$tokenAffiliate = substr($data['nome'], 0, 3) . md5($data['nome']);
$arrayReferral = $user->getAllReferral($tokenAffiliate);
$arrayPurchase = $cart->getPurchase($data['id']);
$arrayRulesAffiliate = $affiliate->getValuesAffiliate();
if($arrayRulesAffiliate != array()){
  $format = str_replace("R$", "", $arrayRulesAffiliate['valor_pago']);
  $valor = str_replace(",", ".", $format);
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

<!-- in??cio do preloader -->
<div id="preloader">
    <div class="inner">
       <!-- HTML DA ANIMA????O MUITO LOUCA DO SEU PRELOADER! -->
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
              <p class="text-center mt-4">Don???t have an account? <a href="#0" data-toggle="modal" data-target="#signupModal"> Sign Up Now</a></p>
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

              <span>Ol?? <?php echo $arrayNome[0]; ?>, Bem vindo novamente!</span>
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
                  <li><a href="about.php">sobre n??s</a></li>
                  <li><a href="how-work.php">como funciona</a></li>
                </ul>
              </li>
              <?php if(isset($_SESSION['user'])): ?>
              <li class="menu_has_children">
              <!-- <li><a href="error-404.php">404 Page</a></li> -->
                <a href="#0">usu??rio</a>
                <ul class="sub-menu">
                  <li><a href="affiliate.php">P??gina de Afiliado</a></li>
                  <li><a href="user.php">Painel do usu??rio</a></li>
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
              <a href="login-client.php" class="cmn-btn style--three btn--sm"><i class="las la-user"></i> Fa??a o seu login</a>
            </div>
            <?php endif; ?>
          </div>
        </nav>
      </div>
    </div><!-- header__bottom end -->
  </header>
  <!-- header-section end  -->

    <!-- inner-hero-section start -->
    <div class="inner-hero-section style--five">
    </div>
    <!-- inner-hero-section end -->


    <!-- user section start -->
    <div class="mt-minus-150 pb-120">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="user-card">
              <div class="avatar-upload">
                <div class="obj-el"><img src="assets/images/elements/team-obj.png" alt="image"></div>
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url(<?php echo 'users/' . $data['perfil']; ?>);">
                    </div>
                </div>
              </div>
              <h3 class="user-card__name"><?php echo $data['nome']; ?></h3>
              <span class="user-card__id">
                #<?php echo substr(md5($data['id']), 0, 3);?>
              </span>
            </div><!-- user-card end -->
            <div class="user-action-card">
              <ul class="user-action-list">
                <?php if($arrayPurchase != array()): ?>
                  <li><a href="user.php">Minhas compras <span class="badge"><?php echo count($arrayPurchase); ?></span></a></li>
                  <?php else: ?>
                  <li><a href="user.php">Minhas compras <span class="badge">0</span></a></li>
                <?php endif; ?>
                <li><a href="user-info.php">Informa????es Pessoais</a></li>
                <!-- <li><a href="user-transaction.php">Transactions</a></li> -->
                <li class="active"><a href="user-referral.php">Programa de afiliados</a></li>
                <!-- <li><a href="user-lottery.php">Favorite Lotteries</a></li> -->
                <li><a href="contact.php">Contato</a></li>
                <li><a href="pages/sair.php">Log Out</a></li>
              </ul>
            </div><!-- user-action-card end -->
          </div>
          <div class="col-lg-8 mt-lg-0 mt-4">
            <div class="referral-link-wrapper">
              <h3 class="title">Afiliados</h3>
              <div class="copy-link">
                <span class="copy-link-icon"><i class="las la-link"></i></span>
                <span class="label">Seu Link:</span>
                <div class="copy-link-inner">
                  <form data-copy=true>
                    <input type="text" value="<?php echo $uri->base() . "affiliate.php?ref=" . substr($data['nome'], 0, 3) . md5($data['nome']); ?>" data-click-select-all>
                    <input type="submit" value="Copiar Link">
                  </form>
                </div>
              </div>
            </div>

            <div class="referral-overview mt-30">
              <div class="row justify-content-center mb-none-30">
                <div class="col-lg-5 col-sm-12 mb-30">
                  <div class="referral-crad">
                    <div class="referral-crad__icon"><img src="assets/images/icon/referral/1.png" alt="image"></div>
                    <div class="referral-crad__content">
                      <?php if($arrayReferral != array()): ?>
                        <h3 class="number">R$ <?php echo number_format($valor * count($arrayReferral), 2, ",", "."); ?></h3>
                        <?php else: ?>
                        <h3 class="number">R$ 0,00</h3>
                      <?php endif; ?>
                      <span>Total de ganhos</span>
                    </div>
                  </div><!-- referral-crad end -->
                </div>
                <div style="display:none;" class="col-lg-5 col-sm-6 mb-30">
                  <div class="referral-crad">
                    <div class="referral-crad__icon"><img src="assets/images/icon/referral/2.png" alt="image"></div>
                    <div class="referral-crad__content">
                      <h3 class="number">$208.00</h3>
                      <span>Last Month</span>
                    </div>
                  </div>
                  <!-- referral-crad end -->
                </div>
              </div>
            </div>

            <div class="referral-transaction">
              <div class="all-transaction__header">
                <h3 class="title">Seus afiliados:</h3>
                <!-- <div class="date-range">
                  <input type="text" data-range="true" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='top left' placeholder="min - max date">
                  <i class="las la-calendar-alt"></i>
                </div> -->
              </div>
              <div class="table-responsive-lg">
                <table>
                  <thead>
                    <tr>
                      <th>Anivers??rio</th>
                      <th>Id</th>
                      <th>Nome</th>
                      <th>E-mail</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if($arrayReferral != array()): ?>
                  <?php
                  foreach($arrayReferral as $reference):?>
                    <tr>
                      <td>
                        <div class="date">
                          <span><?php echo $reference['aniversario']; ?></span>
                          <!-- <span class="month">APR</span> -->
                        </div>
                      </td>
                      <td>#<?php echo substr(md5($reference['id']), 0, 3); ?></td>
                      <td><?php echo $reference['nome']; ?></td>
                      <td><?php echo $reference['email']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <div class="load-more">
                <button type="button">Show More Lotteries <i class="las la-angle-down ml-2"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- user section end -->
<?php require_once "pages/footer.php"; ?>