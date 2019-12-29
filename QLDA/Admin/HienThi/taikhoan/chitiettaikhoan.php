<?php
	$tentk = isset($_GET['tentk']) ? $_GET['tentk']:'';
	if ($tentk!='') {
		$sql = "SELECT * from taikhoan,thongtinnguoidung,nhomtaikhoan 
		where taikhoan.TenTK = thongtinnguoidung.TenTK and taikhoan.IDNhomTK = nhomtaikhoan.IDNhomTK 
		and taikhoan.TenTK = '".$tentk."'";
		$res = mysqli_query($conn,$sql);
		if (mysqli_num_rows($res)<>0) {
			$rows = mysqli_fetch_array($res);
		}
		else echo '<script type="text/javascript">window.history.back();</script>';
		
	}
	else
	{
		echo '<script type="text/javascript">window.history.back();</script>';
                // window.history.back();
	}
	// echo $sql;
	// echo "<br>";
?>
<table style="margin-left: 20px" width="300px">
	<tr>
		<td>Tên tài khoản: </td>
		<td><?php echo $rows['TenTK'] ?></td>
	</tr>
	<tr>
		<td>Tên người dùng: </td>
		<td><?php echo $rows['Ho'].' '.$rows['Ten'] ?></td>
	</tr>
	<tr>
		<td>Nhóm tài khoản: </td>
		<td><?php echo $rows['TenNhom'] ?></td>
	</tr>
	<tr>
		<td>Trạng thái: </td>
		<td><?php if($rows['TrangThai']==1) echo "Hoạt động"; else echo "Bị khóa"; ?></td>
	</tr>
    <tr><td colspan='2'><a href="javascript:history.back()">Quay lại</a></td></tr>
</table>
<?php
	if ($rows['IDNhomTK']==2) {
		echo "<table style='margin-left: 20px' width='500'>
				<tr>
					<th colspan='3'>Các chức năng có thể sử dụng</th>
				</tr>";
		$sql1 = "SELECT * from quyensudung,chucnang where chucnang.IDChucNang = quyensudung.IDChucNang and TenTK='".$tentk."'";
		$res1 = mysqli_query($conn,$sql1);
		$i=1;
		while ($rows1 = mysqli_fetch_array($res1)) 
		{
			echo "<tr>";
			echo "<td width='30'>".$i."</td>";
			echo "<td>".$rows1['TenChucNang']."</td>";
			echo "<td>".$rows1['MoTa']."</td>";
			echo "</tr>";
			$i++;
		}
		echo"</table>";
		// echo $sql1;
	}
	
?>