<?php
include('connection.php');

if(!$conn){
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
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            padding: 10px;
            transform: translate(-50%, -50%);
        }

        #formm {
            padding: 10px;
            border: 1px solid black;
            width: fit-content;
        }

        .row {
            margin: 10px 0px;
            width: 100%;
        }

        .row input:nth-child(1) {
            width: 100%;
        }

        .error {
            width: 100%;
            color: #f00;
        }
        p{
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form method="GET" enctype="multipart/form-data" id="formm" name="myform" >
            <div class="row">
                Firstname:-<input type="text" id="firstname" name="firstname" placeholder="First Name">
                <span class="error" id="firstnameerror">
                </span>
            </div>
            <div class="row">
                Lastname:-<input type="text" id="lastname" name="lastname" placeholder="Last Name">
                <span class="error" id="lastnameerror">
                </span>
            </div>
            <div class="row">
                Email:-<input type="text" id="email" name="email" placeholder="Email">
                <span class="error" id="emailerror">
                </span>
            </div>
            <div class="row">
                Phone Number:-<input type="number" id="phonenumber" placeholder="Phone Number" name="phonenumber"
                    maxlength="10"><br>
                <span class="error" id="numbererror">
                </span>
            </div>
            <div class="row">
                <label>Gender</label><br>
                <input type="radio" id="male" value="male" name="gender">male:-
                <input type="radio" id="female" value="female" name="gender">female:-
                <input type="radio" id="other" value="other" name="gender">other:-
                <span class="error" id="gendererror">
                </span>
            </div>
            <div class="row">
                <label>Job Role</label><br>
                <select id="jobrole" onchange="showdepartment()" name="jobrole" required>
                    <option value="0" selected>Choose your Job Role</option>
                    <option value="manager">Manager</option>
                    <option value="employee">Employee</option>
                </select>
                <span id="jobroleerror" class="error">
                </span>
            </div>
            <div class="row">
                <label for="department">Department</label><br>
                <select onchange="showmangers()" id="department" name="department" >
                    <option value="0" selected>Choose your Department</option>
                    <?php
                    $showDepart = "select department_name from department";
                    $result = $conn->query($showDepart);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $depart_name = $row['department_name'];
                            echo '<option value="' . $depart_name . '">' . $depart_name . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <label for="manager">Mangers</label><br>
                <select name="Manager" id="manager">
                    <option value="0" selected>Choose your Mangers</option>
                    <?php
                    $showManager = "select firstname, lastname from manager_table";
                    $result = $conn->query($showManager);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $manager_name = $row['firstname']." ".$row['lastname'];
                            echo '<option value="'.$manager_name .'">' . $manager_name . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <!-- <input type="button" onclick="showsubmition()" value="submit"> -->
            <input type="button" onclick="showsubmition()" value="submit">
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
            if(gender == null               ){
                genderv = "";
            }else{
                genderv = document.querySelector("input[name='gender']:checked").value;
            }
            var jobrole = document.getElementById("jobrole").value;
            var department = document.getElementById("department").value;
            var manager = document.getElementById("manager").value;
            // var userphoto = document.getElementById("userphoto").value;
            var allspan = document.getElementsByTagName('span');
            var output = document.getElementById("output");
            var querystring = "?firstname=" + firstname;
            querystring += "&lastname=" + lastname + "&email=" + email + "&phonenumber=" + phonenumber + "&gender=" + genderv + "&jobrole=" + jobrole +"&department=" + department + "&manager=" + manager;
            xhttp.onload = function () {
                output.innerHTML = "";
                var responses = this.responseText.split(",");
                // output.innerHTML = responses[3];
                // console.log(responses[2]);
                for (var i = 0; i < responses.length; i++) {
                    output.innerHTML += "<p>"+responses[i]+"</p>";
                }
            }
            xhttp.open("GET","database.php" + querystring, true);
            xhttp.send();
        }
    </script>
</body>

</html>

<!-- // for (var jj = 0; jj < responses.length; jj++) {
                //     for (var ii = 0; ii < allspan.length; ii++) {
                //         if (allspan[ii].id == responses[jj]) {
                //             // alert(err_msg[ii]);
                //             allspan[ii].innerHTML = err_msg[ii];
                //         } else {
                //             // allspan[ii].innerHTML = err_msg[ii];
                //         }

                //     }
                // } -->