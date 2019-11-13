<?php
class Nguoi{
    private $maSo, $hoTen, $gioiTinh, $diaChi;

    /**
     * Nguoi constructor.
     */
    public function __construct(){}

    /**
     * @return mixed
     */
    public function getMaSo()
    {
        return $this->maSo;
    }

    /**
     * @param mixed $maSo
     */
    public function setMaSo($maSo)
    {
        $this->maSo = $maSo;
    }

    /**
     * @return mixed
     */
    public function getHoTen()
    {
        return $this->hoTen;
    }

    /**
     * @param mixed $hoTen
     */
    public function setHoTen($hoTen)
    {
        $this->hoTen = $hoTen;
    }

    /**
     * @return mixed
     */
    public function getGioiTinh()
    {
        return $this->gioiTinh;
    }

    /**
     * @param mixed $gioiTinh
     */
    public function setGioiTinh($gioiTinh)
    {
        $this->gioiTinh = $gioiTinh;
    }

    /**
     * @return mixed
     */
    public function getDiaChi()
    {
        return $this->diaChi;
    }

    /**
     * @param mixed $diaChi
     */
    public function setDiaChi($diaChi)
    {
        $this->diaChi = $diaChi;
    }

}

class GiangVien extends Nguoi {
    private $hocVi, $soNamCongTac;
    const luongCoBan = 1350000;

    /**
     * GiangVien constructor.
     */
    public function __construct(){}

    /**
     * @return mixed
     */
    public function getHocVi()
    {
        return $this->hocVi;
    }

    /**
     * @param mixed $hocVi
     */
    public function setHocVi($hocVi)
    {
        $this->hocVi = $hocVi;
    }

    /**
     * @return mixed
     */
    public function getSoNamCongTac()
    {
        return $this->soNamCongTac;
    }

    /**
     * @param mixed $soNamCongTac
     */
    public function setSoNamCongTac($soNamCongTac)
    {
        $this->soNamCongTac = $soNamCongTac;
    }

    public function TinhLuong(){
        $luong = 0;
        if($this->hocVi == "Cử nhân")
            $luong = self::luongCoBan*2.67;
        if($this->hocVi == "Thạc sĩ")
            $luong = self::luongCoBan*3.66;
        if($this->hocVi == "Tiến sĩ")
            $luong = self::luongCoBan*4.3;
        if ($this->soNamCongTac > 6)
            $luong = $luong*1.1;
        return $luong;
    }

    public function Xuat(){
        echo "Họ tên: ";
        echo $this->getHoTen() ."<br>";
        echo "Giới tính: ";
        echo $this->getGioiTinh() ."<br>";
        echo "Địa chỉ: ";
        echo $this->getDiaChi() ."<br>";
        echo "Học vị: ";
        echo $this->getHocVi() ."<br>";
        echo "Số năm công tác: ";
        echo $this->getSoNamCongTac() ."<br>";
        echo "Lương: ";
        echo $this->TinhLuong()."<br>";

    }

}

class SinhVien extends Nguoi{
    private $lop, $nganhHoc, $dtb, $drl;

    public function __construct(){}

    /**
     * @return mixed
     */
    public function getLop()
    {
        return $this->lop;
    }

    /**
     * @param mixed $lop
     */
    public function setLop($lop)
    {
        $this->lop = $lop;
    }

    /**
     * @return mixed
     */
    public function getNganhHoc()
    {
        return $this->nganhHoc;
    }

    /**
     * @param mixed $nganhHoc
     */
    public function setNganhHoc($nganhHoc)
    {
        $this->nganhHoc = $nganhHoc;
    }

    /**
     * @return mixed
     */
    public function getDtb()
    {
        return $this->dtb;
    }

    /**
     * @param mixed $dtb
     */
    public function setDtb($dtb)
    {
        $this->dtb = $dtb;
    }

    /**
     * @return mixed
     */
    public function getDrl()
    {
        return $this->drl;
    }

    /**
     * @param mixed $drl
     */
    public function setDrl($drl)
    {
        $this->drl = $drl;
    }

    public function TinhDiemThuong(){
        if($this->nganhHoc == "CNTT")
            return 1.0;
        if($this->nganhHoc == "Kinh tế")
            return 0.5;
        if($this->nganhHoc == "Xây dựng")
            return 1.5;
        return 0;
    }

    public function TinhHocBong(){
        if($this->dtb > 9.0 && $this->drl >= 90)
            return "1.000.000";
        if($this->dtb <= 9.0 && $this->dtb >= 8.0 && $this->drl > 80)
            return "600.000";
        if($this->dtb < 8.0 && $this->dtb >= 7.0 && $this->drl > 70)
            return "300.000";
        return "0";
    }

    public function Xuat(){
        echo "Họ tên: ";
        echo $this->getHoTen() ."<br>";
        echo "Giới tính: ";
        echo $this->getGioiTinh() ."<br>";
        echo "Địa chỉ: ";
        echo $this->getDiaChi() ."<br>";
        echo "Lớp: ";
        echo $this->getLop() ."<br>";
        echo "Ngành học: ";
        echo $this->getNganhHoc() ."<br>";
        echo "Điểm trung bình: ";
        echo $this->getDtb() ."<br>";
        echo "Điểm rèn luyện: ";
        echo $this->getDrl() ."<br>";
        echo "Điểm thưởng: ";
        echo $this->TinhDiemThuong() ."<br>";
        echo "Học bổng: ";
        echo $this->TinhHocBong() ."<br>";
    }
}
?>
<html>
<head>
    <title>Bài kiểm tra</title>

    <style>
        form{
            top: 10%;
            left: 10%;
            width: fit-content;
            position: absolute;
        }
        #GV{
            display: none;
        }
        #SV{
            display: none;
        }
        #nguoi{
            display: none;
        }
    </style>
    <script>
        function check() {
            document.getElementById("nguoi").style.display = "block";
            document.getElementById("xuat").style.display = "none";
            if(document.getElementById("giangvien").checked == true){
                document.getElementById("GV").style.display = "block";
            }
            else
                document.getElementById("GV").style.display = "none";

            if(document.getElementById("sinhvien").checked == true){
                document.getElementById("SV").style.display = "block";
            }
            else
                document.getElementById("SV").style.display = "none";
        }
    </script>
</head>
<body>
    <form action="" method="post">
        <h1>THÔNG TIN GIẢNG VIÊN SINH VIÊN</h1>
        <fieldset>
            <legend>Chọn đối tượng</legend>
            <input type="radio" id="giangvien" name="doituong" value="GV" checked>Giảng viên &nbsp;
            <input type="radio" id="sinhvien" name="doituong" value="SV">Sinh viên<br>
            <input type="button" onclick="check()" value="Chọn">
        </fieldset>
        <div id="nguoi">
            <br>
            <p>Họ tên: <input type="text" name="hoten"></p>
            <p>Giới tính:
                <input type="radio" name="gioitinh" value="Nam" checked>Nam&nbsp;
                <input type="radio" name="gioitinh" value="Nữ" >Nữ
            </p>
            <p>Địa chỉ: <input type="text" name="diachi"></p>
        </div>
        <div id="GV">
            <p>Học vị: <select name="hocvi">
                <option value="Cử nhân">Cử nhân</option>
                <option value="Thạc sĩ">Thạc sĩ</option>
                <option value="Tiến sĩ">Tiến sĩ</option>
            </select></p>
            <p>Số năm công tác: <input type="number" name="sonamcongtac"></p>
            <button type="submit" name="submit">Hiển thị thông tin</button>
        </div>
        <div id="SV">
            <p>Lớp: <input type="text" name="lop"></p>
            <p>Ngành học: <select name="nganhhoc">
                    <option value="CNTT">CNTT</option>
                    <option value="Kinh tế">Kinh tế</option>
                    <option value="Xây dựng">Xây dựng</option>
                </select></p>
            <p>Điểm trung bình học kỳ: <input type="number" step="any" name="dtb"></p>
            <p>Điểm rèn luyện: <input type="number" step="any" name="drl"></p>
            <button type="submit" name="submit">Hiển thị thông tin</button>
        </div>
        <div id="xuat">
            <?php
            if(isset($_POST["submit"])){
                if($_POST["doituong"] == "GV"){
                    $GV = new GiangVien();
                    $GV->setHoTen($_POST["hoten"]);
                    $GV->setGioiTinh($_POST["gioitinh"]);
                    $GV->setDiaChi($_POST["diachi"]);

                    $GV->setHocVi($_POST["hocvi"]);
                    $GV->setSoNamCongTac($_POST["sonamcongtac"]);
                    $GV->Xuat();
                }
                if($_POST["doituong"] == "SV"){
                    $SV = new SinhVien();
                    $SV->setHoTen($_POST["hoten"]);
                    $SV->setGioiTinh($_POST["gioitinh"]);
                    $SV->setDiaChi($_POST["diachi"]);

                    $SV->setLop($_POST["lop"]);
                    $SV->setNganhHoc($_POST["nganhhoc"]);
                    $SV->setDtb($_POST["dtb"]);
                    $SV->setDrl($_POST["drl"]);
                    $SV->Xuat();
                }
            }
            ?>
        </div>
    </form>
<br>
</body>
</html>
