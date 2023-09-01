<?php
include('connection.php');

if (isset($_POST['$jobrole'])) {
    $jobrole = $_POST['jobrole'];
    if ($jobrole == 'employee') {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $gender = $_POST['gender'];
        $department = $_POST['department'];
        $managername = $_POST['managername'];
        $managerid = $_POST['managerid'];
        $insert_emp = "INSERT INTO `emp_table` (`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `department`,`manager_name`,`manager_id`) VALUES ('$firstname','$lastname','$email','$phonenumber','$gender','$department','$managername','$managerid')";
        if (mysqli_query($conn, $insert_emp)) {
            echo "data inserted Successfully " . "<br>";
        } else {
            echo "error";
        }
    } 
    else if ($jobrole == 'manager') {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $gender = $_POST['gender'];
        $jobrole = $_POST['jobrole'];
        $department = $_POST['department'];
        $insert_emp = "INSERT INTO `manager_table` (`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `department`) VALUES ('$firstname','$lastname','$email','$phonenumber','$gender','$department')";
        if (mysqli_query($conn, $insert_emp)) {
            echo "data inserted Successfully " . "<br>";
        } else {
            echo "error";
        }
    }
} 
else if (isset($_POST['departmentname'])) {
    $dptname = $_POST['departmentname'];
    echo $dptname;
    $sql_insert = "INSERT INTO department (`department_name`) VALUES ('$dptname')";
    if (mysqli_query($conn, $sql_insert)) {
        echo "Department added successfully";
    } else {
        echo "Department not added successfully";
    }
} 
else if (isset($_POST['empid'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $taskname = $_POST['taskname'];
    $duedate = $_POST['duedate'];
    $assigndate = $_POST['assigndate'];
    $department = $_POST['department'];
    $fulname = $firstname . ' ' . $lastname;
    $empid = $_POST['empid'];
    $description = $_POST['description'];
    $sql_insert = "INSERT INTO task_assign (`task_name`,`due_date`,`assign_date`,`department`,`employee_name`,`empid`,`description`) VALUE ('$taskname','$duedate','$assigndate','$department','$fulname','$empid','$description')";
    if (mysqli_query($conn, $sql_insert)) {
        echo "Task Assign Successfully";
    } else {
        echo "Task not Assign";
    }
}
// ----------------- Load data in Depedent Dropdown ---------------------------
else if ($_POST['type'] == '') {
    $showDepart = "select department_name from department";
    $result = $conn->query($showDepart);
    if ($result->num_rows > 0) {
        $str = "";
        while ($row = $result->fetch_assoc()) {
            $depart_name = $row['department_name'];
            $str .= '<option value="' . $depart_name . '">' . $depart_name . '</option>';
        }
    }
    echo $str;
} 
else if ($_POST['type'] == 'loademp') {
    $showDepart = "select empid , firstname , lastname , department from emp_table WHERE department ='{$_POST['id']}'";
    $result = $conn->query($showDepart);
    if ($result->num_rows > 0) {
        $str = "";
        while ($row = $result->fetch_assoc()) {
            $firstname = $row['firstname'];
            $empid = $row['empid'];
            $lastname = $row['lastname'];
            $department = $row['department'];
            $str .= '<option value="' . $firstname . ',' . $lastname . ',' . $empid . '">' . $firstname . ' ' . $lastname . ' [' . $department . ']' . '</option>';
        }
    }
    echo $str;
}




?>