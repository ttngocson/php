<?php 
	unset($_SESSION['cart']);
	unset($_SESSION['TongTien']);
	echo "<script>window.history.go(-2)</script>";
?>