<?php
require("connect_qlbansua.php");
mysqli_set_charset($conn, 'UTF8');
if(isset($_POST["submit"])){
    $id = $_POST["id"];
    $ten = $_POST["name"];
    $phai = "1";
    if($_POST["phai"] =="nam")
        $phai = "0";
    $diaChi = $_POST["diachi"];
    $dienThoai = $_POST["dienthoai"];
    $email = $_POST["email"];
    $sql = "DELETE FROM `khach_hang` WHERE `Ma_khach_hang` = '$id'";
    if(mysqli_query($conn,$sql) === true){
        echo "<script>alert('Xóa thành công')</script>";
        echo "<script>window.location.replace('bai2_12_index.php')</script>";
    }
    else{
        echo "<script>alert('Xóa không thành công')</script>";
    }

}
?>
<html>
<head>
    <title>Bài 2.12 chỉnh sửa khách hàng</title>
    <style>
        table{
            background-color: #feebca;
        }
        h2{
            margin: 0;
            color: #d25f10;
            background-color: #fdcb65;
        }
        .width90{
            width: 90%;
        }
    </style>
</head>
<body>
<div align="center">
    <?php
    if(!isset($_GET["id"]))
        echo "Không tìm thấy trang";
    else{

        $sql = "SELECT * FROM `khach_hang`
            WHERE Ma_khach_hang = '" .$_GET["id"] ."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==0){
            echo "Không tìm thấy khách hàng";
        }
        else{
            $row = mysqli_fetch_array($result);
            $nam = "";
            $nu = "";
            if($row['Phai'] == "1"){
                $nam = " checked";
                $nu = "";
            }
            else{
                $nam = "";
                $nu = " checked";
            }
            echo "<form action='' method='post'>
                <table>
                    <tr align='center'>
                        <td colspan='2'><h2>CẬP NHẬT THÔNG TIN KHÁCH HÀNG</h2></td>
                    </tr>
                    <tr>
                        <td>Mã khách hàng: </td>
                        <td>
                            <input type='hidden' name='id' value='".$row['Ma_khach_hang'] ."'>
                            <input type='text' disabled='disabled' value='".$row['Ma_khach_hang'] ."'>
                        </td>
                    </tr>
                    <tr>
                        <td>Tên khách hàng: </td>
                        <td><input type='text' class='width90' disabled='disabled' name='name' value='".$row['Ten_khach_hang'] ."'></td>
                    </tr>
                    <tr>
                        <td>Phái: </td>
                        <td><input type='radio' name='phai'$nam disabled='disabled' value='nam'>Nam &nbsp;<input type='radio' name='phai'$nu disabled='disabled' value='nu'>Nữ</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ: </td>
                        <td><input type='text' class='width90' name='diachi' disabled='disabled'  value='".$row['Dia_chi'] ."'></td>
                    </tr>
                    <tr>
                        <td>Điện thoại: </td>
                        <td><input type='text' name='dienthoai' disabled='disabled' value='".$row['Dien_thoai'] ."'></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input type='text' class='width90' name='email' disabled='disabled' value='".$row['Email'] ."'></td>
                    </tr>
                    <tr style='background-color: #fee2a8'>
                        <td align='right'><a href='javascript:window.history.back(-1);'>Quay trở về</a></td>
                        <td><button type='submit' name='submit'>Xóa</button></td>
                    </tr>
                </table>
            </form>";
        }
    }
    ?>

</div>
</body>
</html>
