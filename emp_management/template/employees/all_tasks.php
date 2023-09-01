<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    header("location:../login.php");
    die();
} else {
}
include('../../config/connection.php');

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        :root {
            --text_color: #626262;
            --green_light: #1C963E;
            --pink_dark: #AF2098;
            --blue_dark: #1C6396;
            --light_bg: #FBFBFB;
        }

        * {
            margin: 0;
            padding: 0;
            font-family: 'Nunito Sans', sans-serif;
            box-sizing: border-box;
        }

        table {
            overflow: hidden;
            width: 100%;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            border-collapse: collapse;

        }

        .table p {
            margin-top: 30px;
            height: 30px;
            color: var(--text_color);
            font-weight: 600;
        }

        table,
        td,
        th {
            font-size: 13px;
            background-color: #fff;
        }

        .table table tr td {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        td,
        th {
            height: 50px;
            color: var(--text_color);
            text-align: center;
            min-width: 60px;
        }

        .table table tr td:nth-child(6) {
            max-width: 250px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            text-align: left;
        }

        .table td div {
            width: 100%;
            display: grid;
            place-items: center;
        }

        .table td a .actions {
            width: 50px;
            height: 30px;
            border-radius: 5px;
            background-color: #e9e9e9;
            display: grid;
            place-items: center;
        }

        .table td a .actions img {
            width: 20px;
            height: 20px;
        }

        tbody tr:nth-child(even) td {
            background-color: var(--light_bg);
        }

        td .status {
            width: 100%;
            padding: 0 10px;
            height: 30px;
        }

        .status .complete {
            height: 30px;
            border-radius: 5px;
            background-color: #C4FFB5;
        }

        .status .complete span {
            color: #208747;
        }

        .status .pending {
            height: 30px;
            border-radius: 5px;
            background-color: #D9D9FF;
        }

        .status .pending span {
            color: #0000FF;
        }

        #main {
            height: 100%;
            border-radius: 20px;
            position: relative;
            margin-left: 270px;
            padding: 30px 60px;
        }
    </style>
</head>

<body>
    <?php
    include("../../include/emp_header.php");
    include("../../include/emp_sidebar.php");
    ?>
    <div id="main">
        <div class="table">
            <p>All Assigned Tasks</p>
            <table>
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Task ID</th>
                        <th>Task Name</th>
                        <th>Assign Date</th>
                        <th>Due Date</th>
                        <th style="text-align:left;">Description</th>
                        <th>View</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_mng = "SELECT `task_id`,`task_name`,`empid`, `assign_date`,`due_Date`, `description`,`status` from emp_tasks";
                    $result = $conn->query($select_mng);
                    $conn->query($select_mng);
                    $srno = 1;
                    if ($result->num_rows > 0) {
                        $srno = 1;
                        while ($row = $result->fetch_assoc()) {
                            $taskid = $row['task_id'];
                            $taskname = $row['task_name'];
                            $assignDate = $row['assign_date'];
                            $dueDate = $row['due_Date'];
                            $status = $row['status'];
                            $description = $row['description'];
                            $userid = $row['empid'];
                            echo '<tr>
                                    <td>' . $srno . '</td> 
                                    <td>' . $taskid . '</td>
                                    <td>' . $taskname . '</td>
                                    <td>' . $assignDate . '</td>
                                    <td>' . $dueDate . '</td>
                                    <td style="text-align:left;">' . $description . '</td>
                        <td>
                            <div>
                                <a href="">
                                    <div class="actions"><img src="../../asset/icons/show.svg" alt="" srcset=""></div>
                                </a>
                            </div>
                        </td>
                        <td>';
                            if ($status == "complete") {
                                echo '
                            <div class="status">
                            <div class="complete">
                            <span>Completed</span>
                            </div>
                            </div>';
                            } else {
                                echo '
                            <div class="status">
                            <div class="pending">
                            <span>Pending</span>
                            </div>
                            </div>';
                            }
                            echo '</td>
                    </tr>';
                            $srno++;
                        }
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</body>

</html>