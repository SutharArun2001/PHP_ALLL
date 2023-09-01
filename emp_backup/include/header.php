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
            right: 20px;
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
            <img src="./icons/comlogo.svg" alt="">
            <p>EMPLOYEE MANAGEMENT SYSTEM</p>
        </div>
        <div class="humburger">
            <img src="./icons/humburger.svg" alt="" srcset="">
        </div>
        <div class="userinfo">
            <p>Suthar Arun</p>
            <p>Admin</p>
        </div>
    </div>
    
</body>
</html>