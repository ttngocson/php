<?php
require("connect_qlbansua.php");
mysqli_set_charset($conn, 'UTF8');
$name = "";
if(isset($_POST["name"]))
    $name = $_POST["name"];
?>
<html>
<head>
    <title>bài 2.9</title>
    <style>
        .name{
            color: #df7416;
            background-color: #ffeee6;
        }
        h1{
            margin: 0;
            color: #e73c63;
        }
        .tk{
            text-align: center;
        }
        .tk tr{
            background-color: #fecccd;
        }
        .sp{
            border: 1px solid;
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
    <form action="" method="post">
        <table class="tk" width="650">
            <tr>
                <td><h1>TÌM KIẾM THÔNG TIN SỮA</h1></td>
            </tr>
            <tr>
                <td><span>Tên sữa: </span><input type="text" name="name" value="<?php echo $name ?>" required> <button type="submit" name="submit">Tìm kiếm</button></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST["submit"]) && isset($_POST["name"])){
        $name = $_POST["name"];
        $sql = "SELECT * FROM sua JOIN hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua where sua.Ten_sua LIKE '%".$name ."%'";
        $rows = mysqli_query($conn, $sql);
        if(mysqli_num_rows($rows)==0)
            echo "<h2>Không tìm thấy sản phẩm nào</h2>";
        else{
            echo "<h2>Có " .mysqli_num_rows($rows) ." sản phẩm được tìm thấy</h2>";
            echo "<table class='sp' border=\"1\" width='600'>";
            while ($row = mysqli_fetch_array($rows)){
                $hinh = "Hinh_sua/" .$row['Hinh'];
                echo "<tr align='center'>";
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
            </tr>";
            }
            echo "</table>";
        }
    }
    ?>
</div>
</body>
</html>
