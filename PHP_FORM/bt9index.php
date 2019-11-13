<?php
$link = "bt9trangchu.php";
if(isset($_GET["url"]))
    $link = $_GET["url"];
?>
<html>
<head>
    <title>Bài tập 9</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/PHP_FORM/bt9index.php">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/PHP_FORM/bt9index.php?url=bt9diendan.php">Diễn đàn</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/PHP_FORM/bt9index.php?url=bt9tintuc.php">Tin tức</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/PHP_FORM/bt9index.php?url=bt9gioithieu.php">Giới thiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/PHP_FORM/bt9index.php?url=bt9lienhe.php">Liên hệ</a>
            </li>
        </ul>
    </nav>
    <br>
    <div class="container">
        <iframe src="<?php echo $link?>"></iframe>
    </div>
</body>
</html>
