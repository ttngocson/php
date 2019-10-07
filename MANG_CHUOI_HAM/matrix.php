<?php
$n = 2;
$m = 2;
$matrix = [];
if(isset($_POST["submit"])){
    $n = (int)$_POST["n"];
    $m = (int)$_POST["m"];
    if($m > 10 || $n > 10 || $m < 2 || $m < 2){
        echo "<script>alert('Nhập lại dữ liệu')</script>";
    }
    else{
        for($i = 0; $i < $m; $i++){
            $arr = [];
            for($j = 0; $j < $n; $j++)
                array_push($arr, rand(-100,100));
            array_push($matrix, $arr);
        }
    }
}
?>
<html>
<head>
    <title>Mảng 2 chiều</title>
    <style>
        form {
            background-color: #ccd9cf;
            text-align: center;
            margin-top: 5%;
            left: 35%;
            min-width: 30%;
            position: absolute;
        }
        input{
            width: 150px;
        }
        h2{
            background-color: #2d9498;
            color: white;
            margin: 0px;
            padding: 10px 0px;
        }
        p{
            background-color: #79d0cb;
            margin-bottom: 0;
            padding: 5px;
        }
        span{
            color: red;
        }
    </style>
</head>
<body>
<form action="matrix.php" method="post">
    <h2>MẢNG HAI CHIỀU</h2>
    <table align="center">
        <tr>
            <td style="width: 80px">Nhập m:</td>
            <td><input type="number" name="m" value="<?php echo $m?>" required min="2" max="10"><span>(*)</span></td>
        </tr>
        <tr>
            <td>Nhập n:</td>
            <td><input type="number" name="n" value="<?php echo $n?>" required min="2" max="10"><span>(*)</span></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="submit">Tạo ma trận</button> </td>
        </tr>
    </table>
    <table border="1" align="center">
        <?php
        for($i = 0; $i < $m; $i++){
            echo "<tr>";
            for ($j = 0; $j < $n; $j++){
                echo "<td>";
                echo $matrix[$i][$j];
                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <p><span>(*)</span> Nhập trong khoảng từ 2 đến 10</p>
</form>
</body>
</html>
