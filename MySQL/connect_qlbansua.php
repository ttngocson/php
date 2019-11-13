<?php
$server = "localhost";
$username = "transon";
$password = "01695761004";
$dbname = "qlbansua";

// Ket noi database tintuc
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection : nếu connect bị lỗi thì xuất báo lỗi và thoái
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
}
//echo "Kết nối đến DB task5 thành công ...!".'<br>';
?>