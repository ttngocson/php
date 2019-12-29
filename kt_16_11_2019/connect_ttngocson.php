<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "ttngocson";

$conn = new mysqli($server, $username, $password, $dbname);

// Check connection : nếu connect bị lỗi thì xuất báo lỗi và thoái
if ($conn->connect_error) {
    echo "<script>alert('Kết nối cơ sở dữ liệu không thành công')</script>";
    die("Connection failed: " . $conn->connect_error);
    exit();
}
?>