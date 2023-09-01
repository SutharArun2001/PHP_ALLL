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
    </style>
    <script>
        function selectmng(value) {
            console.log(value);
        }
    </script>
</head>

<body>
    <div class="formcontainer">
        <?php
        if (isset($_GET['editemp'])) {
            echo "<h2>UPDATE EMPLOYEE INFO</h2>";
        } else if (isset($_GET['editmng'])) {
            echo "<h2>UPDATE ADD MANAGER INFO</h2>";
        }

        if (isset($_GET['editemp'])) {
            $empid = $_GET['editemp'];
            $jobrole = 'employee';
            $select_query = "SELECT `empid`,`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `department`,`manager_name` FROM emp_table WHERE empid= $empid ;";
            $result = $conn->query($select_query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $userid = $row['empid'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $email = $row['email'];
                    $phonenumber = $row['phonenumber'];
                    $gender = $row['gender'];
                    $department = $row['department'];
                    $mng = $row['manager_name'];
                }
            }
        } else if (isset($_GET['editmng'])) {
            $userid = $_GET['editmng'];
            $jobrole = 'manager';
            $select_query = "SELECT `manager_id`,`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `department` FROM manager_table WHERE manager_id= $userid ;";
            $result = $conn->query($select_query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $mngid = $row['manager_id'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $email = $row['email'];
                    $phonenumber = $row['phonenumber'];
                    $gender = $row['gender'];
                    $department = $row['department'];
                }
            }
        }


        ?>
        <form method="GET" enctype="multipart/form-data" id="formm" name="myform">
            <input name="userid" id="userid" value="<?php echo $userid ?>" hidden>
            <div class="col">
                <div class="row">
                    <label for="firstname">Firstname</label>
                    <br><input type="text" class="typeinput" value="<?php echo $firstname ?>" id="firstname"
                        name="firstname" placeholder="Enter Your First Name">
                    <span class="error" id="firstnameerror">
                    </span>
                </div>
                <div class="row">
                    <label for="firstname">Lastname</label>
                    <br><input type="text" class="typeinput" value="<?php echo $lastname; ?>" id="lastname"
                        name="lastname" placeholder="Enter Your Last Name">
                    <span class="error" id="lastnameerror">
                    </span>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <label for="Email">Email</label>
                    <br><input type="text" class="typeinput" value="<?php echo $email; ?>" id="email" name="email"
                        placeholder="Enter Email">
                    <span class="error" id="emailerror">
                    </span>
                </div>
                <div class="row">
                    <label for="Phone Number">Phone Number</label>
                    <br><input type="number" class="typeinput" value="<?php echo $phonenumber; ?>" id="phonenumber"
                        placeholder="Enter Your Phone Number" name="phonenumber"><br>
                    <span class="error" id="numbererror">
                    </span>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <label>Gender</label><br>
                    <div class="radiogrp">
                        <div>
                            <input type="radio" id="male" value="male" name="gender" <?php echo ($gender == 'male') ? "checked" : "" ?>><span>Male</span>
                        </div>
                        <div>
                            <input type="radio" id="female" value="female" name="gender" <?php echo ($gender == 'female') ? "checked" : "" ?>><span>Female</span>
                        </div>
                        <div>
                            <input type="radio" id="other" value="other" name="gender" <?php echo ($gender == 'other') ? "checked" : "" ?>><span>Other</span>
                        </div>
                    </div>
                    <span class="error" id="gendererror">
                    </span>
                </div>
                <div class="row">
                    <label>Job Role</label><br>
                    <select id="jobrole" class="dropdowns" onchange="hidemanager(this.value)" name="jobrole" required>
                        <option value="0" disabled>Select your Job Role</option>
                        <option value="manager" <?php echo ($jobrole == 'manager') ? "selected" : "" ?>>Manager</option>
                        <option value="employee" <?php echo ($jobrole == 'employee') ? "selected" : "" ?>>Employee
                        </option>
                    </select>
                    <span id="jobroleerror" class="error">
                    </span>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <label for="department">Department</label><br>
                    <select onchange="showmangers(this.value)" class="dropdowns" id="department" name="department">
                        <option value="0" disabled>Select your Department</option>
                        <?php
                        $showDepart = "select department_name from department";
                        $result = $conn->query($showDepart);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $depart_name = $row['department_name'];
                                if ($depart_name == $department) {
                                    $select = "selected";
                                } else {
                                    $select = "";
                                }
                                echo '<option value="' . $depart_name . '" ' . $select . ' >' . $depart_name . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="row">
                    <label for="manager">Mangers</label><br>
                    <select name="manager" style="text-color:var(--placeholder_color)" class="dropdowns" disabled
                        id="manager" onchange="selectmng(this.value)">
                        <option value="0" selected>Select your Mangers</option>
                        <?php
                        $showManager = "SELECT manager_id, firstname, lastname,department FROM manager_table";
                        $result = $conn->query($showManager);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $manager_name = $row['firstname'] . " " . $row['lastname'];
                                if ($manager_name == $mng) {
                                    $select = 'selected';
                                } else {
                                    $select = '';
                                }
                                $mngid = $row['manager_id'];
                                echo '<option value="' . $manager_name . ',' . $mngid . '"' . $select . '>' . $manager_name . ' [' . $row['department'] . ']' . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <span id="managererror" class="error">
                </div>
            </div>
            <div class="col">
                <!-- <input type="button" onclick="showsubmition()" value="submit"> -->
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
        var jobrole = $('#jobrole').val();
        if (jobrole == 'employee') {
            $('#manager').removeAttr('disabled')
        } else if (jobrole == 'manager') {
            $('#manager').attr('disabled', 'disabled')
        }
        console.log(manager);

        function selectmng(value) {
            value = value.split(',');
        }
        var showmanager = 0;
        function hidemanager(value) {
            if (value == 'employee') {
                showmanager = 1;
                $('#manager').removeAttr('disabled')
            } if (value == 'manager') {
                managererror = "";
                $('#managererror').text(managererror);
                showmanager = 0;
                $('#manager').attr('disabled', 'disabled')
                $('#manager').val(0)
            }
        }

        $('form').bind('submit', function (e) {
            e.preventDefault();

            var userid = $('#userid').val();
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var email = $('#email').val();
            var phonenumber = $('#phonenumber').val();
            var department = $('#department').val();
            var gender = $('input[type=radio][name=gender]:checked').val();
            var jobrole = $('#jobrole').val();
            var department = $('#department').val();
            var manager = $('#manager').val().split(',');
            var managername = manager[0];
            var managerid = manager[1];

            var flag = true;
            if ($.trim(firstname).length == 0) {
                firstnameerror = "Please Enter Firstname";
                $('#firstnameerror').text(firstnameerror);
                flag = false;
            } else {
                var regex = /^[a-z A-Z]+$/;
                if (!regex.test(firstname)) {
                    firstnameerror = "Number not allowed";
                    $('#firstnameerror').text(firstnameerror);
                    flag = false
                } else {
                    firstnameerror = "";
                    $('#firstnameerror').text(firstnameerror);
                }
            }

            if ($.trim(lastname).length == 0) {
                lastnameerror = "Please Enter lastname";
                $('#lastnameerror').text(lastnameerror);
                flag = false;
            } else {
                var regex = /^[a-zA-Z]+$/;
                if (!regex.test(lastname)) {
                    lastnameerror = "Number not allowed";
                    $('#lastnameerror').text(lastnameerror);
                    flag = false;

                } else {
                    lastnameerror = "";
                    $('#lastnameerror').text(lastnameerror);
                }
            }

            if ($.trim(email).length == 0) {
                emailerror = "Please Enter email";
                $('#emailerror').text(emailerror);
                flag = false;
            } else {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    emailerror = "Please Enter valid Email";
                    $('#emailerror').text(emailerror);
                    flag = false;
                } else {
                    emailerror = "";
                    $('#emailerror').text(emailerror);
                }
            }

            if ($.trim(phonenumber).length == 0) {
                phonenumbererror = "Please Enter phone number";
                $('#numbererror').text(phonenumbererror);
                flag = false;
            } else {
                if ($.trim(phonenumber).length < 10 || $.trim(phonenumber).length > 10) {
                    phonenumbererror = "Only 10 Digit Number Allowed";
                    $('#numbererror').text(phonenumbererror);
                    flag = false;
                }
                else {
                    phonenumbererror = "";
                    $('#numbererror').text(phonenumbererror);
                }
            }

            if ($('input[type=radio][name=gender]:checked').length == 0) {
                gendererror = "Select your Gender";
                $('#gendererror').text(gendererror);
                flag = false;
            } else {
                gendererror = "";
                $('#gendererror').text(gendererror);
            }

            if (jobrole == '0') {
                jobroleerror = "Select your jobrole";
                $('#jobroleerror').text(jobroleerror);
                flag = false;
            } else {
                jobroleerror = "";
                $('#jobroleerror').text(jobroleerror);
            }

            if (department == '0') {
                departmenterror = "Select your department";
                $('#departmenterror').text(departmenterror);
                flag = false;
            } else {
                departmenterror = "";
                $('#departmenterror').text(departmenterror);
            }

            if (showmanager == 1) {
                if (manager == 0) {
                    managererror = "Select your manager";
                    $('#managererror').text(managererror);
                    flag = false;
                } else {
                    managererror = "";
                    $('#managererror').text(managererror);
                }
            } else { }


            if (jobrole == 'employee') {
                var queryString = 'empid=' + userid + '&firstname=' + firstname + '&lastname=' + lastname + '&email=' + email + '&phonenumber=' + phonenumber + '&gender=' + gender + '&jobrole=' + jobrole + '&department=' + department + '&managername=' + managername + '&managerid=' + managerid;
                console.log(queryString);
            } else { }
            if (jobrole == 'manager') {
                var queryString = 'mngid=' + userid + '&firstname=' + firstname + '&lastname=' + lastname + '&email=' + email + '&phonenumber=' + phonenumber + '&gender=' + gender + '&jobrole=' + jobrole + '&department=' + department;
                console.log(queryString);
            } else { }

            if (flag) {
                $.ajax({
                    type: 'post',
                    url: 'update.php',
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