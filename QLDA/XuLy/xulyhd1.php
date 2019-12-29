<?php 
	//lấy thông tin
	$mahd = '';
	$idnguoidung = 0;
	$ho= isset($_POST['ho']) ? trim($_POST['ho']) : '';
	$ten = isset($_POST['ten']) ? trim($_POST['ten']) : '';
	$gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : 1;
	$sdt = isset($_POST['sdt']) ? trim($_POST['sdt']) : '';
	$email=isset($_POST['email']) ? trim($_POST['email']) : '';
	$diachi = isset($_POST['diachi']) ? trim($_POST['diachi']) : '';
	//tạo thông tin người dùng
	$sql_find = "Select * From thongtinnguoidung Where Ho='".$ho."' and Ten='".$ten."' and GioiTinh = '".$gioitinh."' and SDT = '".$sdt."' and Email='".$email."' and DiaChi='".$diachi."'";
	// echo $sql_find;
	// echo "<br>";
	//kiểm tra xem đã tồn tại thông tin người dùng trong csdl hay chưa
	$res_find = mysqli_query($conn,$sql_find);
	if (mysqli_num_rows($res_find)!=0) {
		$idnguoidung = mysqli_fetch_array($res_find)['IDNguoiDung'];
		// echo '1';
		// echo "<br>";
		mysqli_free_result($res_find);
	}
	else
	{
		$sql_insert = "INSERT INTO `thongtinnguoidung`(`Ho`, `Ten`, `GioiTinh`, `SDT`, `Email`, `DiaChi`) 
		VALUES ('".$ho."','".$ten."','".$gioitinh."','".$sdt."','".$email."','".$diachi."')";
		//thêm vào csdl
		$res_insert = mysqli_query($conn,$sql_insert);
		//thêm xong -> tìm lại thông tin để lấy id người dùng.
		$res_find = mysqli_query($conn,$sql_find);
		$idnguoidung = mysqli_fetch_array($res_find)['IDNguoiDung'];
		// echo "2";
		// echo "<br>";
		mysqli_free_result($res_find);
	}
	// echo $idnguoidung.'<br>';
	$ngaylap = date('Y-m-d');
	$mahd = $idnguoidung.'HD'.date('dmYHi');
	// echo $mahd.'<br>';
	$sql_insert_HD = "INSERT INTO `hoadon`(`IDHoaDon`, `IDNguoiDung`, `NgayLap`, `TongTien`, `TinhTrang`) 
	VALUES ('".$mahd."','".$idnguoidung."','".$ngaylap."','".$_SESSION['TongTien']."','0') ";
	$res_insert_HD = mysqli_query($conn,$sql_insert_HD);
	$soluong = 0;
	// $index = 1;
	foreach ($_SESSION['cart'] as $key => $value) 
	{
		$soluong = $_SESSION['cart'][$key]['soluong'];
		$sql = "SELECT TenSanPham,DonGia FROM sanpham WHERE IDSanPham =".$key;
		$res = mysqli_query($conn,$sql);
		$rows = mysqli_fetch_array($res);
		$sql_insert_CTHD = "INSERT INTO `chitiethoadon`(`IDHoaDon`, `IDSanPham`, `SoLuong`, `DonGia`) 
		VALUES ('".$mahd."','".$key."','".$soluong."','".$rows['DonGia']."')";
		mysqli_query($conn,$sql_insert_CTHD);
		// echo "insert cthd ".$index;
		// $index += 1;
		// echo "<br>";
	}
	unset($_SESSION['cart']);
	unset($_SESSION['TongTien']);
	echo '<script type="text/javascript">
                    alert("Đăng ký mua hàng thành công! \nChuyển về trang chủ.");
                    window.location.assign("http://localhost:8080/QLDA/index.php");
                </script>';
?>