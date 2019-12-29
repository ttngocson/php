<?php 
	require('../../Config/connect.php');
	$tentk = isset($_GET['tentk']) ? $_GET['tentk'] : '';
	$idchucnang = isset($_GET['idchucnang']) ? $_GET['idchucnang'] : '';
	$sql = "DELETE FROM `quyensudung` WHERE IDChucNang = '".$idchucnang."' and TenTK = '".$tentk."'";
	mysqli_query($conn,$sql);
	header('Location: http://localhost:8080/QLDA/admin/index.php?chucnang=sua_tai_khoan&tentk='.$tentk.'&maquyen=stk');
?>