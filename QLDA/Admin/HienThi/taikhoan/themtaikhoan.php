<?php
    $tentk = isset($_POST['tentk']) ? trim($_POST['tentk'] ): '';
    $matkhau = isset($_POST['matkhau']) ? trim($_POST['matkhau']) : '';
    $matkhaure = isset($_POST['matkhaure']) ? trim($_POST['matkhaure']) : '';
    $ho = isset($_POST['ho']) ? trim($_POST['ho']) : '';
    $ten = isset($_POST['ten']) ? trim($_POST['ten']) : '';
    $sdt = isset($_POST['sdt']) ? trim($_POST['sdt']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $diachi = isset($_POST['diachi']) ? trim($_POST['diachi']) : '';
    $gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : 1;
?>
<br>  
<br>  
<form method='post' action='' >  
    <input type='hidden' name='thong_tin_khach_hang' value='co' >   
    <table>  
        <tr>  
            <td colspan='2' height='30px' >  
                <b>Thông tin người dùng</b>  
            </td>  
        </tr>  
        <tr>  
            <td height='40px' >Tên tài khoản: </td>  
            <td><input type='text' name='tentk' value='<?php echo $tentk ?>' placeholder='Tên tài khoản' required></td>  
        </tr>  
        <tr>  
            <td width='180px' >Mật khẩu: </td>  
            <td>  
                <input type='password' name='matkhau' value='' placeholder='Mật khẩu' required>  
            </td>  
        </tr>  
        <tr>  
            <td width='180px' >Nhập lại mật khẩu: </td>  
            <td>  
                <input type='password' name='matkhaure' value='' placeholder='Nhập lại mật khẩu' required>  
            </td>  
        </tr>
        <tr>  
            <td width='180px' >Nhóm tài khoản: </td>  
            <td>  
                <select name="nhomtk">
                <?php
                $result = mysqli_query($conn,"SELECT * FROM nhomtaikhoan WHERE IDNhomTK >= '".$_SESSION['NhomTK']."'");
                if(mysqli_num_rows($result) > 0)
                {
                   while($row = mysqli_fetch_array($result))
                   {
                       $idnhom = $row['IDNhomTK'];
                       $tennhom = $row['TenNhom'];
                       echo '<option value="'.$idnhom.'"';
                       if((isset($_REQUEST['nhomtk']) && ($_REQUEST['nhomtk']==$idnhom)))
                       {
                            echo 'selected="selected"';
                       } 
                       echo ">".$tennhom."</option>";
                   } 
                }
                mysqli_free_result($result);
                ?>
            </select>  
            </td>  
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td>
                <input type="radio" name="trangthai" <?php if(isset($gioitinh) && $gioitinh == 1) echo "checked";?> value='1' checked>Hoạt động
                <input type="radio" name="trangthai" <?php if(isset($gioitinh) && $gioitinh == 0) echo "checked";?> value='0'>Khóa
            </td>
        </tr>
        <tr>
            <td colspan="2">Thông tin người dùng đi kèm</td>
        </tr>    
        <tr>  
            <td>Họ: </td>  
            <td>  
                <input type='text' name='ho' value='<?php echo $ho ?>' placeholder='Họ' required>  
            </td>  
        </tr>  
        <tr>  
            <td>Tên : </td>                    
            <td>  
                <input type='text' name='ten' value='<?php echo $ten ?>' placeholder='Tên' required>  
            </td>  
        </tr>  
        <tr>  
            <td>Điện thoại : </td>  
            <td>  
                <input type='text' name='sdt' value='<?php echo $sdt ?>' placeholder='036xxxxxx' required>  
            </td>  
        </tr>  
        <tr>  
            <td>Giới tính:</td>  
            <td>  
                <input type='radio' name='gioitinh' value='1' <?php if (isset($gioitinh) && $gioitinh=="1") echo "checked"; ?> checked> Nam  
                <input type='radio' name='gioitinh' <?php if (isset($gioitinh) && $gioitinh=="0") echo "checked"; ?> value='0'> Nữ  
            </td>  
        </tr>  
        <tr>  
            <td>Email: </td>  
            <td>  
                <input type='email' name='email' value='<?php echo $email ?>' placeholder='example@mail.com' required>  
            </td>  
        </tr>  
        <tr>  
            <td>Địa chỉ: </td>  
            <td>  
                <input type='text' name='diachi' value='<?php echo $diachi ?>' placeholder='Địa chỉ' required>  
            </td>  
        </tr>  
        <tr>  
            <td><input type='submit' name="them_tai_khoan" value='Tạo tài khoản' > </td>  
            <td>  
                <input type="reset" value="Hủy">
            </td>  
        </tr>  
    </table>  
</form>