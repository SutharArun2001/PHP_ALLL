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
</head>

<body>
    <form method="get" id="formm" name="myform">
        <div class="row">
            Firstname:-<input type="text" id="firstname" name="firstname" placeholder="First Name">
            <span class="error" id="firstnameerror">
            </span>
        </div>
        <div class="row">
            Lastname:-<input type="text" id="lastname" name="lastname" placeholder="Last Name">
            <Span class="error" id="lastnameerror">
            </Span>
        </div>
        <div class="row">
            Email:-<input type="text" id="email" name="email" placeholder="Email">
            <Span class="error" id="emailerror">
            </Span>
        </div>
        <div class="row">
            Phone Number:-<input type="number" id="phonenumber" placeholder="Phone Number" name="phonenumber"
                maxlength="10"><br>
            <Span class="error" id="numbererror">
            </Span>
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
            <label>Hobbies</label><br>
            <input type="checkbox" name="hobbies[]" value="swimming" id="swimming">Swimming
            <input type="checkbox" name="hobbies[]" value="dancing" id="dancing">Dancing
            <input type="checkbox" name="hobbies[]" value="Sports" id="Sports">Sports
            <span id="hobbieserror" class="error">
            </span>
        </div>
        <div class="row">
            <label>Education</label><br>
            <select id="education" name="education" required>
                <option value="0" selected>Choose your course</option>
                <option value="B.Tech">B.Tech</option>
                <option value="BCA">BCA</option>
                <option value="MCA">MCA</option>
            </select>
            <span id="educationerror" class="error">
            </span>
        </div>
        <!-- <input type="submit" onclick   ="showsubmition()" value="submit"> -->
        <input type="button" onclick="showsubmition()" value="submit">
    </form>
    <p id="output"></p>
    <script>
        function showsubmition() {
            const xhttp = new XMLHttpRequest();
            
            var firstname = document.getElementById("firstname").value;
            var lastname = document.getElementById("lastname").value;
            var email = document.getElementById("email").value;
            var phonenumber = document.getElementById("phonenumber").value;
            var gender = document.querySelector("input[name='gender']:checked");
            var hobbies = document.querySelectorAll("input[name='hobbies[]']:checked");
            var education = document.getElementById("education").value;
            var output = document.getElementById("output");
            var hobbiearr = [];
            var allspan = document.getElementsByTagName('span');
            console.log(allspan);
            for (var i = 0; i < hobbies.length; i++) {
                hobbiearr[i] = hobbies[i].value;
            }
            var querystring = "?firstname=" + firstname;
            querystring += "&lastname=" + lastname + "&email=" + email + "&phonenumber=" + phonenumber + "&gender=" + gender + "&hobbies=" + hobbiearr + "&education=" + education;
            xhttp.onload = function () {
                var responses = this.responseText;
            }
            xhttp.open("GET", "validation.php" + querystring, true);
            xhttp.send(querystring);
        }

    </script>
</body>

</html>