<?php
error_reporting(0);
$pt = "Null";
$a = 0;
$b = 0;
$kq = 0;

if(isset($_POST["submit"])){
    $pt = $_POST["pt"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    switch ($pt){
        case "+":
            $pt = "Cộng";
            $kq = $a + $b;
            break;
        case "-":
            $pt = "Trừ";
            $kq = $a - $b;
            break;
        case "*":
            $pt = "Nhân";
            $kq = $a * $b;
            break;
        case "/":
            $pt = "Chia";
            if($b != 0)
                $kq = $a / $b;
            else {
                $kq = "Lỗi chia cho 0";
                echo "<script>window.onload(window.history.back(-1))</script>";
                echo "<script>alert('$kq')</script>";
                echo "<script>alert('Quay lại trang trước')</script>";
            }
            break;
    }

}
else
    echo "<script>window.onload(window.history.back(-1))</script>";
?>
<html>
<head>
    <title>Bài tập 6</title>
    <link rel="stylesheet" type="text/css" href="bt6.css">
</head>
<body>
<form>
    <h3>Thực hiện phép toán cơ bản</h3>
    <table>
        <tr>
            <td style="color: #a20b00" align="right"><b>Chọn phép tính: </b></td>
            <td style="color: red"><b><?php echo $pt?></b></td>
        </tr>
        <tr>
            <td align="right"><b>Số thứ nhất:</b></td>
            <td><input type="number" style="width: 215px" value="<?php echo $a?>" disabled="disabled"/></td>
        </tr>
        <tr>
            <td align="right"><b>Số thứ hai:</b></td>
            <td><input type="number" style="width: 215px" value="<?php echo $b?>" disabled="disabled"/></td>
        </tr>
        <tr>
            <td align="right"><b>Kết quả:</b></td>
            <td><input type="text" style="width: 215px" value="<?php echo $kq?>" disabled="disabled"/></td>
        </tr>
        <tr>
            <td align="right"></td>
            <td><a href="javascript:window.history.back(-1);">Quay lại trang trước</a></td>
        </tr>
    </table>
</form>
</body>
</html>
