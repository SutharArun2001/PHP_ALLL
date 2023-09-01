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

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            width: auto;
            padding: 10px;
            transform: translate(-50%, -50%);
        }

        #formm {
            width: 401px;
            padding: 20px;
            border: 1px solid black;
        }

        .row {
            margin: 10px 0px;
            width: 100%;
        }

        .row input:nth-child(2) {
            width: 100%;
            padding: 5px;
        }

        .row select {
            padding: 5px;
        }

        .row select option {
            padding: 5px;
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
            background: #54B435;
        }

        .lstrow {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_GET['empkey'])) {
            echo "<h1>Add Employee</h1>";
        }else if(isset($_GET['mngkey'])) {
            echo "<h1>Add Manager</h1>";
        }
        else{
            echo "<h1>Sign Up</h1>";
        }
        ?>
        <form method="GET" enctype="multipart/form-data" id="formm" name="myform">
            <div class="row">
                Firstname:-<br><input type="text" id="firstname" name="firstname" placeholder="First Name">
                <span class="error" id="firstnameerror">
                </span>
            </div>
            <div class="row">
                Lastname:-<br><input type="text" id="lastname" name="lastname" placeholder="Last Name">
                <span class="error" id="lastnameerror">
                </span>
            </div>
            <div class="row">
                Email:-<br><input type="text" id="email" name="email" placeholder="Email">
                <span class="error" id="emailerror">
                </span>
            </div>
            <div class="row">
                Phone Number:-<br><input type="number" id="phonenumber" placeholder="Phone Number" name="phonenumber"
                    maxlength="10"><br>
                <span class="error" id="numbererror">
                </span>
            </div>
            <div class="row">
                <label>Gender</label><br>
                <input type="radio" id="male" value="male" name="gender">male
                <input type="radio" id="female" value="female" name="gender">female
                <input type="radio" id="other" value="other" name="gender">other
                <span class="error" id="gendererror">
                </span>
            </div>
            <div class="row">
                <label>Job Role</label><br>
                <select id="jobrole" onchange="showdepartment(this.value)" name="jobrole" required>
                    <option value="0" selected>Choose your Job Role</option>
                    <option value="manager">Manager</option>
                    <option value="employee">Employee</option>
                </select>
                <span id="jobroleerror" class="error">
                </span>
            </div>
            <div class="row">
                <label for="department">Department</label><br>
                <select onchange="showmangers()" id="department" name="department">
                    <option value="0" selected>Choose your Department</option>
                    <?php
                    $showDepart = "select department_name from department";
                    $result = $conn->query($showDepart);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $depart_name = $row['department_name'];
                            echo '<option value="' . $depart_name . '">' . $depart_name . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <label for="manager">Mangers</label><br>
                <select name="Manager" id="manager" onchange="selectmngid(this.value)">
                    <option value="0" selected>Choose your Mangers</option>
                    <?php
                    $showManager = "SELECT manager_id, firstname, lastname,department FROM manager_table";
                    $result = $conn->query($showManager);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $manager_name = $row['firstname'] . " " . $row['lastname'];
                            echo '<option value="'. $manager_name.'">' . $manager_name .' ['.$row['department'].']'.'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <!-- <input type="button" onclick="showsubmition()" value="submit"> -->
            <div class="lstrow">
                <input type="button"  class="subbtn" onclick="showsubmition()" value="submit">
                <a href=""></a>
            </div>
        </form>
        <div id="output"></div>
    </div>
    <script>
        function showsubmition() {
            const xhttp = new XMLHttpRequest();
            var firstname = document.getElementById("firstname").value;
            var lastname = document.getElementById("lastname").value;
            var email = document.getElementById("email").value;
            var phonenumber = document.getElementById("phonenumber").value;
            var gender = document.querySelector("input[name='gender']:checked");
            if (gender == null) {
                genderv = "";
            } else {
                genderv = document.querySelector("input[name='gender']:checked").value;
            }
            var jobrole = document.getElementById("jobrole").value;
            var department = document.getElementById("department").value;
            // var mngid ;
            // var deptname =['php','MERN','MEAN'];
            // for(var iii=0;iii<deptname.length;iii++){
            //     if(department == deptname[iii]){
            //         mngid=iii;
            //     }
            // }
            // console.log(department);
            // console.log(mngid);
            var manager = document.getElementById("manager").value;
            console.log(manager);
            var allspan = document.getElementsByTagName('span');
            var output = document.getElementById("output");
            var querystring = "?firstname=" + firstname;
            querystring += "&lastname=" + lastname + "&email=" + email + "&phonenumber=" + phonenumber + "&gender=" + genderv + "&jobrole=" + jobrole + "&department=" + department + "&manager=" + manager;
            // querystring += "&lastname=" + lastname + "&email=" + email + "&phonenumber=" + phonenumber + "&gender=" + genderv + "&jobrole=" + jobrole + "&department=" + department + "&manager=" + manager + "&mngid=" +mngid;
            xhttp.onload = function () {
                output.innerHTML = "";
                var responses = this.responseText.split(",");
                // output.innerHTML = responses[3];
                // console.log(responses[2]);
                for (var i = 0; i < responses.length; i++) {
                    output.innerHTML += "<p>" + responses[i] + "</p>";
                }
            }
            xhttp.open("GET", "database.php" + querystring, true);
            xhttp.send();
        }
    </script>
</body>
</html>