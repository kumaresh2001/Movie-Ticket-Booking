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
        $timing=$_POST['timing'];
        $ticket_id = $_POST['TicketId'];

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
        <?php
                 include 'header.php';
            ?>
        <div class="secondconfirm">!!!YOUR BOOKING IS CONFIRMED!!!</div>
        <div class="secondmoviename"><?=$movies[$key]["name"]?></div>
        <div class="secondposter"><img class="secondimage" src=<?="assets/".$movies[$key]["imageUrl"]?>></div>
    
            <div class="details">DETAILS</div>
            <div class="confirmation">
            Movie :&emsp;<?php echo strtoupper($movies[$key]["name"]);?><br><br>
            Ticket Id:&emsp;<?=$ticket_id?><br><br>
            Name :&emsp;<?php echo $lname . " " . $fname;?><br><br>
            Timing :&emsp;<?php echo $timing;?><br><br>
            E-mail :&emsp;<?php echo $email;?><br><br>            


        </div>
    </div>
    <a href="ticketdownload.php?id=<?=$ticket_id?>"> <div class="download">Download Ticket</div></a>
    <?php include 'footer.php';?>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "movie";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO shows VALUES (". "'" . $ticket_id . "','" . $fname . "','" . $lname . "','" .$email . "','" . $timing . "','" . $movies[$key]["name"] . "'" .")";
        $result = $conn->query($sql);
        $conn->close();
    ?>

</body>
</html>