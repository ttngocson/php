<html>
<head>
    <link href="https://pro.fontawesome.com/releases/v5.11.1/css/all.css" rel="stylesheet">
</head>
<body>

<?php
require("connect_qlbansua.php");
$sql = "SELECT * FROM `khach_hang`";
mysqli_set_charset($conn, 'UTF8');
$rows = mysqli_query($conn, $sql);
if(mysqli_num_rows($rows)!=0){
    $stt = 1;
    echo "<table border='1' style='margin-top: 20px' align='center' width='1000'>
            <tr style='color: red;background-color: #00bf00'>
                <th>STT</th>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Phái</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
            </tr>";
    while ($row = mysqli_fetch_array($rows)){
        if($stt%2==0)
            echo "<tr>";
        else
            echo "<tr style='background-color: cyan'>";
        echo "<td>$stt</td>";
        echo "<td>" .$row['Ma_khach_hang'] ."</td>";
        echo "<td>" .$row['Ten_khach_hang'] ."</td>";
        if($row['Phai'] == 1)
            echo "<td><i class=\"fas fa-mars\"></i></td>";
        else
            echo "<td><i class=\"fas fa-venus\"></i></td>";
        echo "<td>" .$row['Dia_chi'] ."</td>";
        echo "<td>" .$row['Dien_thoai'] ."</td>";
        echo "<td>" .$row['Email'] ."</td>";
        echo "</tr>";
        $stt++;
    }
    echo "</table>";
}
?>
</body>
</html>