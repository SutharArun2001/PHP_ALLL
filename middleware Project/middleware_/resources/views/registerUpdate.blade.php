<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="/css/register.css">
</head>

<body>
    {{-- <pre>
    @php 
        print_r($errors->all());
        $demo = 1;
        @endphp
    </pre> --}}
    <div class="formcontainer">
        <h1>
            {!! $title !!}
        </h1>
        <form action="{{ $url }}" id="formm" method="post">
            @csrf
            <div class="col">
                <div class="row">
                    <label for="firstname">Firstname</label>
                    <br><input type="text" class="typeinput" id="firstname" name="firstname"
                        placeholder="Enter Your First Name" value="{{ $stdinfo->firstname }}">
                    <span class="error" id="firstnameerror">
                        @error('firstname')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="row">
                    <label for="firstname">Lastname</label>
                    <br><input type="text" class="typeinput" id="lastname" name="lastname"
                        placeholder="Enter Your Last Name" value="{{ $stdinfo->lastname }}">
                    <span class="error" id="lastnameerror">
                        @error('lastname')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <label for="Email">Email</label>
                    <br><input type="text" class="typeinput" id="email" name="email" placeholder="Enter Email"
                        value="{{ $stdinfo->email }}">
                    <span class="error" id="emailerror">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="row">
                    <label for="Phone Number">Phone Number</label>
                    <br><input type="text" class="typeinput" id="phonenumber" placeholder="Enter Your Phone Number"
                        name="phonenumber" maxlength="10" value="{{ $stdinfo->phonenumber }}"><br>
                    <span class="error" id="numbererror">
                        @error('phonenumber')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <label>Gender</label><br>
                    <div class="radiogrp">
                        <div>
                            <input type="radio" id="male" value="male" name="gender"
                                {{ $stdinfo->gender == 'male' ? 'checked' : '' }}><span>Male</span>
                        </div>
                        <div>
                            <input type="radio" id="female" value="female" name="gender"
                                {{ $stdinfo->gender == 'female' ? 'checked' : '' }}><span>Female</span>
                        </div>
                        <div>
                            <input type="radio" id="other" value="other" name="gender"
                                {{ $stdinfo->gender == 'other' ? 'checked' : '' }}><span>Other</span>
                        </div>
                    </div>
                    <span class="error" id="gendererror">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="row">
                </div>
            </div>
            <div class="col">
                <!-- <input type="button" onclick="showsubmition()" value="submit"> -->
                <div class="lstrow">
                    <input type="submit" class="subbtn" value="SUBMIT">
                    <a href=""></a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
