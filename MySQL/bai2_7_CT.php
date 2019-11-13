<?php
require("connect_qlbansua.php");
mysqli_set_charset($conn, 'UTF8');
?>
<html>
<head>
    <title>Chi tiết sản phẩm</title>
    <style>
        .name{
            color: #df7416;
            background-color: #ffeee6;
        }
        table{
            border: 4px solid #7a3502;
        }
        span{
            font-weight: bolder;
        }
        td{
            padding: 5px;
        }
        h2{
            margin: 0;
        }
    </style>
</head>
<body>
<div align="center">
<?php
if(!isset($_GET["id"]))
    echo "Không tìm thấy trang";
else{
    $sql = "SELECT * FROM sua JOIN hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua
            WHERE Ma_sua = '" .$_GET["id"] ."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==0){
        echo "Không tìm thấy sản phẩm";
    }
    else{
        $row = mysqli_fetch_array($result);
        $hinh = "Hinh_sua/" .$row['Hinh'];
        echo "<table border=\"1\" width='600'>
                <tr align='center'>";
        echo "<td class='name' colspan='2'><h2>".$row['Ten_sua'] ." - " .$row['Ten_hang_sua'] ."</h2></td>";
        echo "</tr>
            <tr>
                <td width='150'><img src='$hinh' width='150' height='150'></td>
                <td>";
        echo "<span>Thành phần dinh dưỡng:</span><br>";
        echo $row['TP_Dinh_Duong'];
        echo "<br><span>Lợi ích:</span><br>";
        echo $row['Loi_ich'];
        echo "<div align='right'>
                    <span>Trọng lượng: </span>".$row['Trong_luong'] ." gram - <span>Đơn giá: </span>".number_format($row['Don_gia']) ." VNĐ
                </div>";
        echo "</td>
        </tr>
        <tr>
            <td align='right'><a href='javascript:window.history.back(-1);'>Quay về</a></td>
        </tr>
    </table>";
    }
}
?>
</div>
</body>
</html>
