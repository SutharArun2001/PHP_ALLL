<?php
include('connection.php');

// ----------------- Load department data in Depedent Dropdown ---------------------------
if (isset($_POST['type']) == '') {
    $showDepart = "select department_name from department";
    $result = $conn->query($showDepart);
    if ($result->num_rows > 0) {
        $str = "";
        while ($row = $result->fetch_assoc()) {
            $depart_name = $row['department_name'];
            $str .= '<option value="' . $depart_name . '"' . $select . '>' . $depart_name . '</option>';
        }
    }
    echo $str;
}
// ----------------- Load employees data in Depedent Dropdown ---------------------------
else if ($_POST['type'] == 'loadmng') {
    $showDepart = "SELECT manager_id , firstname , lastname , department from manager_table WHERE department ='{$_POST['id']}'";
    $result = $conn->query($showDepart);
    if ($result->num_rows > 0) {
        $str = "";
        while ($row = $result->fetch_assoc()) {
            $firstname = $row['firstname'];
            $mngid = $row['manager_id'];
            $lastname = $row['lastname'];
            $department = $row['department'];
            $str .= '<option value="' . $firstname . ',' . $lastname . ',' . $mngid . '">' . $firstname . ' ' . $lastname . ' [' . $department . ']' . '</option>';
        }
        echo $str;
    }
}  
// ----------------- Load employees data in Depedent Dropdown ---------------------------

else if ($_POST['type'] == 'loademp') {
    $showEmp = "SELECT empid , firstname , lastname , department from emp_table WHERE department ='{$_POST['id']}'";
    $result = $conn->query($showEmp);
    if ($result->num_rows > 0) {
        $empstr = "";
        while ($row = $result->fetch_assoc()) {
            $empid = $row['empid'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $department = $row['department'];
            $empstr .= '<option value="' . $firstname . ',' . $lastname . ',' . $empid . '">' . $firstname . ' ' . $lastname . ' [' . $department . ']' . '</option>';
        }
        echo $empstr;
    }
}
?>
