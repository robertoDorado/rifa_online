<?php
require_once 'class/login-client.class.php';
require_once 'vendor/autoload.php';
require_once 'class/cart.class.php';
$cart = new Cart;

if(isset($_POST['token'])){
    $token = $_REQUEST["token"];
    $payment_method_id = $_REQUEST["payment_method_id"];
    $installments = $_REQUEST["installments"];
    $issuer_id = $_REQUEST["issuer_id"];
    $total = $_REQUEST['total-a-pagar'];
    
    $user = new User;

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

    $arrayCart = $cart->getList();
    foreach($arrayCart as $itemsCart){
        $numeros = str_replace(',', '-', $itemsCart['numeros']);
        $resultInsert = $cart->insertItemsCart($dataUser['id'], $itemsCart['id'], $numeros);
    }
    if($resultInsert){
        header('Location: pagamento-realizado.php');
    }
    exit;
    MercadoPago\SDK::setAccessToken("TEST-6314440563064089-040819-8633765920e29e3d1c39480cb614f18a-231236702");
        //...
        $payment = new MercadoPago\Payment();
        $payment->transaction_amount = $total;
        $payment->token = $token;
        $payment->description = "Números da sorte - rifa.com";
        $payment->installments = $installments;
        $payment->payment_method_id = $payment_method_id;
        $payment->issuer_id = $issuer_id;
        $payment->payer = array(
        "email" => "atendimentolaborcode@gmail.com"
        );
        // Armazena e envia o pagamento
        $payment->save();
        //...
        // Imprime o status do pagamento
        if($payment->status == 'approved'){
            $arrayCart = $cart->getList();
            foreach($arrayCart as $itemsCart){
                $numeros = str_replace(',', '-', $itemsCart['numeros']);
                $resultInsert = $cart->insertItemsCart($dataUser['id'], $itemsCart['id'], $numeros);
            }
            if($resultInsert){
                header('Location: pagamento-realizado.php');
            }

        }else{
            header('Location: erro-pagamento.php');
        }
        //...
}
