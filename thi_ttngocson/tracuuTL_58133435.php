<?php
require("connect_ngocson.php");
mysqli_set_charset($conn, 'UTF8');
?>
<html>
<head>
    <style>
        fieldset{
            width: fit-content;
        }
        .container{
            margin: 2% 10%;
        }
    </style>
</head>
<body class="container">
<form style="font-size: larger" action="" method="post">
    <h2>TRA CỨU THÔNG TIN TÀI LIỆU THAM KHẢO</h2>
    <fieldset>
        <legend>Điền thông tin tra cứu</legend>
        Chọn tên thể loại:
        <select name="theloai">
            <?php
            $sql = "SELECT * FROM `theloai`";
            $rows = mysqli_query($conn, $sql);
            $theloai = "";
            if(isset($_POST["theloai"]))
                $theloai = $_POST["theloai"];
            while ($row = mysqli_fetch_array($rows)){
                $str = "";
                $str = $str ."<option value='".$row['TENLOAI'] ."'";
                $theloai==$row['TENLOAI']?$str = $str ."selected":"";
                $str = $str .">" .$row['TENLOAI']."</option>";
                echo "$str";
            }
            ?>
        </select>
        <button type="submit" name="submit">Tìm kiếm</button>
    </fieldset>
</form>
<div>

    <?php
    if(isset($_POST["submit"])){
        $sql = "SELECT tailieu.*, tacgia.HOTEN
                    FROM tailieu 
                    JOIN tacgia on tailieu.MATACGIA = tacgia.MATACGIA
                    JOIN theloai on tailieu.MALOAI = theloai.MALOAI
                    WHERE theloai.TENLOAI='" .$_POST["theloai"] ."'";
        $rows = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($rows);
        if($count==0)
            echo "<h2>Thể loại " .$_POST["theloai"] ." chưa có tài liệu nào</h2>";
        else{
            $temp = mb_strtoupper($_POST["theloai"]);
            mb_strtoupper($temp);
            echo "<h2>DANH MỤC TÀI LIỆU THEO THỂ LOẠI $temp</h2>";
            echo "<table border='1' width='500'>
                    <tr align='center'>
                        <td colspan='2'><b>Tổng số tài liệu: $count</b></td>
                    </tr>
                    <tr>
                        <th>STT</th>
                        <th>Thông tin tài liệu</th>
                    </tr>";
            $index = 0;
            $path = "Hinh_truyen/";
            while ($row = mysqli_fetch_array($rows)){
                $index++;
                echo "<tr>";
                    echo "<td>$index</td>";
                    echo "<td>
                                <table>
                                    <tr>
                                        <td><img src='" .$path .$row['ANHBIA'] ."' width='146' height='216'></td>
                                        <td>
                                            <p>Mã tài liệu: " .$row['MATAILIEU'] ."</p>
                                            <p>Tên tài liệu: " .$row['TENTAILIEU'] ."</p>
                                            <p>Số trang: " .$row['SOTRANG'] ."</p>
                                            <p>ND tóm tắt: " .$row['NDTOMTAT'] ."</p>
                                            <p>Tên tác giả: " .$row['HOTEN'] ."</p>
                                            <p><a href='suaTL_58133435.php?matl=" .$row['MATAILIEU'] ."'>Sửa</a></p>
                                        </td>
                                    </tr>
                                </table>
                            </td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>
</div>
</body>
</html>