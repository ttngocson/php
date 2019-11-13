<?php
session_start();
require("../MySQL/connect_qlbansua.php");
mysqli_set_charset($conn, 'UTF8');
if(!isset($_SESSION["userName"]) && isset($_POST['email']) && isset($_POST['password'])){
    $sql = "SELECT `Ten_khach_hang` FROM `khach_hang` 
            WHERE `Email` = '" .$_POST['email'] ."' AND `Ma_khach_hang` = '" .$_POST['password'] ."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0){
        echo "<script>alert('Không tìm thấy người dùng')</script>";
    }
    else{
        $user = mysqli_fetch_array($result)['Ten_khach_hang'];
        $_SESSION["userName"] = $user;
    }
    $uri = 'http://';
    $uri .= $_SERVER['HTTP_HOST'] .'/index.php';
    echo "<script>window.location.replace('$uri')</script>";
    exit;
}
?>