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
            height: 100%;
            background-color: #F2F9FF;
            overflow: scroll;
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
    <div id="main">
        <?php
        if (isset($_GET['addemp'])) {
            include("signup.php");
        } else if (isset($_GET['dashboard'])) {
            include("dashboard.php");
        } else if (isset($_GET['addmng'])) {
            include("signup.php");
        } else if (isset($_GET['adddept'])) {
            include("adddepartment.php");  
        } else if (isset($_GET['editemp']) || isset($_GET['editmng'])) {
            include("editrow.php");
        }else if (isset($_GET['editdpt'])) {
            include("editdpt.php");
        }else if (isset($_GET['addtask'])) {
            include("add_task.php");
        }else{
            include("");
        }
        ?>

    </div>


</body>

</html>