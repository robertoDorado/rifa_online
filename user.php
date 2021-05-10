<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");

require_once "class/login-client.class.php"; 
require_once "class/cart.class.php";
require_once "vendor/almasaeed2010/adminlte/class/sorteio.class.php";
$user = new User;
$sorteio = new Sorteio;
$cart = new Cart;

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
$arrayPurchase = $cart->getPurchase($data['id']);
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
              <?php
              $id = md5($data['id']); 
              echo '#' . substr($id, 0, 3);
              ?></span>
            </div><!-- user-card end -->
            <div class="user-action-card">
              <ul class="user-action-list">
              <?php if($arrayPurchase != array()): ?>
                <li class="active"><a href="user.php">Minhas Compras <span class="badge"><?php echo count($arrayPurchase); ?></span></a></li>
              <?php else: ?>
                <li class="active"><a href="user.php">Minhas Compras <span class="badge">0</span></a></li>
              <?php endif; ?>
                <li><a href="user-info.php">Informações Pessoais</a></li>
                <!-- <li><a href="user-transaction.php">Transactions</a></li> -->
                <li><a href="user-referral.php">Programa De Afiliados</a></li>
                <!-- <li><a href="user-lottery.php">Favorite Lotteries</a></li> -->
                <li><a href="contact.php">Contato</a></li>
                <li><a href="pages/sair.php">Log Out</a></li>
              </ul>
            </div><!-- user-action-card end -->
          </div>
          <div class="col-lg-8 mt-lg-0 mt-4">
            <!-- <div class="upcoming-draw-wrapper">
              <h3 class="title">Upcoming Draw</h3>
              <div class="draw-ticket-slider">
                <div class="draw-single-ticket">
                  <div class="draw-single-ticket__header">
                    <div class="left">Tickey#1</div>
                    <div class="right">Contest No:R9D</div>
                  </div>
                  <div class="circle-divider"><img src="assets/images/elements/circle-border.png" alt="image"></div>
                  <ul class="ticket-numbers-list">
                    <li>23</li>
                    <li>22</li>
                    <li>19</li>
                    <li>9</li>
                    <li>50</li>
                    <li>11</li>
                    <li>12</li>
                  </ul>
                </div>
                <div class="draw-single-ticket">
                  <div class="draw-single-ticket__header">
                    <div class="left">Tickey#1</div>
                    <div class="right">Contest No:R9D</div>
                  </div>
                  <div class="circle-divider"><img src="assets/images/elements/circle-border.png" alt="image"></div>
                  <ul class="ticket-numbers-list">
                    <li>23</li>
                    <li>22</li>
                    <li>19</li>
                    <li>9</li>
                    <li>50</li>
                    <li>11</li>
                    <li>12</li>
                  </ul>
                </div>
                <div class="draw-single-ticket">
                  <div class="draw-single-ticket__header">
                    <div class="left">Tickey#3</div>
                    <div class="right">Contest No:R9D</div>
                  </div>
                  <div class="circle-divider"><img src="assets/images/elements/circle-border.png" alt="image"></div>
                  <ul class="ticket-numbers-list">
                    <li>23</li>
                    <li>22</li>
                    <li>19</li>
                    <li>9</li>
                    <li>50</li>
                    <li>11</li>
                    <li>12</li>
                  </ul>
                </div>
              </div>
            </div> -->
            <!-- upcoming-draw-wrapper end -->

        
            
            <div class="past-draw-wrapper">
              <h3 class="title">Meus Sorteios</h3>
              <div class="table-responsive-lg">
                <table>
                  <thead>
                    <tr>
                      <th>Data fim</th>
                      <th>ID</th>
                      <th>Resultado</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
            <!-- Apuração do sorteio -->
                    <?php
                    if($arrayPurchase != array()):
                    $arrayResult = array();
                    $teste = array();
                    foreach($arrayPurchase as $itemsPurchase){
                        $dataFimSorteio = $sorteio->getDataFimSorteio($itemsPurchase['id_sorteio']);
                        foreach($dataFimSorteio as $dataFim){
                            if(date("Y-m-d") >= substr($dataFim['data_fim_sorteio'], 0, 10)){
                                // echo "Chegou o dia do sorteio!" . "<br>";
                                $arrayNumeroSorteado = $sorteio->getNumeroSorteado($itemsPurchase['id_sorteio']);
                                foreach($arrayNumeroSorteado as $itemsNumerosSorteados){
                                    $numerosComprados = explode('-', $itemsPurchase['numeros_comprados']);
                                    foreach($numerosComprados as $itemsComprados){
                                      $arrayNumerosSorteados = explode("-", $itemsNumerosSorteados['resultado_concurso']);
                                      foreach($arrayNumerosSorteados as $numerosSorteados){
                                          foreach($numerosComprados as $itemsComprados){
                                              if($numerosSorteados == $itemsComprados){
                                                $teste[] = $numerosSorteados;
                                                $arrayResult[] = array(
                                                  "id" => substr(md5($itemsPurchase['id_sorteio']), 0, 3),
                                                  "titulo" => $itemsNumerosSorteados['titulo_produto'],
                                                  "descricao" => $itemsNumerosSorteados['descricao_produto'],
                                                  "numero_sorteado" => $numerosSorteados,
                                                  "data_fim_sorteio" => substr($itemsNumerosSorteados['data_fim_sorteio'], 0, 10)
                                                );
                                              }
                                          }
                                      }   
                                    }
                                }
                            }
                        }
                    }

                    $newArrayResult = $sorteio->unique_multidim_array($arrayResult, 'id');

                    foreach($newArrayResult as $itemsWinners){ 

                      // echo $itemsWinners['id'] . "<br>";
                      // echo $itemsWinners['titulo'] . "<br>";
                      // echo $itemsWinners['descricao'] . "<br>";
                      // echo $itemsWinners['numero_sorteado'] . "<br>";

                      
                      // echo $itemsPurchase['id_sorteio'] . " = " . $itemsNumerosSorteados['resultado_concurso'] . "<br>";
  
                      // echo "id Sorteio = #" . substr(md5($itemsPurchase['id_sorteio']), 0, 3) . "<br>";
                      // echo "Titulo do Sorteio: " . $itemsNumerosSorteados['titulo_produto'] . "<br>";
                      // echo "Descrição do sorteio " . $itemsNumerosSorteados['descricao_produto'] . "<br>";
                      // echo "Numero Sorteado = " . $itemsNumerosSorteados['resultado_concurso'] . "<br>";
                      // echo "<hr>";
  
                      echo '
                      <tr class="click-point">
                      <td>
                        <input type="hidden" value="#'.$itemsWinners['id'].'">
                        <input type="hidden" value="'.$itemsWinners['titulo'].'">
                        <input type="hidden" value="'.$itemsWinners['descricao'].'">
                        <span class="date">' . $itemsWinners['data_fim_sorteio'] . '</span>
                      </td>
                      <td>
                        <input type="hidden" value="#'.$itemsWinners['id'].'">
                        <input type="hidden" value="'.$itemsWinners['titulo'].'">
                        <input type="hidden" value="'.$itemsWinners['descricao'].'">
                        <span class="contest-no contest-id-winner">#' . $itemsWinners['id'] . '</span>
                      </td>
  
                      <td>
                        <ul class="number-list win-list">
                          <input type="hidden" value="#'.$itemsWinners['id'].'">
                          <input type="hidden" value="'.$itemsWinners['titulo'].'">
                          <input type="hidden" value="'.$itemsWinners['descricao'].'">
                          <li>'.$itemsWinners['numero_sorteado'].'</li>
                        </ul>
                      </td>
                        <td>
                        <input type="hidden" value="#'.$itemsWinners['id'].'">
                        <input type="hidden" value="'.$itemsWinners['titulo'].'">
                        <input type="hidden" value="'.$itemsWinners['descricao'].'">
                        <span style="color:yellow;">Ganhou</span>
                        </td>
                        
                        <div class="bg"></div>
                        <div align="center" class="box">
                          <img style="width:85px; height:50px;" src="assets/images/logo.png" alt="logo-modal">
                          <span align="center" class="close">X</span>
                          <div class="overflow-div">
                            <h3 class="id-sorteio-tag" class="parabens">Parabéns, você ganhou o concurso número: # 123</h3><br>
                            <h4 class="titulo-sorteio-tag">Titulo do sorteio</h4><br>
                            <p class="text-sorteio-tag" align="center">
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                              Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, 
                              when an unknown printer took a galley of type and scrambled it to make a type 
                              specimen book. It has survived not only five centuries, but also the leap into 
                              electronic typesetting, remaining essentially unchanged. It was popularised in
                              the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                              and more recently with desktop publishing software like Aldus PageMaker including 
                              versions of Lorem Ipsum
                            </p>
                          </div>
                        </div>
                      </tr>
                      ';

                      $sorteio->insertTableWinners($itemsWinners['titulo'], $data['nome'], $data["email"], $itemsWinners['numero_sorteado']);

                    }
                    

                    ?>
        <!-- Apuração do sorteio -->
                  <?php foreach($arrayPurchase as $purchase): ?>
                    <?php $numerosArray = explode('-', $purchase['numeros_comprados']); ?>
                    <?php $arrayDataFimSorteio = $sorteio->getDataFimSorteio($purchase['id_sorteio']);?>
                    <tr>
                    <?php foreach($arrayDataFimSorteio as $dataFimSorteio): ?>
                      <td><span class="date"><?php echo substr($dataFimSorteio['data_fim_sorteio'], 0, 10); ?></span></td>
                    <?php endforeach; ?>

                      <td><span class="contest-no">#<?php echo substr(md5($purchase['id_sorteio']), 0, 3); ?></span></td>
                      <td>
                        <ul class="number-list">
                        <?php foreach($numerosArray as $numeros): ?>
                          <li><?php echo $numeros; ?></li>
                        <?php endforeach; ?>
                        </ul>
                      </td>
                      <td><span class='fail'>Não Ganhou</span></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <div class="load-more">
                <!-- <button type="button">Show More Lotteries <i class="las la-angle-down ml-2"></i></button> -->
              </div>
            </div><!-- past-draw-wrapper end -->
          </div>
        </div>
      </div>
    </div>
    <!-- user section end -->

    <style>
      .bg{
        width:100%;
        height:100%;
        top:0;
        left:0;
        background-color:rgba(0,0,0, .5);
        display:none;
        position:fixed;
        z-index:1000;
      }
      .box{
        width:720px;
        height:405px;
        position:fixed;
        right:20%;
        top:20%;
        z-index:2000;
        display:none;
        background-color:#fff;
        border-radius:10px;
      }
      .close{
        border-radius:5px;
        position:absolute;
        background-color:#000;
        color:#fff;
        right:0;
        width:60px;
        height:50px;
        padding-top:10px;
        cursor:pointer;
      }
      .box h3{
        color:black;
        margin-top:10%;
      }
      .click-point:hover{
        background-image:-webkit-linear-gradient(86deg, #ec038b 0%, #fb6468 44%, #fbb936 100%);
        cursor:pointer;
      }
      .overflow-div{
        width:550px;
        height:340px;
        overflow-y:scroll;
        margin-top:20px;
      }
      .overflow-div p{
        color:black;
      }
      .overflow-div h4{
        color:black;
      }

      ::-webkit-scrollbar-track {
          background-color: #F4F4F4;
      }
      ::-webkit-scrollbar {
          width: 6px;
          background: #F4F4F4;
      }
      ::-webkit-scrollbar-thumb {
          background:-webkit-linear-gradient(86deg, #ec038b 0%, #fb6468 44%, #fbb936 100%);
      }
    </style>

    <script>
        document.querySelectorAll('.click-point').forEach(($clickPoint) => {
          $clickPoint.addEventListener('click', (e) => {
            const currentTag = e.target.children

            document.querySelectorAll('.bg').forEach(($bg) => {
              $bg.style.display = 'flex'
            })

            document.querySelectorAll('.box').forEach(($box) => {
                $box.style.display = 'flex'
            })

            document.querySelectorAll('.id-sorteio-tag').forEach(($idTag) => {
              $idTag.innerHTML = `Parabéns! você foi sorteado no concurso Nº: ${currentTag[0].value}`
            })

            document.querySelectorAll('.titulo-sorteio-tag').forEach(($tituloTag) => {
              $tituloTag.innerHTML = currentTag[1].value
            })

            document.querySelectorAll('.text-sorteio-tag').forEach(($textTag) => {
              $textTag.innerHTML = `
              ${currentTag[2].value}
              <p>Entre em contato conosco agora mesmo!</p>
              <a class="btn btn-primary" href="contact.php">Contato</a>`
            })
          })
        })

        document.querySelectorAll('.close').forEach(($close) => {
            $close.addEventListener('click', () => {
              document.querySelectorAll('.bg').forEach(($bg) => {
              $bg.style.display = 'none'
            })

            document.querySelectorAll('.box').forEach(($box) => {
              $box.style.display = 'none'
            })
          })
        })
    </script>
<?php require_once "pages/footer.php"; ?>