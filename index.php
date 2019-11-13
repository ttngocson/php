<?php # Script 3.4 - index.php
error_reporting(1);
$page_title = 'Bài tập cá nhân';
include('includes/header.php');
?>
<head>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        .left{
           float: left;
            padding: 0;
        }
        .right{
            float: right;
        }
        .clear{
            clear: both;
        }
        table{
            font-size: 16pt;
        }
        td{
            min-width: 150px;
            height: 40px;
        }
        .icon{
            text-align: center;
            height: fit-content;
            background-color: #1976D2;
            padding: 30px;
            padding-top: 10px;
        }
        .icon ul{
            list-style-type:none;
            position:relative;
            left:38%;
        }
        .icon li{
            float: left;
            font-size: 16pt;
            margin-left: 10px;
        }
        .icon i{
            color: #1976D2;
            margin-top: 10px;
        }
        .icon a{
            display: block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            font-size: 18px;
            color: #1976D2;
            background: #fff;
            border: 1px solid #e4e4e4;
            transition: all 0.3s linear;
        }
        .icon a:hover{
            border-radius: 30px;
            transition-duration: 0.3s;
        }
    </style>
</head>
<div>
    <div style="padding: 15px">
        <div class="left">
            <img src="img/avatar.jpg" width="285.65" height="417.39">
        </div>
        <div class="right">
            <div style="border-bottom: 1px solid #dedede">
                <br>
                <p style="font-size: 20pt;padding-left: 0px;">I'm <span style="font-weight: bold">Trần Trương Ngọc Sơn</span></p>
                <p style="font-size: 16pt;padding-left: 0px;">Student id: 58133435</p>
                <br>
            </div>
            <br>
            <div>
                <table>
                    <tr>
                        <td>AGE</td>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td>ADDRESS</td>
                        <td>CLASSIFIED</td>
                    </tr>
                    <tr>
                        <td>E-MAIL</td>
                        <td>ttngocson@gmail.com</td>
                    </tr>
                    <tr>
                        <td>PHONE</td>
                        <td>+84 37 7524 753</td>
                    </tr>
                    <tr>
                        <td>START</td>
                        <td>09-09-2019</td>
                    </tr>
                    <tr>
                        <td>END</td>
                        <td>23-11-2019</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="icon">
        <ul>
            <li><a href="https://www.facebook.com/transon.290198" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#" title="Google"><i class="far fa-envelope"></i></a></li>
            <li><a href="https://github.com/ttngocson" title="Github" target="_blank"><i class="fab fa-github"></i></a></li>
            <li><a href="https://www.instagram.com/transon.290198/" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
        </ul>
    </div>
</div>
<?php
include ('includes/footer.html');
?>