
<!DOCTYPE html>
<html>
    <head>
        <title>Sign in</title>
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
        $moviename = $_POST["moviename"];
        $imagename = $_POST["movieimage"];
        $sql = 'SELECT COUNT(Id) FROM movie';
        $result = $conn->query($sql);
        $list = [];
        while($row = mysqli_fetch_array($result))
        {
            $list[] = $row;
        } 

        $info="";
        $id = $list[0]["COUNT(Id)"]+1;
        $sql = 'INSERT INTO movie (Id,name,imageUrl)Values('.'"'. $id .'"'. ',' .'"' . $moviename .'"'. ','.'"'. $imagename .'"'. ')';
        if ($conn->query($sql) === TRUE) {
            $info= "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
            echo $info;
            $conn->close();
?>

    
        <div class="bodyin">
            
        <?php 
            include 'header.php';
        ?>
        
        <?=$list[0]["COUNT(Id)"]?>
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