<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        </head>
    <body>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "movie";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $id = $_POST["id"];
        $password = crypt($_POST["password"],"beebo");
        $sql = 'SELECT MAX(Id) FROM login';
        $result = $conn->query($sql);
        $count = [];
        while($row = mysqli_fetch_array($result))
        {
            $count[] = $row;
        } 

        $SI= $count[0]["MAX(Id)"]+1;
        $sql = "INSERT INTO login (Id, user , password)
        VALUES (" . $SI . "," ."'". "$id" ."'". "," ."'". "$password" ."'" . ")";

        if ($conn->query($sql) === TRUE) {
        $info= "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    ?>
    
    <div class="registered-info">
        <?=$info?>
    </div>
    <ul>
        <li><a class="registerd-home-link" class="navlink" href="index.php">Home</a></li>
    </ul>

    </body>
    
    <style>
        .registered-info{
            width:100%;
            text-align:center;
            color:white;
            font-size:30px;
            font-weight:bold;
            background-color:#333;
            padding:10px;

        }
        li{
            text-align:center;
            margin-top:20px;

        }
        a:active,a:visited{
            padding:10px;
            background-color:black;
            border:5px solid white;
            width:100%;
            text-align:center;
            text-decoration:none;
            color:white;
            font-size:25px;

        }
        a:hover{
            color:black;
            background-color:white;
        }
    </style>
</html>