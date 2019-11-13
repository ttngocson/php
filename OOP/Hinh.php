<?php
abstract class Hinh{
    protected $ten, $dodai;

    /**
     * @return mixed
     */
    public function getTen()
    {
        return $this->ten;
    }

    /**
     * @return mixed
     */
    public function getDodai()
    {
        return $this->dodai;
    }

    /**
     * @param mixed $dodai
     */
    public function setDodai($dodai)
    {
        $this->dodai = $dodai;
    }

    /**
     * @param mixed $ten
     */
    public function setTen($ten)
    {
        $this->ten = $ten;
    }

    abstract public function tinh_CV();
    abstract public function tinh_DT();
}
class HinhTron extends Hinh{
    const PI= 3.14;
    public function tinh_CV()
    {
        // TODO: Implement tinh_CV() method.
        return $this->dodai*2*self::PI;
    }

    public function tinh_DT()
    {
        // TODO: Implement tinh_DT() method.
        return pow($this->dodai,2)*self::PI;
    }
}
class HinhVuong extends Hinh{
    public function tinh_CV()
    {
        // TODO: Implement tinh_CV() method.
        return $this->dodai*4;
    }

    public function tinh_DT()
    {
        // TODO: Implement tinh_DT() method.
        return $this->dodai**2;
    }
}
?>
<html>
<head>
    <title>Chu vi và diện tích</title>
    <style>
        form {
            background-color: #ccd9cf;
            text-align: center;
            margin-top: 5%;
            left: 15%;
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
        fieldset{
            margin: 10px;
            min-height: 88px;
        }
    </style>
</head>
<body>
<form action="Hinh.php" method="post">
    <h2>CHU VI VÀ DIỆN TÍCH</h2>
    <table align="center">
        <tr>
            <td>Nhập tên: </td>
            <td><input type="text" required name="ten"> </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="radio" name="hinh" value="tron" checked>Hình tròn &nbsp;
                <input type="radio" name="hinh" value="vuong">Hình vuông &nbsp;<br>
                <input type="radio" name="hinh" value="chunhat">Hình chữ nhật &nbsp;
                <input type="radio" name="hinh" value="tamgiac">Hình tam giác &nbsp;
            </td>
        </tr>
        <tr>
            <td>Nhập độ dài: </td>
            <td><input type="number" step="any" name="dodai" required> </td>
        </tr>
    </table>
    <button type="submit" name="submit">Tính</button>
    <fieldset>
        <legend align="left">Kết Quả</legend>
        <?php
            if(isset($_POST["submit"])){
                $dodai = $_POST["dodai"];
                if($_POST["hinh"] == "tron"){
                    $tron = new HinhTron();
                    $tron->setTen("Hình tròn");
                    $tron->setDodai($dodai);
                    echo "Chu vi và diện tích hình tròn<br>";
                    echo "Tên: " .$tron->getTen() ."<br>";
                    echo "Chu vi: " .$tron->tinh_CV() ."<br>";
                    echo "Diện tích: " .$tron->tinh_DT() ."<br>";
                }
                if($_POST["hinh"] == "vuong"){
                    $vuong = new HinhVuong();
                    $vuong->setTen("Hình vuông");
                    $vuong->setDodai($dodai);
                    echo "Chu vi và diện tích hình vuông<br>";
                    echo "Tên: " .$vuong->getTen() ."<br>";
                    echo "Chu vi: " .$vuong->tinh_CV() ."<br>";
                    echo "Diện tích: " .$vuong->tinh_DT() ."<br>";
                }
            }
        ?>
    </fieldset>
</form>
</body>
</html>
