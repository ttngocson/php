<?php
	$idhoadon = isset($_POST['idhoadon']) ? $_POST['idhoadon'] : '';
	$tentk = $_SESSION['username'];
	$sql_find = "Select * from quyensudung Where TenTK = '".$tentk."' and IDChucNang = '17'";
	$res_find = mysqli_query($conn,$sql_find);
	if (mysqli_num_rows($res_find)!=0) {
		$sql = "DELETE FROM `hoadon` WHERE IDHoaDon = '".$idhoadon."'";
		mysqli_query($conn,$sql); 
		echo '<script type="text/javascript">
	                    alert("Xóa thành công!");
	                </script>';
	    header('Location: http://localhost:8080/QLDA/admin/index.php?chucnang=hien_thi_hd&maquyen=xhd');
	}
	else (condition) {
				echo '<script type="text/javascript">
	                    alert("Bạn không có quyền xóa hóa đơn!");
	                </script>';
	    		header('Location: http://localhost:8080/QLDA/admin/index.php?chucnang=hien_thi_hd&maquyen=xhd');
			}		
?>