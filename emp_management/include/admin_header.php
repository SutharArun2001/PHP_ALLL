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


        #topbar {
            height: 70px;
            width: 100%;
            display: flex;
            align-items: center;
            background-color: #fff;
        }

        #topbar .logo {
            width: 270px;
            height: 100%;
            align-items: center;
            justify-content: center;
            display: flex;
        }

        #topbar .logo img {
            width: 40px;
            height: 40px;
        }

        #topbar .logo p {
            font-size: 12px;
            text-align: right;
            font-weight: 800;
            width: 130px;
        }

        #topbar .humburger {
            text-align: center;
            width: 100px;
        }

        #topbar .userinfo {
            text-align: right;
            position: absolute;
            right: 80px;
        }

        #topbar .logout {
            text-align: right;
            position: absolute;
            right: 20px;
        }

        #topbar .logout .logout_btn:hover {
            box-shadow: 2px 2px 10px rgb(0 0 0 / 20%);
        }

        #topbar .logout .logout_btn {
            width: 40px;
            height: 40px;
            border-radius: 20px;
            background-color: #F5F5F5;
        }
        #topbar .logout .logout_btn a{
            display: grid;
            border-radius: 20px;
            place-items: center;
            width: 100%;
            height: 100%;
        }
        #topbar .logout img {
            height: 20px;
            width: 20px;
        }

        #topbar .userinfo p:nth-child(2) {
            font-size: 12px;
            color: #626262;
        }
    </style>
</head>

<body>

    <div id="topbar">
        <div class="logo">
            <img src="../../asset/icons/comlogo.svg" alt="">
            <p>EMPLOYEE MANAGEMENT SYSTEM</p>
        </div>
        <div class="humburger">
            <img src="../../asset/icons/humburger.svg" alt="" srcset="">
        </div>
        <div class="userinfo">
            <p>Suthar Arun</p>
            <p>Admin</p>
        </div>
        <div class="logout">
            <div class="logout_btn">
                <a href="../../template/logout.php">
                    <img src="../../asset/icons/logout.svg" alt="" srcset="">
                </a>
            </div>
        </div>
    </div>

</body>

</html>