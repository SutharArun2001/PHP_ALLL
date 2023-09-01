<?php
include('connection.php');

if (isset($_POST['jobrole']) == 'employee') {
    if (isset($_POST['empid'])) {
        $empid = $_POST['empid'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $gender = $_POST['gender'];
        $department = $_POST['department'];
        $mng_name = $_POST['managername'];
        $mng_id = $_POST['managerid'];

        $sql_update = "UPDATE emp_table SET firstname='$firstname',lastname='$lastname',email='$email', phonenumber='$phonenumber',gender='$gender',department='$department', manager_name='$mng_name',manager_id='$mng_id' WHERE empid='$empid'; ";
        if (mysqli_query($conn, $sql_update)) { 
            echo "data updated emp table successfully";
        } else {
            echo "error occured during updated";
        }
    }
}

if (isset($_POST['jobrole']) == 'manager') {
    if (isset($_POST['mngid'])) {
        $mngid = $_POST['mngid'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $gender = $_POST['gender'];
        $department = $_POST['department'];
        $sql_update = "UPDATE manager_table SET firstname='$firstname',lastname='$lastname',email='$email', phonenumber='$phonenumber',gender='$gender',department='$department' WHERE manager_id='$mngid'; ";

        if (mysqli_query($conn, $sql_update)) {
            echo "data updated mng table successfully";
        } else {
            echo "error occured during updated";
        }
    }
}
if (isset($_POST['dptidd'])) {
    $dptidd = $_POST['dptidd'];
    $dptname = $_POST['dptname'];
    $sql_update = "UPDATE department SET department_name = '$dptname' WHERE department_id = '$dptidd'";
    if (mysqli_query($conn, $sql_update)) {
        
        echo "data updated successfully";
    } else {
        echo "error occured during updated";
    }
}
if (isset($_GET['taskid'])) {
    echo $taskid= $_GET['taskid'];
    $sql_update = "UPDATE emp_tasks SET status ='complete' WHERE task_id = '$taskid'";
    if (mysqli_query($conn, $sql_update)) {
        echo "data updated successfully";
        header('location:../template/employees/assigned_tasks.php');
    } else {
        echo "error occured during updated";
    }
}   

?>