<?php
	//phân trang sản phẩm
	$rowsPerPage = 6;
	if (!isset($_GET['page'])) {
		$_GET['page'] = 1;
	}
	$offset =($_GET['page']-1)*$rowsPerPage;
	$sql = "SELECT * FROM sanpham LIMIT ".$offset.",".$rowsPerPage;
	$result = mysqli_query($conn,$sql);
	//Hiển thị sản phẩm theo dạng bảng 2 cột trên 1 dòng. có thể thay đổi tùy ý
	echo "<table align='center'>";
	if(mysqli_num_rows($result)<>0)
	{
		$dem = 0;
		while($rows = mysqli_fetch_array($result))
		{
			$link = "?chucnang=chi_tiet_san_pham&masp=".$rows['IDSanPham'];
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
	$res = mysqli_query($conn,"SELECT * FROM sanpham");
	$numRows = mysqli_num_rows($res);
	$maxPage = floor($numRows/$rowsPerPage) + 1; 
	echo '<div align="center">';
	echo "<a href='index.php?page=1'> << </a> ";
	if ($_GET['page'] > 1)
	{
		echo "<a href=index.php?page=".($_GET['page']-1)."> < </a> ";
	}
	for ($i=1 ; $i<=$maxPage ; $i++)
	{
		$link = "index.php?page=".$i;
		if ($i == $_GET['page'])
		{
			echo '<b> '.$i.' </b> ';
		}
		else
		echo "<a href=".$link."> ".$i."</a> ";
	}
	if ($_GET['page'] < $maxPage)
	{
		echo "<a href=index.php?page=".($_GET['page']+1)."> > </a>";
	}
	echo "<a href=index.php?page=".$maxPage."> >> </a> ";
	echo '</div>';
?>