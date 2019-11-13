<html>
<head>
    <link href="https://pro.fontawesome.com/releases/v5.11.1/css/all.css" rel="stylesheet">
    <style>
        h2{
            margin-bottom: auto;
            color: #fd650d;
            background-color: #ffeee6;
        }
        h4{
            width: 175px;
            height: 36px;
            margin: auto;
        }
    </style>
</head>
<body>
<?php
require("connect_qlbansua.php");
mysqli_set_charset($conn, 'UTF8');
$sql = "SELECT sua.Ma_sua, sua.Ten_sua, sua.Trong_luong, sua.Don_gia, sua.Hinh
            FROM sua";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)!=0){
    $index = 0;
    $flag = false;
    $col = 5;
    echo "<table border='1' align='center'>";
    echo "<tr><td colspan='$col'><h2 align=\"center\">THÔNG TIN CÁC SẢN PHẨM</h2></td></tr>";
    while ($row = mysqli_fetch_array($result)){
        $hinh = "Hinh_sua/" .$row['Hinh'];
        $hang1 = "<a href='bai2_7_CT.php?id=" .$row['Ma_sua'] ."'>" .$row['Ten_sua'] ."</a>";
        $hang2 = $row['Trong_luong'] ." gr - " .number_format($row['Don_gia']) ." VNĐ";

        if($flag == false && $index%$col == 0){
            echo "<tr align='center'>";
            $flag = true;
        }
        $index++;

        echo "<td style='padding: 10px;'>
                    <h4>$hang1</h4>
                    <p>$hang2</p>
                    <img src='$hinh' width='100' height='100'>
                </td>";

        if($flag == true && $index%$col == 0){
            echo "</tr>";
            $flag = false;
        }
    }
    echo "</table>";
}
?>
</body>
</html>
