<?php 
	if (!isset($_SESSION['username'])) {
	 	header('Location: XuLy/login.php');
	}
	else 
	{
		echo "<h6 align='right'>Tài khoản: ".$_SESSION['username']."&nbsp;  <a href='XuLy/logout.php'>đăng xuất</a></h6>";
	}
 ?>