<?php 
	$id = isset($_GET['idnguoidung']) ? $_GET['idnguoidung'] : -1;
	if ($id!=-1) {
		$sql="SELECT * From thongtinnguoidung Where IDNguoiDung = '".$id."'";
		$res = mysqli_query($conn,$sql);
		if ($res) {
			$rows = mysqli_fetch_array($res);
			if ($rows['TenTK'] == $_SESSION['username']) {
				echo '<script>
						alert("Không thể xóa thông tin người dùng \n đang đăng nhập!");
						
					  </script>';
			}
			else
			{
				$sql2 = "DELETE FROM thongtinnguoidung WHERE IDNguoiDung = '".$id."'";
				$res2 = mysqli_query($conn,$sql2);
				echo '<script type="text/javascript">
						alert("Xóa tài khoản thành công!");
						window.location.replace("http://localhost:8080/QLDA/admin/?chucnang=hien_thi_ttu&maquyen=xttu");
					  </script>';
			}
			
		}
	}
	echo '<script type="text/javascript">
			window.location.assign("http://localhost:8080/QLDA/admin/?chucnang=hien_thi_ttu&maquyen=xttu");
		  </script>';
?>