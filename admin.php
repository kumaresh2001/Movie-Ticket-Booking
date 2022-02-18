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
            

                
                    <form action="movieadd.php" id="movieaddform" class="movieaddform"  method ="post">
                        
                        <button type="button" id="xform2" onclick=formout()>X</button>
                        
                        <br/><br/>
                        
                        <div id="declare">Enter New Movies</div>
                        
                        <br><br>
                        
                        Enter Movie Name: &emsp;  <input required class="secondinput" type="text" name="moviename">
                        
                        <br><br>
                        
                        Enter Movie Image: &emsp;  <input required class="secondinput" type="text" name ="movieimage"><br><br>
                        
                        <input class="secondsubmit" type="submit">
                    
                    </form>
                
                <form action="editmovie.php" id="editmovieform" method="post" >


                    <img class="addmovieimage" id="editformimage" src="">                
                    
                    <button type="button" id="xform2" onclick="formoutedit()">X</button>
                    
                    <div class="declare" id="editdeclare">Edit Selected Movie</div>
                    
                    <br><br>
                    
                    Enter Movie Name: &emsp; <input required class="secondinput" type="text" name="newmoviename">
                    
                    <br><br>
                    
                    Enter Image Url: &ensp;&ensp; &emsp; <input required class="secondinput" type="text" name="newimageurl">
                    
                    <br><br>
                    
                    <input id="hide" type="hidden" name = "editmoviename" value="">
                    
                    <input id="delval" type="hidden" name = "delete"> 
                    
                    <button type="button" onclick="del()" id="delete">Delete</button>
                    
                    <input class="secondsubmit" type="submit">

                </form>
                
                <div class="editmovies-container">
                    <button  id="addmovie">
                    
                        <div id="addbtn">+</div>    
                    
                    </button>

                

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

            window.onload = function(){
                var homelink= document.getElementById('home-link');
                homelink.setAttribute('href', 'admin.php');

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
                margin:10px;
            }
            .movieaddform{
                display:none;
                color:white;
                box-sizing:border-box;
                width:80%;
                text-align:center;
                margin-left:10%;
                margin-top:20px;
                margin-bottom: 20px;
                border:5px solid white;
                border-radius:10px;
                padding:10px;
                font-size:25px;
            }
            #declare{
                text-align:center;
                margin-left:none;
                font-weight: bold;
                font-size: 40px;
            }
           
            .editmovies-container{
                width:100%;
                display:grid;
                justify-content:space-around;
                grid-template-columns: auto auto auto auto;
                grid-gap:20px;
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
                overflow:auto;
                cursor:pointer;
                margin:10px;
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
                padding:10px;
                width:80%;
                border:5px solid white;
                display:none;
                color:white;
                margin-left:10%;
                border-radius:10px;
                text-align:center;
                margin-bottom:25px;
                font-size:25px;
                margin-top:25px;
                box-sizing:border-box;
            }
            #xform2{
                cursor:pointer;
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
                margin-top: 20px;
                font-size: 25px;
                margin-right:50px;
                color: white;
                background-color: black;
                border: 2px solid white;
                padding: 10px;
                cursor:pointer;
            }
            #delete:hover{
                background-color:white;
                color:black;
            }

            @media screen and (max-width: 1000px) {
                .editmovies-container{
                    grid-template-columns:auto auto auto;
                }
                .second-input{
                    width:80%;
                }
            }
            @media screen and (max-width: 600px) {
                .second-input{
                    width:80%;
                }
                .editmovies-container{
                    grid-template-columns: auto auto;
                    grid-gap:0px;
                }
                .addmovie,.editmovie{
                    margin:2px;
                }
                
            }
            @media screen and (max-width: 400px) {
                .second-input{
                    width:80%;
                }
                .editmovies-container{
                    grid-template-columns:auto;
                }
            }

            
        </style>    

    </body>
</html>