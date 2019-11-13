<?php
$namdl = 2019;
$namal = "";
$canArr = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
$chiArr = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
$hinhArr = array("heo.jpg", "chuot.jpg", "trau.jpg", "ho.jpg", "meo.jpg", "rong.jpg", "ran.jpg", "ngua.jpg", "de.jpg", "khi.jpg", "ga.jpg", "cho.jpg");
$src = "";

$namdl = $namdl - 3;
$can = $namdl%10;
$chi = $namdl%12;
$namal = $canArr[$can] ." " .$chiArr[$chi];
$src = "bt7images/" .$hinhArr[$chi];
$namdl = $namdl + 3;
if(isset($_POST["submit"])){
    $namdl = $_POST["namdl"];
    $namdl = $namdl - 3;
    $can = $namdl%10;
    $chi = $namdl%12;
    $namal = $canArr[$can] ." " .$chiArr[$chi];
    $src = "bt7images/" .$hinhArr[$chi];
    $namdl = $namdl + 3;
}

?>
<html>
<head>
    <title>Bài tập 7</title>
    <style type="text/css">
        form{
            background-color: #ccd9cf;
            text-align: center;
            margin-top: 5%;
            left: 10%;
            position: absolute;
        }
        h2{
            background-color: #2d9498;
            color: white;
            margin: 0px;
            padding: 10px 0px;
        }
        table{
            text-align: center;
        }
        img{
            width: 206px;
            height: 242px;
        }
    </style>
</head>
<body>
<form action="bt7.php" method="post">
    <h2>TÍNH NĂM ÂM LỊCH</h2>
    <table>
        <tr>
            <td>Năm dương lịch</td>
            <td></td>
            <td>Năm âm lịch</td>
        </tr>
        <tr>
            <td><input type="number" name="namdl" min="0" value="<?php echo $namdl ?>" required></td>
            <td><button type="submit" name="submit">=></button></td>
            <td><input type="text" disabled="disabled" value="<?php echo $namal ?>" required></td>
        </tr>
    </table>
    <img src="<?php echo $src?>">
</form>
</body>
</html>
