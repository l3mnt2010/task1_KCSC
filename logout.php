<?php
session_start();

unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['messages']);
unset($_SESSION['type']);
unset($_SESSION['admin']);

session_destroy();

setcookie('PHPSESSID', '', time() - 3600, '/', '', 0, 0);
header('Location: login.php');
