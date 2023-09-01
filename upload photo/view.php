<!DOCTYPE html>
<html lang="en">
<?php
include('../crud/connection.php');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            max-width: 800px;
            display: flex;
            flex-wrap: wrap;
        }
        .container img{
            width: 300px;
            height: 400px;
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <?php
    $sql_select = "SELECT * FROM uploadfiles";
    $result = mysqli_query($conn, $sql_select);

    if (isset($_GET['name'])) {
        echo "true";
    } else {
        echo "false";
    }
    echo $_GET['name'];
    if (mysqli_num_rows($result) > 0) {
        while ($img = mysqli_fetch_assoc($result)) {
            // echo $img['upload_url'];
            ?>
            <div class="container">
                <img src="upload_file/<?php echo $img['upload_url'];?>" alt="" srcset="">
            </div>
            <?php } } ?>

</body>
</html>