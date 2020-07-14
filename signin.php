<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign in</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        </head>
    <body>

    

    <?php 
        $_SESSION['name']="";
        if(isset($_SESSION["logstatus"]))
        {
            if($_SESSION["logstatus"]==1)
            {
                $_SESSION["logstatus"]=0;
                unset($_SESSION["attempt"]);
                header("Location:index.php");
                exit();  
            }    
        }
            unset($_SESSION["attempt"]);
            if(isset($_SESSION["incorrect"]))
            {
                $incorrect=$_SESSION["incorrect"];
            }
            else{
                $incorrect = "";
            }
        ?>
    <div class="bodyin">
            <div class="top">
                <div class="title">
                    <div class="kumar">
                        KUMAR'S KINGDOM
                    </div>
                    <a href="signin.php"> <div class="titleopt">Sign In</div></a>
                    <a href="register.php"> <div class="titleopt">Register</div></a>
                </div>
                
            </div>
            <ul>
                <li><a class="navlink" href="index.php">Home</a></li>
                <li><a class="navlink" href="news.html"> News</a></li>
                <li><a class="navlink" href="about.html"> About</a></li>
                <input type="text" placeholder="search">
            </ul>
            <div style="color:white"><?=$_SESSION['name']?></div>
            <div class="declare">Enter Your Id</div>
            <form action="signed.php" method="post">
            <div class="incorrect"><?=$incorrect?></div><br>
            Enter Your Id:<input class="secondinput" required type="text" name ="id"><br>
            Enter Your Password:<input class="secondinput" required type="text" name="password"><br>
            <input class="secondsubmit" type="submit">
            </form>
    </div>
    </body>
</html>