<?php
require("connect_qlbansua.php");
mysqli_set_charset($conn, 'UTF8');
?>
<html>
<head>
    <title>Bài 2.12</title>
</head>
<body>
<div align="center">
    <h2>THÔNG TIN KHÁCH HÀNG</h2>
    <table border="1" width="850">
        <tr style='color: red'>
            <th>Mã KH</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số Điện thoại</th>
            <th>Email</th>
            <th>Sửa</th>
            <th>Xóa</th>
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
                $phai = "Nữ";
                if($row['Phai']==1)
                    $phai = "Nam";
                echo ">
                        <td>" .$row['Ma_khach_hang'] ."</td>
                        <td>" .$row['Ten_khach_hang'] ."</td>
                        <td align='center'>" .$phai ."</td>
                        <td>" .$row['Dia_chi'] ."</td>
                        <td>" .$row['Dien_thoai'] ."</td>
                        <td>" .$row['Email'] ."</td>
                        <td>" ."<a href='bai2_12_update.php?id=" .$row['Ma_khach_hang'] ."'>Sửa</a>" ."</td>
                        <td>" ."<a href='bai2_12_delete.php?id=" .$row['Ma_khach_hang'] ."'>Xóa</a>" ."</td>
                    </tr>";
            }
        }
        ?>
    </table>
</div>
</body>
</html>
