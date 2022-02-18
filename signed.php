<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign in</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        $sql = 'SELECT * FROM login WHERE user ='.'"'.$_POST["id"].'"';
        $result = $conn->query($sql);
        $list = [];
        while($row = mysqli_fetch_array($result))
        {
            $list[] = $row;
        } 
        $conn->close();
    ?>

    
        <div class="bodyin">
            <div class="top">
                <div class="title">
                    <div class="kumar">
                        KUMAR'S KINGDOM
                    </div>
                    <a href="signin.php"> <div class="titleopt">Sign In</div></a>
                    <div class="titleopt">Register</div>
                </div>
                
            </div>
            <ul>
                <li><a class="navlink" href="index.php" >Home</a></li>
                <li><a class="navlink" href="news.html"> News</a></li>
                <li><a class="navlink" href="about.html"> About</a></li>
                <input type="text" placeholder="search">
            </ul>
            </div>
            
    <?php 
    $id=$_POST["id"];
      $password = $_POST["password"];
      $tablepassword =$list[0]["password"];
      $admin = $list[0]["admin"];
      $password = crypt($password,"beebo");
      
       if($list!=NULL)
       {
           if($tablepassword===$password)
           {
            $_SESSION["attempt"]=1;
            $_SESSION["id"]=$id;
            $_SESSION["name"]=$list[0]['user'];
            unset($_SESSION["incorrect"]);
            echo "password is correct";
            $_SESSION["logstatus"] =1;
            if($admin)
            {
                header("Location:admin.php");
                exit();
            }
            else
            {
                header("Location:index.php");
                exit();    
            }
           
           }
           else{
            $_SESSION["attempt"]=0;
           $id="";
           header("Location:index.php");
           exit();
           }
       }
       else{
        $_SESSION["attempt"]=0;
        $id="";
        header("Location:index.php");
        exit();
       }
    ?>
    <div class="result">You have logged in:
        <div class="resultin">
         Hi <?=$id?>
        </div>
    </div>    
    <div class="container">
                <div class="change">
                    <button class="before" onclick="left()">&lt;&lt;</button>
                </div>
                <div class="change">
                    <img class="invisible" id="pic1" src="arrow.jpg">
                    <img class="slide" id="pic2" src="flash.jpg">
                    <img class="invisible" id="pic3" src="dclot.jpg">    
                </div>
                <div class="change">
                    <button class="after" onclick="right()">&gt;&gt;</button>
                </div>

            </div>
                
            
        </div>    
        <?php include 'footer.php';?>
        

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