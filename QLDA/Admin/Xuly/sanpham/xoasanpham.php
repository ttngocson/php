<?php
	$masp = isset($_GET['masp']) ? $_GET['masp'] : '';
	if ($masp!='') {
		$sql = "SELECT * FROM chitiethoadon WHERE IDSanPham = '".$masp."'";
		$res = mysqli_query($conn,$sql);
		if (mysqli_num_rows($res)!=0) {
			echo '<script type="text/javascript">
				alert("Sản phẩm đang tồn tại trong hóa đơn, không thể xóa!");
				window.history.go(-2);
			  </script>';
		}
		else
		{
			$sql = "DELETE FROM sanpham WHERE IDSanPham='".$masp."'";
			mysqli_query($conn,$sql);
			echo '<script type="text/javascript">
				alert("Xóa thành công!");
				window.location.assign("http://localhost:8080/QLDA/admin/?chucnang=hien_thi_sp&maquyen=xsp")
			  </script>';
		}
	}
?>