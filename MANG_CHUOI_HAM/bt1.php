<?php
$n = 0;
if(isset($_POST["submit"]))
    $n = $_POST["n"];
?>
<html>
<head>
    <title>Bài tập 1</title>
    <style type="text/css">
        form{
            margin-top: 5%;
        }
        fieldset{
            text-align: left;
            width: max-content;
            margin:auto;
        }
        body{
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="bt1.php" method="post">
        Nhập n: <input type="number" name="n" min="0" max="30" value="<?php echo $n?>" required><br>
        <button type="submit" name="submit">submit</button><br>
        <fieldset>
            <legend>Kết quả</legend>
            <?php
            if(isset($_POST["submit"])){
                $a = array();
                $n = $_POST["n"];
                #cau a:
                for($i = 0; $i < $n; $i++){
                    array_push($a, rand(-200, 200));
                }
                echo "a) ";
                foreach ($a as $item)
                    echo "[$item] ";
                echo "<br>";
                #cau b
                echo "b) ";
                $b = 0;
                foreach ($a as $item)
                    if($item % 2 == 0)
                        $b++;
                echo "$b<br>";
                #cau c
                echo "c) ";
                $c = 0;
                foreach ($a as $item)
                    if($item < 100)
                        $c++;
                echo "$c<br>";
                #cau d
                echo "d) ";
                $d = 0;
                foreach ($a as $item)
                    if($item < 0)
                        $d+=$item;
                echo "$d<br>";
                #cau e
                echo "e) ";
                $flag = false;
                for ($i = 0; $i < count($a); $i++)
                    if($a[$i] == 0){
                        echo "[$i] ";
                        $flag = true;
                    }
                if($flag == false)
                    echo "Không có";
                echo "<br>";
                #cau f
                echo "f) ";
                sort($a);
                foreach ($a as $item)
                    echo "[$item] ";
            }
            ?>
        </fieldset>
    </form>
    <hr>
    <div style="text-align: left; margin-left: 10%">
        a- Hiển thị mảng phát sinh ngẫu nhiên có n phần tử là số nguyên (Sử dụng hàm rand() (đưa ra số interger ngẫu nhiên).<br>
        b- Đếm số phần tử trong mảng có giá trị là số chẵn.<br>
        c- Đếm số phần tử trong mảng có giá trị là số nhỏ hơn 100<br>
        d- Tính tổng của các phần tử trong mảng có giá trị là số âm<br>
        e- In ra vị trí của các phần tử trong mảng có giá trị bằng 0<br>
        f- Sắp xếp các phần tử theo thứ tự tăng dần rồi in mảng ra màn hình<br>
    </div>
</body>
</html>
