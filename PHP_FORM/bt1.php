<?php
$dt = 0;

    if(!isset($cd))
        $cd = 0;
    if(!isset($cr))
        $cr = 0;
    if(isset($_POST["submit"])){
        $cr = $_POST["cr"];
        $cd = $_POST["cd"];
        $dt = $cd*$cr;
    }
?>
<html>
    <head>
        <title>Bài tập 1</title>
        <style type="text/css">
            form{
                margin: 0px;
                text-align: center;
                left: 10%;
                position: absolute;
            }
        </style>
    </head>
    <body STYLE="background-color: #fff4d4;">
    <form action="bt1.php" method="post">
        <h3 style="background-color: #ffd56c">DIỆN TÍCH HÌNH CHỮ NHẬT</h3>
        <table>
            <tr>
                <td width="100">Chiều dài: </td>
                <td><input type="number" name="cd" required value="<?php echo $cd?>"></td>
            </tr>
            <tr>
                <td>Chiều rộng: </td>
                <td><input type="number" name="cr" required value="<?php echo $cr?>"></td>
            </tr>
            <tr>
                <td>Diện tích: </td>
                <td><input type="text" style="background-color: #ffd4d7" disabled="disabled" value="<?php echo $dt?>"></td>
            </tr>
        </table>
        <button  type="submit" name="submit">Tính</button>
    </form>
    </body>
</html>
