<?php
$page_title = 'PHP và FORM';
$url = "/PHP_FORM/";
include('includes/header.php');
if(!isset($_GET["link"])){
    $url = $url ."bt1.php";
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
            <li><a href="php_form.php?link=bt1.php">Bài 1</a></li>
            <li><a href="php_form.php?link=bt2.php">Bài 2</a></li>
            <li><a href="php_form.php?link=bt3.php">Bài 3</a></li>
            <li><a href="php_form.php?link=bt4.php">Bài 4</a></li>
            <li><a href="php_form.php?link=bt5.php">Bài 5</a></li>
            <li><a href="php_form.php?link=bt6pheptinh.php">Bài 6</a></li>
            <li><a href="php_form.php?link=bt8form.htm">Bài 8</a></li>
            <li><a href="php_form.php?link=bt9index.php">Bài 9</a></li>
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
