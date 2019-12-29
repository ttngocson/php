<?php 
    $tentk = isset($_POST['tentk']) ? trim($_POST['tentk'] ): '';
    $matkhau = isset($_POST['matkhau']) ? trim($_POST['matkhau']) : '';
    $matkhaure = isset($_POST['matkhaure']) ? trim($_POST['matkhaure']) : '';
    $ho = isset($_POST['ho']) ? trim($_POST['ho']) : '';
    $ten = isset($_POST['ten']) ? trim($_POST['ten']) : '';
    $sdt = isset($_POST['sdt']) ? trim($_POST['sdt']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $diachi = isset($_POST['diachi']) ? trim($_POST['diachi']) : '';
    $gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : 1;
    $nhomtk = isset($_POST['nhomtk']) ? $_POST['nhomtk'] : 3;
    $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : 0;  
    if ($tentk!='') 
    {
        $sql = "SELECT * FROM taikhoan WHERE TenTK = '".$tentk."'";
        $res = mysqli_query($conn,$sql);
        $rowsCount= mysqli_num_rows($res);
        if (!$rowsCount) 
        {
            if ($matkhau==$matkhaure) 
            {
                $sql1 = "INSERT INTO taikhoan(TenTK,MatKhau,IDNhomTK,TrangThai) 
                VALUES ('".$tentk."','".$matkhau."','".$nhomtk."','".$trangthai."')";
                $res1 = mysqli_query($conn,$sql1);
                $sql2 = "INSERT INTO `thongtinnguoidung`(`IDNguoiDung`, `Ho`, `Ten`, `GioiTinh`, `SDT`, `Email`, `DiaChi`, `TenTK`) VALUES ('NULL','".$ho."','".$ten."','".$gioitinh."','".$sdt."','".$email."','".$diachi."','".$tentk."')";
                $res2 = mysqli_query($conn,$sql2);
                if ($nhomtk == 2) {
                    $array = array("1","2","3","4","5","6","7","11","12","15","16");
                    foreach ($array as  $value) {
                        $sql_insert = "INSERT INTO `quyensudung`(`TenTK`, `IDChucNang`) VALUES ('".$tentk."','".$value."')";
                        mysqli_query($conn,$sql_insert);
                    }
                }
                echo "<script type='text/javascript'>
                    alert('Tạo tài khoản thành công!');
                    window.location.assign('http://localhost:8080/QLDA/admin/?chucnang=hien_thi_tk&maquyen=xtk');
                  </script>";
                  // window.location.assign('http://localhost:8080/QLDA/admin/?chucnang=hien_thi_tk&maquyen=xtk');
            }
            else
            {
                echo "<script type='text/javascript'>alert('Mật khẩu không trùng nhau!');</script>";
            }
        }
        else {
            echo "<script type='text/javascript'>alert('Tên tài khoản đã tồn tại!');</script>";
        }
        // echo '<br>'.$sql .'<br>';
        //var_dump($conn);
        // echo $rowsCount;
    }
?>   