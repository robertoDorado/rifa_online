<?php
session_start();
unset($_SESSION['user_admin']);
header('Location: pages/examples/login.php');