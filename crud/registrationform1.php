<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
    </style>
    <script>
        function showsubmition() {
            var firstname = document.getElementById("firstname");
            var lastname = document.getElementById("lastname");
            var email = document.getElementById("email");
            var phonenumber = document.getElementById("phonenumber");
            var education = document.getElementById("education");
            var gender = document.querySelector("input[name='gender']:checked");
            var hobbies = document.querySelector("input[name='hobbies[]']:checked");

            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var nameformat= /^[a-zA-Z ]*$/ ;

            var firstname_error = document.getElementById("firstnameerror");
            var lastname_error = document.getElementById("lastnameerror");
            var email_error = document.getElementById("emailerror");
            var number_error = document.getElementById("numbererror");
            var gender_error = document.getElementById("gendererror");
            var education_error = document.getElementById("educationerror");
            var hobbies_error = document.getElementById("hobbieserror");
            var emailis = email.value;
            var nameis = name.value;


            
            
            if (firstname.value == "") {
                firstname_error.innerText = "Please Enter First Name";
                return false;
            } else {
                firstname_error.textContent = "";
            }
            if (((firstname.value).match(nameformat))) {
                firstname_error.innerText = "";
            } else {
                firstname_error.innerText = "Please Enter Valid name";
                return false;
            }
            
            if (lastname.value == "") {
                lastname_error.innerText = "Please Enter last Name";
                return false;
            } else {
                lastname_error.innerText = "";
            }
            if (((lastname.value).match(nameformat))) {
                lastname_error.innerText = "";
            } else {
                lastname_error.innerText = "Please Enter Valid Name";
                return false;
            }
            
            if (email.value == "") {
                email_error.innerText = "Please Enter Email";
                return false;
            }
            else {
                if ((emailis.match(mailformat))) {
                email_error.innerText = "";
            } else {
                email_error.innerText = "Please Enter Valid Email";
                return false;
            }
                email_error.innerText = "";
            }

            if (phonenumber.value == "" ) {
                number_error.innerText = "Please Enter Phone Number";
                return false;
            } else {
                if((phonenumber.value).match(/^[0-9]*$/))
                {
                    number_error.innerText = "";
                }else{
                    number_error.innerText = "Please Enter Number ONLY";
                    return false;
                }
                number_error.innerText = "";
            }
            
            if((phonenumber.value.length)<10 || (phonenumber.value.length)>10){
                number_error.innerText = "Must be 10 digit";
                return false;
            }else{
                number_error.innerText = "";
            }
            
            if (gender == null) {
                gender_error.innerText = "Please Select Gender.";
                return false;
            } else {
                gender_error.innerText = "";
            }

            if (hobbies == null) {
                hobbies_error.innerText = "Please Select hobbies.";
                return false;
            } else {
                hobbies_error.innerText = "";
            }

            if (education.value == '0') {
                education_error.innerText = "Select your course";
                return false;
            } else {
                education_error.innerText = "";
            }
        }
    </script>


</head>

<body>
<h1>Registration Form</h1>

    <form method="post" id="formm" action="database.php" enctype="multipart/form-data" onsubmit="return showsubmition()" name="myform">
        <div class="row">
            Firstname:-<input type="text" id="firstname" name="firstname" placeholder="First Name">
            <span class="error" id="firstnameerror"></span>
        </div>
        <div class="row">
            Lastname:-<input type="text" id="lastname" name="lastname" placeholder="Last Name">
            <Span class="error" id="lastnameerror"></Span>
        </div>
        <div class="row">
            Email:-<input type="text" id="email" name="email" placeholder="Email">
            <Span class="error" id="emailerror"></Span>
        </div>
        <div class="row">
            Phone Number:-<input type="text" id="phonenumber" placeholder="Phone Number" name="phonenumber"
                maxlength="10"><br>
            <Span class="error" id="numbererror"></Span>
        </div>
        <div class="row">
            <label>Gender</label><br>
            <input type="radio" id="male" value="male" name="gender">male:-
            <input type="radio" id="female" value="female" name="gender">female:-
            <input type="radio" id="other" value="other" name="gender">other:-
            <span class="error" id="gendererror"></span>
        </div>
        <div class="row">
            <label>Hobbies</label><br>
            <input type="checkbox" name="hobbies[]" value="swimming" id="swimming">Swimming
            <input type="checkbox" name="hobbies[]" value="dancing" id="dancing">Dancing
            <input type="checkbox" name="hobbies[]" value="Sports" id="Sports">Sports
            <span id="hobbieserror" class="error"></span>
        </div>
        <div class="row">
            <label>Education</label><br>
            <select id="education" name="education" required>
                <option value="0" selected>Choose your course</option>
                <option value="B.Tech">B.Tech</option>
                <option value="BCA">BCA</option>
                <option value="MCA">MCA</option>
            </select>
            <span id="educationerror" class="error"></span>
        </div>

        <div class="row">
            <label for="userPhoto">Upload Your Photo</label><br>
            <input type="file" name="userphoto">
        </div>
        <!-- <button type="submit" onclick="showsubmition()">Submit</button> -->
        <input type="submit" value="submit">
    </form>



</body>

</html>