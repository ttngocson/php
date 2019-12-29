<?php
require("connect_qlbansua.php");
mysqli_set_charset($conn, 'UTF8');
?>
<html>
<head>
    <title>Bài 2.1</title>
</head>
<body>
<div align="center">
    <h2>THÔNG TIN HÃNG SỮA</h2>
    <?php
    $sql = "SELECT * FROM `hang_sua`";
    $result = mysqli_query($conn, $sql);
    $dst = mysqli_fetch_all($result);
    print_r($dst);
    ?>
    <table border="1" width="800">
        <tr>
            <th>Mã HS</th>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>
    </table>
</div>
</body>
</html>
