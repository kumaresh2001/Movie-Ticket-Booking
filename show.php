<!DOCTYPE html>
<html>

<head>
    <title>Movie</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="script2.js"></script>
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
    </div>
    <div style="color:white">
        <div class="secondmoviename"><?=$movies[$key]["name"]?></div>
            <div class="secondposter"><img class="secondimage" src=<?="assets/". $movies[$key]["imageUrl"]?>></div>
    </div>

    <div class="entry">
        <div class="declare">Please Enter Your Details</div>
        
        
        <?php $fnameerr=$lnameerr=$emailerr=$gendererr="";?>


        <form  action="reserved.php" method="post">
            FirstName:<input class="secondinput" required type="text" name="fname">*<div id="fnameerr"></div><br>
            LastName:<input class="secondinput" required type="text" name="lname">*<div id="lnameerr"></div><br>
            Email:<input class="secondinput" required type="email" name="email">*<div id="emailerr"></div><br><br>
            Choose your gender:*<div id="gendererr"></div><br><br>
            <input class="secondradio" required type="radio" name="gender" value="male">:Male &emsp;
            <input class="secondradio" required type="radio" name="gender" value="female">:Female  &emsp;
            <input class="secondradio" required type="radio" name="gender" value="other">:Other<br>
            <input  type="hidden" name="movie" value=<?=$key?>>
            <input class="secondsubmit" type="submit">

        </form>
    </div>


    </div>

</body>
</html>