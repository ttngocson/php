<?php
	require('../Config/connect.php');
	session_start();
	$idnguoidung = '';  
	$ho='';
	$ten = '';
	$gioitinh = 1;
	$sdt='';
	$email='';
	$diachi = '';
?>
<form method="post" action="../HienThi/chitiethoadon.php">
	<table>
		<tr>
			<th colspan="2">Thông tin khách hàng</th>
		</tr>
		<tr>
			<td>Họ: </td>
			<td><input type="text" name="ho" value="<?php echo $ho ?>"></td>
		</tr>
		<tr>
			<td>Tên: </td>
			<td><input type="text" name="ten" value="<?php echo $ten ?>"></td>
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
			<td><input type="text" name="sdt" value="<?php echo $sdt ?>"></td>
		</tr>
		<tr>
			<td>Email: </td>
			<td><input type="email" name="email" value="<?php echo $email ?>"></td>
		</tr>
		<tr>
			<td>Địa chỉ: </td>
			<td><input type="text" name="diachi" value="<?php echo $diachi ?>"></td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="idnguoidung" value="<?php $idnguoidung; ?>">
				<input type="submit" name="thong_tin_tu_TK" <?php if (!isset($_SESSION['username'])) {
				echo 'disabled="disabled"';
			} ?> value="Sử dụng thông tin của tài khoản">
		</td>
			<td>
				<input type="submit" name="xacnhan" value="Xác nhận thông tin">
			</td>
		</tr>
	</table>
</form>
<?php
if (isset($_POST['thong_tin_tu_TK'])) {
		$tenTK = $_SESSION['username'];
		$sql = "SELECT * FROM thongtinnguoidung WHERE TENTK='".$tenTK."'";
		$res= mysqli_query($conn,$sql);
		$rows = mysqli_fetch_array($res);
		$idnguoidung = $rows['IDNguoiDung'];
		$ho=$rows['Ho'];
		$ten = $rows['Ten'];
		$gioitinh = $rows['GioiTinh'];
		$sdt= $rows['SDT'];
		$email=$rows['Email'];
		$diachi = $rows['DiaChi'];
	} 
if (isset($_POST['xacnhan'])) 
	{
		$ho=$_POST['ho'];
		$ten = $_POST['ten'];
		$gioitinh = $_POST['gioitinh'];
		$sdt= $_POST['sdt'];
		$email=$_POST['email'];
		$diachi = $_POST['diachi'];
		$sql = "INSERT INTO thongtinnguoidung(IDNguoiDung, Ho, Ten, GioiTinh, SDT, Email, DiaChi, TenTK) 
		VALUES ('NULL','".$ho."','".$ten."','".$gioitinh."','".$sdt."','".$email."','".$diachi."','NULL')";
		mysqli_query($conn,$sql);
		$res = mysqli_query($conn,'SELECT COUNT(IDNguoiDung) FROM thongtinnguoidung');
		$idnguoidung = mysqli_fetch_array($res)[0];
	} 
?>