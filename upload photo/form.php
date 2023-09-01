<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="database.php" method="post" enctype="multipart/form-data">
        <img id="view_img" src="" alt="">
        <label for="userphoto">Upload Your Photo</label><br>
        <input type="file" onchange="viewimg(event)" name="userphoto">
        <input type="submit" name="upload">
    </form>

    <script>
        function viewimg(event) {   
            var img = document.getElementById('view_img');
            img.src= URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>

</html>