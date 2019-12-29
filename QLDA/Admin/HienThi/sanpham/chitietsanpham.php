<?php
	$masp = $_GET['masp'];
	$sql = "SELECT * FROM sanpham WHERE IDSanPham = ".$masp;
	$result =  mysqli_query($conn,$sql);
	echo "<table align='center'>";
	if(mysqli_num_rows($result)<>0)
	{
		while($rows = mysqli_fetch_array($result))
		{
			echo "<tr>
				  	<th colspan='2'><h3>Thông tin chi tiết sản phẩm</h3></th>
				  </tr>";
			echo "<tr>
				  	<td rowspan='9'>
				  		<img src='img/".$rows['HinhAnh']."' height='400px' width='400px'>
				  	</td>
				  	<td>
				  		<h3>".$rows['TenSanPham']."</h3>
				  	</td>
				  </tr>";
			echo "<tr><td>Giá sản phẩm: ".$rows['DonGia']."</td></tr>";
			echo "<tr><td>Trọng lượng: ".$rows['TrongLuong']."</td></tr>";
			echo "<tr><td>Thông tin ".$rows['TenDaQuy']."</td></tr>";
			echo "<tr><td>Số lượng: ".$rows['SoLuongDQ']." viên</td></tr>";
			echo "<tr><td>Trọng lượng: ".$rows['TrongLuongDQ']."</td></tr>";
			echo "<tr><td>Hinh dạng đá quý: ".$rows['HinhDang']."</td></tr>";
			echo "<tr><td>Loại vàng: Vàng ".$rows['LoaiVang']."</td></tr>";
			echo "<tr><td>Trọng Lượng: ".$rows['TrongLuongVang']."</td></tr>";
			echo "<tr>";
			echo "<td><a href='?chucnang=sua_san_pham&masp=".$rows['IDSanPham']."&maquyen=ssp' class='btn btn-xs btn-info'>Sửa</a></td>";
			echo "<td><a href='?chucnang=xoa_san_pham&masp=".$rows['IDSanPham']."&maquyen=dsp' class='btn btn-xs btn-danger'>Xóa</a>&nbsp;<a class='btn btn-secondary' href=\"javascript:history.back()\">Quay lại</a></td>";
			echo "<tr>";

		}
	}
	echo '</table>';
?>