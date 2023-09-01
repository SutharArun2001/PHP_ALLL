<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    header("location:../login.php");
    die();
}
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

        body {
            background-color: #F2F9FF;
        }

        .topcards {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .topcards P {
            color: var(--text_color);
            font-weight: 600;
        }

        .topcards .container {
            display: flex;
            margin-top: 20px;
            align-items: center;
            justify-content: space-between;
        }

        .topcards .container .items a {
            height: 65px;
            text-decoration: none;
            border-radius: 10px;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.25);
            display: flex;
            overflow: hidden;
            align-items: center;
            background-color: #fff;
            width: 270px;
        }

        .topcards .container .items .icon {
            width: 65px;
            height: 100%;
            border-radius: 0 10px 10px 0;
            display: grid;
            place-items: center;
        }

        .topcards .container .items.one .icon {
            background-color: var(--green_light);
        }

        .topcards .container .items.two .icon {
            background-color: var(--pink_dark);
        }

        .topcards .container .items.three .icon {
            background-color: var(--blue_dark);
        }

        .topcards .container .items .icon svg {
            width: 35px;
            height: 35px;
        }

        .topcards .container .items .txt {
            margin-left: 30px;
            font-weight: 700;
            font-size: 15px;
        }

        .topcards .container .items:nth-child(1) .txt {
            color: var(--green_light);
        }

        .topcards .container .items:nth-child(2) .txt {
            color: var(--pink_dark);
        }

        .topcards .container .items:nth-child(3) .txt {
            color: var(--blue_dark);
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

        .table td a .actions {
            width: 50px;
            height: 30px;
            border-radius: 5px;
            margin-left: 15%;
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
            position: relative;
            margin-left: 270px;
            padding: 30px 60px;
        }
    </style>
</head>

<body>
    <?php
    include("../../include/mng_header.php");
    include("../../include/mng_sidebar.php");
    ?>
    <div id="main">
        <div class="topcards">
            <p>DASHBOARD</p>
            <div class="container">
                <div class="items one">
                    <a href="#">
                        <div class="icon">
                            <svg width="46" height="42" viewBox="0 0 46 42" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.8265 21.0157H26.9395C27.3034 19.0102 28.3729 17.2825 29.8869 16.0271C29.8933 16.0271 29.9012 16.0271 29.9107 16.0271C32 15 33 15 33 15C32.7263 13.6315 31.8533 12.4129 31.1192 11.5901C30.4332 10.8212 29.4839 10.3466 28.4615 10.2185C28.1997 10.1857 27.94 10.1636 27.7148 10.1636H16.9645C14.9933 10.1636 13.4254 12.1392 13.3906 14.3074C16.675 15.108 19.2222 17.7594 19.8265 21.0157Z"
                                    fill="#fff" />
                                <path
                                    d="M22.3372 10.091C25.1865 10.091 27.4964 7.83202 27.4964 5.04548C27.4964 2.25894 25.1865 0 22.3372 0C19.4879 0 17.1781 2.25894 17.1781 5.04548C17.1781 7.83202 19.4879 10.091 22.3372 10.091Z"
                                    fill="#fff" />
                                <path
                                    d="M21.6712 34.025C21.6712 30.1102 19.9815 28.4568 17.6369 28.4568H12.2009C15.1341 28.0288 17.3822 25.5606 17.3822 22.5696C17.3822 19.2849 14.661 16.6193 11.2959 16.6193C7.93718 16.6193 5.21443 19.2849 5.21443 22.5696C5.21443 25.5606 7.46256 28.0273 10.3973 28.4568H4.95813C2.61033 28.4568 0.705505 30.9645 0.705505 33.556V41.4835H21.6712V34.025Z"
                                    fill="#fff" />
                                <path
                                    d="M29.1734 22.5696C29.1734 25.5606 31.4231 28.0273 34.3532 28.4568H28.9124C26.563 28.4568 24.7705 30.9645 24.7705 33.556V41.4835H45.5749V34.0297C45.5749 30.1607 43.9469 28.5326 41.6497 28.4931C41.6165 28.4931 41.6197 28.46 41.5912 28.46H36.152C39.0867 28.032 41.3365 25.5637 41.3365 22.5712C41.3365 19.2865 38.6121 16.6208 35.2518 16.6208C31.8946 16.6193 29.1734 19.2849 29.1734 22.5696Z"
                                    fill="#fff" />
                            </svg>

                        </div>
                        <div class="txt one">All EMPLOYEES</div>
                        </a>
                </div>
                <div class="items two ">
                    <a href="#">
                        <div class="icon"><svg width="36" height="32" viewBox="0 0 36 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.55305 10.125C2.60044 10.1521 4.25848 11.0945 5.625 11.0945C6.99152 11.0945 8.70652 10.1521 8.75559 10.125H9.39171C10.4212 10.1281 11.25 10.9588 11.25 11.9833V19.125C11.25 20.3676 10.2426 21.375 9 21.375V29.8125C9 30.7445 8.24449 31.5 7.3125 31.5H3.9375C3.00551 31.5 2.25 30.7445 2.25 29.8125V21.375C1.00737 21.375 0 20.3676 0 19.125V12.0419C0 10.9852 0.855 10.1282 1.91686 10.125H2.55305ZM14.928 10.125C14.9754 10.1521 16.6335 11.0945 18 11.0945C19.3665 11.0945 21.0815 10.1521 21.1306 10.125H21.7667C22.7962 10.1281 23.625 10.9588 23.625 11.9833V19.125C23.625 20.3676 22.6176 21.375 21.375 21.375V29.8125C21.375 30.7445 20.6195 31.5 19.6875 31.5H16.3125C15.3805 31.5 14.625 30.7445 14.625 29.8125V21.375C13.3824 21.375 12.375 20.3676 12.375 19.125V12.0419C12.375 10.9852 13.23 10.1282 14.2919 10.125H14.928ZM32.0625 31.5H28.6875C27.7555 31.5 27 30.7445 27 29.8125V21.375C25.7574 21.375 24.75 20.3676 24.75 19.125V12.0419C24.75 10.9832 25.6082 10.125 26.6669 10.125H27.303C27.303 10.125 28.989 11.0945 30.375 11.0945C31.761 11.0945 33.5056 10.125 33.5056 10.125H34.1417C35.1681 10.125 36 10.9569 36 11.9833V19.125C36 20.3676 34.9926 21.375 33.75 21.375V29.8125C33.75 30.7422 32.9983 31.4962 32.0625 31.5ZM5.625 9C8.11027 9 10.125 6.98527 10.125 4.5C10.125 2.01473 8.11027 0 5.625 0C3.13973 0 1.125 2.01473 1.125 4.5C1.125 6.98527 3.13973 9 5.625 9ZM18 9C20.4853 9 22.5 6.98527 22.5 4.5C22.5 2.01473 20.4853 0 18 0C15.5147 0 13.5 2.01473 13.5 4.5C13.5 6.98527 15.5147 9 18 9ZM34.875 4.5C34.875 6.98527 32.8603 9 30.375 9C27.8897 9 25.875 6.98527 25.875 4.5C25.875 2.01473 27.8897 0 30.375 0C32.8603 0 34.875 2.01473 34.875 4.5Z"
                                    fill="#fff" />
                            </svg>
                        </div>
                        <div class="txt two">ALL MANAGERS</div>
                    </a>
                </div>
                <div class="items three">
                    <a href="#">
                        <div class="icon"><svg width="36" height="37" viewBox="0 0 36 37" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M34.0876 30.83V10.4117C34.0876 9.1928 33.1167 8.14288 31.898 8.14288H23.909V4.62244C23.909 3.40355 22.9258 2.37501 21.707 2.37501H21.1947V1.91476C21.1947 0.882993 20.3367 0 19.3049 0H6.56028C5.5285 0 4.56985 0.882993 4.56985 1.91476V2.37501H4.15813C2.93924 2.37501 1.85556 3.40355 1.85556 4.62244V30.83C0.837698 31.1762 0 32.2061 0 33.4197C0 34.9163 1.26367 36.134 2.76027 36.134H33.2961C34.7926 36.134 36 34.9163 36 33.4197C35.9998 32.2061 35.1055 31.1762 34.0876 30.83ZM15.9358 33.2501H9.82862V27.6519H15.9358V33.2501ZM20.8554 23.4108H4.90897V20.3572H20.8554V23.4108ZM20.8554 16.4554H4.90897V13.4018H20.8554V16.4554ZM20.8554 9.50002H4.90897V6.44644H20.8554V9.50002ZM31.2037 23.4108H25.2662V20.3572H31.2037V23.4108ZM31.2037 16.4554H25.2662V13.4018H31.2037V16.4554Z"
                                    fill="#fff" />
                            </svg>
                        </div>
                        <div class="txt three">ALL DEPARTMENTS</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="table">
            <?PHP
            if (isset($_GET['mng']) == 'showmng') {
                echo "<p>MANAGERS</p>";
            }
            if (isset($_GET['emp']) == 'showemp' || isset($_GET['mngiddtoemp'])) {
                echo "<p>EMPLOYEES</p>";
            }
            if (isset($_GET['dpt']) == 'showdpt') {
                echo "<p>DEPARTMENTS</p>";
            }
            ?>
            <?php
            ?>
            <table>
                <thead>
                    <tr>
                        <?php

                        if (isset($_GET['emp']) || isset($_GET['mngiddtoemp'])) {
                            echo "
                        <th>S.NO</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>Manager</th>
                    <th>Edit</th>
                    <th>Delete</th>
                        ";
                        }
                        if (isset($_GET['mng'])) {
                            echo "
                        <th>S.NO</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Show</th>
                        ";
                        }
                        if (isset($_GET['dpt'])) {
                            echo "
                        <th>S.NO</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        ";
                        }

                        ?>


                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        if (isset($_GET['mngiddtoemp'])) {
                            $mngidd = $_GET['mngiddtoemp'];
                            $selectEmpUnderManager = "SELECT * FROM emp_table WHERE manager_id =$mngidd";
                            $result = $conn->query($selectEmpUnderManager);
                            $conn->query($selectEmpUnderManager);
                        }
                        if (isset($_GET['emp']) == 'showemp') {
                            $select_emp = "SELECT `empid`,`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `department`,`manager_name` from emp_table";
                            $conn->query($select_emp);
                            $result = $conn->query($select_emp);
                        }
                        $srno = 1;
                        if (isset($_GET['mngiddtoemp']) || isset($_GET['emp']) == 'showemp') {
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
                                <td>' . $srno . '</td>
                                <td>' . $userid . '</td>
                                <td>' . $name . '</td>
                                <td>' . $email . '</td>
                                <td>' . $phonenumber . '</td>
                                <td>' . $gender . '</td>
                                <td>' . $department . '</td>
                                <td>' . $manager_name . '</td>
                                <td>
                                    <a href="home.php?editrow.php?&editemp=' . $userid . '">
                                        <div class="actions"><img src="../asset/icons/edit.svg" alt="" srcset=""></div>
                                    </a>
                                </td>
                                <td>
                                    <a href="deleterow.php?empidd=' . $userid . '">
                                        <div class="actions"><img src="../asset/icons/delete.svg" alt="" srcset=""></div>
                                    </a>
                                </td>
                                </tr>';
                                    $srno++;
                                }

                            }
                        }
                        if (isset($_GET['mng']) == 'showmng') {
                            $select_mng = "SELECT `manager_id`,`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `department` from manager_table";
                            $result = $conn->query($select_mng);
                            $conn->query($select_mng);
                            $srno = 1;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $userid = $row['manager_id'];
                                    $name = $row['firstname'] . " " . $row['lastname'];
                                    $email = $row['email'];
                                    $phonenumber = $row['phonenumber'];
                                    $gender = $row['gender'];
                                    $department = $row['department'];
                                    echo '<tr>
                                    <td>' . $srno . '</td> 
                                    <td>' . $userid . '</td>
                                    <td>' . $name . '</td>
                                    <td>' . $email . '</td>
                                    <td>' . $phonenumber . '</td>
                                    <td>' . $gender . '</td>
                                    <td>' . $department . '</td>
                                    <td>
                                        <a href="home.php?editrow.php?&editmng=' . $userid . '">
                                            <div class="actions"><img src="../asset/icons/edit.svg" alt="" srcset=""></div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="deleterow.php?mngidd=' . $userid . '">
                                            <div class="actions"><img src="../asset/icons/delete.svg" alt="" srcset=""></div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="home.php?dashboard=dashboard?&mngiddtoemp=' . $userid . '">
                                            <div class="actions"><img src="../asset/icons/show.svg" alt="" srcset=""></div>
                                        </a>
                                    </td>';
                                    $srno++;
                                }
                            }
                        } else if (isset($_GET['dpt']) == 'showdept') {
                            $select_mng = "SELECT `department_id`,`department_name` from department";
                            $result = $conn->query($select_mng);
                            $conn->query($select_mng);
                            $srno = 1;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $deptid = $row['department_id'];
                                    $deptname = $row['department_name'];
                                    echo '<tr>
                                    <td>' . $srno . '</td>
                                    <td>' . $deptid . '</td>
                                    <td>' . $deptname . '</td>
                                    <td>
                                        <a href="home.php?editdpt.php?&editdpt=' . $deptid . '">
                                            <div class="actions"><img src="../asset/icons/edit.svg" alt="" srcset=""></div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="deleterow.php?dptidd=' . $deptid . '">
                                            <div class="actions"><img src="../asset/icons/delete.svg" alt="" srcset=""></div>
                                        </a>
                                    </td>';
                                    $srno++;
                                }
                            }
                        }
                        ?>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>