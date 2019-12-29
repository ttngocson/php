<?php
    function US($n){
        echo "Các ước số của $n: ";
        for($i = 1; $i <= $n; $i++){
            if($n%$i==0){
                echo "$i\t";
            }
        }
        echo "<br>";
    }
    function isPrimeNumber($n) {
        // so nguyen n < 2 khong phai la so nguyen to
        if ($n < 2) {
            return false;
        }
        // check so nguyen to khi n >= 2
        $squareRoot = sqrt ( $n );
        for($i = 2; $i <= $squareRoot; $i ++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }
    function TongSNT($n){
        $tong = 0;
        for($i = 2; $i <= $n; $i++){
            if (isPrimeNumber ( $i )) {
                #echo ($i . " ");
                $tong +=$i;
            }
        }
        echo "Tổng các sô nguyên tố bé hơn $n: $tong<br>";

    }
    function KTSCP($n){
        $i = sqrt($n);
        if(pow((int)$i, 2) == $n)
            echo "$n là số chính phương";
        else
            echo "$n không phải là số chính phương";
        echo "<br>";
    }
?>
<html>
    <body>
    <form action="bt3.php" method="POST">
        <input type="number" name="number" required max="100">
        <input type="submit" name="submit" value="xử lý" />
        <fieldset style="width: 400px; height: 100px">
            <legend>bài tập 3</legend>
            <?php
            if(isset($_POST["submit"])){
                $n = $_POST["number"];
                US($n);

                TongSNT($n);

                KTSCP($n);
            }
            ?>
        </fieldset>
    </form>
    </body>
</html>
