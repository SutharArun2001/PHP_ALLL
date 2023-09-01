<?php
echo "asdf";

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
            foreach ($post as $name => $error) {
                if (empty($post[$name])) {
                    if ($name == 'firstname'){
                        $firstname_err = "Please Enter Firstname";
                    }
                    if ($name == 'lastname'){
                        $lastname_err = "Please Enter Last Name";
                    }
                    if ($name == 'email'){
                        $email_err = "Please Enter email";
                    }
                    if ($name == 'phonenumber'){
                        $phonenumber_err = "Please Enter phone Number";
                    }
                    if ($name=='gender' || empty($post['gender']) ){
                        $gender_err = "Please select gender";
                    }
                    if ($name == 'hobbies' || empty($post['hobbies'])){
                        $hobbies_err = "Please select hobbies";
                    }
                    if ($name == 'educFation'){
                        $education_err = "Please select your Educatio";
                    }
                }
                // echo $name."<br>";
                // if($post[$name]=='firstname'){
        
                // }
                // echo $field[$name]."<br>";
            }
        }
    // header('Location:form.php');
?>