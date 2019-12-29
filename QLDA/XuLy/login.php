<?php
	session_start();
	require('../Config/connect.php');
	$actual_link = isset($_POST['url_back']) ? trim($_POST['url_back']) : '';
	$us = isset($_POST['username']) ? trim($_POST['username']) : '';
	$pw = isset($_POST['password']) ? trim($_POST['password']) : '';
	// $us = strip_tags($us);
	// $us = addslashes($us);
	// $pw = strip_tags($pw);
	// $pw = addslashes($pw);
	if ($us == "" || $pw == "") {
		echo "username hoặc password bạn không được để trống!";
	}else
	{
		$sql = "SELECT * from taikhoan where TenTK = '".$us."' and MatKhau = '".$pw."' ";
		// echo $sql;
		$query = mysqli_query($conn,$sql);
		$rows=mysqli_fetch_array($query);
		$num_rows = mysqli_num_rows($query);
		if ($num_rows==0) 
		{
			echo "<script>alert('Đăng nhập không thành công')</script>";
			echo "<script>window.location.replace('../index.php')</script>";
		}
		elseif ($rows['TrangThai']==0) 
		{
			echo "<script>alert('Tài khoản đã bị khóa')</script>";
			echo "<script>window.location.replace('../index.php')</script>";
		}
		else
		{
			//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
			$_SESSION['username'] = $us;
            // Thực thi hành động sau khi lưu thông tin vào session
            // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
            //if ($rows['IDNhomTK']==3) {
            header('Location: '.$actual_link);
            //}
            //elseif ($rows['IDNhomTK']==1 || $rows['IDNhomTK']==2) {
            	// header('Location: http://localhost:8080/QLDA/Admin/index.php');
            //}
		}
	}
?>