<?php 
	//phân trang sản phẩm
	$rowsPerPage = 3;
	if (!isset($_GET['page'])) {
		$_GET['page'] = 1;
	}
	$offset =($_GET['page']-1)*$rowsPerPage;
	// $sql = "SELECT * FROM taikhoan,thongtinnguoidung,nhomtaikhoan
	// Where taikhoan.TenTK = thongtinnguoidung.TenTK and taikhoan.IDNhomTK = nhomtaikhoan.IDNhomTK
	// LIMIT ".$offset.",".$rowsPerPage;
	$sql = "SELECT * FROM taikhoan,nhomtaikhoan 
	Where taikhoan.IDNhomTK = nhomtaikhoan.IDNhomTK and taikhoan.TenTK !='".$_SESSION['username']."'
	LIMIT ".$offset.",".$rowsPerPage;
	$result = mysqli_query($conn,$sql);
	//Hiển thị sản phẩm theo dạng bảng 2 cột trên 1 dòng. có thể thay đổi tùy ý
	echo '<a href="?chucnang=them_moi_tk&maquyen=ttk" class="btn btn-xs btn-primary">Thêm mới</a>';
	echo "<table align='center' width='80%'>";
	// <th>Tên người dùng</th>
	echo "	<tr>
				<th>Tên tài khoản</th>
				<th>Nhóm tài khoản</th>
				<th>Trạng thái</th>
				<th colspan='4'>Chức năng</th>
			</tr>";
	if(mysqli_num_rows($result)<>0)
	{
		while($rows = mysqli_fetch_array($result))
		{
			$link = "&tentk=".$rows['TenTK'];
			echo '<tr>';
			echo '<td>'.$rows['TenTK'].'</td>';
			//echo '<td>'.$rows['Ho'].' '.$rows['Ten'].'</td>';
			echo '<td>'.$rows['TenNhom'].'</td>';
			echo '<td>';
			if ($rows['TrangThai']==1) echo 'Hoạt động'; else  echo 'Khóa';
			echo '</td>';
			//echo '<td><a href="chucnang=tt_nguoidung&idnguoidung='.$rows['IDNguoiDung'].'">Xem người dùng</a></td>';
			echo '<td><a href="?chucnang=tt_tai_khoan'.$link.'&maquyen=xcttk">Xem tài khoản</a></td>';
			echo '<td><a href="?chucnang=sua_tai_khoan'.$link.'&maquyen=stk">Sửa tài khoản</a></td>';
			echo '<td><a href="?chucnang=xoa_tai_khoan'.$link.'&maquyen=dtk">Xóa tài khoản</a></td>';
			echo '</tr>';

		}
	}
	echo '</table>';
	//tạo phần link chuyển qua lại giữa các trang
	$res = mysqli_query($conn,"SELECT * FROM taikhoan Where TenTK !='".$_SESSION['username']."'");
	$numRows = mysqli_num_rows($res);
	$maxPage = ceil($numRows/$rowsPerPage);
	echo '<div align="center">';
	$link = "index.php?chucnang=hien_thi_tk&maquyen=xtk&page=";
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