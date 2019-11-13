<html>
<head>
    <link href="https://pro.fontawesome.com/releases/v5.11.1/css/all.css" rel="stylesheet">
</head>
<body>
<?php
require("connect_qlbansua.php");
mysqli_set_charset($conn, 'UTF8');
$rowsPerPage=5;
if ( ! isset($_GET['page'])) {
    $_GET['page'] = 1;
}
$offset =($_GET['page']-1)*$rowsPerPage;

$sql = "SELECT sua.Ten_sua, hang_sua.Ten_hang_sua, loai_sua.Ten_loai, sua.Trong_luong, sua.Don_gia 
        FROM sua 
        JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
        JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
        LIMIT $offset  ,  $rowsPerPage";
$result = mysqli_query($conn, $sql);
echo "<p align='center'><font face= 'Verdana, Geneva, sans-serif'
size='5'> THÔNG TIN SỮA</font></P>";
if(mysqli_num_rows($result)!=0){
    $stt = 0;
    echo "<table border='1' style='margin-top: 20px' align='center' width='750'>
            <tr>
                <th>STT</th>
                <th>Tên sữa</th>
                <th>Tên hãng sữa</th>
                <th>Tên loại</th>
                <th>Trọng lượng</th>
                <th>Đơn giá</th>
            </tr>";
    while ($row = mysqli_fetch_array($result)){
        $stt++;
        echo "<tr>";
        echo "<td>$stt</td>";
        echo "<td>" .$row["Ten_sua"] ."</td>";
        echo "<td>" .$row["Ten_hang_sua"] ."</td>";
        echo "<td>" .$row["Ten_loai"] ."</td>";
        echo "<td>" .$row["Trong_luong"] ." gram</td>";
        echo "<td>" .number_format($row['Don_gia']) ." VNĐ</td>";
        echo "</tr>";
    }
    echo "</table>";
    $sql = "SELECT sua.Ten_sua, hang_sua.Ten_hang_sua, loai_sua.Ten_loai, sua.Trong_luong, sua.Don_gia 
        FROM sua 
        JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
        JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua";
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
</body>
</html>