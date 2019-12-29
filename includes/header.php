<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $page_title; ?></title>	
	<link rel="stylesheet" href="includes/style.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
	<a class="navbar-brand" href="/">ASV Blog</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbars">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="php_form.php">PHP và FORM</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="mang_chuoi_ham.php">Mảng - Chuỗi - Hàm</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="OOP.php">Hướng đối tượng</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="MySql.php">MySQL</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-md-0" action="/includes/Login.php" method="post">
			<?php
            session_start();
                if(isset($_SESSION["userName"])){
                    echo "<a style='font-size: larger' href='#'>Xin chào " .$_SESSION["userName"] ."</a>&nbsp;";
                    echo "<a style='font-size: larger' href='/includes/Logout.php'>Logout</a>";
                }
                else
                    echo "<a href='' style='font-size: larger' data-toggle='modal' data-target='#login'>Login</a>&nbsp;
                            <a href='#' style='font-size: larger'>Signin</a>";
            ?>
            <!-- Modal -->
            <div class="modal fade" id="login">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Login</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body" align="center">
                            <label for="inputEmail" class="sr-only">Email address</label>
                            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                            <br>
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                            <br>
                            <input type="checkbox" value="remember-me"> Remember me
                            <br>
                            <a href="#">Forgot password</a>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-danger">Login</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
		</form>
	</div>
</nav>
	<div id="header">
		<h1>ASV</h1>
		<h2>PHP blog</h2>
	</div>
	<div id="content"><!-- Start of the page-specific content. -->
<!-- Script 9.1 - header.php -->