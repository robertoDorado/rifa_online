<?php
session_start();
require_once "class/cart.class.php";
$cart = new Cart;

$id = $_GET['id'];
$cart->delCartItem($id);