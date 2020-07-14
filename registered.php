<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
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
    
    <div class="declare">
        <?=$info?>
    </div>
    <ul>
        <li><a class="navlink" href="index.php">Home</a></li>
    </ul>

    </body>
</html>