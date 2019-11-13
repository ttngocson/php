<html>
<head>
    <link href="https://pro.fontawesome.com/releases/v5.11.1/css/all.css" rel="stylesheet">
    <style>
        h2{
            margin-bottom: auto;
            color: #fd650d;
            background-color: #ffeee6;
        }
    </style>
</head>
<body>
    <?php
    require("connect_qlbansua.php");
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT sua.Ten_sua, hang_sua.Ten_hang_sua, loai_sua.Ten_loai, sua.Trong_luong, sua.Don_gia, sua.Hinh
            FROM sua 
            JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
            JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)!=0){
        echo "<table border='1' align='center'>";
        echo "<tr><td colspan='2'><h2 align=\"center\">THÔNG TIN CÁC SẢN PHẨM</h2></td></tr>";
        while ($row = mysqli_fetch_array($result)){
            $hinh = "Hinh_sua/" .$row['Hinh'];
            $hang1 = $row['Ten_sua'];
            $hang2 = "Nhà sản xuất: " .$row['Ten_hang_sua'];
            $hang3 = $row['Ten_loai'] ." - " .$row['Trong_luong'] ." gr - " .number_format($row['Don_gia']) ." VNĐ";

            echo "<tr >
                        <td width='200' align='center'><img src='$hinh' width='150' height='150'></td>
                        <td style='padding-left: 10px'>
                            <h4>$hang1</h4>
                            <p>$hang2</p>
                            <p>$hang3</p>
                        </td>
                    </tr>";
            //break;
        }
        echo "</table>";
    }
    ?>
</body>
</html>
