<?php
$temp = "";
$sort = "";
$rsort = "";

function XuatMang($arr){
    $str = "";
    foreach ($arr as $value){
        $str = $str ."$value" .", ";
    }
    $str = rtrim($str, ", ");
    $str = trim($str, ", ");
    return $str;
}

if(isset($_POST["submit"])){
    $temp = $_POST["arr"];
    (int)$arr = explode(",", $temp);
    sort($arr);
    $sort = XuatMang($arr);
    rsort($arr);
    $rsort = XuatMang($arr);
}
?>
<html>
<head>
    <title>Bài tập 6</title>
    <style type="text/css">
        form{
            background-color: #ccd9cf;
            text-align: center;
            margin-top: 5%;
            left: 35%;
            position: absolute;
        }
        h2{
            background-color: #2d9498;
            color: white;
            margin: 0px;
            padding: 10px 0px;
        }
        .td{
            padding: 0 10px;
        }
        input{
            width: 90%;
        }
        p{
            margin: 0;
        }
    </style>
</head>
<body>
<form action="bt6.php" method="post">
    <h2>TÌM KIẾM</h2>
    <table>
        <tr>
            <td class="td">Nhập mảng: </td>
            <td style="width: 300px"><input type="text" name="arr" value="<?php echo $temp ?>" required><span style="color: red"> (*)</span></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="submit">Sắp xếp tăng/giảm</button> </td>
        </tr>
        <tr style="background-color: #cae6e6">
            <td class="td"><b style="color: red">Sau khi sắp xếp:</b> </td>
            <td></td>
        </tr>
        <tr style="background-color: #cae6e6">
            <td class="td">Tăng dần: </td>
            <td><input style="background-color: #cefbfc" type="text" value="<?php echo $sort ?>" disabled="disabled"></td>
        </tr>
        <tr style="background-color: #cae6e6">
            <td class="td">Giảm dần: </td>
            <td><input style="background-color: #cefbfc" type="text" value="<?php echo $rsort ?>" disabled="disabled"></td>
        </tr>
    </table>
    <p><span style="color: red">(*)</span> Các số được nhập cách nhau bằng dấu ","</p>
</form>
</body>
</html>
