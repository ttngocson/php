<?php 
	$idhoadon = isset($_POST['idhoadon']) ? $_POST['idhoadon'] : '';
	$sql = "UPDATE `hoadon` SET `TinhTrang`='1' WHERE IDHoaDon = '".$idhoadon."'";
	mysqli_query($conn,$sql);
	echo '<script type="text/javascript">
                    alert("Xác nhận giao hàng thành công!");
                    window.history.back();
                </script>';
?>