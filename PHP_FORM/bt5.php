<?php
    $start = 10;
    $stop = 24;
    $tien = 0;
    if(isset($_POST["submit"])){
        $start = $_POST["start"];
        $stop = $_POST["stop"];
        if($start>=$stop)
            echo "<script>alert(' Giờ kết thúc phải > Giờ bắt đầu')</script>";
        else{
            if($start < 17 && $stop < 17)
                $tien = ($stop-$start)*20000;
            else if($start > 17 && $stop > 17)
                $tien = ($stop-$start)*45000;
            else
                $tien = (17 - $start)*20000 + ($stop - 17)*45000;
        }
    }
?>
<html>
    <head>
        <title>Bài tập 5</title>
        <style type="text/css">
            form{
                background-color: #05aeb3;
                margin: 0px;
                text-align: center;
                width: 25%;
                left: 40%;
                position: absolute;
            }
            h3{
                background-color: #008b8e;
                margin: 0px;
                padding: 5px 0px;
            }
            body{
                background-color: #05aeb3;
            }
        </style>
    </head>
    <body>
        <form action="bt5.php" method="post">
            <h3>TÍNH TIỀN KARAOKE</h3>
            <table>
                <tr>
                    <td>Giờ bắt đầu:</td>
                    <td><input type="number" name="start" value="<?php echo $start?>" min="10" required> (h)</td>
                </tr>
                <tr>
                    <td>Giờ kết thúc:</td>
                    <td><input type="number" name="stop" value="<?php echo $stop?>" max="24" required> (h)</td>
                </tr>
                <tr>
                    <td>Tiền thanh toán: </td>
                    <td><input type="number" style="background-color: #fffaae" value="<?php echo $tien?>" disabled="disabled"> (VNĐ)</td>
                </tr>
            </table>
            <button type="submit" name="submit">Tính tiền</button>
        </form>
    </body>
</html>
