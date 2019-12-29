<!--khu vực admin -->
<?php 
session_start();
unset($_SESSION['username']);
header('Location: http://localhost:8080/QLDA/Admin/index.php');
?>