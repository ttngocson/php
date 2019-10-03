<?php
$t = 0;

if(isset($_POST["submit"])){
    $csc = $_POST["csc"];
    $csm = $_POST["csm"];
    $dg = $_POST["dg"];
    if($csm >= $csc)
        $t = ($csm - $csc)*$dg;
    else
        echo "<script>alert('Chỉ số cũ lớn hơn chỉ số mới')</script>";
}
?>
<html>
<head>
    <title>Bài tập 3</title>
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
<body style="background-color: #fff4d4">
<form action="bt3.php" method="post">
    <h2 style="background-color: #ffd56c; color: #8a3f00">THANH TOÁN TIỀN ĐIỆN</h2>
    <table>
        <tr>
            <td>Tên chủ hộ: </td>
            <td><input type="text" required></td>
        </tr>
        <tr>
            <td>Chỉ số cũ: </td>
            <td><input type="number" name="csc" required> (Kw)</td>
        </tr>
        <tr>
            <td>Chỉ số mới: </td>
            <td><input type="number" name="csm" required> (Kw)</td>
        </tr>
        <tr>
            <td>Đơn giá: </td>
            <td><input type="number" name="dg" required value="2000"> (VND)</td>
        </tr>
        <tr>
            <td>Số tiền thanh toán: </td>
            <td><input type="text" style="background-color: #ffd4d7" disabled="disabled" value="<?php echo $t?>"> (VND)</td>
        </tr>
    </table>
    <button type="submit" name="submit">Tính</button>
</form>
</body>
</html>
