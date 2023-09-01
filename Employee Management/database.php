<?php
include('connection.php');
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$email = $_GET['email'];
$phonenumber = $_GET['phonenumber'];
$gender = $_GET['gender'];
$jobrole = $_GET['jobrole'];
$department = $_GET['department'];
$manager = $_GET['manager'];
// $manageridname = implode(",", $manager);
echo $manager;

$err_lenght = 0;
$fields = $_GET;
if (empty($fields['firstname'])) {
    echo 'Please enter firstname' . ",";
    $err_lenght = 1;
}
if (empty($fields['lastname'])) {
    echo 'Please enter lastname' . ",";
    $err_lenght = 1;
}
if (empty($fields['email'])) {
    echo 'Please enter email' . ",";
    $err_lenght = 1;
}
if (empty($fields['phonenumber'])) {
    echo "Please Enter phone Number" . ",";
    $err_lenght = 1;
}
if (empty($fields['gender'])) {
    echo "Please select your gender" . ",";
    $err_lenght = 1;
}
if (empty($fields['jobrole'])) {
    echo "Please select jobrole" . ",";
    $err_lenght = 1;
}
if (empty($fields['department'])) {
    echo "Please select your department".",";
    $err_lenght = 1;
}
if ($jobrole == 'employee') {
    if (empty($fields['manager'])) {
        echo "Please select Manager";
        $err_lenght = 1;
    }
    if ($err_lenght == 0) {

        $insert_emp = "INSERT INTO `emp_table` (`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `department`,`manager_name`) VALUES ('$firstname','$lastname','$email','$phonenumber','$gender','$department','$manager')";
    }
        if (mysqli_query($conn, $insert_emp)) {
            echo "data inserted Successfully " . "<br>";
        } else {
            echo "error";
        }
}else if ($jobrole == 'manager') {
    if ($err_lenght == 0) {
        $insert_emp = "INSERT INTO `manager_table` (`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `department`) VALUES ('$firstname','$lastname','$email','$phonenumber','$gender','$department')";
    }
        if (mysqli_query($conn, $insert_emp)) {
            echo "data inserted Successfully " . "<br>";
        } else {
            echo "error";
        }
}
// if (empty($fields['empphoto'])) {
//     echo "Please upload your photo";
// }else{
//     echo "";
// }

?>