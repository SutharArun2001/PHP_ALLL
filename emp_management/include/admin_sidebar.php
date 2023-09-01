<!DOCTYPE html>
<html lang="en">

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
            ;
        }

        #sidebar {
            float: left;
            padding-top: 80px;
            height: calc(100vh - 70px);
            width: 270px;
            background-color: #fff;
        }

        #sidebar .container {
            position: relative;
            display: flex;
            padding-right: 10px;
            width: 100%;
            flex-direction: column;
            gap: 10px;
        }

        #sidebar .container .items a:hover {
            box-shadow: 2px 2px 10px rgb(0 0 0 / 20%);
        }
        #sidebar .container .items a {
            width: 100%;
            text-decoration: none;
            display: flex;
            align-items: center;
            background-color: #F5F5F5;
            height: 50px;
            border-radius: 0 5px 5px 0;
        }

        #sidebar .container .items a .status {
            width: 5px;
            height: 100%;
        }

        #sidebar .container .items a .status.active {
            background-color: #41B9FD;
            border-radius: 0 5px 5px 0;
        }

        #sidebar .container .items a .icon {
            width: 70px;
            text-align: center;
        }

        #sidebar .container .items a .icon img {
            width: 25px;
            height: 25px;
        }

        #sidebar .container .items a .sidetxt {
            font-weight: 700;
            font-size: 12px;
            color: #626262;
        }
    </style>
</head>

<body>
    <div id="sidebar">
        <div class="container">
            <div class="items">
                <a href="../admin/dashboard.php?&dashboard=bd&emp='showemp'">
                    <div class="status <?php echo (isset($_GET['dashboard']) ? "active" : "") ?>"></div>
                    <div class="icon"><img src="../../asset/icons/dashboard.svg" alt="" srcset=""></div>
                    <div class="sidetxt">DASHBOARD</div>
                </a>
            </div>
            <div class="items">
                <a href="../admin/add_task.php?addtask='addtask'">
                    <div class="status <?php echo (isset($_GET['addtask']) ? "active" : "") ?>"></div>
                    <div class="icon"><img src="../../asset/icons/todo.svg" alt="" srcset=""></div>
                    <div class="sidetxt">ASSIGN TASK</div>
                </a>
            </div>
            <div class="items">
                <a href="../admin/add_emp.php?add_emp='add_emp'">
                    <div class="status <?php echo (isset($_GET['add_emp']) ? "active" : "") ?>"></div>
                    <div class="icon"><img src="../../asset/icons/emplogo.svg" alt="" srcset=""></div>
                    <div class="sidetxt">ADD EMPLOYEE</div>
                </a>
            </div>
            <div class="items">
                <a href="../admin/add_mng.php?add_mng='add_mng'">
                    <div class="status <?php echo (isset($_GET['add_mng']) ? "active" : "") ?>"></div>
                    <div class="icon"><img src="../../asset/icons/managerlogo.svg" alt="" srcset=""></div>
                    <div class="sidetxt">ADD MANAGER</div>
                </a>
            </div>
            <div class="items">
                <a href="../admin/adddepartment.php?adddepartment='adddepartment'">
                    <div class="status <?php echo (isset($_GET['adddepartment']) ? "active" : "") ?>"></div>
                    <div class="icon"><img src="../../asset/icons/departmentlogo.svg" alt="" srcset=""></div>
                    <div class="sidetxt">ADD DEPARTMENT</div>
                </a>
            </div>
        </div>
    </div>

</body>

</html>