<?php 
	if(isset($_GET['chucnang']))
	{
		$chucNang=$_GET['chucnang'];
	}
	else
	{
		$chucNang="";
	}
    switch($chucNang)
    {
        case "hien_thi_theo_loaisp":
            include("HienThi/hienthitheoloaisp.php");
        break;
        case "ca_nhan":
            include("HienThi/thongtincanhan.php");
        break;
        case "chi_tiet_san_pham":
            include("HienThi/chitietsanpham.php");
        break;
        case "tim_kiem":
            include("HienThi/ketquatimkiem.php");
        break;
        case "gio_hang":
            include("HienThi/giohang.php");
        break;
        case "thanh_toan":
            include("HienThi/laythongtinhoadon.php");
        break;
        case "huy_mua":
            include("Xuly/huygiohang.php");
        break;
        default:
            include('HienThi/hienthitoanbosanpham.php');
    }
?>