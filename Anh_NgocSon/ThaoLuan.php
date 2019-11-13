<?php
require("connect_anhngocson.php");
mysqli_set_charset($conn, 'UTF8');
?>
<html>
<head>

</head>
<body>
<div align="center">
	<?php
        $sql = "SELECT thanhvien.TENTV,baiviet.TIEUDE 
        FROM thanhvien,baiviet 
        WHERE thanhvien.MATV = '" .$_GET['matv'] ."' AND baiviet.MABV='" .$_GET['mabv'] ."'";
        $rows = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($rows);
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Tên thành viên: </td>
                <td>
                    <?php echo $row['TENTV']?>
                </td>
            </tr>
            <tr>
                <td>Tên bài viết: </td>
                <td>
                    <?php echo $row['TIEUDE']?>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
