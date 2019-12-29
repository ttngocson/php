<?php 
	$idloaisp= isset($_POST['idloaisp']) ? trim($_POST['idloaisp']) : 1;
	$tensp = isset($_POST['tensp']) ? trim($_POST['tensp']) : '';
	$trongluong = isset($_POST['trongluong']) ? trim($_POST['trongluong']) : '';
	$tendq = isset($_POST['tendq']) ? trim($_POST['tendq']) : '';
	$hinhdang = isset($_POST['hinhdang']) ? trim($_POST['hinhdang']) : '';
	$trongluongdq = isset($_POST['trongluongdq']) ? ($_POST['trongluongdq']) : '';
	$loaivang = isset($_POST['loaivang']) ? trim($_POST['loaivang']) : '';
	$trongluongv = isset($_POST['trongluongv']) ? trim($_POST['trongluongv']) : '';
?>
<form style="margin-left: 20px" method="post" action="" enctype="multipart/form-data">
	<table>
		<tr>
			<th colspan="2">Sửa thông tin sản phẩm</th>
		</tr>
		<tr>
			<td>Tên sản phẩm:</td>
			<td>
				<input type="text" name="tensp" value="<?php echo $tensp; ?>" required>
			</td>
		</tr>
		<tr>
			<td>Giá sản phẩm:</td>
			<td>
				<input type="number" min="1" name="dongia" value="<?php echo $dongia; ?>" required>
			</td>
		</tr>
		<tr>
			<td>Loại sản phẩm: </td>
			<td>
				<select name="idloaisp">
				<?php
				$result = mysqli_query($conn,'SELECT * FROM loaisanpham');
				if(mysqli_num_rows($result) > 0)
                {
                   while($row = mysqli_fetch_array($result))
                   {
                       $idloai = $row['IDLoaiSP'];
                       $tenloai = $row['TenLoai'];
                       echo '<option value="'.$idloai.'"';
                       if(isset($_REQUEST['idloaisp']) && ($_REQUEST['idloaisp']==$idloai))
                       {
                            echo 'selected="selected"';
                       } 
                       echo ">".$tenloai."</option>";
                   } 
                }
                mysqli_free_result($result);
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Trọng lượng sản phẩm:</td>
			<td>
				<input type="text" name="trongluong" value="<?php echo $trongluong; ?>" required>
			</td>
		</tr>
		<tr>
			<td>Tên đá quý đính kèm:</td>
			<td>
				<input type="text" name="tendq" value="<?php echo $tendq; ?>" required>
			</td>
		</tr>
		<tr>
			<td>Số lượng:</td>
			<td>
				<input type="number" min="1" name="soluongdq" value="<?php echo $soluongdq; ?>" required>
			</td>
		</tr>
		<tr>
			<td>Trọng lượng:</td>
			<td>
				<input type="text" name="trongluongdq" value="<?php echo $trongluongdq; ?>" required>
			</td>
		</tr>
		<tr>
			<td>Hình dạng:</td>
			<td>
				<input type="text" name="hinhdang" value="<?php echo $hinhdang; ?>" required>
			</td>
		</tr>
		<tr>
			<td>Loại vàng sử dụng:</td>
			<td>
				<input type="text" name="loaivang" value="<?php echo $loaivang; ?>" required>
			</td>
		</tr>
		<tr>
			<td>Trọng lượng:</td>
			<td>
				<input type="text" name="trongluongv" value="<?php echo $trongluongv; ?>" required>
			</td>
		</tr>
		<tr>
			<td>Số lượng sản phẩm:</td>
			<td>
				<input type="number" min="1" name="soluongsp" value="<?php echo $soluongsp; ?>" required>
			</td>
		</tr>
		<tr>
			<td>Ảnh minh họa:</td>
			<td>
				<input type="file" name="hinh" value="Chọn tệp"  accept="image/png, image/jpeg, image/jpg" required>
			</td>
		</tr>
		<tr>
			<td colspan="2">Xác nhận Thêm</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="xac_nhan_them_sp" value="Thêm mới">
			</td>
			<td>
				<input type="reset" value="Hủy" style="margin-right: 20px;">
				<a href="javascript:history.back()">Quay lại</a>
			</td>
		</tr>
	</table>
</form>