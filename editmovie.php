<!DOCTYPE html>
<html>
    
    <head>
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="https://kit.fontawesome.com/2b01f68407.js" crossorigin="anonymous"></script>
    </head>
    
    <body>
    
        <?php
        session_start();
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
            $sql= "SELECT COUNT(Id) FROM movie";
            $result = $conn->query($sql);
            $row = mysqli_fetch_array($result);
            $id = $row;
            $conn->close(); 
        ?>

        <div class="bodyin">

            <?php 
                include 'header.php';
            ?>
            
            <?php
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                if($_POST["delete"]==="1")
                { 
                    $sql = 'DELETE FROM movie WHERE name = '.'"'.$_POST["editmoviename"].'"' ;                    
                    $result = $conn->query($sql);
                    $conn->close(); 
                    $declare="Deletion successful";
                }
                else
                {
                    $sql = 'UPDATE movie SET name ='. '"' .$_POST["newmoviename"] . '"' .',imageUrl = '. '"' .$_POST["newimageurl"]. '"'.'WHERE name ='. '"' .$_POST["editmoviename"] .'"' ;
                    $result = $conn->query($sql);
                    $conn->close(); 
                    $declare = "edit successfull";
    
                }
            ?>
        
            <div class="declare">
                <?=$declare?>
            </div>
        
            <ul>
                <li><a class="navlink" href="index.php">Home</a></li>
            </ul>
        
        </div>

            
    </body>

</html>