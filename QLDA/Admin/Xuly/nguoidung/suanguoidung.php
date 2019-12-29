<?php 
	$idnguoidung = isset($_POST['idnguoidung']) ? $_POST['idnguoidung'] : -1;
	$ho = isset($_POST['ho']) ? trim($_POST['ho']) : '';
	$ten = isset($_POST['ten']) ? trim($_POST['ten']) : '';
	$gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : 1;
	$sdt = isset($_POST['sdt']) ? trim($_POST['sdt']) : '';
	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
	$diachi = isset($_POST['diachi']) ? trim($_POST['diachi']) : '';
	if ($idnguoidung!=-1) {
		$sql = "SELECT * FROM thongtinnguoidung WHERE IDNguoiDung='".$idnguoidung."'";
		$result = mysqli_query($conn,$sql);
		if ($result) {
			$sql_update = "UPDATE `thongtinnguoidung` 
			SET `Ho`='".$ho."',`Ten`='".$ten."',
			`GioiTinh`='".$gioitinh."',`SDT`='".$sdt."',`Email`='".$email."',
			`DiaChi`='".$diachi."' WHERE IDNguoiDung = '".$idnguoidung."'";
			mysqli_query($conn,$sql_update);
			echo "<script type='text/javascript'>alert('Cập nhật thành công');</script>";
			//echo $sql_update;
		}
	}
	else
		echo "<script type='text/javascript'>window.history.back();</script>";
?>