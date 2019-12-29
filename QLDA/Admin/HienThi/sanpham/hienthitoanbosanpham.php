<?php 
	//phân trang sản phẩm
	$rowsPerPage = 3;
	if (!isset($_GET['page'])) {
		$_GET['page'] = 1;
	}
	$offset =($_GET['page']-1)*$rowsPerPage;
	$sql = "SELECT * FROM sanpham LIMIT ".$offset.",".$rowsPerPage;
	$result = mysqli_query($conn,$sql);
	//Hiển thị sản phẩm theo dạng bảng 2 cột trên 1 dòng. có thể thay đổi tùy ý
	echo '<a href="?chucnang=them_moi_sp&maquyen=tsp" class="btn btn-xs btn-primary">Thêm mới</a>';
	echo "<table align='center' width='620px'>";
	echo "	<tr>
				<th>Tên sản phẩm</th>
				<th>Số lượng</th>
				<th>Đơn giá</th>
				<th colspan='3'>Chức năng</th>
			</tr>";
	if(mysqli_num_rows($result)<>0)
	{
		while($rows = mysqli_fetch_array($result))
		{
			$link = "&masp=".$rows['IDSanPham'];
			echo '<tr>';
			echo '<td>'.$rows['TenSanPham'].'</td>';
			echo '<td>'.$rows['SoLuongSP'].'</td>';
			echo '<td>'.$rows['DonGia'].'</td>';
			echo '<td><a href="?chucnang=chi_tiet_san_pham'.$link.'&maquyen=xctsp">Xem chi tiết</a></td>';
			echo '<td><a href="?chucnang=sua_san_pham'.$link.'&maquyen=ssp">Sửa</a></td>';
			echo '<td><a href="?chucnang=xoa_san_pham'.$link.'&maquyen=dsp">Xóa</a></td>';
			echo '</tr>';

		}
	}
	echo '</table>';
	//tạo phần link chuyển qua lại giữa các trang
	$res = mysqli_query($conn,"SELECT * FROM sanpham");
	$numRows = mysqli_num_rows($res);
	$maxPage = floor($numRows/$rowsPerPage) + 1; 
	echo '<div align="center">';
	$link = "index.php?chucnang=hien_thi_sp&maquyen=xsp&page=";
	echo "<a href='".$link."1'> << </a> ";
	if ($_GET['page'] > 1)
	{
		echo "<a href='".$link.($_GET['page']-1)."'> < </a> ";
	}
	for ($i=1 ; $i<=$maxPage ; $i++)
	{
		
		if ($i == $_GET['page'])
		{
			echo '<b>'.$i.'</b> ';
		}
		else
		echo " <a href=".$link.$i.">".$i."</a> ";
	}
	if ($_GET['page'] < $maxPage)
	{
		echo "<a href='".$link.($_GET['page']+1)."'> > </a>";
	}
	echo "<a href=".$link.$maxPage."> >> </a> ";
	echo '</div>';
?>