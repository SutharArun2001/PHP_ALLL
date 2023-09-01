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

        #main {
            height: 100%;
            border-radius: 20px;
            position: relative;
            margin-left: 270px;
            padding: 30px 60px;
        }


        .pop_assign_task {
            background-color: #fff;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.25);
            width: 800px;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 20px;
            padding: 30px 50px;
            transform: translate(-50%, -50%);
        }

        .pop_assign_task .header {
            display: flex;
            justify-content: space-between;
        }

        .pop_assign_task .content {
            display: flex;
            width: 100%;
            justify-content: space-between;
            height: 100%;
        }

        .pop_assign_task .content .yline {
            height: 100%;
            width: 1px;
            background-color: #CCCCCC;
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
                        <th>Done</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_mng = "SELECT `task_id`,`task_name`,`empid`, `assign_date`,`due_Date`,  `description` from emp_tasks";
                    $result = $conn->query($select_mng);
                    $conn->query($select_mng);
                    $srno = 1;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $taskid = $row['task_id'];
                            $taskname = $row['task_name'];
                            $assignDate = $row['assign_date'];
                            $dueDate = $row['due_Date'];
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
                        <td>
                        <div>
                            <a href="../../config/update.php?taskid=' . $taskid . '">
                                <div class="actions"><img src="../../asset/icons/approve.svg" alt="" srcset="">
                                </div>
                            </a>
                        </div>
                    </td>
                    </tr>';
                            $srno++;
                        }
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
    <div class="pop_assign_task">
        <div class="header">
            <h2>Assigned Tasks</h2>
            <div class="status">
                <div class="complete">
                    <span>Completed</span>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="left">
                <div class="fields">
                    <label for="">Task Id </label>
                    <p>Suthar Arun</p>
                </div>
                <div class="line"></div>
                <div class="fields">
                    <label for="">Task Id </label>
                    <p>Suthar Arun</p>
                </div>
                <div class="line"></div>
                <div class="fields">
                    <label for="">Task Id </label>
                    <p>Suthar Arun</p>
                </div>
            </div>
            <div class="yline"></div>
            <div class="rigit">
                <div class="fields">
                    <label for="">Task Id </label>
                    <p>Suthar Arun</p>
                </div>
                <div class="line"></div>
                <div class="fields">
                    <label for="">Task Id </label>
                    <p>Suthar Arun</p>
                </div>
                <div class="line"></div>
                <div class="fields">
                    <label for="">Task Id </label>
                    <p>Suthar Arun</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>