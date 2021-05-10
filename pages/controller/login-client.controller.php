<?php
require_once "../../class/login-client.class.php";
$user = new User;

if(isset($_POST['email'], $_POST['senha'])){

    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);
    $ip = $_SERVER['REMOTE_ADDR'];

    
    $currentUser = $user->loginUser($email, $senha);
    
    if($currentUser){
        
        echo 1;

    }else{
        echo 0;
    }

}