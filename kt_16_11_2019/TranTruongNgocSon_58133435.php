<?php
include("connect_ttngocson.php");
mysqli_set_charset($conn, 'UTF8');
$khoa = array();
$GVCV = array();
$msg = "";
//preProcess
$sql = "SELECT * FROM `giangvien`";
$rows = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($rows))
    array_push($GVCV, $row);

$sql = "SELECT * FROM `khoa`";
$rows = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($rows))
    array_push($khoa, $row);
function Add($maLop, $tenLop, $siso, $maKhoa, $maGV){
    global $conn;
    $sql = "INSERT INTO `lop` (`MALOP`, `TENLOP`, `SISOSV`, `MAKHOA`, `MAGVCV`) 
            VALUES ('$maLop', '$tenLop', '$siso', '$maKhoa', '$maGV')";
    if (mysqli_query($conn, $sql) === TRUE) {
        return true;
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}
if(isset($_POST["submit"])){
    $maKhoa = $_POST["khoa"];
    $maGV = $_POST["GVCV"];
    $maLop = $_POST["malop"];
    $tenLop = $_POST["tenlop"];
    $siSo = $_POST["siso"];
    if(Add($maLop, $tenLop, $siSo, $maKhoa, $maGV))
        $msg = "Thêm lớp thành công";
    else
        $msg = "Thêm lớp không thành công";
    echo "<script>alert('$msg')</script>";
}

?>
<html>
<head>
    <title>Thêm lớp</title>
    <style>
        form{
            margin-top: 5%;
            width: fit-content;
            border: 1px solid;
        }
        table{
            font-size: larger;
        }
        td{
            height: 30px;
            padding-left: 10px;
        }
        .background{
            background-color: #FEE0C1;
        }
        h2{
            margin: 0;
            color: #7d0000;
        }
    </style>
</head>
<body>
<div align="center">
    <form action="" method="post">
        <table width="400">
            <tr>
                <th colspan="2"><h2>Thêm Lớp</h2></th>
            </tr>
            <tr class="background">
                <td>Chọn Khoa: </td>
                <td>
                    <select name="khoa">
                        <?php
                        foreach ($khoa as $item){
                            echo "<option value=\"" .$item['MAKHOA'] ."\">" .$item['TENKHOA'] ."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Chọn GVCV: </td>
                <td>
                    <select name="GVCV">
                        <?php
                        foreach ($GVCV as $item){
                            echo "<option value=\"" .$item['MAGV'] ."\">" .$item['HOGV'] ." " .$item['TENGV'] ."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr class="background">
                <td>Nhập mã lớp: </td>
                <td><input type="text" name="malop" required></td>
            </tr>
            <tr>
                <td>Nhập tên lớp: </td>
                <td><input type="text" name="tenlop" required></td>
            </tr class="background">
            <tr class="background">
                <td>Nhập sĩ số: </td>
                <td><input type="number" name="siso" required min="0"></td>
            </tr>
            <tr align="center">
                <td colspan="2"><button type="submit" name="submit">Thêm lớp</button></td>
            </tr>
        </table>
    </form>
</div>
<br>
</body>
</html>
