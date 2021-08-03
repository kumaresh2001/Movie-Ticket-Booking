<!DOCTYPE html>
<html>

<head>
    <title>Movie</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="https://kit.fontawesome.com/2b01f68407.js" crossorigin="anonymous"></script>
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

        $sql = "SELECT * FROM movie";
        $result = $conn->query($sql);
        $movies = [];
        while($row = mysqli_fetch_array($result))
        {
            $movies[] = $row;
        }
        
        $conn->close();
        $key = $_GET['movie'];
    ?>

    <div class="secondbody">
    <div class="bodyin">
    <?php
                 include 'header.php';
            ?>
    <div style="color:white">
        <div class="secondmoviename"><?=$movies[$key]["name"]?></div>
            <div class="secondposter"><img class="secondimage" src=<?="assets/". $movies[$key]["imageUrl"]?>></div>
    </div>

    <div class="entry">
        <div class="declare">Please Enter Your Details</div>
        <br/><br/>
        
        
        <?php $fnameerr=$lnameerr=$emailerr=$gendererr="";?>


        <form  action="reserved.php" method="post">
            *FirstName: &emsp; <input class="secondinput" required type="text" name="fname"><div id="fnameerr"></div><br>
            *LastName: &emsp; <input class="secondinput" required type="text" name="lname"><div id="lnameerr"></div><br>
            *Email: &emsp;&emsp;&emsp; <input class="secondinput" required type="email" name="email"><div id="emailerr"></div><br><br>
            *Choose your timings:<div id="gendererr"></div><br>
            <input class="secondradio" required type="radio" name="timing" value="10:00 am">10:00 am &emsp;
            <input class="secondradio" required type="radio" name="timing" value="4:00 pm">4:00 am  &emsp;
            <input class="secondradio" required type="radio" name="timing" value="7:00 pm">7:00 pm<br>
            <input  type="hidden" name="movie" value=<?=$key?>>
            <input type="hidden" name="moviename" value =<?=$movies[$key]["name"]?>>
            <input type="hidden" name="TicketId" value =<?= rand()?>>            
            <input class="secondsubmit" type="submit">

        </form>
    </div>


    </div>
    <?php include 'footer.php';?>
</body>
</html>