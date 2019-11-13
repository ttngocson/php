<?php
require("connect_qlbansua.php");
mysqli_set_charset($conn, 'UTF8');
?>
<html>
<head>
    <title>Bài 2.2</title>
</head>
<body>
<div align="center">
    <h2>THÔNG TIN KHÁCH HÀNG</h2>
    <table border="1" width="800">
        <tr style='color: red'>
            <th>Mã KH</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số Điện thoại</th>
        </tr>
        <?php
        $sql = "SELECT * FROM `khach_hang`";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)!=0){
            $index = 0;
            while ($row = mysqli_fetch_array($result)){
                $index++;
                echo "<tr ";
                if($index%2==1)
                    echo "style='background-color: FEE0C1'";
                echo ">
                        <td>" .$row['Ma_khach_hang'] ."</td>
                        <td>" .$row['Ten_khach_hang'] ."</td>
                        <td align='center'>" .$row['Phai'] ."</td>
                        <td>" .$row['Dia_chi'] ."</td>
                        <td>" .$row['Dien_thoai'] ."</td>
                    </tr>";
            }
        }
        ?>
    </table>
</div>
</body>
</html>
