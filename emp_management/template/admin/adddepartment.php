<?php
include('../../config/connection.php');

if (!$conn) {
    echo "connectoin Failed";
}
session_start();
if (!isset($_SESSION['is_login'])) {
    header("location:../login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --label_color: #717171;
            --placeholder_color: #717171;
        }

        .formcontainer {
            background-color: #fff;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.25);
            width: 800px;
            display: grid;
            place-items: center;
            margin-left: 10%;
            padding: 30px 0 0 0;
            border-radius: 20px;
        }

        #formm {
            width: 100%;
            gap: 30px;
            display: grid;
            padding: 40px;
        }

        #formm label {
            font-weight: 600;
            font-style: normal;
            color: var(--label_color);
        }

        .col {
            width: 100%;
            gap: 60px;
            display: flex;
        }

        .col .row {
            width: 50%;
        }

        .col .row .typeinput,
        .col .row .dropdowns {
            padding: 10px 10px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #B8B8B8;
        }

        select option {
            color: #717171;
        }

        .col .row .radiogrp {
            display: flex;
            padding: 10px 0;
            width: 100%;
            justify-content: space-between;
        }

        .col .row .radiogrp>div {
            width: 30%;
        }

        .col .row .radiogrp>div span {
            margin-left: 10px;
            color: var(--placeholder_color);
        }

        .error {
            width: 100%;
            color: #f00;
        }

        p {
            margin: 0;
        }

        .subbtn {
            padding: 10px 20px;
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 10px;
            width: 197px;
            height: 45px;
            background: #00C897;
        }

        .lstrow {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #main {
            height: 100%;
            position: relative;
            margin-left: 270px;
            padding: 30px 60px;
        }
    </style>
    <script>
        function selectmng(value) {
            console.log(value);
        }
    </script>
</head>

<body>
    <?php
    include("../../include/admin_header.php");
    include("../../include/admin_sidebar.php");
    ?>
    <div id="main">
        <div class="formcontainer">
            <h2>ADD DEPARTMENT</h2>
            <form method="POST" id="formm" name="myform">

                <div class="col">
                    <div class="row">
                        <label for="department">Department Name</label>
                        <br><input type="text" class="typeinput" id="department" name="department"
                            placeholder="Enter Department Name">
                        <span class="error" id="departmenterror"></span>
                    </div>
                </div>
                <!-- <input type="button" onclick="showsubmition()" value="submit"> -->
                <div class="lstrow">
                    <input type="submit" class="subbtn" value="SUBMIT">
                </div>
            </form>
            <div id="output"></div>
        </div>
        </div>
        <script src="../../script/jQuery.js"></script>
        <script>
            $('form').bind('submit', function (e) {
                e.preventDefault();
                flag = true;
                var department = $('#department').val();
                if ($.trim(department).length == 0) {
                    departmenterror = "Please Enter department";
                    $('#departmenterror').text(departmenterror);
                    flag = false;
                } else {
                    var regex = /^[a-z A-Z]+$/;
                    if (!regex.test(department)) {
                        departmenterror = "Number not allowed";
                        $('#departmenterror').text(departmenterror);
                        flag = false
                    } else {
                        departmenterror = "";
                        $('#departmenterror').text(departmenterror);
                    }
                }
                var queryString = 'departmentname=' + department;
                console.log(queryString);
                if (flag) {
                    $.ajax({
                        type: 'POST',
                        url: '../../config/database.php',
                        data: queryString,
                        success: function (data) {
                            $('#output').text(data);
                        }
                    });

                    return false;
                }
            })

        </script>
</body>

</html>