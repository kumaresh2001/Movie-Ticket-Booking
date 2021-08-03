
<!DOCTYPE html>
<html>
    <head>
        <title>Sign in</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        </head>
    <body>

    

    <div class="bodyin">
            <?php
                 include 'header.php';
                 $incorrect="";
                 if(isset($_SESSION["logstatus"]))
                 {
                    if($_SESSION["logstatus"]===1)
                    {
                        $_SESSION["logstatus"]=0;
                        header("Location:index.php");
                        exit();
                    }   
                 }
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