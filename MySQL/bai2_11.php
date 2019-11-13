<?php
require("connect_qlbansua.php");
mysqli_set_charset($conn, 'UTF8');

function Add($maSua, $tenSua, $hangSua, $loaiSua, $trongLuong, $donGia, $tpDinhDuong, $loiIch, $hinh){
    global $conn;
    $sql = "INSERT INTO `sua` (`Ma_sua`, `Ten_sua`, `Ma_hang_sua`, `Ma_loai_sua`, `Trong_luong`, `Don_gia`, `TP_Dinh_Duong`, `Loi_ich`, `Hinh`) 
            VALUES ('$maSua', '$tenSua', '$hangSua', '$loaiSua', '$trongLuong', '$donGia', '$tpDinhDuong', '$loiIch', '$hinh')";
    if (mysqli_query($conn, $sql) === TRUE) {
        return true;
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
    return true;
}

if(isset($_POST["submit"]) && isset($_POST["masua"])){
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    $targetDir = "Hinh_sua/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $maSua = $_POST["masua"];
    $tenSua = $_POST["tensua"];
    $hangSua = $_POST["hangsua"];
    $loaiSua = $_POST["loaisua"];
    $trongLuong = $_POST["trongluong"];
    $donGia = $_POST["dongia"];
    $tpDinhDuong = $_POST["tpdinhduong"];
    $loiIch = $_POST["loiich"];
    $hinh = $maSua ."." .$fileType;

    if(in_array($fileType, $allowTypes)){
        if(Add($maSua,$tenSua,$hangSua,$loaiSua,$trongLuong,$donGia,$tpDinhDuong,$loiIch,$hinh)){
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir .$hinh);
            echo "<script>alert('Thêm sữa thành công!')</script>";
            echo "<script>window.location.replace('bai2_7_CT.php?id=$maSua')</script>";
        }
        else{
            echo "<script>alert('Thêm sữa không thành công!')</script>";
        }
    }
    else{
        echo "<script>alert('Chọn ảnh sai định dạng!')</script>";
    }
}
?>
<html>
<head>
    <style>
        form{
            width: fit-content;
        }
        h2{
            margin: 0;
            padding: 5px 0;
            color: white;
            background-color: #fe6c6c;
        }
        table{
            background-color: #fddedc;
        }
        td{
            height: 30px;
        }
    </style>
</head>
<body>
<div align="center">
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr align="center">
                <td colspan="2"><h2>THÊM SỮA MỚI</h2></td>
            </tr>
            <tr>
                <td width="200">Mã sữa:</td>
                <td><input type="text" name="masua" required></td>
            </tr>
            <tr>
                <td>Tên sữa:</td>
                <td><input type="text" name="tensua" required></td>
            </tr>
            <tr>
                <td>Hãng sữa:</td>
                <td>
                    <select name="hangsua">
                        <?php
                        $sql = "SELECT * FROM `hang_sua`";
                        $rows = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($rows)) {
                            $str = "";
                            $str = $str . "<option value='" . $row['Ma_hang_sua'] . "'";
                            $str = $str . ">" . $row['Ten_hang_sua'] . "</option>\n";
                            echo "$str";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Loại sữa:</td>
                <td>
                    <select name="loaisua">
                        <?php
                        $sql = "SELECT * FROM `loai_sua`";
                        $rows = mysqli_query($conn, $sql);
                        $loaisua = "";
                        if (isset($_POST["loaisua"]))
                            $loaisua = $_POST["loaisua"];
                        while ($row = mysqli_fetch_array($rows)) {
                            $str = "";
                            $str = $str . "<option value='" . $row['Ma_loai_sua'] . "'";
                            $loaisua == $row['Ma_loai_sua'] ? $str = $str . "selected" : "";
                            $str = $str . ">" . $row['Ten_loai'] . "</option>\n";
                            echo "$str";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Trọng lượng: </td>
                <td><input type="number" name="trongluong" required> (gram hoặc ml)</td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td><input type="number" name="dongia" required> (VNĐ)</td>
            </tr>
            <tr>
                <td>Thành phần dinh dưỡng: </td>
                <td><textarea name="tpdinhduong" rows="2" cols="40" required></textarea></td>
            </tr>
            <tr>
                <td>Lợi ích: </td>
                <td><textarea name="loiich" rows="2" cols="40" required></textarea></td>
            </tr>
            <tr>
                <td>Hình ảnh: </td>
                <td><input type="file" name="image" required></td>
            </tr>
            <tr align="center">
                <td colspan="2"><button type="submit" name="submit">Thêm mới</button></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
