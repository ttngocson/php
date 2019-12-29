<?php
    $n = rand(1,100);
    echo "Giá trị nhập vào là: " .$n;
    echo "</br> Các sô chẵn từ 1 đến $n là: ";
    for($i = 1; $i <= $n; $i++)
        if($i % 2 == 0)
            echo "$i ";

?>