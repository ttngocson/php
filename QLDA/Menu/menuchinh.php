<html>
<body>
<nav class="navbar navbar-expand navbar-blue bg-dark ">
    <a class="navbar-brand" href="index.php"><img src="Admin/img/image.png" width="100" height="20"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbars">
        <ul class="navbar-nav mr-auto">
            <?php
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $sql = "SELECT * FROM loaisanpham";
            $result=mysqli_query($conn,$sql);
            while ($rows=mysqli_fetch_array($result))
            {
                $link ="?chucnang=hien_thi_theo_loaisp&maloaisp=".$rows['IDLoaiSP'];
                //echo "<a href=".$link.">".$rows['TenLoai']."</a> <br>";
                echo "<li class=\"nav-item\">";
                echo "<a class='nav-link' href=".$link.">".$rows['TenLoai']."</a>";
                echo "</li>";
            }
            ?>
            <?php include('XuLy/timkiem.php')?>
            &nbsp;<?php include('HienThi/thongtingiohang.php') ?>
        </ul>
        <div class="form-inline my-2 my-md-0">
            <?php
            if(isset($_SESSION['username'])){
                echo "<a style='font-size: larger' href='?chucnang=ca_nhan'>Xin chào " .$_SESSION['username'] ."</a>&nbsp;";
                echo "<a style='font-size: larger' href='XuLy/logout.php'>Đăng xuất</a>";
            }
            else
                echo "<a href='' style='font-size: larger' data-toggle='modal' data-target='#login'>Đăng nhập</a>&nbsp;
                            <a href='' style='font-size: larger' data-toggle='modal' data-target='#register'>Đăng ký</a>";
            ?>
            <!-- Modal Login -->
            <div class="modal fade" id="login">
                <form action="XuLy/login.php" method="post">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Đăng nhập</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body" align="center">
                            <label for="inputEmail" class="sr-only">Tên đăng nhập</label>
                            <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Tài khoản" required autofocus>
                            <br>
                            <label for="inputPassword" class="sr-only">Mật khẩu</label>
                            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mật khẩu" required>
                            <br>
                            <input type="checkbox" value="remember-me"> Remember me
                            <br>
                            <a href='' style='font-size: larger' data-toggle='modal' data-dismiss="modal" data-target='#register'>Đăng ký</a>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input type="hidden" name="url_back" value="<?php echo $actual_link ?>">
                            <button type="submit" name="btn_submit" class="btn btn-primary">Đăng nhập</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>

            <!-- Modal Register -->
            <div class="modal fade" id="register">
                <form action="XuLy/dangky.php" method="post">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Đăng ký</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body" align="center">
                            <input type='hidden' name='thong_tin_khach_hang' value='co' >
                            <table>
                                <tr>
                                    <td colspan='2' height='30px' align="center" >
                                        <h3>Thông tin người dùng</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tên tài khoản: </td>
                                    <td><input type='text' name='tentk' class="form-control" placeholder='Tên tài khoản' required></td>
                                </tr>
                                <tr>
                                    <td width='180px' >Mật khẩu: </td>
                                    <td>
                                        <input type='password' name='matkhau' class="form-control" value='' placeholder='Mật khẩu' required>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='180px' >Nhập lại mật khẩu: </td>
                                    <td>
                                        <input type='password' name='matkhaure' class="form-control" value='' placeholder='Nhập lại mật khẩu' required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Họ: </td>
                                    <td>
                                        <input type='text' name='ho' class="form-control" placeholder='Họ' required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tên : </td>
                                    <td>
                                        <input type='text' name='ten' class="form-control" placeholder='Tên' required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Điện thoại : </td>
                                    <td>
                                        <input type='text' name='sdt' class="form-control" placeholder='036xxxxxx' required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Giới tính:</td>
                                    <td class="form-control">
                                        <input type='radio' name='gioitinh' value='1' checked> Nam
                                        <input type='radio' name='gioitinh' value='0'> Nữ
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email: </td>
                                    <td>
                                        <input type='email' name='email' class="form-control" placeholder='example@mail.com' required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ: </td>
                                    <td>
                                        <input type='text' name='diachi' class="form-control" placeholder='Địa chỉ' required>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" name="dangky" class="btn btn-primary">Đăng ký</button>
                            <button type="reset" class="btn btn-secondary">Nhập lại</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</nav>
</body>
</html>
