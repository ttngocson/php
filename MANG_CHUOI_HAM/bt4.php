<?php
$temp = "";
$arr = [];
$x = 0;
$str = "";
$temp1 = "";

function XuatMang($arr){
    $str = "";
    foreach ($arr as $value){
        $str = $str ."$value" .", ";
    }
    $str = rtrim($str, ", ");
    return $str;
}

function TimKiem($arr, $x){
    for ($i = 0; $i < count($arr); $i++)
        if($arr[$i] == $x)
            return $i + 1;
    return -1;
}

if(isset($_POST["submit"])){
    $temp = $_POST["arr"];
    $x = $_POST["x"];
    $arr = explode(",", $temp);
    $temp1 = XuatMang($arr);
    $vitri = TimKiem($arr, $x);
    if($vitri == -1)
        $str = "Không tìm thấy giá trị $x trong mảng";
    else
        $str = "Đã tìm thấy giá trị $x tại vị trí thứ $vitri trong mảng";
}
?>
<html>
<head>
    <title>Bài tập 4</title>
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
        input{
            width: 95%;
        }
        p{
            background-color: #79d0cb;
            margin: 0;
        }
    </style>
</head>
<body>
<form action="bt4.php" method="post">
    <h2>TÌM KIẾM</h2>
    <table>
        <tr>
            <td>Nhập mảng: </td>
            <td style="width: 300px"><input type="text" name="arr" value="<?php echo $temp ?>" required></td>
        </tr>
        <tr>
            <td>Nhập số cần tìm: </td>
            <td><input style="width: 30%" type="number" name="x" value="<?php echo $x ?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" style="background-color: #95cbfa" name="submit">Tìm kiếm</button> </td>
        </tr>
        <tr>
            <td>Mảng: </td>
            <td><input type="text" value="<?php echo XuatMang($arr) ?>"></td>
        </tr>
        <tr>
            <td style="width: 130px">Kết quả tìm kiếm: </td>
            <td><input style="background-color: #cefbfc" type="text" value="<?php echo $str ?>" disabled="disabled"></td>
        </tr>
    </table>
    <p>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</p>
</form>
</body>
</html>
