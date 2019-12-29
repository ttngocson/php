<?php
	$tentk = isset($_GET['tentk']) ? $_GET['tentk']:'';
	$sql = "SELECT * from taikhoan,thongtinnguoidung,nhomtaikhoan 
	where taikhoan.TenTK = thongtinnguoidung.TenTK and taikhoan.IDNhomTK = nhomtaikhoan.IDNhomTK and taikhoan.TenTK = '".$tentk."'";
	$res = mysqli_query($conn,$sql);
	$rows = mysqli_fetch_array($res);
	$NTK = $rows['IDNhomTK'];
	// echo $sql;
	// echo "<br>";
?>
<form method="post" action="">
<table>
	<tr>
		<td>Tên tài khoản</td>
		<td>
			<input type="text" value="<?php echo $rows['TenTK'] ?>">
		</td>
	</tr>
	<tr>
		<td>Tên người dùng</td>
		<td><input type="text" name="" disabled="disabled" value="<?php echo $rows['Ho'].' '.$rows['Ten'] ?>"></td>
	</tr>
	<tr>
		<td>Nhóm tài khoản</td>
		<td>
			<select name="nhomtk">
				<?php
				$result = mysqli_query($conn,"SELECT * FROM nhomtaikhoan where IDNhomTK >= '".$_SESSION['NhomTK']."'");
				if(mysqli_num_rows($result) > 0)
                {
                   while($row = mysqli_fetch_array($result))
                   {
                       $idnhom = $row['IDNhomTK'];
                       $tennhom = $row['TenNhom'];
                       echo '<option value="'.$idnhom.'"';
                       if((isset($_REQUEST['nhomtk']) && ($_REQUEST['nhomtk']==$idnhom))||$idnhom==$NTK)
                       {
                            echo 'selected="selected"';
                       } 
                       echo ">".$tennhom."</option>";
                   } 
                }
                mysqli_free_result($result);
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Trạng thái</td>
		<td>
			<input type="radio" name="trangthai" <?php if($rows['TrangThai'] == 1)  echo "checked";?> value='1'>Hoạt động
			<input type="radio" name="trangthai" <?php if($rows['TrangThai'] == 0)  echo "checked";?> value='0'>Khóa
		</td>
	</tr>
</table>
<?php
	if ($rows['IDNhomTK']==2) {
		echo "<table>
				<tr>
					<th colspan='4'>các chức năng có thể sử dụng</th>
				</tr>";
		$sql1 = "SELECT * from quyensudung,chucnang where chucnang.IDChucNang = quyensudung.IDChucNang and TenTK='".$tentk."'";
		$res1 = mysqli_query($conn,$sql1);
		$i=1;
		while ($rows1 = mysqli_fetch_array($res1)) 
		{
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$rows1['TenChucNang']."</td>";
			echo "<td>".$rows1['MoTa']."</td>";
			echo "<td><a href='XuLy/taikhoan/suataikhoan.php?tentk=".$tentk."&idchucnang=".$rows1['IDChucNang']."'>Xóa</a></td>";
			echo "</tr>";
			$i++;
		}
		echo "<tr>
				<td colspan='4'>
					<a href='XuLy/taikhoan/themchucnang.php?tentk=".$tentk."'class='btn btn-sm btn-primary'>Thêm chức năng</a>
				</td>
			  </tr>";
		echo"</table>";
		// echo $sql1;
	}
	$_SESSION['tentksua'] = $tentk;
?>
<input type="submit" name="cap_nhat_tai_khoan" class="btn btn-sm btn-primary" value="Cập nhật">
<a href="javascript:history.back()" class="btn btn-sm btn-secondary"> Quay lại </a>
</form>