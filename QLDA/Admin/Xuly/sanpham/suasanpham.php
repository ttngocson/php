<?php
	$idsanpham = $_POST['idsanpham'];
	$idloaisp= $_POST['idloaisp'];
	$tensp = $_POST['tensp'];
	$dongia = $_POST['dongia'];
	$trongluong = $_POST['trongluong'];
	$tendq = $_POST['tendq'];
	$soluongdq = $_POST['soluongdq'];
	$hinhdang = $_POST['hinhdang'];
	$trongluongdq = $_POST['trongluongdq'];
	$loaivang = $_POST['loaivang'];
	$trongluongv = $_POST['trongluongv'];
	$soluongsp = $_POST['soluongsp']; 
	$errors= array();
    $file_name = $_FILES['hinh']['name'];
    $file_size = $_FILES['hinh']['size'];
    $file_tmp = $_FILES['hinh']['tmp_name'];
    $file_type= $_FILES['hinh']['type'];
    $tmp = explode('.', $_FILES['hinh']['name']);
    $file_ext= strtolower(end($tmp));
    $expensions= array("jpeg","jpg","png");
    if(in_array($file_ext, $expensions)=== false)
    {
        $errors[]="Tệp có phần mở rộng phải là định djang JPG, JPEG hoặc PNG.";
    }
    if($file_size > 2097152)
    {
        $errors[]='Kích thước file phải bé hơn hoặc bằng 2MB';
    }
    if(empty($errors)==true)
    {
        move_uploaded_file($file_tmp,"img/".$file_name);
        $hinh =  $_FILES['hinh']['name'];
        $sql_update = "UPDATE sanpham SET TenSanPham='".$tensp."',IDLoaiSP='".$idloaisp."',
        DonGia='".$dongia."',HinhAnh='".$hinh."',
        TrongLuong='".$trongluong."',TenDaQuy='".$tendq."',
        SoLuongDQ='".$soluongdq."',TrongLuongDQ='".$trongluongdq."',
        HinhDang='".$hinhdang."',LoaiVang='".$loaivang."',
        TrongLuongVang='".$trongluongv."',SoLuongSP='".$soluongsp."' 
        WHERE IDSanPham = '".$idsanpham."'";
        mysqli_query($conn,$sql_update);
        echo '<script type="text/javascript">
	                alert("Cập nhật thành công!");
	                window.history.go(-2);
	            </script>';
    }
    else
    {
    	$sql_update = "UPDATE sanpham SET TenSanPham='".$tensp."',IDLoaiSP='".$idloaisp."',
        DonGia='".$dongia."',
        TrongLuong='".$trongluong."',TenDaQuy='".$tendq."',
        SoLuongDQ='".$soluongdq."',TrongLuongDQ='".$trongluongdq."',
        HinhDang='".$hinhdang."',LoaiVang='".$loaivang."',
        TrongLuongVang='".$trongluongv."',SoLuongSP='".$soluongsp."' 
        WHERE IDSanPham = '".$idsanpham."'";
        mysqli_query($conn,$sql_update);
	    echo '<script type="text/javascript">
	                alert("File không hợp lệ, vui lòng thử lại");
	                window.history.go(-1);
	            </script>';
    }
?>