<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ongraph";
    
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_GET['empidd'])){
    $id = $_GET['empidd'];
    $delete_query = "DELETE from emp_table where empid=$id";
    mysqli_query($conn, $delete_query);
}
if(isset($_GET['mngidd'])){
    $id = $_GET['mngidd'];
    $delete_query = "DELETE from manager_table where manager_id=$id";
    mysqli_query($conn, $delete_query);
}
if(isset($_GET['dptidd'])){
    $id = $_GET['dptidd'];
    $delete_query = "DELETE from department where department_id=$id";
    mysqli_query($conn, $delete_query);
}
header('location:home.php');
mysqli_close($conn);
?>