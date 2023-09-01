<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/login" id="formm" method="post">
        {{-- {{ csrf_field() }} --}}
        {{-- @csrf --}}
        Username:- <input type="text" name="username" id="username" required>
        Password:- <input type="text" name="password" id="password" required>
        <input type="submit" value="Submit">
    </form>
</body>
<script src="script/javascript">
    $('#formm').validate({
        rules: {
            username: require,
            passowrd: {
                required: true,
                minlenght: 8
            }
        },
        message: {
            username: 'please enter username',
            passowrd: {
                required: 'please enter password',
                minlenght: 'enter 8 digit'
            }
        }
    })
</script>

</html>
