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
<form method="post" action="">
<table>
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
	<tr>
		<td colspan="2">Xác nhận xóa tài khoản</td>
		<input type="hidden" name="idnguoidung" value="<?php echo $rows['IDNguoiDung'] ?>">
	</tr>
	<tr>
		<td>
			<?php if ($rows['TenTK']) {
				echo '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
				  Xóa
				</button>';
			}
			else
			{
				echo '<input type="submit" name="xac_nhan_xoa_nd" value="Xóa" class="btn btn-sm btn-primary">';
			} ?>
		</td>
		<td><input type="submit" name="huyxoa" value="Quay lại" class="btn btn-sm btn-secondary"></td>
	</tr>
</table>
</form>


<!-- Modal -->

<div class="modal fade" id="exampleModal">
	<form action="" method="post">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="tentk" value="<?php echo $rows['TenTK'] ?>">
					Thông tin người dùng có đi kèm tài khoản
					<br>
					Xác nhận xóa người dùng và tài khoản đi kèm!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
					<button type="submit" name="xoa_kem_tai_khoan" class="btn btn-primary">Xóa</button>
				</div>
			</div>
		</div>
	</form>
</div>