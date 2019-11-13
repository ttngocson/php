<?php
$temp = "";
$sum = 0;
if(isset($_POST["submit"])){
    $temp = $_POST["arr"];
    $arr = explode(",", $temp);
    $sum = array_sum($arr);
}
?>
<html>
<head>
    <title>Bài tập 2</title>
    <style type="text/css">
        form{
            background-color: #ccd9cf;
            text-align: center;
            margin-top: 5%;
            left: 20%;
            position: absolute;
        }
        h2{
    background-color: #2d9498;
    color: white;
    margin: 0px;
    padding: 10px 0px;
    }
    </style>
</head>
<body>
    <form action="bt2.php" method="post">
        <h2>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h2>
        <table>
            <tr>
                <td>Nhập dãy số: </td>
                <td><input type="text" name="arr" value="<?php echo $temp ?>" required><span style="color: red"> (*)</span></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit" style="background-color: #f9f895">Tổng dãy số</button></td>
            </tr>
            <tr>
                <td>Tổng dãy số: </td>
                <td><input type="text" style="background-color: #c4fb97; color: red;" value="<?php echo $sum?>" disabled="disabled"></td>
            </tr>
        </table>
        <span style="color: red">(*) </span> Các số được cách nhau bằng dấu ","
    </form>
</body>
</html>
