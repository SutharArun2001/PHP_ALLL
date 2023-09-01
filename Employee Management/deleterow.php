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
    $id = $_GET['empidd'];
    $delete_query = "DELETE from manager_table where empid=$id";
    mysqli_query($conn, $delete_query);
}
header('location:table.php');
mysqli_close($conn);
?>