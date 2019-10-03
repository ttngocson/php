<?php
    $dt = 0;
    $cv = 0;
    if(!isset($_POST["bk"]))
        $bk = 0;
    if(isset($_POST["submit"])){
        $bk = $_POST["bk"];
        $dt = pi()*pow($bk,2);
        $cv = pi()*2*$bk;
    }
?>
<html>
    <head>
        <title>Bài tập 2</title>
        <style type="text/css">
            form{
                margin: 0px;
                text-align: center;
                width: 20%;
                left: 40%;
                position: absolute;
            }
        </style>
    </head>
    <body style="background-color: #fff4d4">
        <form action="bt2.php" method="post">
            <h2 style="background-color: #ffd56c">DIỆN TÍCH và CHU VI HÌNH TRÒN</h2>
            <table>
                <tr>
                    <td width="100">Bán kính: </td>
                    <td><input type="number" name="bk" required value="<?php echo $bk?>"></td>
                </tr>
                <tr>
                    <td>Diện tích: </td>
                    <td><input type="text" style="background-color: #ffd4d7" disabled="disabled" value="<?php echo $dt?>"></td>
                </tr>
                <tr>
                    <td>Chu vi: </td>
                    <td><input type="text" style="background-color: #ffd4d7" disabled="disabled" value="<?php echo $cv?>"></td>
                </tr>
            </table>
            <button type="submit" name="submit">Tính</button>
        </form>
    </body>
</html>
