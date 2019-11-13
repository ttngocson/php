<?php
$page_title = 'PHP và FORM';
$url = "/MySQL/";
include('includes/header.php');
if(!isset($_GET["link"])){
    $url = $url ."bai2_1.php";
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
            <li><a href="MySql.php?link=bai2_1.php">Bài 1</a></li>
            <li><a href="MySql.php?link=bai2_2.php">Bài 2</a></li>
            <li><a href="MySql.php?link=bai2_3.php">Bài 3</a></li>
            <li><a href="MySql.php?link=bai2_4.php">Bài 4</a></li>
            <li><a href="MySql.php?link=bai2_5.php">Bài 5</a></li>
            <li><a href="MySql.php?link=bai2_6.php">Bài 6</a></li>
            <li><a href="MySql.php?link=bai2_7.php">Bài 7</a></li>
            <li><a href="MySql.php?link=bai2_8.php">Bài 8</a></li>
            <li><a href="MySql.php?link=bai2_9.php">Bài 9</a></li>
            <li><a href="MySql.php?link=bai2_10.php">Bài 10</a></li>
            <li><a href="MySql.php?link=bai2_11.php">Bài 11</a></li>
            <li><a href="MySql.php?link=bai2_12_index.php">Bài 12</a></li>
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
