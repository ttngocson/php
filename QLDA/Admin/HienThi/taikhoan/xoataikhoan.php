<?php 
	$tentk = isset($_GET['tentk']) ? $_GET['tentk'] : '';
	//if ($tentk!='') 
	//{
		$sql = "SELECT * from taikhoan,thongtinnguoidung,nhomtaikhoan 
		where taikhoan.TenTK = thongtinnguoidung.TenTK and taikhoan.IDNhomTK = nhomtaikhoan.IDNhomTK 
		and taikhoan.TenTK = '".$tentk."'";
		$res = mysqli_query($conn,$sql);
		if (mysqli_num_rows($res)!=0) 
		{
			$rows = mysqli_fetch_array($res);
		}
		//echo $sql;
		//else echo '<script type="text/javascript">window.history.back();</script>';
		
	//}
	//else
	//{
		//echo '<script type="text/javascript">window.history.back();</script>';
                // window.history.back();
	//}
?>
<form method="post" action="">
<table style="margin-left: 20px" width="300">
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
	<tr>
		<td colspan="2">Xác nhận xóa</td>
	</tr>
	<tr>
		<td><input type="submit" name="xoatk" value="Xóa"></td>
		<td><input type="submit" name="huyxoa" value="Quay lại"></td>
	</tr>
</table>
</form>
