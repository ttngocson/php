<?php
session_start();
$BXH_stock = array( 1 => "Hết Thương Cạn Nhớ", 2 => "Bước Qua Đời Nhau", 3 => "Sóng Gió");

if(isset($_SESSION["BXH"]))
    $BXH = $_SESSION["BXH"];
else
    $BXH = $BXH_stock;
function Xuat($arr){
    foreach ($arr as $key=>$value)
        echo "$key" .": " ."$value" ."\n";
}
function AddItem($arr, $key, $name){
    $dest = [];
    for($i = 1; $i < $key; $i++){
        //echo $i .": " .$arr[$i]."<br>";
        $dest[$i] = $arr[$i];
    }
    $dest[$key] = $name;
    for ($i = $key; $i <= count($arr); $i++){
        $dest[$i+1] = $arr[$i];
    }
    return $dest;
}
$name = "";
$number = 0;
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $number = $_POST["number"];
    if($number > count($BXH)){
         $BXH[count($BXH)+1] = $name;
    }
    else{
        $BXH = AddItem($BXH, $number, $name);
    }
    $_SESSION["BXH"] = $BXH;
}
?>
<head>
    <title>Bảng xếp hạng</title>
    <style>
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
        textarea{
            margin: 5px;
        }
    </style>
</head>
<body>
<form action="bangxephang.php" method="post">
    <h2>BẢNG XẾP HẠNG BÀI HÁT</h2>
    <table align="center">
        <tr>
            <td>Nhập tên bài hát: </td>
            <td><input type="text" name="name" required></td>
        </tr>
        <tr>
            <td>Nhập thứ hạng trong BXH: </td>
            <td><input type="number" name="number" min="1" required value="1"></td>
        </tr>
    </table>
    <div>
        <textarea cols="50" rows="8" disabled="disabled"><?php Xuat($BXH);?></textarea>
    </div>
    <div>
        <button type="submit" name="submit">Thêm BH</button>&nbsp;
        <button type="submit" name="view">Kết quả XH</button>
    </div>
</form>
</body>
