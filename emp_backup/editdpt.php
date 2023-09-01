<?php
include('connection.php');

if (!$conn) {
    echo "connectoin Failed";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --label_color: #717171;
            --placeholder_color: #717171;
        }

        .formcontainer {
            background-color: #fff;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.25);
            width: 800px;
            display: grid;
            place-items: center;
            margin-left: 10%;
            padding: 30px 0 0 0;
            border-radius: 20px;
        }

        #formm {
            width: 100%;
            gap: 30px;
            display: grid;
            padding: 40px;
        }

        #formm label {
            font-weight: 600;
            font-style: normal;
            color: var(--label_color);
        }

        .col {
            width: 100%;
            gap: 60px;
            display: flex;
        }

        .col .row {
            width: 50%;
        }

        .col .row .typeinput,
        .col .row .dropdowns {
            padding: 10px 10px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #B8B8B8;
        }

        select option {
            color: #717171;
        }

        .col .row .radiogrp {
            display: flex;
            padding: 10px 0;
            width: 100%;
            justify-content: space-between;
        }

        .col .row .radiogrp>div {
            width: 30%;
        }

        .col .row .radiogrp>div span {
            margin-left: 10px;
            color: var(--placeholder_color);
        }

        .error {
            width: 100%;
            color: #f00;
        }

        p {
            margin: 0;
        }

        .subbtn {
            padding: 10px 20px;
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 10px;
            width: 197px;
            height: 45px;
            background: #00C897;
        }

        .lstrow {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <script>
        function selectmng(value) {
            console.log(value);
        }
    </script>
</head>

<body>
    <div class="formcontainer">
        <h2>ADD DEPARTMENT</h2>
        <form method="POST" id="formm" name="myform">

        <?php
            if(isset($_GET['editdpt'])){
                $dptidd = $_GET['editdpt'];
                $edit_dpt = "SELECT `department_id`,`department_name` FROM department WHERE department_id =$dptidd";
                $result = $conn -> query($edit_dpt);
                if($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        $dptidd = $row['department_id'];
                        $dptname = $row['department_name'];
                    }
                }
            }
        ?>
        <input id="dptidd" name="dptidd" value="<?php echo $dptidd;?>" hidden>
            <div class="col">
                <div class="row">
                    <label for="department">Department Name</label>
                    <br><input type="text" class="typeinput" id="department" value="<?php echo $dptname;?>" name="department"
                        placeholder="Enter Department Name">
                    <span class="error" id="departmenterror"></span>
                </div>
            </div>
            <!-- <input type="button" onclick="showsubmition()" value="submit"> -->
            <div class="lstrow">
                <input type="submit" class="subbtn" value="SUBMIT">
            </div>
        </form>
        <div id="output"></div>
    </div>
    <script src="./jQuery.js"></script>
    <script>
        $('form').bind('submit', function (e) {
            e.preventDefault();
            flag = true;
            var department = $('#department').val();
            var dptidd = $('#dptidd').val();
            if ($.trim(department).length == 0) {
                departmenterror = "Please Enter department";
                $('#departmenterror').text(departmenterror);
                flag = false;
            } else {
                var regex = /^[a-z A-Z]+$/;
                if (!regex.test(department)) {
                    departmenterror = "Number not allowed";
                    $('#departmenterror').text(departmenterror);
                    flag = false
                } else {
                    departmenterror = "";
                    $('#departmenterror').text(departmenterror);
                }       
            }
            var queryString = 'dptidd=' + dptidd + '&dptname=' + department; 
            console.log(queryString);
            if (flag) {
                $.ajax({
                    type: 'POST',
                    url: 'update.php',
                    data: queryString,
                    success: function (data) {
                        $('#output').text(data);
                    }
                });

                return false;
            }
        })

    </script>
</body>

</html>