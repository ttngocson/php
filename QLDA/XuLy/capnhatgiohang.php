<?php 
	session_start();
	foreach ($_SESSION['cart'] as $key => $value) {
		$name_id="id_".$key;
        $name_sl="sl_".$key;
        if(isset($_POST[$name_id]))
        {
            if ($_POST[$name_sl] > 0) {
            	echo $_POST[$name_sl];
            	$_SESSION['cart'][$key]['soluong']=$_POST[$name_sl];
            }
            else
            	unset($_SESSION['cart'][$key]);
        }
	}
	//var_dump($_SESSION['cart']);
header('Location: http://localhost:8080/QLDA/index.php?chucnang=gio_hang');
?>