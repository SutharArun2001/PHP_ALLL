<?php
include('../crud/connection.php');
// if (!$conn) {
//     echo "connection failed";
// } else {
//     echo "connection successfully";
// }
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$email = $_GET['email'];
$phonenumber = $_GET['phonenumber'];
$gender = $_GET['gender'];
$hobbies = $_GET['hobbies'];
$education = $_GET['education'];
$sql_insert = "INSERT INTO `userinfo` (`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `hobbies`, `education`) VALUES ('$firstname','$lastname','$email','$phonenumber','$gender','$hobbies','$education')";
$fields = $_GET;
if (empty($fields['firstname'])) {
    echo 'Please enter firstname' . ",";
}
if (empty($fields['lastname'])) {
    echo 'Please enter lastname' . ",";
}
if (empty($fields['email'])) {
    echo 'Please enter email' . ",";
}
if (empty($fields['phonenumber'])) {
    echo "Please Enter phone Number" . ",";
}
if ($fields['gender']=='null') {
    echo "Please select your gender" . ",";
}
if (empty($fields['hobbies'])) {
    echo "Please select hobbies" . ",";
}
if (empty($fields['education'])) {
    echo "Please select your Education";
}else{
    echo "";
}

?>