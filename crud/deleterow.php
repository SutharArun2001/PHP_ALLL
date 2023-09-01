<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ongraph";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_GET['idd'])){
    $id = $_GET['idd'];
    $delete_query = "DELETE from userinfo where userid=$id";
    mysqli_query($conn, $delete_query);
}
header('location:table.php');
mysqli_close($conn);
?>