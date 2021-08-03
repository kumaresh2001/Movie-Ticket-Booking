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
            
            
                <button  id="addmovie">
                
                <div id="addbtn">+</div>    
                
                </button>
                
                <form action="movieadd.php" id="movieaddform" class="movieaddform" method ="post">
                    <button type="button" id="xform" onclick=formout()>X</button>
                    <div class="declare">Enter New Movies</div><br><br>
                    Enter Movie Name  <input required class="secondinput" type="text" name="moviename"><br><br>
                    Enter Movie Image <input required class="secondinput" type="text" name ="movieimage"><br><br>
                    <input class="secondsubmit" type="submit">
                </form>
                
                <form action="editmovie" id="editmovieform" method="post" >


                    <img class="addmovieimage" id="editformimage" src="">                
                    <button type="button" id="xform2" onclick="formoutedit()">X</button>
                    <div class="declare" id="editdeclare">Edit Selected Movie</div><br><br>
                    Enter Movie Name <input required class="secondinput" type="text" name="newmoviename"><br><br>
                    Enter ImageUrl   <input required class="secondinput" type="text" name="newimageurl"><br><br>
                    <input id="hide" type="hidden" name = "editmoviename" value="">
                    <input id="delval" type="hidden" name = "delete"> 
                    <button type="button" onclick="del()" id="delete">Delete</button>
                    <input class="secondsubmit" type="submit">

                </form>
                
                <?php 
                    foreach($movies as $key => $value)
                    {
                
                    $arg1="'assets/".$value["imageUrl"]."'";
                    $arg2 = "'".$value["name"] . "'";
                ?>
                <div onclick="editformshow(<?=$arg1?>,<?=$arg2?>)"  class="editmovie">
                    <img class="addmovieimage" src=<?="assets/".$value["imageUrl"] ?>>
                </div>
                
            

                <?php } ?>                     
                

            
            
            
        </div>
        
        
        <script>
            var imagename;
            document.getElementById("addmovie").onclick = function(){
                document.getElementById("movieaddform").style.display = "block";
                document.getElementById("editmovieform").style.display = "none";
            }
            function formout(){
                document.getElementById("movieaddform").style.display = "none";
            }
            function formoutedit(){
                document.getElementById("editmovieform").style.display = "none";
            }
            function editformshow(imagename,name){
                document.getElementById("editmovieform").style.display = "block";
                document.getElementById("movieaddform").style.display = "none";
                document.getElementById("editformimage").src=imagename;
                document.getElementById("hide").value = name;
            }
            function del()
            {
                document.getElementById("delval").value =1;
            }

        </script>
        
        
        
        <style>
            #addmovie{
                height:250px;
                width:200px;
                background-color:#333;
                border-radius:10px;
                overflow:hidden;
                float:left;
                margin-left:28px;
                margin-top:10px;
                margin-right:8px;
            }
            #addbtn{
                width:40px;
                height:40px;
                text-align:center;
                margin-left:auto;
                margin-right:auto;
                border-radius:20px;
                background-color:#111;
                font-size:30px;
                font-weight:bold;
                text-align:center;
                margin-top:0px;
                color:white;
                cursor:pointer;
                box-sizing:border-box;

            }
            .editmovie{
                height:250px;
                width:200px;
                background-color:#333;
                border-radius:10px;
                display:block;
                overflow:hidden;
                float:left;
                overflow:auto;
                cursor:pointer;
                margin:10px;
                margin-left:28px;
                margin-bottom:30px;
            }
            .addmovieimage{
                height:235px;
                width:185px;
                margin-top:7px;
                margin-left:7px;
                border-radius:10px;
                float:left;

            }
            .moviesbox{
                margin:10px;
                border:solid white 5px;
                height:600px;
                width:auto;
                padding:20px;
            }
            #editmovieform{
                height:300px;
                width:1000px;
                border:5px solid white;
                display:none;
                color:white;
                margin-left:290px;
                border-radius:10px;
                text-align:center;
                margin-bottom:25px;
                margin-top:25px;
            }
            #xform2{
                margin-left:400px;
                color:white;
                background-coloR:#333;
                width:40px;
                height:40px;
                font-size:25px;
                border-radius:20px;
                font-weight:bold;
                align-content:center;
                text-align: center;
                text-transform:capitalize;
                float:right;
                margin:10px;
            }
            #editdeclare{
                margin-left:100px;
            }
            #editmovieform .addmovieimage{
                margin:35px;
            }
            #delete{
                height:40px;
                width:150px;

                border-radius:20px;
                font-size:30px;
                color:black;
                background-color:white ;
                margin-left:0px;
            }

        </style>    

    </body>
</html>