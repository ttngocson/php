<!--khu vực admin -->
<?php 
	session_start();
	require('Config/connect.php');
	require('Config/xulygetpost.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <br>
    <table width="100%" border="1">
        <tr>
            <td colspan="3"><?php include('Menu/menuchinh.php') ?></td>
        </tr>
        <tr>
            <td width="20%" valign='top'><?php include('Menu/menuchucnang.php') ?></td>
            <td width="80%" valign='top'><?php include('Config/dieuhuong.php') ?></td>
        </tr>
    </table>
</div>
</body>
</html>