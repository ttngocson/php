<?php
session_start();

function TaoMang($n)
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $a = rand(10, 99);
        if(array_search($a, $arr))
            $i--;
        else
            array_push($arr, $a);
    }
    return $arr;
}

$n = 0;
$ve = "0";
$arr = [];
$kq = "";
if(isset($_POST["submit"])){
    $submit = $_POST["submit"];
    if($submit == "create"){
        $n = $_POST["n"];
        $arr = TaoMang($n);
        $_SESSION["n"] = $n;
        $_SESSION["arr"] = $arr;
    }
    if($submit == "check"){
        if(isset($_SESSION["n"])){
            $arr = $_SESSION["arr"];
            $n = $_SESSION["n"];
            $ve = $_POST["arr"];
            $temp = explode(",", $ve);
            if($arr==$temp){
                $kq = "Bạn đã trúng thưởng";
            }
            else
                $kq = "Bạn đã trúng gió";
        }
    }
}
if(isset($_POST["submit"]) && $_POST["submit"]=="reset"){
    session_destroy();
    $n = 0;
    $ve = "0";
    $arr = [];
}
?>
<html>
<head>
    <title>Kết Quả xổ số</title>
</head>
<body>
<form action="kqxs.php" method="post">
    <h2>KẾT QUẢ XỔ SỐ VIETLOT</h2>
    <table>
        <tr>
            <td>Nhập vào số cặp số: </td>
            <td><input type="number" name="n" value="<?php echo $n?>" required min="0" max="10"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="submit" value="create">Tạo KQ xổ số</button> </td>
        </tr>
        <tr>
            <td>Kết quả: </td>
            <td><b><?php echo implode(' ', $arr)?></b></td>
        </tr>
        <tr>
            <td>Nhập vào vé: </td>
            <td><input type="text" name="arr" value="<?php echo $ve?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="submit" value="check">Xem kết quả</button>
                <button type="submit" name="submit" value="reset">reset</button>
            </td>
        </tr>
        <tr>
            <td>Kết quả: </td>
            <td><b><?php echo $kq?></b></td>
        </tr>
    </table>
</form>
</body>
</html>
