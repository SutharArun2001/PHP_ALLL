<?php
include('connection.php');

if(isset($_GET['empidd'])){
    $id = $_GET['empidd'];
    $delete_query = "DELETE from emp_table where empid=$id";
    mysqli_query($conn, $delete_query);
    header('location:../template/admin/dashboard.php?emp=showemp'); 
}
if(isset($_GET['mngidd'])){
    $id = $_GET['mngidd'];
    $delete_query = "DELETE from manager_table where manager_id=$id";
    mysqli_query($conn, $delete_query);
    header('location:../template/admin/dashboard.php?mng=showwmng');
}
if(isset($_GET['dptidd'])){
    $id = $_GET['dptidd'];
    $delete_query = "DELETE from department where department_id=$id";
    mysqli_query($conn, $delete_query);
    header('location:../template/admin/dashboard.php?dpt=showdpt');
}
mysqli_close($conn);
?>