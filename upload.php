<?php

$var="project";
if(mkdir("$var"))
    echo "yes";
if(isset($_POST["submit"])){
    $file = $_FILES['fp'];
    $name = $_FILES['fp']['name'];
    $fileTempName = $_FILES['fp']['tmp_name'];
    $size = $_FILES['fp']['size'];
    $fileError = $_FILES['fp']['error'];
    $type = $_FILES['fp']['type'];
    $fileExt = explode('.',$name);
    $fileActualExt = strtolower(end($fileExt));
    $allowedExt = array("pdf");
    $max=10*1024*1024;
    if(in_array($fileActualExt, $allowedExt)){
        if($fileError == 0){
            if($size < $max){
                $fileDestination = "project/".$name;
                move_uploaded_file($fileTempName, $fileDestination);
                echo "File Uploaded successfully";
            }else{
                echo "File Size Limit beyond acceptance";
            }
        }else{
            echo "Something Went Wrong Please try again!";
        }
    }else{
        echo "You can't upload this extention of file";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>File Upload</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
         <link rel="stylesheet" href="style2.css">
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fp" id="file"><br> <br>
        <button type="submit" name="submit" class="btn btn-success">UPLOAD FILE</button><br><br>
	
    <a href="index.html" class="btn btn-outline-primary" role="button">BACK</a>
	</form>
</body>
</html>
