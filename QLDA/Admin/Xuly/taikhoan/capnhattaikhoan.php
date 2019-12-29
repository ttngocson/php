<?php 
	if (isset($_SESSION['tentksua'])) {
		$tentaikhoan = $_SESSION['tentksua'];
		$idnhom = $_POST['nhomtk'];
		$trangthai = $_POST['trangthai'];
		//kiểm tra xem có sự thay đổi nhóm tài khoản hay không.
		$sql_find = "SELECT * FROM taikhoan WHERE TenTK = '".$tentaikhoan."'";
		$res_find = mysqli_query($conn,$sql_find);
		if ($idnhom != mysqli_fetch_array($res_find)['IDNhomTK']) 
		{
			if ($idnhom == 1 || $idnhom == 3) {
				$sql_del = "Delete From quyensudung where TenTK = '".$tentaikhoan."'";
				mysqli_query($conn,$sql_del);
			}
			else
			{
				//các quyền mặc định của nhân viên 
				$array = array("1","2","3","4","5","6","7","11","12","15","16");
				foreach ($array as  $value) {
					$sql_insert = "INSERT INTO `quyensudung`(`TenTK`, `IDChucNang`) VALUES ('".$tentaikhoan."','".$value."')";
					mysqli_query($conn,$sql_insert);
				}
			}
			$sql = "UPDATE taikhoan SET IDNhomTK ='".$idnhom."', TrangThai='".$trangthai."' WHERE TenTK ='".$tentaikhoan."'";
			mysqli_query($conn,$sql);
		}
		else
		{
			$sql = "UPDATE taikhoan SET TrangThai='".$trangthai."' WHERE TenTK ='".$tentaikhoan."'";
			mysqli_query($conn,$sql);
		}
	}
	echo '<script type="text/javascript">
                    alert("Cập nhật thành công!");
                </script>';
                // window.history.back();
    //header('Location: http://localhost:8080/QLDA/admin/');
?>