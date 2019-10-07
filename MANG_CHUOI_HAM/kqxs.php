<?php
session_start();

function TaoMang($n)
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $a = rand(01, 55);
        if(array_search($a, $arr))
            $i--;
        else
            array_push($arr, $a);
    }
    return $arr;
}
function TaoSnum($arr1, $arr2)
{
    $Snum = 0;
    $check = true;
    do{
        $check = false;
        $Snum = rand(1,55);
        foreach ($arr1 as $value)
            if($value == $Snum)
                $check = true;
        foreach ($arr2 as $value){
            if($value == $Snum)
                $check = true;
        }
    }while($check);
    return $Snum;
}

$ve = "0";
$arr = [];

$JP1 = [];
$JP2 = [];
$Snum = 0;
$GNhat = [];
$GNhi = [];
$GBa = [];
if(isset($_SESSION["JP1"])){
    $JP1 = $_SESSION["JP1"];
    $JP2 = $_SESSION["JP2"];
    $Snum = $_SESSION["Snum"];
    $GNhat = $_SESSION["GNhat"];
    $GNhi = $_SESSION["GNhi"];
    $GBa = $_SESSION["GBa"];
}
else{
    $JP1 = TaoMang(6);
    $_SESSION["JP1"] = $JP1;
    $JP2 = TaoMang(5);
    $_SESSION["JP2"] = $JP2;
    $Snum = TaoSnum($JP2);
    $_SESSION["Snum"] = $Snum;
    $GNhat = TaoMang(5);
    $_SESSION["GNhat"] = $GNhat;
    $GNhi = TaoMang(4);
    $_SESSION["GNhi"] = $GNhi;
    $GBa = TaoMang(3);
    $_SESSION["GBa"] = $GBa;
}
if(isset($_POST["create"])){
    $JP1 = TaoMang(6);
    $_SESSION["JP1"] = $JP1;
    $JP2 = TaoMang(5);
    $_SESSION["JP2"] = $JP2;
    $Snum = TaoSnum($JP1, $JP2);
    $_SESSION["Snum"] = $Snum;
    $GNhat = TaoMang(5);
    $_SESSION["GNhat"] = $GNhat;
    $GNhi = TaoMang(4);
    $_SESSION["GNhi"] = $GNhi;
    $GBa = TaoMang(3);
    $_SESSION["GBa"] = $GBa;
}

function check($arr){
    global $JP1, $JP2, $Snum, $GNhat, $GNhi, $GBa;

    if ($arr == $JP1)
        return "JackPot 1";

    $check = true;
    foreach ($JP2 as $value){
        if((string)array_search($value, $arr)=="")
            $check = false;
    }
    if($check == true)
        if(array_search($Snum, $arr))
            return "JackPot 2";

    $check = true;
    foreach ($GNhat as $value){
        if((string)array_search($value, $arr)=="")
            $check = false;
    }
    if($check==true)
        return "Giải Nhất";
    $check = true;
    foreach ($GNhi as $value){
        if((string)array_search($value, $arr)=="")
            $check = false;
    }
    if($check==true)
        return "Giải Nhì";
    $check = true;
    foreach ($GBa as $value){
        if((string)array_search($value, $arr)=="")
            $check = false;
    }
    if($check==true)
        return "Giải Ba";
    return "Gió";
}

$msg = "";

if(isset($_POST["check"])){
    $ve = $_POST["arr"];
    $temp = explode(",", $ve);
    $kq = check($temp);
    $msg = "Bạn đã trúng " ."$kq";

}
?>
<html>
<head>
    <title>Kết Quả xổ số</title>
    <style>
        form{
            background-color: #ccd9cf;
            text-align: center;
            margin-top: 5%;
            left: 35%;
            position: absolute;
        }
        h1{
            background-color: #2d9498;
            color: white;
            margin: 0px;
            padding: 10px 0px;
        }
        #kq{
            font-size: 20pt;
            font-weight: bold;
            text-align: center;
        }
        #kq td{
            padding: 5px;
        }
    </style>
</head>
<body>
<form action="kqxs.php" method="post">
    <h1>KẾT QUẢ XỔ SỐ VIETLOT</h1>
    <table id="kq" border="1">
        <tr>
            <td style="width: 200px">Giải thưởng</td>
            <td style="width: 250px">Kết quả</td>
        </tr>
        <tr style="color: red">
            <td>Giải Jackpot 1</td>
            <td><?php echo implode(" ", $JP1)?></td>
        </tr>
        <tr style="color: yellowgreen">
            <td>Giải Jackpot 2</td>
            <td><?php echo implode(" ", $JP2)?> | <?php echo $Snum?></td>
        </tr>
        <tr style="color: blue">
            <td>Giải Nhất</td>
            <td><?php echo implode(" ", $GNhat)?></td>
        </tr>
        <tr style="color: green">
            <td>Giải Nhì</td>
            <td><?php echo implode(" ", $GNhi)?></td>
        </tr>
        <tr style="color: #46b8da">
            <td>Giải Ba</td>
            <td><?php echo implode(" ", $GBa)?></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="create">Tạo KQ xổ số</button></td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td>Nhập vào vé: </td>
            <td><input type="text" name="arr" value="<?php echo $ve?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="check">Xem kết quả</button>
            </td>
        </tr>
        <tr>
            <td>Kết quả: </td>
            <td><b><?php echo $msg?></b></td>
        </tr>
    </table>
</form>
</body>
</html>
