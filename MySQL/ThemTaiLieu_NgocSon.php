<?php
include("connect_ngocson.php");
mysqli_set_charset($conn, 'UTF8');
$theLoai = array();
$tacGia = array();
$msg = "";
//preProcess
$sql = "SELECT * FROM `theloai`";
$rows = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($rows))
    array_push($theLoai, $row);

$sql = "SELECT * FROM `tacgia`";
$rows = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($rows))
    array_push($tacGia, $row);

function Add($maTL, $tenTL, $anhBia, $soTrang, $namPhatHanh, $maLoai, $maTacGia){
    global $conn;
    $sql = "INSERT INTO `tailieu` (`MATAILIEU`, `TENTAILIEU`, `ANHBIA`, `SOTRANG`, `NAMPHATHANH`, `MALOAI`, `MATACGIA`) 
            VALUES ('$maTL', '$tenTL', '$anhBia', '$soTrang', '$namPhatHanh', '$maLoai', '$maTacGia')";
    if (mysqli_query($conn, $sql) === TRUE) {
        return true;
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

if(isset($_POST["submit"])){
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    $targetDir = "Hinh_truyen/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    if(in_array($fileType, $allowTypes)){
        $maTL = $_POST["matl"];
        $tenTL = $_POST["tentl"];
        $soTrang = $_POST["sotrang"];
        $anhBia = $maTL ."." .$fileType;
        $namPhatHanh = $_POST["namphathanh"];
        $maLoai = $_POST["theloai"];
        $maTacGia = $_POST["tacgia"];
        if(Add($maTL, $tenTL, $anhBia, $soTrang, $namPhatHanh, $maLoai, $maTacGia)==true){
            $msg = "Đã thêm thành công tài liệu vào CSDL";
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir .$anhBia);
        }
        else
            $msg = "Không thêm tài liệu được";
    }
    else $msg = "Chọn ảnh sai định dạng";
}
?>
<html>
<head>
    <style>
        fieldset{
            width: fit-content;
        }
        .container{
            margin: 2% 10%;
            font-size: larger;
        }
    </style>
</head>
<body class="container">
<form action="" method="post" enctype="multipart/form-data">
    <h2>THÊM TÀI LIỆU THAM KHẢO</h2>
    <fieldset>
        <legend>Thông tin tài liệu cần thêm</legend>
        <table>
            <tr>
                <td>Chọn tên thể loại: </td>
                <td>
                    <select name="theloai">
                        <?php
                        foreach ($theLoai as $item){
                            echo "<option value=\"" .$item['MALOAI'] ."\">" .$item['TENLOAI'] ."</option>";
                        }
                        ?>
                    </select>
                </td>
                <td>Chọn tên tác giả: </td>
                <td>
                    <select name="tacgia">
                        <?php
                        foreach ($tacGia as $item){
                            echo "<option value=\"" .$item['MATACGIA'] ."\">" .$item['TENTACGIA'] ."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mã tài liệu: </td>
                <td><input type="text" name="matl" required></td>
                <td>Tên tài liệu: </td>
                <td><input type="text" name="tentl" required></td>
            </tr>
            <tr>
                <td>Số trang: </td>
                <td><input type="number" name="sotrang" required></td>
                <td>Năm phát hành: </td>
                <td><input type="text" name="namphathanh" required></td>
            </tr>
            <tr>
                <td>Ảnh bìa: </td>
                <td><input type="file" name="image" required></td>
            </tr>
            <tr align="center">
                <td colspan="4"><button type="submit" name="submit">Thêm tài liệu</button></td>
            </tr>
        </table>
    </fieldset>
</form>
<?php echo $msg?>
</body>
</html>