<?php
$n = 0;
$m = 0;
$matrix = [];
if(isset($_POST["submit"])){
    $n = $_POST["n"];
    $m = $_POST["m"];
    for($i = 0; $i < $m; $i++){
        $arr = [];
        for($j = 0; $j < $n; $j++)
            array_push($arr, rand(0,20));
        array_push($matrix, $arr);
    }
}
?>
<html>
<head></head>
<body>
<form action="bt.php" method="post">
    <table>
        <tr>
            <td>Nhập m:</td>
            <td><input type="number" name="m" value="<?php echo $m?>" required min="0"></td>
        </tr>
        <tr>
            <td>Nhập n:</td>
            <td><input type="number" name="n" value="<?php echo $n?>" required min="0"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="submit">Tạo ma trận</button> </td>
        </tr>
    </table>
    <textarea cols="30" rows="5"><?php print_r($matrix)?></textarea>
</form>
</body>
</html>
