<?php
#Nguyễn Tuấn Anh 58131258
#Trần Trương Ngọc Sơn 58133435
require("connect_anhngocson.php");
mysqli_set_charset($conn, 'UTF8');
?>
<html>
<head>
    <title>Bài kiểm tra cộng điểm</title>
</head>
<body>
<div align="center">
    <h2>THÔNG TIN KHÁCH HÀNG</h2>
    <table border="1" width="500">
        <tr style='color: red'>
            <th>Mã TV</th>
            <th>Tên thành viên</th>
        </tr>
        <?php
        $sql = "SELECT * FROM `thanhvien`";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)!=0){
            $index = 0;
            while ($row = mysqli_fetch_array($result)){
                echo "<tr ";
                echo ">
                        <td>"."<a href='ChiTiet.php?id=" .$row['MATV'] ."'>" .$row['MATV'] ."</a></td>
                        <td>" .$row['TENTV'] ."</td>
                    </tr>";
            }
        }
        ?>
    </table>
</div>
</body>
</html>
