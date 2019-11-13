<?php
$n = 0;
$arr = [];
$GTLN = 0;
$GTNN = 0;
$tong = 0;

function TaoMang($n)
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        array_push($arr, rand(0, 20));
    }
    return $arr;
}
function XuatMang($arr){
    $str = "";
    foreach ($arr as $value){
       $str = $str ."$value" ." ";
    }
    echo $str;

}

function TinhTong($arr){
    return array_sum($arr);
}

function TimMax($arr){
    return max($arr);
}

function TimMin($arr){
    return min($arr);
}

if(isset($_POST["submit"])){
    $n = $_POST["n"];
    if($n<=10){
        $arr = TaoMang($n);
        $GTLN = TimMax($arr);
        $GTNN = TimMin($arr);
        $tong = TinhTong($arr);
    }
    else{
        echo "<script>alert('Số phần tử bé hơn hoặc bằng 10')</script>";
    }
}

?>
<html>
<head>
    <title>Bài tập 3</title>
    <style type="text/css">
        form{
            text-align: center;
            margin-top: 5%;
            left: 20%;
            position: absolute;
            border: 1px solid;
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
    </style>
</head>
<body>
<form action="bt3.php" method="post">
    <h2>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h2>
    <table style="width: max-content">
        <tr>
            <td class="pink">Nhập số phần tử: </td>
            <td class="pink" width="200"><input type="number" value="<?php echo $n?>" name="n" min="0" max="10" required></td>
        </tr>
        <tr>
            <td class="pink"></td>
            <td class="pink"><input type="submit" style="background-color: #fffea7" name="submit" value="Phát sinh và tính toán"></td>
        </tr>
        <tr>
            <td>Mảng: </td>
            <td><input type="text" class="lightpink" style="width: 90%" value="<?php XuatMang($arr); ?>" disabled="disabled"></td>
        </tr>
        <tr>
            <td>GTLN (MAX) trong mảng: </td>
            <td><input type="text" class="lightpink" style="width: 50%" value="<?php echo $GTLN; ?>" disabled="disabled"></td>
        </tr>
        <tr>
            <td>GTNN (MIN) trong mảng: </td>
            <td><input type="text" class="lightpink" style="width: 50%" value="<?php echo $GTNN; ?>" disabled="disabled"></td>
        </tr>
        <tr>
            <td>Tổng mảng: </td>
            <td><input type="text" class="lightpink" style="width: 50%" value="<?php echo $tong; ?>" disabled="disabled"></td>
        </tr>
    </table>
    <p>(<b style="color: red">Ghi chú: </b>Các phần tử trong mảng có giá trị từ 0 đến 20)</p>
</form>
</body>
</html>
