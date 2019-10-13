<?php
abstract class NhanVien{
    private $hoTen, $gioiTinh, $ngaySinh, $ngayVaoLam, $heSoLuong, $soCon;
    const luongCoBan = 2000;

    /**
     * @return mixed
     */
    public function getGioiTinh()
    {
        return $this->gioiTinh;
    }

    /**
     * @return mixed
     */
    public function getHeSoLuong()
    {
        return $this->heSoLuong;
    }

    /**
     * @return mixed
     */
    public function getHoTen()
    {
        return $this->hoTen;
    }

    /**
     * @return mixed
     */
    public function getNgaySinh()
    {
        return $this->ngaySinh;
    }

    /**
     * @param mixed $ngaySinh
     */
    public function setNgaySinh($ngaySinh)
    {
        $this->ngaySinh = $ngaySinh;
    }

    /**
     * @return mixed
     */
    public function getNgayVaoLam()
    {
        return $this->ngayVaoLam;
    }

    /**
     * @return mixed
     */
    public function getSoCon()
    {
        return $this->soCon;
    }

    /**
     * @param mixed $gioiTinh
     */
    public function setGioiTinh($gioiTinh)
    {
        $this->gioiTinh = $gioiTinh;
    }

    /**
     * @param mixed $heSoLuong
     */
    public function setHeSoLuong($heSoLuong)
    {
        $this->heSoLuong = $heSoLuong;
    }

    /**
     * @param mixed $hoTen
     */
    public function setHoTen($hoTen)
    {
        $this->hoTen = $hoTen;
    }

    /**
     * @param mixed $ngayVaoLam
     */
    public function setNgayVaoLam($ngayVaoLam)
    {
        $this->ngayVaoLam = $ngayVaoLam;
    }

    /**
     * @param mixed $soCon
     */
    public function setSoCon($soCon)
    {
        $this->soCon = $soCon;
    }
    public function TinhTienThuong(){
        return (date("Y") - explode("/", $this->ngayVaoLam)[2])*1000;
    }
}
class NhanVienVP extends NhanVien {
    private $soNgayVang;
    const dinhMucVang = 3;
    const donGiaPhat = 200;

    /**
     * NhanVienVP constructor.
     */
    public function __construct(){}

    /**
     * @param mixed $soNgayVang
     */
    public function setSoNgayVang($soNgayVang)
    {
        $this->soNgayVang = $soNgayVang;
    }

    /**
     * @return mixed
     */
    public function getSoNgayVang()
    {
        return $this->soNgayVang;
    }

    public function TinhTienPhat(){
        if($this->soNgayVang - self::dinhMucVang <= 0)
            return 0;
        else{
            return ($this->soNgayVang - self::dinhMucVang)*self::donGiaPhat;
        }
    }
    public function TinhTroCap(){
        if($this->getGioiTinh()=="Nữ")
            return 200*1.5*$this->getSoCon();
        else
            return 200*$this->getSoCon();
    }
    public function TinhTienLuong(){
        return self::luongCoBan * $this->getHeSoLuong() - $this->TinhTienPhat();
    }
}
class NhanVienSX extends NhanVien {
    private $soSanPham;
    const dinhMucSanPham = 200;
    const donGiaSanPham = 20;

    /**
     * NhanVienSX constructor.
     */
    public function __construct(){}

    /**
     * @param mixed $soSanPham
     */
    public function setSoSanPham($soSanPham)
    {
        $this->soSanPham = $soSanPham;
    }

    /**
     * @return mixed
     */
    public function getSoSanPham()
    {
        return $this->soSanPham;
    }
    public function TinhTienThuong(){
        if($this->soSanPham > self::dinhMucSanPham)
            return ($this->soSanPham - self::dinhMucSanPham) * self::donGiaSanPham * 0.03;
        return 0;
    }
    public function TinhTroCap(){
        return $this->getSoCon()*120;
    }
    public function TinhTienLuong(){
        return $this->soSanPham*self::donGiaSanPham + $this->TinhTienThuong();
    }
}

$hoTen = "";
$soCon = 0;
$ngaySinh = "";
$ngayVaoLam = "";
$gioiTinh = "Nam";
$heSoLuong = 0;
$loaiNhanVien = "VP";
$soNgayVang = 0;
$soSanPham = 0;

$tienLuong = 0;
$troCap = 0;
$tienThuong = 0;
$tienPhat = 0;
$thucLinh = 0;

if(isset($_POST["submit"])){
    $hoTen = $_POST["hoten"];
    $soCon = $_POST["socon"];
    $ngaySinh = $_POST["ngaysinh"];
    $ngayVaoLam = $_POST["ngayvaolam"];
    $gioiTinh = $_POST["gioitinh"];
    $heSoLuong = $_POST["hesoluong"];
    $loaiNhanVien = $_POST["loainhanvien"];
    if($_POST["loainhanvien"] == "VP"){
        $soNgayVang = $_POST["songayvang"];
        $NV = new NhanVienVP();
        $NV->setHoTen($hoTen);
        $NV->setSoCon($soCon);
        $NV->setNgaySinh($ngaySinh);
        $NV->setNgayVaoLam($ngayVaoLam);
        $NV->setGioiTinh($gioiTinh);
        $NV->setHeSoLuong($heSoLuong);
        $NV->setSoNgayVang($soNgayVang);
        $tienLuong = $NV->TinhTienLuong();
        $troCap = $NV->TinhTroCap();
        $tienThuong = $NV->TinhTienThuong();
        $tienPhat = $NV->TinhTienPhat();
        $thucLinh = $tienLuong + $troCap + $tienThuong;
    }
    if($_POST["loainhanvien"] == "SX"){
        $NV = new NhanVienSX();
        $soSanPham = $_POST["sosanpham"];
        $NV->setHoTen($hoTen);
        $NV->setSoCon($soCon);
        $NV->setNgaySinh($ngaySinh);
        $NV->setNgayVaoLam($ngayVaoLam);
        $NV->setGioiTinh($gioiTinh);
        $NV->setHeSoLuong($heSoLuong);
        $NV->setSoSanPham($soSanPham);
        $tienLuong = $NV->TinhTienLuong();
        $troCap = $NV->TinhTroCap();
        $tienThuong = $NV->TinhTienThuong();
        //$tienPhat = $NV->TinhTienPhat();
        $thucLinh = $tienLuong + $troCap + $tienThuong;
        echo $NV->getSoSanPham();
    }
}
?>
<html>
<head>
    <title>Quản lý nhân viên</title>
    <style>
        form {
            background-color: #ccd9cf;
            text-align: center;
            margin-top: 5%;
            left: 25%;
            min-width: 30%;
            position: absolute;
            border-width: 5px;
            border-style: solid;
            border-radius: 5px;
            border-color: #a7bdc7;
            box-shadow: 5px 4px 0px 2px #a7bdc7;
        }
        h2{
            background-color: #2d9498;
            color: white;
            margin: 0px;
            padding: 10px 0px;
        }
        tr{
            background-color:#ffffcc ;
        }
        table{
            margin: 10px;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <h2>QUẢN LÝ NHÂN VIÊN</h2>
    <table>
        <tr>
            <td>Họ và tên: </td>
            <td style="width: 300px"><input type="text" name="hoten" style="width: 90%" value="<?php echo $hoTen?>" required></td>
            <td style="width: 123px">Số con: </td>
            <td><input type="number" name="socon" style="width: 60%" value="<?php echo $soCon?>" required min="0"></td>
        </tr>
        <tr>
            <td>Ngày sinh: </td>
            <td><input type="text" name="ngaysinh" value="<?php echo $ngaySinh?>" required></td>
            <td>Ngày vào làm: </td>
            <td><input type="text" name="ngayvaolam" value="<?php echo $ngayVaoLam?>" required></td>
        </tr>
        <tr>
            <td>Giới tính: </td>
            <td>
                <input type="radio" name="gioitinh" value="Nam" <?php if($gioiTinh == "Nam") echo "checked"?>>Nam&nbsp;
                <input type="radio" name="gioitinh" value="Nữ" <?php if($gioiTinh != "Nam") echo "checked"?>>Nữ
            </td>
            <td>Hệ số lương: </td>
            <td><input type="number" name="hesoluong" style="width: 60%" step="any" value="<?php echo $heSoLuong?>" required></td>
        </tr>
        <tr>
            <td>Loại nhân viên: </td>
            <td><input type="radio" name="loainhanvien" value="VP" <?php if($loaiNhanVien == "VP") echo "checked"?>>Văn phòng</td>
            <td colspan="2"><input type="radio" name="loainhanvien" value="SX" <?php if($loaiNhanVien != "VP") echo "checked"?>>Sản xuất</td>
        </tr>
        <tr>
            <td></td>
            <td>Số ngày vắng: <input type="number" name="songayvang" style="width: 35%" min="0" value="<?php echo $soNgayVang?>" required></td>
            <td colspan="2">Số sản phẩm: <input type="number" name="sosanpham" style="width: 35%" value="<?php echo $soSanPham?>" min="0"></td>
        </tr>
        <tr style="background-color: #ccd9cf" align="center">
            <td colspan="4"><button type="submit" name="submit">Tính lương</button></td>
        </tr>
        <tr align="center">
            <td>Tiền lương: </td>
            <td><input type="text" disabled="disabled" value="<?php echo $tienLuong?>"></td>
            <td>Trợ cấp: </td>
            <td><input type="text" disabled="disabled" value="<?php echo $troCap?>"></td>
        </tr>
        <tr align="center">
            <td>Tiền thưởng: </td>
            <td><input type="text" disabled="disabled" value="<?php echo $tienThuong?>"></td>
            <td>Tiền phạt: </td>
            <td><input type="text" disabled="disabled" value="<?php echo $tienPhat?>"></td>
        </tr>
        <tr align="center">
            <td colspan="4">Thực lĩnh <input type="text" disabled="disabled" value="<?php echo $thucLinh?>"></td>
        </tr>
    </table>
</form>
</body>
</html>
