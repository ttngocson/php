<?php
function DisplayProduct($product){
        echo "<div align='center' class='product'>";
        $urlimg = 'Admin//img//';
        $image = $product['HinhAnh'];
        $style = "background-image: url('" .$urlimg .$image ."')";
            echo "<div class='image' style=\"$style\">";
                echo "<div>";
                    echo "<a href='XuLy/themvaogiohang.php?idthem=".$product['IDSanPham']."&page=".$_GET["page"] ."'>
                                <button class='btn btn-primary'>Thêm nhanh</button></a>&nbsp;";
                    echo "<a href='XuLy/muangay.php?idthem=".$product['IDSanPham']."'><button class='btn btn-primary'>Mua hàng</button></a>";
                echo "</div>";
            echo "</div>";
            echo "<div>";
                $link = "?chucnang=chi_tiet_san_pham&masp=".$product['IDSanPham'];
                echo "<p></p><h6><a href='$link'>" .$product['TenSanPham']."</a></h6><p></p>";
                echo  "<h3>" .number_format($product['DonGia']) ."₫</h3>";
            echo "</div>";
        echo "</div>";
}
?>
