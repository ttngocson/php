<?php 
	$masp = isset($_GET['masp']) ? $_GET['masp'] : '';
	if ($masp!='') {
		$sql = "SELECT * FROM sanpham WHERE IDSanPham = ".$masp;
		$result =  mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)<>0)
		{
			$rows = mysqli_fetch_array($result);
		}
	}
?>
<form method="post" action="">
	<table>
		<tr>
			<th colspan='2'><h3>Thông tin sản phẩm</h3></th>
		</tr>
		<tr>
			<td rowspan='9'>
				<img src='img/<?php echo $rows['HinhAnh'] ?>' height='400px' width='400px'>
			</td>
			<td>
				<h3><?php echo $rows['TenSanPham'] ?></h3>
			</td>
		</tr>
		<tr>
			<td>Giá sản phẩm: <?php echo $rows['DonGia'] ?></td>
		</tr>
		<tr>
			<td>Trọng lượng: <?php echo $rows['TrongLuong'] ?></td>
		</tr>
		<tr>
			<td>Thông tin <?php echo $rows['TenDaQuy'] ?></td>
		</tr>
		<tr>
			<td>Số lượng: <?php echo $rows['SoLuongDQ'] ?> viên</td>
		</tr>
		<tr>
			<td>Trọng lượng: <?php echo $rows['TrongLuongDQ'] ?></td>
		</tr>
		<tr>
			<td>Hinh dạng đá quý: <?php echo $rows['HinhDang'] ?></td>
		</tr>
		<tr>
			<td>Loại vàng: Vàng <?php echo $rows['LoaiVang'] ?></td>
		</tr>
		<tr>
			<td>Trọng Lượng: <?php echo $rows['TrongLuongVang'] ?></td>
		</tr>
		<tr>
			<td colspan="2">Xác nhận xóa sản phẩm</td>
		</tr>
		<tr>
		<td>
			<input type="hidden" name="masp" value="<?php $masp ?>">
			<input type="submit" class="btn btn-danger" name="xoasp" value="Xóa">
		</td>
		<td>
			<input type="submit" class="btn btn-secondary" name="huyxoa" value="Quay lại">
		</td>
		<tr>
	</table>
</form>