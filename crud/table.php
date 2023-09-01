<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }

        td,
        th {
            min-width: 60px;
            padding: 10px;
        }

        .btns {
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 50%;
        }

        .btns img {
            width: 25px;
            height: 25px;

        }
        .userphoto img{
            width:  50px;

            height: 50px;
        }
    </style>
</head>

<body>
    <h1>All Users information</h1>

    <table>
        <thead>
            <tr>
                <th>User Id</th>
                <th>User Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>hobbies</th>
                <th>Education</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'ongraph';

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            $sql_select = "select `userid`,`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `hobbies`, `education`,`user_photo` from userinfo;";
            $result = $conn->query($sql_select);

            $sql_delete = "DELETE from userinfo where userid='2'";
            $conn->query($sql_delete);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $userid = $row['userid'];
                    $firstname = $row['firstname'];
                    $email = $row['email'];
                    $phonenumber = $row['phonenumber'];
                    $gender = $row['gender'];
                    $hobbies = $row['hobbies'];
                    $education = $row['education'];
                    $photo = $row['user_photo'];
                    echo $photo;
                    echo '<tr>
                    <td>' . $userid . '</td>
            <td><div class="userphoto"><img src="upload_photo/'.$photo.'"></div></td>
            <td>' . $firstname . '</td>
            <td>' . $email . '</td>
            <td>' . $phonenumber . '</td>
            <td>' . $gender . '</td>
            <td>' . $hobbies . '</td>
            <td>' . $education . '</td>
            <td><a class="btns" href="editrow.php?idd=' . $userid . '"><img src="edit.svg " alt=""></a></td>
            <td><a class="btns" href="deleterow.php?idd=' . $userid . '"><img src="delete.svg " alt=""></a></td>
        </tr>';
                }
            }
            ?>
        </tbody>

    </table>

</body>

</html>