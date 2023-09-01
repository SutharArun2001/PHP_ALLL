<?php
include('connection.php');

if (!$conn) {
    echo "connectoin Failed";
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

        .col .row-100 .txtarea {
            overflow: auto;

        }

        .col .row-100 {
            width: 100%;
            height: auto;
        }

        .col .row .typeinput,
        .col .row .dropdowns,
        .col .txtarea {
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
    </style>
    <script>
        function selectmng(value) {
            console.log(value);
        }
    </script>
</head>

<body>
    <div class="formcontainer">
        <h2>Assign Tasks</h2>
        <form method="GET" enctype="multipart/form-data" id="formm" name="myform">
            <div class="col">
                <div class="row">
                    <label for="taskname">Task Name</label>
                    <br><input type="text" class="typeinput" id="taskname" name="taskname"
                        placeholder="Enter Task Name">
                    <span class="error" id="tasknameerror">
                    </span>
                </div>
                <div class="row">
                    <label for="duedate">Due Date</label>
                    <input hidden type="text" id="assigndate" value="">
                    <br><input type="date" class="typeinput" id="duedate" name="duedate"
                        placeholder="Enter Your Last Name">
                    <span class="error" id="duedateerror">
                    </span>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <label for="department">Department</label><br>
                    <select class="dropdowns" id="department" name="department">
                        <option value="0" selected>Select Department Name</option>

                    </select>
                    <span id="departmenterror" class="error">
                </div>
                <div class="row">
                    <label for="empname">Employee Name</label><br>
                    <select class="dropdowns" id="empname" name="empname">
                        <option value="empty" selected>Select Employee Name</option>
                    </select>
                    <span id="empnameerror" class="error">
                </div>
            </div>
            <div class="col">
                <div class="row-100">
                    <label for="description">Description</label><br>
                    <textarea class="txtarea" name="description" id="description"></textarea>
                    <span id="descriptionerror" class="error">
                </div>
            </div>
            <div class="col">
                <div class="lstrow">
                    <input type="submit" class="subbtn" value="SUBMIT">
                    <a href=""></a>
                </div>
            </div>
        </form>
        <div id="output"></div>
    </div>
    <script src="./jQuery.js"></script>
    <script>
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;
        $('#duedate').attr('min', maxDate);


        $(document).ready(function () {
            function loadData(type, category_id) {
                $.ajax({
                    url: 'database.php',
                    type: 'post',
                    data: { type: type, id: category_id },
                    success: function (data) {
                        if (type == 'loademp') {
                            $('#empname').html(data);
                        } else {
                            $('#department').append(data);
                        }
                    }
                })
            }
            loadData();

            $('#department').on('change', function () {
                var department = $('#department').val();
                loadData("loademp", department);
            })
        })


        $('form').bind('submit', function (e) {
            e.preventDefault();

            var taskname = $('#taskname').val();
            var duedate = $('#duedate').val();
            var department = $('#department').val();
            var assigndate = maxDate;
            var empname = $('#empname').val().split(',');
            var firstname = empname[0];
            var lastname = empname[1];
            var empid = empname[2];
            var description = $('#description').val();
            console.log(taskname);
            console.log(duedate);
            console.log(department);
            console.log(empname);
            console.log(description);

            var flag = true;
            if ($.trim(taskname).length == 0) {
                tasknameerror = "Please Enter taskname";
                $('#tasknameerror').text(tasknameerror);
                flag = false;
            } else {
                var regex = /^[a-z A-Z]+$/;
                if (!regex.test(taskname)) {
                    tasknameerror = "Number not allowed";
                    $('#tasknameerror').text(tasknameerror);
                    flag = false
                } else {
                    tasknameerror = "";
                    $('#tasknameerror').text(tasknameerror);
                }
            }

            if (department == '0') {
                departmenterror = "Select your department";
                $('#departmenterror').text(departmenterror);
                flag = false;
            } else {
                departmenterror = "";
                $('#departmenterror').text(departmenterror);
            }
            if (empname == 'empty') {
                empnameerror = "Select your empname";
                $('#empnameerror').text(empnameerror);
                flag = false;
            } else {
                empnameerror = "";
                $('#empnameerror').text(empnameerror);
            }

            if ($.trim(description).length == 0) {
                descriptionerror = "Please Enter description";
                $('#descriptionerror').text(descriptionerror);
                flag = false;
            } else {
                descriptionerror = "";
                $('#descriptionerror').text(descriptionerror);
            }

            if ($.trim(duedate).length == 0) {
                duedateerror = "Please Enter duedate";
                $('#duedateerror').text(duedateerror);
                flag = false;
            } else {
                duedateerror = "";
                $('#duedateerror').text(duedateerror);
            }

            var queryString = 'taskname=' + taskname + '&duedate=' + duedate + '&assigndate=' + assigndate + '&department=' + department + '&firstname=' + firstname + '&lastname=' + lastname + '&empid=' + empid + '&description=' + description;
            console.log(queryString);

            if (flag) {
                $.ajax({
                    type: 'post',
                    url: 'database.php',
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