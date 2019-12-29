<?php 
	//lấy từ khóa tìm kiếm
	$tukhoa = $_GET['tukhoa'];
	//phân trang sản phẩm
	$rowsPerPage = 6;
	if (!isset($_GET['page'])) {
		$_GET['page'] = 1;
	}
	$offset =($_GET['page']-1)*$rowsPerPage;
	$sql = "SELECT * FROM sanpham WHERE TenSanPham LIKE '%".$tukhoa."%' LIMIT ".$offset.",".$rowsPerPage;
	$result = mysqli_query($conn,$sql);
	//Hiển thị sản phẩm theo dạng bảng 2 cột trên 1 dòng. có thể thay đổi tùy ý
	echo "<table align='center'>";
	if(mysqli_num_rows($result)<>0)
	{
		$dem = 0;
		while($rows = mysqli_fetch_array($result))
		{
			if ($dem==3)
			echo '<tr>';
			echo '<td>';
			DisplayProduct($rows);
			echo '</td>';
			$dem++;
			if($dem==3)
			echo '</tr>';

		}
	}
	echo '</table>';
	//tạo phần link chuyển qua lại giữa các trang
	$res = mysqli_query($conn,"SELECT * FROM sanpham WHERE TenSanPham LIKE '%".$tukhoa."%'");
	$numRows = mysqli_num_rows($res);
	$maxPage = ceil($numRows/$rowsPerPage);
	echo '<div align="center">';
	echo "<a href='?chucnang=tim_kiem&tukhoa=".$_GET['tukhoa']."&page=1'> << </a> ";
	if ($_GET['page'] > 1)
	{
		echo "<a href=?chucnang=tim_kiem&tukhoa=".$_GET['tukhoa']."&page=".($_GET['page']-1)."> < </a> ";
	}
	for ($i=1 ; $i<=$maxPage ; $i++)
	{
		$link = "?chucnang=tim_kiem&tukhoa=".$_GET['tukhoa']."&page=".$i;
		if ($i == $_GET['page'])
		{
			echo '<b>'.$i.'</b> ';
		}
		else
		echo "<a href=".$link.">".$i."</a> ";
	}
	if ($_GET['page'] < $maxPage)
	{
		echo "<a href=?chucnang=tim_kiem&tukhoa=".$_GET['tukhoa']."&page=".($_GET['page']+1)."> > </a>";
	}
	echo "<a href=?chucnang=tim_kiem&tukhoa=".$_GET['tukhoa']."&page=".$maxPage."> >> </a> ";
	echo '</div>';
?>