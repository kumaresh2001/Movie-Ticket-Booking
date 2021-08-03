
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
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
    ?>




       
        <div class="bodyin">
        

   
            <?php
                 include 'header.php';
            ?>            

            <div class="container">

                <div class="change">
                    
                    <button class="before" onclick="left()"><</button>
                
                </div>
                
                <div class="change">
                    
                    <img class="invisible" id="pic1" src="assets/arrow.jpg">
                    <img class="slide" id="pic2" src="assets/flash.jpg">
                    <img class="invisible" id="pic3" src="assets/dclot.jpg">    
                
                </div>
                
                <div class="change">
                    
                    <button class="after" onclick="right()">></button>
                
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

           var x= setInterval(right,4500);
            
        }
    </script>    
    
    </body>
</html>