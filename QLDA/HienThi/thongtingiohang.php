<?php
	$tongso = 0;
	if (isset($_SESSION['cart']) && count($_SESSION['cart']))
		foreach ($_SESSION['cart'] as $key => $value) {
			$tongso += $_SESSION['cart'][$key]['soluong'];
		}
?>
<head>
    <style>
        .cart{
            margin-left: 20px;
            border: 2px solid;
            border-radius: 10px;
            width: fit-content;
            padding: 5px;
            font-weight: bolder;
        }
        a:hover{
            text-decoration-line: none;
        }
        .cart span{
            padding: 0 6px;
            width: 6px;
            background-color: #fdd835;
        }
    </style>
</head>
<form class="form-inline my-2 my-md-0">
    <div class="cart">
        <a href="?chucnang=gio_hang"><i class="fas fa-shopping-cart"></i>&nbsp;Giỏ hàng <span><?php echo $tongso ?></span></a>
    </div>
</form>
