<?php
    $tentk = isset($_POST['tentk']) ? trim($_POST['tentk'] ): '';
    $matkhau = isset($_POST['matkhau']) ? trim($_POST['matkhau']) : '';
    $matkhaure = isset($_POST['matkhaure']) ? trim($_POST['matkhaure']) : '';
    $ho = isset($_POST['ho']) ? trim($_POST['ho']) : '';
    $ten = isset($_POST['ten']) ? trim($_POST['ten']) : '';
    $sdt = isset($_POST['sdt']) ? trim($_POST['sdt']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $diachi = isset($_POST['diachi']) ? trim($_POST['diachi']) : '';
    $gioitinh = isset($_POST['gioitinh']) ? trim($_POST['gioitinh']) : 1;
    require('../Config/connect.php');   
    if (isset($_POST['dangky'])) {
        $sql = "SELECT * FROM taikhoan WHERE TenTK = '".$tentk."'";
        $res = mysqli_query($conn,$sql);
        $rowsCount= mysqli_num_rows($res);
        if (!$rowsCount) {
            if ($matkhau==$matkhaure) {
                $sql1 = "INSERT INTO taikhoan(TenTK,MatKhau,IDNhomTK,TrangThai) 
                VALUES ('".$tentk."','".$matkhau."','3','1')";
                $res1 = mysqli_query($conn,$sql1);
                $sql2 = "INSERT INTO `thongtinnguoidung`(`IDNguoiDung`, `Ho`, `Ten`, `GioiTinh`, `SDT`, `Email`, `DiaChi`, `TenTK`) VALUES ('NULL','".$ho."','".$ten."','".$gioitinh."','".$sdt."','".$email."','".$diachi."','".$tentk."')";
                $res2 = mysqli_query($conn,$sql2);
                echo "<script type='text/javascript'>alert('Đăng ký thành công, vui lòng đăng nhập để tiếp tục!');
                window.location='../index.php'</script>";
            }
        }
        else {
            echo "<script>alert('Tên tài khoản đã tồn tại')</script>";
            echo "<script>window.location.replace('../index.php')</script>";
        }
        // echo '<br>'.$sql .'<br>';
        //var_dump($conn);
        // echo $rowsCount;
    }
?>   