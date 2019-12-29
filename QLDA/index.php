<?php
    //error_reporting(1);
	session_start();
    date_default_timezone_set("Asia/Bangkok");
	require ('XuLy/DisplayProduct.php');
	require('Config/connect.php');
	if (isset($_POST['cap_nhat_gio_hang'])) {
		include('XuLy/capnhatgiohang.php');
	}
    if (isset($_POST['xac_nhan_thong_tin'])) {
        include('XuLy/xulyhd1.php');
    }
    if (isset($_POST['thong_tin_tu_TK'])) {
        include('XuLy/xulyhd2.php');
    }
    if (isset($_POST['btn_submit'])) {
        include('XuLy/login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        body{
            background-color: #a5c0ff;
        }
        nav{
        }
        .product{
            padding-top: 10px;
            width: 300px;
            height: 400px;
            border-radius: 7px;
            transition:0.3s;
        }
        .product:hover{
            background-color: rgba(75, 70, 70, 0.2);
        }
        .image{
            width: 280px;
            height: 280px;
            padding-top: 180px;
            background-size: cover;
            border-radius: 7px;
        }
        .image div{
            opacity: 0;
            transition:1s;
        }
        .image:hover div{
            opacity: 0.7;
        }
    </style>
</head>
<body>
<?php include('Menu/menuchinh.php') ?>
<div class="container">
    <?php include('Config/dieuhuong.php') ?>
</div>
</body>
</html>