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
    {{-- @php
    print_r($userinfo);
@endphp --}}
    {{-- @if (Session::has('success'))
        {{Session::get('success')}}
    @endif --}}
    @if (Session::has('error'))
        {{ Session::get('error') }}
    @endif
    <div class="container">
        <div class="left">
            <div class="content">
                <p class="heading">LOGIN</p>
                <form name="user_login" method="post" action="{{ route('loginuser') }}">
                    @csrf
                    <div class="input_div">
                        <div class="input-box">
                            <div class="input-label">Username</div>
                            <input name="email" id="email" type="text" value="{{ old('email') }}">
                            <span class="error" id="emailerror">
                                @if (Session::has('erroremail'))
                                    {{ Session::get('error') }}
                                @endif
                                @error('email')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="input-box">
                            <div class="input-label">
                                <span>Password</span>
                            </div>
                            <input name="password" id="password" type="password">
                            <span class="error" id="pwderror">
                                @if (Session::has('errorpassword'))
                                    {{ Session::get('error') }}
                                @endif
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="rememberme">
                            <input type="checkbox" id="Remember" name="Remember" value="{{ asset('') }}">
                            <label for="Remember"> Remember Me</label>
                        </div>
                    </div>
                    <input type="submit" value="Login" name="login" class="login-btn">
                    <div class="links">
                        <a href="#">Forgot Passowrd ?</a>
                        <a href="{{ route('create') }}">Create Account</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="right">
            <img src="/img/login.svg">
        </div>
    </div>
    <script>
        
    </script>
</body>

</html>
