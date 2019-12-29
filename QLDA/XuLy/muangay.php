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
	header('Location: http://localhost:8080/QLDA/index.php?chucnang=thanh_toan')
?>