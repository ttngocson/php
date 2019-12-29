<?php 
	//phân trang sản phẩm
	$rowsPerPage = 3;
	if (!isset($_GET['page'])) {
		$_GET['page'] = 1;
	}
	$offset =($_GET['page']-1)*$rowsPerPage;
	$sql = "SELECT * FROM thongtinnguoidung LIMIT ".$offset.",".$rowsPerPage;
	$result = mysqli_query($conn,$sql);
	//Hiển thị sản phẩm theo dạng bảng 2 cột trên 1 dòng. có thể thay đổi tùy ý
	echo "<table align='center' width='70%'>";
	echo "	<tr>
				<th>Họ tên</th>
				<th>Giới tính</th>
				<th>Số điện thoại</th>
				<th colspan='3'>Chức năng</th>
			</tr>";
	if(mysqli_num_rows($result)<>0)
	{
		while($rows = mysqli_fetch_array($result))
		{
			$link = "&manguoidung=".$rows['IDNguoiDung'];
			echo '<tr>';
			echo '<td>'.$rows['Ho'].' '.$rows['Ten'].'</td>';
			echo '<td>';
			if($rows['GioiTinh']== 1) echo "Nam"; else echo "Nữ";
			echo '</td>';
			echo '<td>'.$rows['SDT'].'</td>';
			echo '<td><a href="?chucnang=chi_tiet_nguoidung'.$link.'&maquyen=ctttu">Xem chi tiết</a></td>';
			echo '<td><a href="?chucnang=sua_nguoidung'.$link.'&maquyen=sttu">Sửa</a></td>';
			echo '<td><a href="?chucnang=xoa_nguoidung'.$link.'&maquyen=dttu">Xóa</a></td>';
			echo '</tr>';

		}
	}
	echo '</table>';
	//tạo phần link chuyển qua lại giữa các trang
	$res = mysqli_query($conn,"SELECT * FROM thongtinnguoidung");
	$numRows = mysqli_num_rows($res);
	$maxPage = ceil($numRows/$rowsPerPage);
	echo '<div align="center">';
	$link = "index.php?chucnang=hien_thi_ttu&maquyen=xttu&page=";
	echo "<a href='".$link."1'> << </a> ";
	if ($_GET['page'] > 1)
	{
		echo "<a href='".$link.($_GET['page']-1)."'> < </a> ";
	}
	for ($i=1 ; $i<=$maxPage ; $i++)
	{
		
		if ($i == $_GET['page'])
		{
			echo '<b> '.$i.' </b> ';
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