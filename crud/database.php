<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ongraph";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];   
$gender = $_POST['gender'];
$hobbies = implode(",", $_POST['hobbies']);
$education = $_POST['education'];

$photo = $_FILES['userphoto'];
// $photo = $_REQUEST['userphoto'];
// print_r($photo);
echo $name = $photo['name'];
echo "<br>";
echo $tmp_name = $photo['tmp_name'];

$img_ex = pathinfo($name, PATHINFO_EXTENSION);
$img_ex_lc = strtolower($img_ex);
$allowed_ex = array("jpg", "jpeg", "png");

if (in_array($img_ex_lc, $allowed_ex)) {
    $new_img_name = $name . '.' . $img_ex_lc;
    $upload_path = "upload_photo/" . $new_img_name;
    move_uploaded_file($tmp_name, $upload_path);
} else {
    echo "only image are allowed";
}

// $chkhobi = implode(",".$hobbies);
// foreach($hobbies as $chkhobi11)
// {    
//     $chkhobi .= $chkhobi11.",";
// }

$sql_insert = "INSERT INTO `userinfo` (`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `hobbies`, `education`,`user_photo`) VALUES ('$firstname','$lastname','$email','$phonenumber','$gender','$hobbies','$education','$new_img_name')";
if (mysqli_query($conn, $sql_insert)) {
    echo "data inserted successfully";
} else {
    echo "error Please Check Connectivity";
}

mysqli_close($conn);
?>