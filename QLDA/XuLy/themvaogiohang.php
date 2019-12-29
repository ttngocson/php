<?php 
	session_start();
	$masp = isset($_GET['idthem']) ? $_GET['idthem'] : '';
	if (isset($_SESSION['cart'])) 
	{
		if (isset($_SESSION['cart'][$masp])) {
			$_SESSION['cart'][$masp]['soluong']+=1;
		}
		else
			$_SESSION['cart'][$masp]['soluong']=1;
	}
	else {
		$_SESSION['cart'][$masp]['soluong']=1;
	}
	echo "<script>window.history.go(-1)</script>";
?>