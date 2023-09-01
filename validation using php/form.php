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
    <form method="post" id="formm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="" name="myform">
        <?php
        $firstname_err = "";
        $lastname_err = "";
        $email_err = "";
        $phonenumber_err = "";
        $gender_err = "";
        $hobbies_err = "";
        $education_err = "";
        $field = array(
            'firstname' => 'Please Enter First Name',
            'lastname' => 'Please Enter Last Name',
            'email' => 'Please Enter email',
            'phonenumber' => 'Please Enter phone Number',
            'gender' => 'Please select gender',
            'hobbies' => 'Please select hobbies',
            'education' => 'Please select your Education'
        );
        $post = $_POST;
        if (count($post) > 0) {
            // echo  implode(',',$post['hobbies'])."<br>";
            foreach ($post as $name => $error) {
                // echo  $post[$name]."<br>";
                if (empty($post[$name])) {
                    if ($name == 'firstname') {
                        $firstname_err = "Please Enter Firstname";
                    }
                    if ($name == 'lastname') {
                        $lastname_err = "Please Enter Last Name";
                    }
                    if ($name == 'email') {
                        $email_err = "Please Enter email";
                    }
                    if ($name == 'phonenumber') {
                        $phonenumber_err = "Please Enter phone Number";
                    }
                    if ($name == 'gender' || empty($post['gender'])) {
                        $gender_err = "Please select gender";
                    }
                    if ($name == 'hobbies' || empty($post['hobbies'])) {
                        $hobbies_err = "Please select hobbies";
                    }
                    if ($name == 'education') {
                        $education_err = "Please select your Educatio";
                    }
                }
            }
        }
        ?>
        <div class="row">
            Firstname:-<input type="text" id="firstname" name="firstname" placeholder="First Name">
            <span class="error" id="firstnameerror"><?php echo $firstname_err; ?></span>
        </div>
        <div class="row">
            Lastname:-<input type="text" id="lastname" name="lastname" placeholder="Last Name">
            <Span class="error" id="lastnameerror">
                <?php echo $lastname_err; ?>
            </Span>
        </div>
        <div class="row">
            Email:-<input type="text" id="email" name="email" placeholder="Email">
            <Span class="error" id="emailerror"><?php echo $email_err; ?></Span>
        </div>
        <div class="row">
            Phone Number:-<input type="number" id="phonenumber" placeholder="Phone Number" name="phonenumber"
                maxlength="10"><br>
            <Span class="error" id="numbererror">
                <?php echo $phonenumber_err; ?>
            </Span>
        </div>
        <div class="row">
            <label>Gender</label><br>
            <input type="radio" id="male" value="male" name="gender">male:-
            <input type="radio" id="female" value="female" name="gender">female:-
            <input type="radio" id="other" value="other" name="gender">other:-
            <span class="error" id="gendererror">
                <?php echo $gender_err; ?>
            </span>
        </div>
        <div class="row">
            <label>Hobbies</label><br>
            <input type="checkbox" name="hobbies[]" value="swimming" id="swimming">Swimming
            <input type="checkbox" name="hobbies[]" value="dancing" id="dancing">Dancing
            <input type="checkbox" name="hobbies[]" value="Sports" id="Sports">Sports
            <span id="hobbieserror" class="error">
                <?php echo $hobbies_err; ?>
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
                <?php echo $education_err; ?>
            </span>
        </div>
        <input type="submit" value="submit">


    </form>
</body>

</html>