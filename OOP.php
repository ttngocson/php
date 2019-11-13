<?php
$page_title = 'Hướng đối tượng';
$url = "/OOP/";
include('includes/header.php');
if(!isset($_GET["link"])){
    $url = $url ."bai1.php";
}
else{
    $temp = $_GET["link"];
    $url = $url ."$temp";
}
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
            <li><a href="OOP.php?link=bai1.php">Bài 1</a></li>
            <li><a href="OOP.php?link=bai2.php">Bài 2</a></li>
            <li><a href="OOP.php?link=Hinh.php">Hình</a></li>
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
