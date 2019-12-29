<?php 
	$sql = "Select * From thongtinnguoidung Where TenTK = '".$_SESSION['username']."'";
	$res = mysqli_query($conn,$sql);
	$rows = mysqli_fetch_array($res);
?>
<div align="center" style="font-size: larger">
<table width="250">
	<tr align="center">
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
</table>
<hr>
<?php 
	$sql_ct = "select * from hoadon where IDNguoiDung = '".$rows['IDNguoiDung']."' ORDER BY TinhTrang";
	$res_ct = mysqli_query($conn,$sql_ct);
	if (mysqli_num_rows($res_ct)!=0) {
		echo "<table>
				<tr>
					<td><h3>Các đơn hàng đã mua</h3></th>
				</tr>
				<tr>
					<th>STT</th>
					<th>Ngày mua</th>
					<th>Số lượng sản phẩm</th>
					<th>Tổng tiền</th>
					<th>Trạng thái</th>
				</tr>";
				$stt = 1;
				$tongtien=0;
				$tongdon = 0;
		while ($rows_ct = mysqli_fetch_array($res_ct)) 
		{
			$sql_cthd = "SELECT SUM(SoLuong) as tong FROM `chitiethoadon` WHERE IDHoaDon = '".$rows_ct['IDHoaDon']."'";
			$result = mysqli_query($conn,$sql_cthd);
			$soluongsp = mysqli_fetch_array($result)[0];
			echo "<tr>";
			echo "<td>".$stt."</td>";
			echo "<td>".$rows_ct['NgayLap']."</td>";
			echo "<td>".$soluongsp."</td>";
			echo "<td>".number_format($rows_ct['TongTien'])."</td>";
			echo "<td>";
			if ($rows_ct['TinhTrang']==0) {
				echo "Đang xử lý";
			}
			else echo "Đã giao hàng!";
			echo "</td>";
			echo "</tr>";
			$stt+=1;
			$tongtien += $rows_ct['TongTien'];
		}
		$tongdon = $stt-1;
		echo "<tr>
				<td>Tổng hợp</td>
				<td>Số đơn:</td>
				<td>".$tongdon."</td>
				<td>Tổng tiền:</td>
				<td>".number_format($tongtien)."vnđ</td>
			  </tr>";
		echo "</table>";
	}
	else
		echo "<h3 align='center'>Bạn chưa có đơn hàng nào</h3>";
	
?>
</div>
