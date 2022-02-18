<?php
                session_start();
                 $incorrect="";
                 if(isset($_SESSION["logstatus"]))
                 {
                    if($_SESSION["logstatus"]===1)
                    {
                        $_SESSION["logstatus"]=0;
                        header("Location:index.php");
                    }   
                 }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign in</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        </head>
    <body>

    

    <div class="bodyin">
            <?php;
                 include 'header.php';
            ?>

            <div class="declare">Enter Your Id</div>
            <form action="signed.php" method="post">
            <div class="incorrect"><?=$incorrect?></div><br>
            Enter Your Id:<input class="secondinput" required type="text" name ="id"><br>
            Enter Your Password:<input class="secondinput" required type="text" name="password"><br>
            <input class="secondsubmit" type="submit">
            </form>
    </div>
    <?php include 'footer.php';?>
    </body>
</html>