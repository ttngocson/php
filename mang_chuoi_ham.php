<?php
$page_title = 'Mảng - Chuỗi - Hàm';
$url = "/MANG_CHUOI_HAM/";
if(!isset($_GET["link"])){
    $url = $url ."bt1.php";
}
else{
    $temp = $_GET["link"];
    $url = $url ."$temp";
}

include('includes/header.php');
?>
<style>
    .left{
        float: left;
        width: 28%;
    }
    .left li{
        font-size: 16pt;
        min-height: 35px;
    }
    .right{
        float: left;
        width: 70%;
    }
    .clear{
        clear: both;
    }
    iframe{
        width: 525px;
        height: 400px;
        border-width: 5px;
        border-style: solid;
        border-radius: 5px;
        border-color: #a7bdc7;
        box-shadow: 5px 4px 0px 2px #a7bdc7;
    }
</style>

<br>
<div>
    <div class="left">
        <ul style="padding-left: 18px">
            <li><a href="mang_chuoi_ham.php?link=bt1.php">Bài 1</a></li>
            <li><a href="mang_chuoi_ham.php?link=bt2.php">Bài 2</a></li>
            <li><a href="mang_chuoi_ham.php?link=bt3.php">Bài 3</a></li>
            <li><a href="mang_chuoi_ham.php?link=bt4.php">Bài 4</a></li>
            <li><a href="mang_chuoi_ham.php?link=bt5.php">Bài 5</a></li>
            <li><a href="mang_chuoi_ham.php?link=bt6.php">Bài 6</a></li>
            <li><a href="mang_chuoi_ham.php?link=bt7.php">Bài 7</a></li>
            <li><a href="mang_chuoi_ham.php?link=matrix.php">Matrix</a></li>
            <li><a href="mang_chuoi_ham.php?link=kqxs.php">Kết quả xổ số</a></li>
            <li><a href="mang_chuoi_ham.php?link=bangxephang.php">Bảng xếp hạng</a></li>
        </ul>
    </div>
    <div class="right">
        <iframe src="<?php echo $url?>"></iframe>
    </div>
    <div class="clear"></div>
</div>

<?php
include ('includes/footer.html');
?>
