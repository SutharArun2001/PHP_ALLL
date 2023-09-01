<?php
include('../config/connection.php');
if (isset($_POST['username']) || isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $select_query = "select username , password ,role from login WHERE username = '$username' and password ='$password'";
    $result = $conn->query($select_query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['role'] == "employee") {
                echo "employee";
                // header("location:main.php");
            } else {
                // header("location:main.php");
                echo "manager";
            }
        }
    }
}
?>