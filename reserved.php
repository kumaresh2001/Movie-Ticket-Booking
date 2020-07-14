<!DOCTYPE html>
<html>

<head>
    <title>Movie</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
    <?php

        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $gender=$_POST['gender'];

    ?>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "movie";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM movie";
        $result = $conn->query($sql);
        $movies = [];
        while($row = mysqli_fetch_array($result))
        {
            $movies[] = $row;
        }
        
        $conn->close();
        $key = $_POST['movie'];
    ?>

    <div class="secondbody">
    <div class="bodyin">
        <div class="top">

            <div class="title">

                <div class="kumar">
                    KUMAR'S KINGDOM
                </div>
                
                <div class="titleopt">
                    Sign In
                </div>
                
                <div class="titleopt">
                    Register
                </div>
                
            </div>

        </div>
        <ul>
            <li><a class="navlink" href="index.php">Home</a></li>
            <li><a class="navlink" href="news.html"> News</a></li>
            <li><a class="navlink" href="about.html"> About</a></li>
            <input type="text" placeholder="search">
        </ul>
    <div class="secondconfirm">!!!YOUR BOOKING IS CONFIRMED!!!</div>
        <div class="secondmoviename"><?=$movies[$key]["name"]?></div>
        <div class="secondposter"><img class="secondimage" src=<?="assets/".$movies[$key]["imageUrl"]?>></div>
        </div>
            <div class="details">DETAILS</div>
        <div class="confirmation">
            Name :&emsp;<?php echo $lname . " " . $fname;?><br><br>
            E-mail :&emsp;<?php echo $email;?><br><br>
            Gender :&emsp;<?php echo $gender;?><br><br>
            Movie :&emsp;<?php echo strtoupper($movies[$key]["name"]);?><br><br>

        </div>
    </div>
</body>
</html>