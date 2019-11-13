<?php
require("connect_qlbansua.php");
mysqli_set_charset($conn, 'UTF8');
$rowsPerPage=2;
if ( ! isset($_GET['page'])) {
    $_GET['page'] = 1;
}
$offset =($_GET['page']-1)*$rowsPerPage;
$sql = "SELECT * FROM sua JOIN hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua
        LIMIT $offset  ,  $rowsPerPage";
$result = mysqli_query($conn, $sql);
?>
<html>
<head>
    <title>Bài 2.8</title>
    <style>
        .name{
            color: #df7416;
            background-color: #ffeee6;
        }
        h1{
            color: #e73c63;
        }
        table{
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
    <h1>THÔNG TIN CHI TIẾT CÁC LOẠI SỮA</h1>
    <?php
    if(mysqli_num_rows($result)!=0) {
        echo "<table border=\"1\" width='600'>";
        while ($row = mysqli_fetch_array($result)){
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
        $sql = "SELECT * FROM sua JOIN hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua";
        $re = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($re);
        $maxPage = floor($numRows/$rowsPerPage) + 1;
        $i = 1;
        //tạo link tương ứng tới các trang
        echo "<h4 align='center'>";
        echo "<a href=" .$_SERVER['PHP_SELF']. "?page=1><<</a> ";
        if($_GET['page'] != 1)
            echo "<a href=" .$_SERVER['PHP_SELF']. "?page=".($_GET['page']-1) ."><</a> ";
        for ($i=1 ; $i<=$maxPage ; $i++){
            if ($i == $_GET['page']){
                echo '<b>'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
            }
            else
                echo "<a href=" .$_SERVER['PHP_SELF']. "?page="
                    .$i.">".$i."</a> ";
        }
        if($_GET['page'] != $maxPage)
            echo "<a href=" .$_SERVER['PHP_SELF']. "?page=".($_GET['page']+1) .">></a> ";
        echo "<a href=" .$_SERVER['PHP_SELF']. "?page=$maxPage>>></a> ";
        echo "</h4>";
    }
    ?>
</div>
</body>
</html>
