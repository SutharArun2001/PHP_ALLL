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

        #sidebar .container .items a {
            width: 100%;
            text-decoration: none;
            display: flex;
            align-items: center;
            background-color: #F5F5F5;
            height: 50px;
            border-radius: 0 5px 5px 0;
        }
        #sidebar .container .items a:hover {
            box-shadow: 2px 2px 10px rgb(0 0 0 / 20%);
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
                <a href="">
                    <div class="status"></div>
                    <div class="icon"><img src="../../asset/icons/dashboard.svg" alt="" srcset=""></div>
                    <div class="sidetxt">DASHBOARD</div>
                </a>
            </div>
            <div class="items">
                <a href="../employees/assigned_tasks.php">
                    <div class="status"></div>
                    <div class="icon"><img src="../../asset/icons/todo.svg" alt="" srcset=""></div>
                    <div class="sidetxt">MY TASKS</div>
                </a>
            </div>
            <div class="items">
                <a href="../employees/all_tasks.php">
                    <div class="status"></div>
                    <div class="icon"><img src="../../asset/icons/todo.svg" alt="" srcset=""></div>
                    <div class="sidetxt">All TASKS</div>
                </a>
            </div>
            <div class="items">
                <a href="">
                    <div class="status"></div>
                    <div class="icon"><img src="../../asset/icons/departmentlogo.svg" alt="" srcset=""></div>
                    <div class="sidetxt">MY MANAGER</div>
                </a>
            </div>
        </div>
    </div>

</body>

</html>