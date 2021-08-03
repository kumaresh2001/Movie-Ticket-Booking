<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign in</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="https://kit.fontawesome.com/2b01f68407.js" crossorigin="anonymous"></script>
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
        <?php
                 include 'header.php';
            ?>
                
            <div style="color:white"><?=$_SESSION['name']?></div>
            <div class="declare">Register Your Account</div>
            <form action="registered.php" method="post">
            <div class="incorrect"><?=$incorrect?></div><br>
            Enter Your Id:<input class="secondinput" required type="text" name ="id"><br>
            Enter Your Password:<input class="secondinput" required type="text" name="password"><br>
            <input class="secondsubmit" type="submit">
            </form>
    </div>
    <?php include 'footer.php';?>
    </body>
</html>