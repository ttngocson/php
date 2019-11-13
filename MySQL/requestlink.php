<?php
    $link = "";
    $link .= $_SERVER['HTTP_HOST'];
    $link .= $_SERVER['PHP_SELF'];
    $link = str_replace("requestlink.php", "", $link);
    echo $link;
    //echo "<script>window.location.replace('$link/bai2_7_CT.php?id=AB0001')</script>";
?>