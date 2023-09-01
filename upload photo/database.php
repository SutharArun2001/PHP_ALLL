<?php
include('../crud/connection.php');
if(!$conn){
    echo "failded";
}else{
    echo "succesffuly";
}
if (isset($_POST['upload']) && isset($_FILES['userphoto'])){
    $photo=$_FILES['userphoto'];
    echo $name= $photo['name'];
    echo $tmp_name= $photo['tmp_name'];

    $img_ex = pathinfo($name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $allowed_ex = array("jpg", "jpeg", "png");
    if(in_array($img_ex_lc,$allowed_ex)){
        $new_img_name = uniqid("IMG", true) . '.' . $img_ex_lc;
        $upload_path = "upload_file/".$new_img_name;
        move_uploaded_file($tmp_name,$upload_path);
    }else{
        echo "only image are allowed";
    }
    $sql_upload="INSERT INTO uploadfiles (upload_url) VALUES ('$new_img_name') ";
    if(mysqli_query($conn,$sql_upload)){
        echo "File Uploaded Successfully";
    }else{
        echo "error";
    }
}else{
    // header('Location:form.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> 
<body>
<a href="view.php?name='<?php echo $new_img_name ?>'" value="sdfa">View File</a>
</body>
</html>