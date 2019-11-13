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
    <table border="1" width="800">
        <tr>
            <th>Mã HS</th>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>
        <?php
        $sql = "SELECT * FROM `hang_sua`";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)!=0){
            while ($row = mysqli_fetch_array($result)){
                echo "<tr>
                        <td>" .$row['Ma_hang_sua'] ."</td>
                        <td>" .$row['Ten_hang_sua'] ."</td>
                        <td>" .$row['Dia_chi'] ."</td>
                        <td>" .$row['Dien_thoai'] ."</td>
                        <td>" .$row['Email'] ."</td>
                    </tr>";
            }
        }
        ?>
    </table>
</div>
</body>
</html>
