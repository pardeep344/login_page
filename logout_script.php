<?php

session_start();
session_unset();
session_destroy();



session_start();
$_SESSION['success']="you are log out";
header('location: login_form.php');
exit;

?>
