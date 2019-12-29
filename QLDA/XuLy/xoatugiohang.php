<?php 
	session_start();
	$idxoa = $_GET['idxoa'];
	if (isset($_SESSION['cart'])) {
		if (count($_SESSION['cart'])==1) {
			unset($_SESSION['cart']);

		}
		else
		{
			if (array_key_exists($idxoa,$_SESSION['cart'])) {
				unset($_SESSION['cart'][$idxoa]);
			}
		}
	}
	else {
		echo "k có session";
	}
header('Location: http://localhost:8080/QLDA/index.php?chucnang=gio_hang');
?>