<!--khu vực admin -->
<?php
	session_start();
	require('../Config/connect.php');
?>
<html>
<head>
	<title>Trang đăng nhập</title>
	<meta charset="utf-8">
</head>
<body class="text-center">
	<?php 
	if (isset($_POST['btn_submit'])) {
		$us = $_POST['username'];
		$pw = $_POST['password'];
		$us = strip_tags($us);
		$us = addslashes($us);
		$pw = strip_tags($pw);
		$pw = addslashes($pw);
		if ($us == "" || $pw =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "SELECT * from taikhoan where TenTK = '$us' and MatKhau = '$pw' ";
			$query = mysqli_query($conn,$sql);
			$rows=mysqli_fetch_array($query);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) 
			{
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}
			elseif ($rows['TrangThai']==0) 
			{
				echo "tài khoản đã bị khóa";
			}
			elseif ( $rows['IDNhomTK']==1 ||  $rows['IDNhomTK']==2) {
				$_SESSION['username'] = $us;
				$_SESSION['NhomTK'] = $rows['IDNhomTK'];
                header('Location: http://localhost:8080/QLDA/admin');
			}
			else
			{
				echo "Tài khoản không hợp lệ!";
           	}
		}
	}
	 ?>
    <div align="center" style="padding-top: 20pt">
        <form method="POST" action="login.php">
            <fieldset style="width: fit-content;" align="center">
                <legend>Đăng nhập</legend>
                    <table>
                        <tr>
                            <td width="100">Username: </td>
                            <td><input type="text" name="username" size="30" value="admin"></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" size="30" value="admin"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><br><input type="submit" name="btn_submit" value="Đăng nhập"></td>
                        </tr>
                    </table>
            </fieldset>
        </form>
    </div>
</body>
</html>