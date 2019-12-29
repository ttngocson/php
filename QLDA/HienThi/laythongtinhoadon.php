<?php 
	if (isset($_SESSION['username'])) {
		$sql = "SELECT * From thongtinnguoidung WHERE TenTK = '".$_SESSION['username']."'";
		$res = mysqli_query($conn,$sql);
		$rows = mysqli_fetch_array($res);
		$idnguoidung = $rows['IDNguoiDung'];
		$ho= $rows['Ho'];
		$ten = $rows['Ten'];
		$gioitinh = $rows['GioiTinh'];
		$sdt = $rows['SDT'];
		$email=$rows['Email'];
		$diachi = $rows['DiaChi'];
	}
	else
	{
		$ho= isset($_POST['ho']) ? trim($_POST['ho']) : '';
		$ten = isset($_POST['ten']) ? trim($_POST['ten']) : '';
		$gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : 1;
		$sdt = isset($_POST['sdt']) ? trim($_POST['sdt']) : '';
		$email=isset($_POST['email']) ? trim($_POST['email']) : '';
		$diachi = isset($_POST['diachi']) ? trim($_POST['diachi']) : '';
	}
?>
<form method="post" action="">
	<table align="center">
		<tr>
			<th colspan="2" style="text-align: center;"><h3>Thông tin khách hàng</h3></th>
		</tr>
		<tr>
			<td>Họ: </td>
			<td><input type="text" name="ho" value="<?php echo $ho ?>" required placeholder="Họ"></td>
		</tr>
		<tr>
			<td>Tên: </td>
			<td><input type="text" name="ten" value="<?php echo $ten ?>" required placeholder="Tên"></td>
		</tr>
		<tr>
			<td>Giới Tính: </td>
			<td>
				<input type="radio" name="gioitinh" value="1" <?php if (isset($gioitinh) && $gioitinh==1) {
					echo 'checked';
				} ?> checked> Nam
				<input type="radio" name="gioitinh" value="0" <?php if (isset($gioitinh) && $gioitinh==0) {
					echo 'checked';
				} ?>> Nữ
			</td>
		</tr>
		<tr>
			<td>Số điện thoại: </td>
			<td><input type="text" name="sdt" value="<?php echo $sdt ?>" required placeholder="09xxxxxxxx"></td>
		</tr>
		<tr>
			<td>Email: </td>
			<td><input type="email" name="email" value="<?php echo $email ?>" required placeholder="abc@gmail.com"></td>
		</tr>
		<tr>
			<td>Địa chỉ: </td>
			<td><input type="text" name="diachi" value="<?php echo $diachi ?>" required placeholder="Địa chỉ"></td>
		</tr>
		</table>
		<?php
		if (isset($_SESSION['cart']) && count($_SESSION['cart'])) {
			echo '<table width="550" align="center">';
	        echo "<tr>";
	        echo "<td colspan='5' align='center'><h3>Chi tiết đơn hàng</h3></td>";
	        echo "</tr>";
			echo '<tr>
					<th width="250">Tên sản phẩm</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Thành tiền</th>
					<th></th>
				  </tr>';
		  	$soluong = 0;
			$tong_tien = 0;
			$index = 0;
			foreach ($_SESSION['cart'] as $key => $value) {
				$soluong = $_SESSION['cart'][$key]['soluong'];
				$sql = "SELECT TenSanPham,DonGia FROM sanpham WHERE IDSanPham =".$key;
				$res = mysqli_query($conn,$sql);
				$rows = mysqli_fetch_array($res);
				$name_id="id_".$key;
	            $name_sl="sl_".$key;
	            $tien = $rows['DonGia'] * $soluong;
	            echo "<tr>";
	            echo "<td>".$rows['TenSanPham']."</td>";
	            echo "<td>";
	           	echo $soluong;
	            echo "</td>";
	            echo "<td>".number_format($rows['DonGia'])."</td>";
	            echo "<td>".number_format($tien)."</td>";
	            echo "</tr>";
	            $tong_tien+=$tien;
			}
			echo "<tr>";
	        echo "<td colspan='5' align='right'><b>Tổng tiền ".number_format($tong_tien)." vnđ </b></td>";
			echo "</tr>";
			echo '</table>';
		}?>
		<div align="center" style="margin-top:10px">
			<input type="submit" name="xac_nhan_thong_tin" class="btn btn-sm btn-primary" value="Xác nhận thông tin">
            &nbsp;
			<a href='?chucnang=huy_mua' class='btn btn-sm btn-info'>Hủy giỏ hàng</a>
		</div>		
</form>