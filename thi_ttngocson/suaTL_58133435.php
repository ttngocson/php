<?php
require("connect_ngocson.php");
mysqli_set_charset($conn, 'UTF8');
$matl = "";
$tentl = "";
$sotrang = "";
$anh = "";
$NDTT = "";
$theloai = "";
$tacgia = "";
if(!isset($_GET["matl"]))
    echo "<script>window.location.replace('TracuuTL_58133435.php')</script>";
else{
    $matl = $_GET["matl"];
    $sql = "SELECT * FROM `tailieu` WHERE `MATAILIEU` = '$matl'";
    $row = mysqli_fetch_array(mysqli_query($conn, $sql));
    $tentl = $row["TENTAILIEU"];
    $sotrang = $row["SOTRANG"];
    $anh ="Hinh_truyen/" .$row["ANHBIA"];
    $NDTT = $row["NDTOMTAT"];
    $theloai = $row["MALOAI"];
    $tacgia = $row["MATACGIA"];
    if(isset($_POST["submit"])){
        $tentl = $_POST["tentl"];
        $sotrang = $_POST["sotrang"];
        $NDTT = $_POST["NDTT"];
        $theloai = $_POST["theloai"];
        $tacgia = $_POST["tacgia"];
        $sql = "UPDATE `tailieu` SET 
                `TENTAILIEU`=$tentl,
                `SOTRANG`=$sotrang,
                `NDTOMTAT`=$NDTT,
                `MALOAI`=$theloai,
                `MATACGIA`=$tacgia
                WHERE `MATAILIEU` = '$matl'
                ";

    }
}
?>
<html>
<head></head>
<body>
<form style="width: max-content" action="" method="post">
    <h3 align="center">Chỉnh sửa tài liệu</h3>
    <div style="float: left; width: 160px">
        <img src="<?php echo $anh ?>" width="146" height="216">
    </div>
    <div style="float: left">
        <table width="350">
            <tr>
                <td>Mã tài liệu:</td>
                <td><input type="text" value="<?php echo $matl?>" disabled></td>
            </tr>
            <tr>
                <td>Tên tài liệu:</td>
                <td><input type="text"value="<?php echo $tentl?>" id="tentl" required></td>
            </tr>
            <tr>
                <td>Ảnh:</td>
                <td><input type="file" id="anh"></td>
            </tr>
            <tr>
                <td>Số trang:</td>
                <td><input type="number"value="<?php echo $sotrang?>" id="sotrang" min="0" required></td>
            </tr>
            <tr>
                <td>ND tóm tắt:</td>
                <td><input type="text"value="<?php echo $NDTT?>" id="NDTT" required></td>
            </tr>
            <tr>
                <td>Loại tài liệu:</td>
                <td>
                    <select name="theloai">
                        <?php
                        $sql = "SELECT * FROM `theloai`";
                        $rows = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($rows)){
                            $str = "";
                            $str = $str ."<option value='".$row['MALOAI'] ."'";
                            $theloai==$row['MALOAI']?$str = $str ."selected":"";
                            $str = $str .">" .$row['TENLOAI']."</option>";
                            echo "$str";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tác giả:</td>
                <td>
                    <select name="tacgia">
                        <?php
                        $sql = "SELECT * FROM `tacgia`";
                        $rows = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($rows)){
                            $str = "";
                            $str = $str ."<option value='".$row['MATACGIA'] ."'";
                            $tacgia==$row['MATACGIA']?$str = $str ."selected":"";
                            $str = $str .">" .$row['HOTEN']."</option>";
                            echo "$str";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><button type="submit">Sửa</button></td>
                <td><a href="javascript:window.history.back(-1);">Trở về</a></td>
            </tr>
        </table>
    </div>
    <div style="clear: both"></div>
</form>
</body>
</html>
