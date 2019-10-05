<?php
$temp = "";
$x = 0;
$y = 0;
$preArr = [];
$aftArr = [];

function XuatMang($arr){
    $str = "";
    foreach ($arr as $value){
        $str = $str ."$value" ." ";
    }
    return $str;
}

function replace($arr, $x, $y){
    for ($i = 0; $i < count($arr); $i++)
        if ($arr[$i]==$x)
            $arr[$i] = $y;
    return $arr;
}

if(isset($_POST["submit"])){
    $temp = $_POST["arr"];
    $x = $_POST["x"];
    $y = $_POST["y"];
    $preArr = explode(",", $temp);
    $aftArr = replace($preArr, $x, $y);
}
?>
<html>
<head>
    <title>Bài tập 5</title>
    <style type="text/css">
        form{
            text-align: center;
            margin-top: 5%;
            left: 35%;
            position: absolute;
            border: 1px solid;
            color: #9347a1;
        }
        h2{
            background-color: #a70e74;
            color: white;
            margin: 0px;
            padding: 10px 0px;
        }
        .pink{
            background-color: #fedaf4;
        }
        .lightpink{
            background-color: #fca9a5;
        }
        input{
            width: 90%;
        }
    </style>
</head>
<body>
<form action="bt5.php" method="post">
    <h2>THAY THẾ</h2>
    <table style="color: #9347a1">
        <tr class="pink">
            <td>Nhập các phần tử: </td>
            <td style="width: 350px"><input type="text" name="arr" value="<?php echo $temp?>" required></td>
        </tr>
        <tr class="pink">
            <td>Giá trị cần thay thế: </td>
            <td><input style="width: 30%" type="text" name="x" value="<?php echo $x?>" required></td>
        </tr>
        <tr class="pink">
            <td>Giá trị thay thế: </td>
            <td><input style="width: 30%" type="text" name="y" value="<?php echo $y?>" required></td>
        </tr>
        <tr class="pink">
            <td></td>
            <td><button type="submit" style="background-color: #fffea7" name="submit">Thay thế</button> </td>
        </tr>
        <tr>
            <td>Mảng cũ:</td>
            <td><input type="text" class="lightpink" disabled="disabled" value="<?php echo XuatMang($preArr)?>"></td>
        </tr>
        <tr>
            <td style="width: 160px">Mảng sau khi thay thế:</td>
            <td><input type="text" class="lightpink" disabled="disabled" value="<?php echo XuatMang($aftArr)?>"></td>
        </tr>
    </table>
    <p>(<b style="color: red">Ghi chú: </b>Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</p>
</form>
</body>
</html>
