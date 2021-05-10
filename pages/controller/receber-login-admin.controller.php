<?php
require_once "../../class/login-client.class.php";
$objectUser = new User;

if(isset($_POST['login'], $_POST['password'])){

    $user = addslashes($_POST['login']);
    $senha = md5(addslashes($_POST['password']));
    $ip = $_SERVER['REMOTE_ADDR'];

    $resultUser = $objectUser->loginAdmin($user, $senha);

    if($resultUser){
        echo 1;
    }else{
        echo 0;
    }
}