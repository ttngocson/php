<?php 
	$mahd = isset($_GET['mahd']) ? $_GET['mahd'] : '';
	$sql = "Select * From hoadon,thongtinnguoidung 
	Where hoadon.IDNguoiDung = thongtinnguoidung.IDNguoiDung
	and hoadon.IDHoaDon = '".$mahd."'";
	$res = mysqli_query($conn,$sql);
	$rows = mysqli_fetch_array($res);
?>
<form action="" method="post">
	<table>
		<tr>
			<td colspan="2">
				<h3>Thông tin người dùng</h3>
			</td>
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
			<td><?php if($rows['TenTK']) echo $rows['TenTK']; else echo "Người dùng chưa đăng ký tài khoản!"; ?></td>
		</tr>
		<tr>
			<td>Trạng thái hóa đơn:</td>
			<td><?php if($rows['TinhTrang'] ==1) echo "Đã giao hàng!"; else echo "Đang xử lý!"; ?></td>
		</tr>
	</table>
	<hr>
	<table>
		<tr>
			<td>
				<h3>Chi tiết hóa đơn</h3>
			</td>
		</tr>
		<tr>
			<th>STT</th>
			<th>Tên sản phẩm</th>
			<th>Số lượng</th>
			<th>Đơn giá</th>
			<th>Thành tiền</th>
		<?php 
			$stt=1;
			$sql_cthd = "Select * from chitiethoadon,sanpham Where chitiethoadon.IDSanPham = sanpham.IDSanPham
			 and chitiethoadon.IDHoaDon = '".$mahd."'";
			$result = mysqli_query($conn,$sql_cthd);
			while ($row_cthd = mysqli_fetch_array($result)) 
			{
				$tien = $row_cthd['SoLuong'] * $row_cthd['DonGia'];
				echo "<tr>";
				echo "<td>".$stt."</td>";
				echo "<td>".$row_cthd['TenSanPham']."</td>";
				echo "<td>".number_format($row_cthd['SoLuong'])."</td>";
				echo "<td>".number_format($row_cthd['DonGia'])." vnđ</td>";
				echo "<td>".number_format($tien)." vnđ</td>";
				echo "</tr>";
				$stt+=1;
			}
		?>
		<tr>	
			<td colspan="5">Tổng tiền: <?php echo number_format($rows['TongTien']).' vnđ'; ?></td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="idhoadon" value="<?php echo $mahd; ?>">
				<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
				  Xóa hóa đơn
				</button> 				
			</td>
			<td>
				<input type="submit" name="huyxoa" value="Quay lại" class="btn btn-sm btn-secondary">
			</td>
		</tr>
	</table>
</form>
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
					<input type="hidden" name="idhoadon" value="<?php echo $mahd; ?>">
					Xác nhận xóa hóa đơn!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
					<button type="submit" name="xoa_hoa_don" class="btn btn-primary">Xóa</button>
				</div>
			</div>
		</div>
	</form>
</div>