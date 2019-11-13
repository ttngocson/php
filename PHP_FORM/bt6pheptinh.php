<?php
?>
<html>
<head>
    <title>Bài tập 6</title>
    <link rel="stylesheet" type="text/css" href="bt6.css">
</head>
<body>
    <form action="bt6ketqua.php" method="post">
        <h3>Thực hiện phép toán cơ bản</h3>
        <table>
            <tr>
                <td style="color: #a20b00" align="right"><b>Chọn phép tính: </b></td>
                <td style="color: red">
                    <input type="radio" checked name="pt" value="+" />Cộng
                    <input type="radio" name="pt" value="-" />Trừ
                    <input type="radio" name="pt" value="*" />Nhân
                    <input type="radio" name="pt" value="/" />Chia
                </td>
            </tr>
            <tr>
                <td align="right"><b>Số thứ nhất:</b></td>
                <td><input type="number" style="width: 215px" step="any" name="a" required/></td>
            </tr>
            <tr>
                <td align="right"><b>Số thứ hai:</b></td>
                <td><input type="number" style="width: 215px" step="any" name="b" required/></td>
            </tr>
            <tr>
                <td align="right"></td>
                <td><input type="submit" name="submit" value="Tính" /></td>
            </tr>
        </table>
    </form>
</body>
</html>
