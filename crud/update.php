<?php
include('connection.php');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['id'])) {
    $userid = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $gender = $_POST['gender'];
    $hobbies = implode(",", $_POST['hobbies']);
    $education = $_POST['education'];
    $photo_new = $_FILES['userphoto_new'];
    $photo_old = $_POST['userphoto_old'];
    echo $name = $photo_new['name'];
    echo $name; 
    echo "<br>";
    echo $tmp_name = $photo_new['tmp_name'];
    echo "<br>";
    $img_ex = pathinfo($name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $allowed_ex = array("jpg", "jpeg", "png");
    
    if(unlink('upload_photo/'.$photo_old)){
        echo "file deleted successfully";
    }else{
        echo "file not found";
    }
    if (in_array($img_ex_lc, $allowed_ex)) {
        $new_img_name =  $name.'.' . $img_ex_lc;
        $upload_path = "upload_photo/" . $new_img_name;
        move_uploaded_file($tmp_name, $upload_path);
        // unlink("upload_photo/". $name_old);
    } else {
        echo "only image are allowed";
    }
    $sql_fetch = "select user_photo from userinfo where id=.$userid.";

    $sql_update = "UPDATE userinfo SET firstname='$firstname', lastname='$lastname', email='$email', phonenumber='$phonenumber', gender='$gender', hobbies='$hobbies', education='$education',user_photo='$new_img_name' WHERE userid='$userid' ; ";

    if (mysqli_query($conn, $sql_update)) {

        echo "data upadated successfully";
    } else {
        echo "error";
    }
}
?>