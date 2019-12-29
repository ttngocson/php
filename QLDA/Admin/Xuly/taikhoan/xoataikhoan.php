<?php 
	$tentk = isset($_GET['tentk']) ? $_GET['tentk'] : '';
	if ($tentk!='') {
		$sql2 = "DELETE FROM thongtinnguoidung WHERE TenTK = '".$tentk."'";
		$res2 = mysqli_query($conn,$sql2);
		
		// if ($res2) {
		$sql1 = "DELETE FROM taikhoan WHERE TenTK = '".$tentk."'";
		$res1 = mysqli_query($conn,$sql1);
		// }
		// if ($res1) {
		// 	echo "xóa tài khoản thành công";
		// }
		echo '<script type="text/javascript">
				alert("Xóa tài khoản thành công!");
				window.location.assign("http://localhost:8080/QLDA/admin/?chucnang=hien_thi_tk&maquyen=xtk");
			  </script>';
	}
	else
		echo '<script type="text/javascript">
				window.location.assign("http://localhost:8080/QLDA/admin/?chucnang=hien_thi_tk&maquyen=xtk");
			  </script>';
?>