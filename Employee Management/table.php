<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }

        td,
        th {
            text-align: center;
            min-width: 60px;
            padding: 10px;
        }

        .btns {
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 50%;
        }

        .btns img {
            width: 25px;
            height: 25px;

        }

        .userphoto img {
            width: 50px;

            height: 50px;
        }

        .mainContainer {
            width: fit-content;
        }

        .mainContainer .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .mainContainer .header .actionbtn {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            font-weight: 700;
            background-color: #A5F1E9;
        }
    </style>
</head>

<body>
    <?php
    $action = "employee";
    if (isset($_POST['showmanager'])) {
        $action = "manager";
    }
    if (isset($_POST['showemployee'])) {
        $action = "employee";
    }
    if (isset($_POST['addmanager'])) {
        header('Location:SignUp.php?mngkey="addmanager"');
    }
    if (isset($_POST['addemployee'])) {
        header('Location:SignUp.php?empkey="addemployee"');
    }
    ?>
    <div class="mainContainer">
        <div class="header">
            <?php
            if ($action == "employee") {
                echo "<h1>All Employee</h1>";
            } else {
                echo "<h1>All Managers</h1>";
            }
            ?>

            <form action="" method="post">
                <input type="submit" class="actionbtn" name="showemployee" value="Employee">
                <input type="submit" class="actionbtn" name="addemployee" value="ADD Employee">
                <input type="submit" class="actionbtn" name="showmanager" value="Manager">
                <input type="submit" class="actionbtn" name="addmanager" value="ADD Manager">
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <?php
                    if ($action == "employee") {
                        echo "<th>manager Name</th>";
                    } else {
                        echo "";
                    } ?>
                    <th>Edit</th>
                    <th>Delete</th>
                    <?php
                    if ($action == 'manager') {
                        echo "<th>View Employee</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>

                <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $dbname = 'ongraph';
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // -----------View Employee Under manager--------------
                if ($action == "employee") {
                    $select_emp = "SELECT `empid`,`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `department`,`manager_name` from emp_table";
                    if (isset($_GET['mngidd'])) {
                        echo "manger id is recived";
                        echo $mngidd=$_GET['mngidd'];
                        $selectEmpUnderManager = "SELECT * FROM emp_table WHERE manager_id =$mngidd";
                        $result = $conn->query($selectEmpUnderManager);
                        $conn->query($selectEmpUnderManager );
                    }else{
                        $conn->query($select_emp);
                        $result = $conn->query($select_emp);
                    }

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $userid = $row['empid'];
                            $name = $row['firstname'] . " " . $row['lastname'];
                            $email = $row['email'];
                            $phonenumber = $row['phonenumber'];
                            $gender = $row['gender'];
                            $department = $row['department'];
                            $manager_name = $row['manager_name'];
                            echo '<tr>
                        <td>' . $userid . '</td>
                        <td>' . $name . '</td>
                        <td>' . $email . '</td>
                        <td>' . $phonenumber . '</td>
                        <td>' . $gender . '</td>
                        <td>' . $department . '</td>
                        <td>' . $manager_name . '</td>
                    <td><a class="btns" href="editrow.php?idd=' . $userid . '"><img src="edit.svg " alt=""></a></td>
                    <td><a class="btns" href="deleterow.php?empidd=' . $userid . '"><img src="delete.svg " alt=""></a></td>
                    </tr>';
                        }
                    }
                }

                if ($action == "manager") {
                    $select_mng = "SELECT `manager_id`,`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `department` from manager_table";
                    $result = $conn->query($select_mng);
                    $conn->query($select_mng);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $userid = $row['manager_id'];
                            $name = $row['firstname'] . " " . $row['lastname'];
                            $email = $row['email'];
                            $phonenumber = $row['phonenumber'];
                            $gender = $row['gender'];
                            $department = $row['department'];
                            echo '<tr>
                        <td>' . $userid . '</td>
                        <td>' . $name . '</td>
                        <td>' . $email . '</td>
                        <td>' . $phonenumber . '</td>
                        <td>' . $gender . '</td>
                        <td>' . $department . '</td>
                    <td><a class="btns" href="editrow.php?idd=' . $userid . '"><img src="edit.svg " alt=""></a></td>
                    <td><a class="btns" href="deleterow.php?mngidd=' . $userid . '"><img src="delete.svg " alt=""></a></td>
                    <td><a class="btns" href="table.php?mngidd=' . $userid . '"><img src="show.svg " alt=""></a></td>
                    </tr>';
                        }
                    }
                }
                ?>
            </tbody>

        </table>
    </div>

</body>

</html>