<?php
include('../../config/connection.php');

session_start();
if (!isset($_SESSION['is_login'])) {
    header("location:../login.php");
    die();
}

if (!$conn) {
    echo "connectoin Failed";
}
if (isset($_GET['editemp'])) {
    $empid = $_GET['editemp'];
    $jobrole = 'employee';
    $select_query = "SELECT `empid`,`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `department`,`manager_name` FROM emp_table WHERE empid= $empid ;";
    $result = $conn->query($select_query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $empid = $row['empid'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $phonenumber = $row['phonenumber'];
            $gender = $row['gender'];
            $department = $row['department'];
            $mng = $row['manager_name'];

        }
    }
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
</head>

<body>
    <?php
    include("../../include/admin_header.php");
    include("../../include/admin_sidebar.php");
    ?>
    <div id="main">
        <div class="formcontainer">
            <h2>UPDATE EMPLOYEE INFO</h2>
            <form method="GET" enctype="multipart/form-data" id="formm" name="myform">
                <input type="text" id="empid" value="<?php echo $empid ?>" hidden>
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
                </div>
                <div class="col">
                    <div class="row">
                        <label for="manager">Mangers</label><br>
                        <select name="manager" style="text-color:var(--placeholder_color)" class="dropdowns"
                            id="manager">
                            <option value="0">Select your Mangers</option>
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
                    <div class="row">
                    </div>
                </div>
                <div class="col">
                    <div class="lstrow">
                        <input type="submit" class="subbtn" value="SUBMIT">
                        <a href=""></a>
                    </div>
                </div>
        </div>
        </form>
        <div id="output"></div>
        <script src="../../script/jQuery.js"></script>
        <script>
            $('form').bind('submit', function (e) {
                e.preventDefault();

                var empid = $('#empid').val();
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var email = $('#email').val();
                var phonenumber = $('#phonenumber').val();
                var department = $('#department').val();
                var gender = $('input[type=radio][name=gender]:checked').val();
                var manager = $('#manager').val().split(',');
                console.log(manager);
                var managername = manager[0]
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
                        flag = false
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

                if (department == '0') {
                    departmenterror = "Select your department";
                    $('#departmenterror').text(departmenterror);
                    flag = false;
                } else {
                    departmenterror = "";
                    $('#departmenterror').text(departmenterror);
                }

                if (manager == 0) {
                    managererror = "Select your manager";
                    $('#managererror').text(managererror);
                    flag = false;
                } else {
                    managererror = "";
                    $('#managererror').text(managererror);
                }
                var queryString = 'jobrole=' + 'employee' + '&empid=' + empid + '&firstname=' + firstname + '&lastname=' + lastname + '&email=' + email + '&phonenumber=' + phonenumber + '&gender=' + gender + '&department=' + department + '&managername=' + managername + '&managerid=' + managerid;
                console.log(queryString);

                if (flag) {
                    $.ajax({
                        type: 'post',
                        url: '../../config/update.php',
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