<?php
$td = 0;
$kq = "";

$toan = 0;
$ly = 0;
$hoa= 0;
$dc = 0;
if(isset($_POST["submit"])){
    $toan = $_POST["toan"];
    $ly = $_POST["ly"];
    $hoa= $_POST["hoa"];
    $dc = $_POST["dc"];
    $td = $toan + $ly + $hoa;
    if($td >= $dc)
        $kq = "Đậu";
    else
        $kq = "Không đậu";
}
?>
<html>
<head>
    <title>Bài tập 4</title>
    <style type="text/css">
        form{
            margin: 0px;
            text-align: center;
            width: 30%;
            left: 35%;
            position: absolute;
        }
    </style>
</head>
<body style="background-color: #ffe7fa">
<form action="bt4.php" method="post">
    <h2 style="background-color: #e44e7f">KẾT QUẢ THI ĐẠI HỌC</h2>
    <table style="margin-left: 8%">
        <tr>
            <td width="130">Toán: </td>
            <td><input type="number" step="any" name="toan" value="<?php echo $toan?>" required></td>
        </tr>
        <tr>
            <td>Lý: </td>
            <td><input type="number" step="any" name="ly"value="<?php echo $ly?>"  required></td>
        </tr>
        <tr>
            <td>Hóa: </td>
            <td><input type="number" step="any" name="hoa"value="<?php echo $hoa?>"  required></td>
        </tr>
        <tr>
            <td>Điểm chuẩn: </td>
            <td><input type="number" step="any" name="dc"value="<?php echo $dc?>"  required></td>
        </tr>
        <tr>
            <td>Tổng điểm: </td>
            <td><input type="text" disabled="disabled" value="<?php echo $td?>"></td>
        </tr>
        <tr>
            <td>Kết quả: </td>
            <td><input type="text" disabled="disabled" value="<?php echo $kq?>"></td>
        </tr>
    </table>
    <button type="submit" name="submit" style="align-content: center">Xem kết quả</button>
</form>
</body>
</html>
