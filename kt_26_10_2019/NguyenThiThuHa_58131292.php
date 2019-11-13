<?php
//session_start();
static $DS = [];
$thieunhi = array();
$cotich = array();
$trinhtham = array();
$ngontinh = array();
//if(isset($_SESSION["DS"]))
//    $DS = $_SESSION["DS"];
function Xuat($DS){
    if(count($DS) > 0){
        echo "
        <table border='1'>
            <tr>
                <th>Mã Truyện</th>
                <th>Tên Truyện</th>
            </tr>";
        foreach ($DS as $item){
            echo "<tr>";
            echo "<td>$item[0]</td>";
            echo "<td>$item[1]</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
function add($maTruyen, $tenTruyen, $theLoai){
    global $DS;
    $check = false;
    foreach ($DS as $item){
        if($item[0]==$maTruyen)
            $check = true;
    }
    if($check == true)
        echo "<script>alert('Truyện đã tồn tại')</script>";
    else {
        array_push($DS, array($maTruyen, $tenTruyen, $theLoai));
        echo "<script>alert('Thêm truyện thành công')</script>";
    }
}
if(isset($_POST["submit"])){
    $maTruyen = $_POST["matruyen"];
    $tenTruyen = $_POST["tentruyen"];
    $theLoai = $_POST["theloai"];
    add($maTruyen, $tenTruyen, $theLoai);
    //$_SESSION["DS"] = $DS;
}
if(count($DS) > 0){
    foreach ($DS as $item){
        if($item[2] == "Truyện tranh thiếu nhi")
            array_push($thieunhi, $item);
        if($item[2] == "Truyện cổ tích")
            array_push($cotich, $item);
        if($item[2] == "Truyện trinh thám")
            array_push($trinhtham, $item);
        if($item[2] == "Truyện ngôn tình")
            array_push($ngontinh, $item);
    }
}
?>
<html>
<head>
    <title>Bài kiểm tra</title>
    <style>
        #container{
            width: fit-content;
            left: 30%;
            position: absolute;
            border: 1px solid;
        }
    </style>
</head>
<body>
<div id="container">
<form action="" method="post">
    <h1 align="center">Truyện tranh</h1>
    <table>
        <tr>
            <td>Mã truyện: </td>
            <td><input type="text" name="matruyen" required></td>
        </tr>
        <tr>
            <td>Tên truyện: </td>
            <td><input type="text" name="tentruyen" required></td>
        </tr>
        <tr>
            <td>Thể loại: </td>
            <td>
                <select name="theloai">
                    <option value="Truyện tranh thiếu nhi">Truyện tranh thiếu nhi</option>
                    <option value="Truyện cổ tích">Truyện cổ tích</option>
                    <option value="Truyện trinh thám">Truyện trinh thám</option>
                    <option value="Truyện ngôn tình">Truyện ngôn tình</option>
                </select>
            </td>
        </tr>
        <tr align="center">
            <td colspan="2"><button type="submit" name="submit">Thêm truyện</button></td>
        </tr>
    </table>
</form>
    <fieldset>
        <legend>Truyện tranh thiếu nhi</legend>
        <?php
        Xuat($thieunhi);
        ?>
    </fieldset>
    <fieldset>
        <legend>Truyện cổ tích</legend>
        <?php
        Xuat($cotich);
        ?>
    </fieldset>
    <fieldset>
        <legend>Truyện trinh thám</legend>
        <?php
        Xuat($trinhtham);
        ?>
    </fieldset>
    <fieldset>
        <legend>Truyện ngôn tình</legend>
        <?php
        Xuat($ngontinh);
        ?>
    </fieldset>
</div>
</body>
</html>
