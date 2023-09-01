<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito Sans">
    <title>Document</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    @if (Session::has('success'))
        {{Session::get('success')}}
    @endif
    @if (Session::has('error'))
        {{Session::get('error')}}
    @endif
    <div class="container">
        <div class="left">
            <div class="content">
                <p class="heading">LOGIN</p>
                <form name="user_login" method="post" action="{{route('login.user')}}">
                    @csrf
                    <div class="input_div">
                        <div class="input-box">
                            <div class="input-label">Username</div>
                            <input name="email" id="email" type="text" value="{{old('email')}}">
                            <span class="error" id="emailerror">
                                @error('email') 
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="input-box">
                            <div class="input-label">
                                <span>Password</span>
                            </div>
                            <input name="password" id="password" type="password">
                            <span class="error" id="pwderror">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="rememberme">
                            <input type="checkbox" id="Remember" name="Remember" value="Bike">
                            <label for="Remember"> Remember Me</label>
                        </div>
                    </div>
                    <input type="submit" value="Login" name="login" class="login-btn">
                    <div class="forgot_passowrd">
                        <a href="#">Forgot Passowrd ?</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="right">
            <img src="/img/login.svg">
        </div>
    </div>
</body>

</html>
