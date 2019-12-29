<head>
    <style>
        .shopping-cart{
            margin: 20px;
        }
        .shopping-cart table{
            border: 2px solid;
            padding: 10px;
        }
    </style>
</head>
<div class="shopping-cart" align="center">
<?php
	if (isset($_SESSION['cart']) && count($_SESSION['cart'])) {
		echo "<form action='' method='post' >";
		echo '<table width="500">';
        echo "<tr>";
        echo "<td colspan='5' align='center'></td>";
        echo "</tr>";
		echo '<tr>
				<th width="204">Tên sản phẩm</th>
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
            echo "<input type='hidden' name='".$name_id."' value='".$key."' >";
            echo "<input type='number' style='width:50px' min='1' name='".$name_sl."' value='". $_SESSION['cart'][$key]['soluong']."' > ";
            echo "</td>";
            echo "<td>".$rows['DonGia']."</td>";
            echo "<td>".$tien."</td>";
            echo "<td><a href='XuLy/xoatugiohang.php?idxoa=".$key."'>Xóa</a></td>";
            echo "</tr>";
            $tong_tien+=$tien;
		}
		echo "<tr>";
        echo "<td colspan='5' align='center'></td>";
		echo "</tr>";
		echo '</table>';
		echo "<p></p>";
        echo "<input type='submit' name='cap_nhat_gio_hang' value='Cập nhật'>";
		echo '</form>';
        echo "<p></p>";
		echo "<b>Tổng tiền ".number_format($tong_tien)." vnđ </b><br>";
		$_SESSION['TongTien'] = $tong_tien;
        echo "<p></p>";
		echo "<a href='?chucnang=thanh_toan' class='btn btn-xs btn-info'>Thanh toán</a>&nbsp;";
		echo "<a href='?chucnang=huy_mua' class='btn btn-xs btn-info'>Hủy giỏ hàng</a>";
        echo "<p></p>";
	}
	else {
		echo ' <h2>Bạn chưa thêm sản phẩm nào</h2>';
	}
?>
</div>