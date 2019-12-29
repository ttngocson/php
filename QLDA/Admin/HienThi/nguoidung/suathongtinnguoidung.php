<?php 
	$idnguoidung = isset($_GET['manguoidung']) ? $_GET['manguoidung'] : -1;
	if ($idnguoidung!='') {
		{
			$sql = "SELECT * FROM thongtinnguoidung WHERE IDNguoiDung='".$idnguoidung."'";
			$res = mysqli_query($conn,$sql);
			if ($res) {
				$rows = mysqli_fetch_array($res);
			}
		}
	}
	$ho = isset($_POST['ho']) ? trim($_POST['ho']) : '';
	$ten = isset($_POST['ten']) ? trim($_POST['ten']) : '';
	$gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : 1;
	$sdt = isset($_POST['sdt']) ? trim($_POST['sdt']) : '';
	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
	$diachi = isset($_POST['diachi']) ? trim($_POST['diachi']) : '';
?>
<form action="" method="post">
<table style="margin-left: 20px">
	<tr>
		<th colspan="2">Thông tin người dùng</th>
	</tr>
	<tr>
		<td>Họ:</td>
		<td>
			<input type="text" name="ho" value="<?php echo $rows['Ho'] ?>" required placeholder="Họ">
			<input type="hidden" name="idnguoidung" value="<?php echo $rows['IDNguoiDung'] ?>">
		</td>
	</tr>
	<tr>
		<td>Tên:</td>
		<td>
			<input type="text" name="ten" value="<?php echo $rows['Ten'] ?>" required placeholder="Tên">
		</td>
	</tr>
	<tr>
		<td>Giới tính:</td>
		<td>
			<input type="radio" name="gioitinh" value="1" <?php if($rows['GioiTinh']==1) echo "checked"; ?> checked>Nam 
			<input type="radio" name="gioitinh" value="0" <?php if($rows['GioiTinh']==0) echo "checked"; ?>>Nữ
		</td>
	</tr>
	<tr>
		<td>Số điện thoại:</td>
		<td><input type="text" name="sdt" value="<?php echo $rows['SDT'] ?>" required placeholder="09xxxxxxxx"></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="email" name="email" value="<?php echo $rows['Email'] ?>" required placeholder="abc@mail.com"></td>
	</tr>
	<tr>
		<td>Địa chỉ:</td>
		<td><input type="text" name="diachi" value="<?php echo $rows['DiaChi'] ?>" placeholder="Địa chỉ" required></td>
	</tr>
	<tr>
		<td colspan="2">Xác nhận lưu thay đổi</td>
	</tr>
	<tr>
		<td><input type="submit" name="luu_thay_doi_ttu" value="Lưu thay đổi"></td>
		<td>
			<input type="submit" name="huyxoa" value="Quay lại" class="btn btn-sm btn-secondary">
		</td>
	</tr>
</table>