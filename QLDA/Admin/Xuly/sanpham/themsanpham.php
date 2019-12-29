<?php 
	$idloaisp= $_POST['idloaisp'];
	$dongia = $_POST['dongia'];
	$tensp = $_POST['tensp'];
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
    	$sql = "INSERT INTO `sanpham`(`IDSanPham`, `TenSanPham`, `IDLoaiSP`, `DonGia`, `HinhAnh`, `TrongLuong`, `TenDaQuy`, `SoLuongDQ`, `TrongLuongDQ`, `HinhDang`, `LoaiVang`, `TrongLuongVang`, `SoLuongSP`) 
    	VALUES ('NULL','".$tensp."','".$idloaisp."','".$dongia."','".$hinh."','".$trongluong."','".$tendq."','".$soluongdq."','".$trongluongdq."','".$hinhdang."','".$loaivang."','".$trongluongv."','".$soluongsp."')";
    	mysqli_query($conn,$sql);
    	echo '<script type="text/javascript">
	                alert("Thêm thành công!");
	               window.location.assign("http://localhost:8080/QLDA/admin/?chucnang=hien_thi_sp&maquyen=xsp");
	            </script>';
    }
    else
    {
    	echo '<script type="text/javascript">
	                alert("File không hợp lệ, vui lòng thử lại");
	                window.history.go(-1);
	            </script>';
    }

?>