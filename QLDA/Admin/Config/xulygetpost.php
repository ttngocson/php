<?php 
	if (isset($_POST['cap_nhat_tai_khoan'])) 
	{
		include('XuLy/taikhoan/capnhattaikhoan.php');
		unset($_SESSION['tentksua']);
	}
	if (isset($_POST['xoatk'])) {
		include('XuLy/taikhoan/xoataikhoan.php');
	}
	if (isset($_POST['xoasp'])) {
		include('XuLy/sanpham/xoasanpham.php');
	}
	if (isset($_POST['xac_nhan_sua_sp'])) {
		include('XuLy/sanpham/suasanpham.php');
	}
	if (isset($_POST['xac_nhan_them_sp'])) {
		include('XuLy/sanpham/themsanpham.php');
	}
	if (isset($_POST['them_tai_khoan'])) {
		include('XuLy/taikhoan/themtaikhoan.php');
	}
	if (isset($_POST['luu_thay_doi_ttu'])) {
		include('XuLy/nguoidung/suanguoidung.php');
	}
	if (isset($_POST['xac_nhan_xoa_nd'])) {
		include('XuLy/nguoidung/xoanguoidung.php');
	}
	if (isset($_POST['xoa_kem_tai_khoan'])) {
		include('XuLy/nguoidung/xoanguoidungkemtk.php');
	}
	if (isset($_POST['giao_hang'])) {
		include('XuLy/hoadon/xacnhangiaohang.php');
	}
	if (isset($_POST['xoa_hoa_don'])) {
		include('XuLy/hoadon/xacnhanxoahoadon.php');
	}
	if (isset($_POST['huyxoa']))
	 {
		echo '<script type="text/javascript">window.history.go(-2);</script>';
	}
?>