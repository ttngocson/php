<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "qlbansua";

// Ket noi database tintuc
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection : nếu connect bị lỗi thì xuất báo lỗi và thoái
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
}
?>