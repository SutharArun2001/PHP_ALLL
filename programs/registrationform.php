<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .row {
            margin: 10px 0px;
        }
    </style>
    
</head>

<body>
    <form method="post" onsubmit="return showsubmition(e)" action="database.php">
        <div class="row">
            Firstname:-<input type="text" id="firstname" name="firstname" placeholder="First Name" required>
            <Span class="firstnameerror"></Span>
        </div>
        <div class="row">
            Lastname:-<input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
            <Span class="lastnameerror"></Span>
        </div>
        <div class="row">
            Email:-<input type="email" id="email" name="email" placeholder="Email" required>
            <Span class="emailerror"></Span>
        </div>
        <div class="row">
            Phone Number:-<input type="text" id="phonenumber" pattern="[789][0-9]{9}" placeholder="Phone Number" name="phonenumber"
                maxlength="10"><br>
            <Span id="numbererror"></Span>
        </div>
        <div class="row">
            <label>Gender</label><br>
            <input type="radio" id="male" value="male" name="gender" required>male:-
            <input type="radio" id="female" value="female" name="gender" required>female:-
            <input type="radio" id="other" value="other" name="gender" required>other:-
            <Span class="gendererror"></Span>
        </div>
        <div class="row">
            <label>Hobbies</label><br>
            <input type="checkbox" name="hobbies[]" value="swimming"id="swimming">Swimming
            <input type="checkbox" name="hobbies[]" value="dancing" id="dancing">Dancing
            <input type="checkbox" name="hobbies[]" value="Sports"  id="Sports">Sports
            <Span class="hobbieserror"></Span>
        </div>
        <div class="row">
            <label>Education</label><br>
            <select id="education" name="education" required >
                <option value="0" selected>Choose your course</option>
                <option value="B.Tech">B.Tech</option>
                <option value="BCA">BCA</option>
                <option value="MCA">MCA</option>
            </select>
            <Span class="educationerror"></Span>
        </div>
        <!-- <button type="submit" onclick="showsubmition()">Submit</button> -->
        <input type="submit" value="submit">
    </form>

    <script>
        function showsubmition(e) {
            var firstname = document.getElementById("firstname").value;
            var lastname = document.getElementById("lastname").value;
            var email = document.getElementById("email").value;
            var phonenumber = document.getElementById("phonenumber").value;
            var education = document.getElementById("education").value;
            var gender = document.getElementsByName("gender");
        }
    </script>
</body>

</html>