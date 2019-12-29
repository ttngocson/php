<?php 
	$mahd = '';
	$idnguoidung = isset($_POST['idnguoidung']) ? $_POST['idnguoidung'] : -1;
	$ho= isset($_POST['ho']) ? trim($_POST['ho']) : '';
	$ten = isset($_POST['ten']) ? trim($_POST['ten']) : '';
	$gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : 1;
	$sdt = isset($_POST['sdt']) ? trim($_POST['sdt']) : '';
	$email=isset($_POST['email']) ? trim($_POST['email']) : '';
	$diachi = isset($_POST['diachi']) ? trim($_POST['diachi']) : '';
	//thêm hóa đơn và ct hóa đơn vào csdl
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