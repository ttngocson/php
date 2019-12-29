<?php
	$sql = "SELECT * FROM loaisanpham";
	$result=mysqli_query($conn,$sql);
	while ($rows=mysqli_fetch_array($result)) 
	{
		$link ="?chucnang=hien_thi_theo_loaisp&maloaisp=".$rows['IDLoaiSP'];
		echo "<a href=".$link.">".$rows['TenLoai']."</a> <br>";
	}
?>