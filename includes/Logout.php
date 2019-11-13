<?php
    session_start();
    if(isset($_SESSION["userName"])){
        unset($_SESSION['userName']);
    }
$uri = 'http://';
$uri .= $_SERVER['HTTP_HOST'] .'/index.php';
echo "<script>window.location.replace('$uri')</script>";
exit;
?>