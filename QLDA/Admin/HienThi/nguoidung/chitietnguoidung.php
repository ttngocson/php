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
?>
<table width="200" style="margin-left: 20px">
	<tr>
		<th colspan="2">Thông tin người dùng</th>
	</tr>
	<tr>
		<td>Họ và tên:</td>
		<td><?php echo $rows['Ho'].' '.$rows['Ten'] ?></td>
	</tr>
	<tr>
		<td>Giới tính:</td>
		<td><?php if($rows['GioiTinh']==1) echo "Nam"; else echo "Nữ"; ?></td>
	</tr>
	<tr>
		<td>Số điện thoại:</td>
		<td><?php echo $rows['SDT'] ?></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><?php echo $rows['Email'] ?></td>
	</tr>
	<tr>
		<td>Địa chỉ:</td>
		<td><?php echo $rows['DiaChi'] ?></td>
	</tr>
	<tr>
		<td>Tên tài khoản:</td>
		<td><?php if ($rows['TenTK']) echo $rows['TenTK']; else echo "Chưa đăng ký tài khoản!"; ?></td>
	</tr>
</table>
<div>
	<?php 
		echo '<a href="?chucnang=sua_nguoidung&manguoidung='.$rows['IDNguoiDung'].'&maquyen=sttu" class="btn btn-sm btn-primary">
			Sửa </a>';
			echo " ";
		echo '<a href="?chucnang=xoa_nguoidung&manguoidung='.$rows['IDNguoiDung'].'&maquyen=xttu" class="btn btn-sm btn-primary">
			Xóa </a>';
	?>
	<button onclick="goBack()" class="btn btn-sm btn-secondary">Quay lại</button>
	<script>
		function goBack() {
	  		window.history.back();
		}
	</script>
</div>