<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];
    $study = $_POST["study"];
    $note = $_POST["note"];
    echo "Bạn đã nhập thành công, dưới đây là thông tin bạn đã nhập:<br>";
    echo "Họ tên: $name<br>";
    echo "Địa chỉ: $address<br>";
    echo "Điện thoại: $phone<br>";
    echo "Giới tính: $gender<br>";
    echo "Quốc gia: $country<br>";
    echo "Môn học: ";
    foreach ($study as $item)
        echo "$item &nbsp;";
    echo "<br>";
    echo "Ghi chú: $note<br>";
}
else{
    echo "<script>window.location.href = '/PHP_FORM/bt8form.htm'</script>";
}
?>
<html>
<head>
    <title>Bài tập 8</title>
</head>
</html>

