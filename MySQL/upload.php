<?php
if(isset($_POST["submit"])){
    $target_dir = "Hinh_truyen/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
    echo $_FILES["fileToUpload"]["type"];
    echo "<br>";
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
        echo "sucessed";
    else echo "failed";
}
?>
<html>
<head>

</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>
