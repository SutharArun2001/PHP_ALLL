<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito Sans">
    <title>Document</title>
    <style>
        * {
            font-family: Nunito Sans;
        }

        body {
            background-color: #F2F9FF;
        }

        .container {
            margin: 5% 13%;
            display: flex;
            align-items: center;
            width: 1100px;
            height: 542px;
            background-color: #fff;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 4px 4px 10px #00000025;
        }

        .container .left {
            width: 65%;
            box-sizing: border-box;
            padding: 0px 12rem;
        }

        .content {
            width: 100%;
        }

        .content .forgot_passowrd {
            display: flex;
            align-items: center;
            height: 50px;
        }

        .content a {
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 1px;
            color: #7171E6;
        }

        .content .heading::before {
            content: '';
            position: absolute;
            bottom: 0px;
            width: 25%;
            background-color: #7171E6;
            height: 3px;

        }

        .content .heading {
            position: relative;
            color: #535353;
            margin: 0 0 2rem 0;
            font-size: 25px;
            display: flex;
            justify-content: center;
            font-weight: 600;
        }


        .input-box {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
        }

        .input-box:nth-child(1) {
            margin-bottom: 15px;
        }

        .input-label {
            margin-bottom: 4px;
            display: flex;
            justify-content: space-between;
            width: 100%;
            color: #707070;
            font-size: 16px;
        }

        input {
            width: 100%;
            height: 45px;
            font-size: 16px;
            padding-left: 20px;
            box-sizing: border-box;
            color: #9A9AA9;
            font-weight: 600;
            border-radius: 35px;
            border: 1px solid #00000025;
        }

        .login-btn:hover {
            background-color: #20b38e;
        }

        .login-btn {
            transition: 0.5s;
            width: 100%;
            height: 40px;
            font-size: 15px;
            background-color: #00C897;
            border: none;
            font-weight: 600;
            color: #fff;
            border-radius: 35px;
            cursor: pointer;
            transition: all 0.2s linear;
        }

        .rememberme {
            width: 100%;
            display: flex;
            height: 50px;
            align-items: center;
        }

        input[type=checkbox] {
            width: 16px;
            border: #969696;
            height: 16px;
        }

        .rememberme label {
            font-size: 15px;
            margin-left: 10px;
            color: #9A9AA9;
        }

        .container .right {
            width: 35%;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            background-color: #A8A8FF;
        }

        .container .right img {
            width: 100%;
        }

        .error {
            color: red;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="left">
            <div class="content">
                <p class="heading">LOGIN</p>
                <form name="user_login" method='post'>
                    <div class="input_div">
                        <div class="input-box">
                            <div class="input-label">Username</div>
                            <input name="email" id="username" type="text">
                            <span class="error" id="emailerror"></span>
                        </div>
                        <div class="input-box">
                            <div class="input-label">
                                <span>Password</span>
                            </div>
                            <input name="password" id="password" type="password">
                            <span class="error" id="pwderror"></span>
                        </div>
                        <div class="rememberme">
                            <input type="checkbox" id="Remember" name="Remember" value="Bike">
                            <label for="Remember"> Remember Me</label>
                        </div>
                    </div>
                    <input type="submit" value="Login" class="login-btn">
                    <div class="forgot_passowrd">
                        <a href="#">Forgot Passowrd ?</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="right">
            <img src="../asset/icons/login.svg">
        </div>
    </div>
    <div id="outputt"></div>
    <script src="../script/jQuery.js"></script>
    <script>

        $('#password').on('change', function () {
            value = $('#password').val();
            if (value.length == 0) {
                // $('#pwderror').html("Password should be 10 digit")
                $('#pwderror').html("Please Enter Password")
            }
        });

        $('form').bind('submit', function (e) {

            e.preventDefault();

            var email = $('#username').val();
            var password = $('#password').val();
            var flag = true;

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

            if ($.trim(password).length == 0) {
                pwderror = "Please Enter Password";
                $('#pwderror').html(pwderror);
                flag = false;
            } else if (!/\d/.test($.trim(password))) {
                pwderror = "Password should contaien numbers";
                $('#pwderror').html(pwderror);
                flag = false;
            } else if (!/[a-z]/.test($.trim(password))) {
                pwderror = "Password should contaien lowercase alphabet";
                $('#pwderror').html(pwderror);
                flag = false;
            } else if (!/[A-Z]/.test($.trim(password))) {
                pwderror = "Password should contaien uppercase alphabet";
                $('#pwderror').html(pwderror);
                flag = false;
            } else if (/[^0-9a-zA-Z]/.test($.trim(password))) {
                pwderror = "Password should contaien uppercase alphabet";
                $('#pwderror').html(pwderror);
                flag = false;
            } else if ($.trim(password).length < 8 || $.trim(password).length > 8) {
                pwderror = "Password should be 8 digit";
                $('#pwderror').html(pwderror);
                flag = false;
            } else {
                pwderror = "";
                $('#pwderror').html(pwderror);
            }

            var queryString = 'username=' + email + '&password=' + password;
            if (flag) {
                $.ajax({
                    type: 'post',
                    url: 'logindatabase.php',
                    data: queryString,
                    success: function (data) {
                        if (data == 'employee') {
                            console.log("employee");
                            } else {
                            // $('#outputt').html(data);
                            console.log("manager");
                        }

                    }
                });
                return flag;
            }
        });
    </script>

</body>

</html>