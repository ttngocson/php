<?php
    function KTMang($arr,$val)
    {
        $dem = 0;
        foreach ($arr as $key => $value) {
            if ($value == $val) {
                $dem+=1;
            }
        }
        return $dem;
    }
    $tentk = $_SESSION['username'];
    $sql = "SELECT * from quyensudung,chucnang 
    Where quyensudung.IDChucNang = chucnang.IDChucNang and quyensudung.TenTK = '".$tentk."'";
    $res = mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($res);
    $dsquyen = array();
    while($rows = mysqli_fetch_array($res))
    {
        $dsquyen[]=$rows['GhiTat'];
    }
	if (!isset($_GET['maquyen']) || KTMang($dsquyen,$_GET['maquyen'])==1 ||$_SESSION['NhomTK']==1) 
    {
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
            // sản phẩm
            case "hien_thi_sp":
                include("HienThi/sanpham/hienthitoanbosanpham.php");
            break;
            case "chi_tiet_san_pham":
                include("HienThi/sanpham/chitietsanpham.php");
            break;
            case "sua_san_pham":
                include("HienThi/sanpham/suasanpham.php");
            break;
            case "xoa_san_pham":
                include("HienThi/sanpham/xoasanpham.php");
            break;
             case "them_moi_sp":
                include("HienThi/sanpham/themsanpham.php");
            break;
            // tài khoản
            case "hien_thi_tk":
                include("HienThi/taikhoan/hienthitaikhoan.php");
            break;
            case "tt_tai_khoan":
                include("HienThi/taikhoan/chitiettaikhoan.php");
            break;
            case "sua_tai_khoan":
                include("HienThi/taikhoan/suataikhoan.php");
            break;
            case "xoa_tai_khoan":
                include("HienThi/taikhoan/xoataikhoan.php");
            break;
            case "them_moi_tk":
                include("HienThi/taikhoan/themtaikhoan.php");
            break;
            // thông tin người dùng
            case "hien_thi_ttu":
                include("HienThi/nguoidung/thongtinnguoidung.php");
            break;
            case "chi_tiet_nguoidung":
                include("HienThi/nguoidung/chitietnguoidung.php");
            break;
            case "sua_nguoidung":
                include("HienThi/nguoidung/suathongtinnguoidung.php");
            break;
            case "xoa_nguoidung":
                include("HienThi/nguoidung/xoanguoidung.php");
            break;
            // hóa đơn
            case "hien_thi_hd":
                include("HienThi/hoadon/hienthihoadon.php");
            break;
            case "chi_tiet_hd":
                include("HienThi/hoadon/chitiethoadon.php");
            break;
            case "xoa_hd":
                include("HienThi/hoadon/xoahoadon.php");
            break;
            //defult
            default:
                include('HienThi/thongke/thongke.php');
        }
    }
    else
    {
        echo '<script type="text/javascript">
                    alert("Bạn không có quyền sử dụng chức năng này!");
                    window.history.back();
                </script>';
    }
?>