<?php 
	function KTMang($arr,$val)
    {
        $dem = 0;
        foreach ($arr as $key => $value) {
            if ($value == $val) {
                $dem+=1;
            }
        }
        return $dem;
    }
	require('../../Config/connect.php');
	$tentk = isset($_GET['tentk']) ? $_GET['tentk'] : '';
	//sql này trả về các chức năng mà tài khoản đã có
	$sql1 ="SELECT * from quyensudung Where TenTK = '".$tentk."'";
	$res1 = mysqli_query($conn,$sql1);
	$dsid = array();
    while($rows = mysqli_fetch_array($res1))
    {
        $dsid[]=$rows['IDChucNang'];
    }
    $sql2 = "SELECT * FROM chucnang";
    $res2 = mysqli_query($conn,$sql2);
    $numrows=mysqli_num_rows($res2);
    if (count($dsid)!=$numrows) 
    {
    	echo '<form action="" method="POST">';
	    while($rows = mysqli_fetch_array($res2))
	    {
	        if (KTMang($dsid,$rows['IDChucNang'])==0) 
	        {
	        	echo '<input type="checkbox" name="themCN[]" value="'.$rows['IDChucNang'].'">'.$rows['TenChucNang'];
	        	echo '<br><br>';
	        }
	    }
	    echo '<input type="submit" name="themchucnang" value="Thêm chức năng">';
	    echo '</form>';
	    if (isset($_POST['themchucnang'])) {
            if (isset($_POST['themCN'])) 
            {
                foreach($_POST['themCN'] as $value) 
                {
                    $sql = "INSERT INTO `quyensudung`(`TenTK`, `IDChucNang`) VALUES ('".$tentk."','".$value."')";
                    mysqli_query($conn,$sql);
                }
                header('Location: http://localhost:8080/QLDA/admin/index.php?chucnang=sua_tai_khoan&tentk='.$tentk.'&maquyen=stk');
            }
            else
                header('Location: http://localhost:8080/QLDA/admin/index.php?chucnang=sua_tai_khoan&tentk='.$tentk.'&maquyen=stk');
        }
    }
    else
    {
    	echo '<script type="text/javascript">
                    alert("Tài khoản này đã có tất cả các chức năng!");
                    window.history.back();
                </script>';
    }
?>