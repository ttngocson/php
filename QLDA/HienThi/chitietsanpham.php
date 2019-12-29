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
				  	<th colspan='2'><h3 align='center'>Thông tin chi tiết sản phẩm</h3></th>
				  </tr>";
			echo "<tr>
				  	<td rowspan='9'>
				  		<div style='padding: 10px'><img src='Admin/img/".$rows['HinhAnh']."' height='380px' width='380px'></div>
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
			echo "<td align='center'><a href='XuLy/themvaogiohang.php?idthem=".$_GET['masp']."&CT=yes' class='btn btn-xs btn-info'>Thêm vào giỏ hàng</a>";
			echo "<td><a href='' class='btn btn-xs btn-info'>Mua ngay</a>";
			echo "<tr>";

		}
	}
	echo '</table>';
?>