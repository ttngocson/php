<?php
function UCLN($a,$b){
    if ($a < 0) $a = -$a;
    if ($b < 0) $b = -$b;
    while ($a != $b)
        $a > $b ? $a -= $b : $b -= $a;
    return $a;
}
class PhanSo{
    private $tuSo, $mauSo;

    /**
     * PhanSo constructor.
     * @param $tuSo
     * @param $mauSo
     */
    public function __construct($tuSo = 0, $mauSo = 1)
    {
        $this->tuSo = $tuSo;
        $this->mauSo = $mauSo;
    }
    public function printPS(){
        return $this->tuSo ."/" .$this->mauSo;
    }

    /**
     * @return mixed
     */
    public function getTuSo()
    {
        return $this->tuSo;
    }

    /**
     * @param mixed $tuSo
     */
    public function setTuSo($tuSo)
    {
        $this->tuSo = $tuSo;
    }

    /**
     * @return mixed
     */
    public function getMauSo()
    {
        return $this->mauSo;
    }

    /**
     * @param mixed $mauSo
     */
    public function setMauSo($mauSo)
    {
        $this->mauSo = $mauSo;
    }

    public function Cong($ps){
        $c = new PhanSo();
        $c->setMauSo($this->mauSo * $ps->getMauSo());
        $c->setTuSo($this->tuSo * $ps->getMauSo() + $this->mauSo * $ps->getTuSo());
        return $c;
    }
    public function Tru($ps){
        $c = new PhanSo();
        $c->setMauSo($this->mauSo * $ps->getMauSo());
        $c->setTuSo($this->tuSo * $ps->getMauSo() - $this->mauSo * $ps->getTuSo());
        return $c;
    }
    public function Nhan($ps){
        $c = new PhanSo();
        $c->setMauSo($this->mauSo * $ps->getMauSo());
        $c->setTuSo($this->tuSo * $ps->getTuSo());
        return $c;
    }
    public function Chia($ps){
        $c = new PhanSo();
        $c->setMauSo($this->mauSo * $ps->getTuSo());
        $c->setTuSo($this->tuSo * $ps->getMauSo());
        return $c;
    }
    public function RutGon(){
        if($this->tuSo == 0)
            return "0";
        if($this->mauSo==1)
            return "$this->tuSo";
        $ucln = UCLN($this->tuSo, $this->mauSo);
        $this->tuSo /= $ucln;
        $this->mauSo /= $ucln;
        if($this->mauSo < 0){
            $this->tuSo *= -1;
            $this->mauSo *= -1;
        }
        return $this->printPS();
    }
}

$t1 = 0;
$m1 = 0;
$t2 = 0;
$m2 = 0;
$pt = "+";
$msg = "";
if(isset($_POST["submit"])){
    $t1 = $_POST["t1"];
    $m1 = $_POST["m1"];
    $t2 = $_POST["t2"];
    $m2 = $_POST["m2"];
    $pt = $_POST["pt"];
    if($m1 == 0 || $m2 ==0){
        echo "<script>alert('Phân số phải có mẫu số khác 0')</script>";
    }
    else{
        $ps1 = new PhanSo($t1, $m1);
        $ps2 = new PhanSo($t2, $m2);
        $kq = new PhanSo();
        $msg = "Phép ";
        switch ($pt){
            case "+":
                $kq = $ps1->Cong($ps2);
                $msg .= "cộng ";
                break;
            case "-":
                $kq = $ps1->Tru($ps2);
                $msg .= "trừ ";
                break;
            case "*":
                $kq = $ps1->Nhan($ps2);
                $msg .= "nhân ";
                break;
            case "/":
                $kq = $ps1->Chia($ps2);
                $msg .= "chia ";
                break;
        }
        $msg .= "là: " .$ps1->printPS() ." $pt " .$ps2->printPS() ." = " .$kq->RutGon();
    }
}
?>
<html>
<head>
    <title>Phân số</title>
    <style>
        form {
            background-color: #ccd9cf;
            margin-top: 5%;
            left: 34%;
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
        input{
            max-width: 100px;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <h2 align="center">PHÉP TÍNH TRÊN PHÂN SỐ</h2>
    <div style="padding: 15px 10px">
        Nhập phân số thứ 1: Tử số: <input type="number" name="t1" step="any" value="<?php echo $t1?>" required>&nbsp;
        Mẫu số: <input type="number" name="m1" step="any" value="<?php echo $m1?>" required>
        <br>
        <br>
        Nhập phân số thứ 2: Tử số: <input type="number" name="t2" step="any" value="<?php echo $t2?>" required>&nbsp;
        Mẫu số: <input type="number" name="m2" step="any" value="<?php echo $m2?>" required>
        <br>
        <br>
        <fieldset>
            <legend>Chọn phép tính</legend>
            <div style="padding: 10px">
                <input type="radio" name="pt" value="+" <?php if($pt == "+") echo "checked"?>/>Cộng
                <input type="radio" name="pt" value="-" <?php if($pt == "-") echo "checked"?>/>Trừ
                <input type="radio" name="pt" value="*" <?php if($pt == "*") echo "checked"?>/>Nhân
                <input type="radio" name="pt" value="/" <?php if($pt == "/") echo "checked"?>/>Chia
            </div>
        </fieldset>
        <br>
        <div align="center">
            <button type="submit" name="submit">Kết quả</button>
        </div>
        <br>
        <div style="min-height: 20px">
            <?php echo $msg?>
        </div>
    </div>
</form>
</body>
</html>
