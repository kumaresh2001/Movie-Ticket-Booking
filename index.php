<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="script.js"></script>
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
    ?>




        <?php 
            $id="";
            $message="";
            if(isset($_SESSION["incorrect"]))
            {
                unset($_SESSION["incorrect"]);
            }
        ?>

        <?php 
                $signin="Sign In";
                if(isset($_SESSION["attempt"]))
                {   if($_SESSION["attempt"]===1)
                    { 
                        $id= "Hi" . "  " . $_SESSION["id"]; 
                        $signin="Log Out";
                        $_SESSION["logstatus"]=1;
                                               
                    }
                    if($_SESSION["attempt"]===0)
                    {
                        $_SESSION["incorrect"]="*incorrect Id or password";
                        header("Location:signin.php");
                        exit();
                    }
                }
                else{
                    $id="";
                }
        ?>


        <div class="bodyin">
            <div class="top">
                <div class="title">
                    <div class="kumar">
                        KUMAR'S KINGDOM
                    </div>
                    <a href="signin.php"> <div class="titleopt"><?=$signin?></div></a>
                    <a href="register.php"> <div class="titleopt">Register</div></a>
                </div>
                
            </div>
    
            <ul>
                <li><a class="navlink" href="index.php">Home</a></li>
                <li><a class="navlink" href="news.html"> News</a></li>
                <li><a class="navlink" href="about.html"> About</a></li>
                <input type="text" placeholder="search">
            </ul>

            <div class="result"><?=$message?>
                <div class="resultin">
                    <?=$id?>
                </div>
            </div>    

            <div class="container">
                <div class="change">
                    <button class="before" onclick="left()">&lt;&lt;</button>
                </div>
                <div class="change">
                    <img class="invisible" id="pic1" src="assets/arrow.jpg">
                    <img class="slide" id="pic2" src="assets/flash.jpg">
                    <img class="invisible" id="pic3" src="assets/dclot.jpg">    
                </div>
                <div class="change">
                    <button class="after" onclick="right()">&gt;&gt;</button>
                </div>

            </div>

                <div class="box">
                    <?php 
                        foreach($movies as $key => $value)
                        {
                    ?>

                    <div class="poster">
                        <a href="show.php?movie=<?=$key?>"> <div class="moviepic"><img  src=<?="assets/".$value["imageUrl"] ?>></div>   <div class="moviename"><?php echo strtoupper($value["name"]);?></div></a>
                    </div>

                    <?php } ?>     
                </div>
            
        </div>    
    <div class="rights">
        <footer>KUMAR'SKINGDOM <?=str_repeat("&nbsp;", 100);?>@all rights reserved<?=str_repeat("&nbsp;", 100);?>engalukku veru engum kilaigal illai</footer>    
    </div>
        

    <script>
        var i=2;
        function left()
        {
            document.getElementById('pic'+i).className="invisible";
            i= i-1;
            if(i<1)
            {
                i=3;
            }
            document.getElementById('pic'+i).className="slide";
        }
        function right()
            {
                document.getElementById('pic'+i).className="invisible";
            i= i+1;
            if(i>3)
            {
                i=1;
            }
            document.getElementById('pic'+i).className="slide";
            }


        window.onload = function()
        {
            document.getElementById("pic1").className="invisible";
            document.getElementById("pic3").className="invisible";
            var i;
            i=2;
            
        }
    </script>    
    
    </body>
</html>