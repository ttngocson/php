<html>
<head>

</head>
<body>
<div align="center">
    <table border="1">
        <?php
        require("connect_anhngocson.php");
        mysqli_set_charset($conn, 'UTF8');

        $sql1 = "SELECT TV.TENTV
                From thanhvien AS TV
                WHERE TV.MATV ='" .$_GET["id"] ."'";
        $result1 = mysqli_query($conn, $sql1);
        $rs = mysqli_fetch_array($result1)['TENTV'];
        echo "<tr align='center'><td colspan='5'><h3>$rs</h3></td></tr>";
        ?>
        <tr>
            <th>Mã bài viết</th>
            <th>Tiêu đề bài viết</th>
            <th>Nội dung bài viết</th>
            <th>Chủ đề</th>
            <th>Thêm mới</th>
        </tr>
    <?php
    if(!isset($_GET["id"]))
        echo "Không tìm thấy trang";
    else{
        $sql = "SELECT TV.TENTV, BV.MABV, BV.TIEUDE, BV.NOIDUNG, CD.TENCD 
                FROM `baiviet` as BV 
                JOIN thanhvien AS TV on BV.MATV = TV.MATV 
                JOIN chude AS CD ON BV.MACD = CD.MACD
                WHERE TV.MATV ='" .$_GET["id"] ."'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)){
            echo "<tr>
                    <td>".$row['MABV'] ."</td>
                    <td>".$row['TIEUDE'] ."</td>
                    <td>".$row['NOIDUNG'] ."</td>
                    <td>".$row['TENCD'] ."</td>
                    <td>"."<a href='ThaoLuan.php?matv=".$_GET['id']."&mabv=".$row['MABV']."'>Thêm mới</a>" ."</td>
                </tr>";
        }

    }
    ?>
    </table>
</div>
</body>
</html>
