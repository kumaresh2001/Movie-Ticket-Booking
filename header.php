      <?php 
            $id="Sign In";
            if(isset($_SESSION["logstatus"]))//when site is opened for first time
            {
                if($_SESSION["logstatus"]===0)
                {
                    unset($_SESSION["attempt"]);//after logout
                }    
            }

        ?>

        <?php 
                $signin="Login / Register";
                if(isset($_SESSION["attempt"]))
                {   if($_SESSION["attempt"]===1)
                    { 
                        $id= "Hi" . "  " . $_SESSION["name"]; 
                        $signin="Log Out";
                        $_SESSION["logstatus"]=1;
                                               
                    }
                    if($_SESSION["attempt"]===0)
                    {
                        $_SESSION["incorrect"]="*incorrect Id or password";
                        header("Location:signin.php");
                        exit();
                    }
                }
        ?>



        <!--
            top title where name of application is present
         -->
            <div class="top">
                    KUMAR'S KINGDOM
            </div>
            <i class="fas fa-bars" id = "options-icon"></i>
        
        <!--
            navbar where home,about,contact appears
        -->
            <div class="navbar">
            
                <div class="navbaritem"> <a class="navlink" id="home-link" href="index.php"> Home  </a> </div>
                <div class="navbaritem"> <a class="navlink" href="news.php">  News  </a> </div>
                <div class="navbaritem"> <a class="navlink" href="about.php"> About </a> </div>

                <div >
                    <?php
                        if($signin==="Log Out")
                        {
                            echo "<div class='titleopt' id='btn'><a href='signin.php'>" . $signin . "</a></div>";
                        }
                        else
                        {
                            echo "<div class='titleopt' id='btn'>" . $signin . "</div>";
                        }
                    ?>
                
                </div>

            
            </div>

            <div id="navbar-phone">

                <div class="navbaritem-phone"> <a class="navlink" href="index.php"> Home  </a> </div>
                <div class="navbaritem-phone"> <a class="navlink" href="news.php">  News  </a> </div>
                <div class="navbaritem-phone"> <a class="navlink" href="about.php"> About </a> </div>

                <div >
                    <?php
                        if($signin==="Log Out")
                        {
                            echo "<div class='titleopt-phone' id='btn-phone'><a href='signin.php'>" . $signin . "</a></div>";
                        }
                        else
                        {
                            echo "<div class='titleopt-phone' id='btn-phone'>" . $signin . "</div>";
                        }
                    ?>

                </div>

            </div>




            <!--
                "hi User"
                <div class="result">
                    <div class="resultin">
                        <?//=$id?>
                    </div>
                </div>
            -->   
                        
            <!--
                The dialog box which appears when signIn or register button is clicked
            -->
            <div id="registerbox">
                
                <div id ="boxform">
                    
                    <div class="boxform-buttons">

                        <button class="form-button-left" type="button" id="SigninButton">SignIn</button>
                        <button class="form-button-left" type="button" id="RegisterButton">Register</button>
                        <button class="form-button-right" id="xform">X</button>
    
                    </div>
                    
                    <form action="signed.php" id="signinform" method="post">
                        
                        <div class="boxdeclare">Sign In</div>
                        
                            Enter Your Username:  &emsp;  <input class="secondinput" required type="text" name ="id"><br><br>
                            Enter Your Password:  &emsp;  <input class="secondinput" required type="text" name="password"><br><br>
                            
                        <input class="secondsubmit" type="submit">
                    
                    </form>

                    <form action="registered.php" id="registerform" method="post">
                    
                        <div class="boxdeclare">Register Your Account</div>
                    
                            Enter Your New Username:  &emsp;  <input class="secondinput" required type="text" name ="id"><br><br>
                            Enter Your New Password:  &emsp;  <input class="secondinput" required type="text" name="password"><br><br>
                        
                        <input class="secondsubmit" type="submit">
                    
                    </form>    
                
                </div>
                
                <br><br>
            
            </div>
            




<script>


    var menuClickCount = 0;

    window.onresize = function(){
        if(window.innerWidth>800)
        {
            document.getElementById("navbar-phone").style.display = "none";
        }
    }
    
    document.getElementById("btn").onclick=function(){
        document.getElementById("registerbox").style.display  = "block";
        document.getElementById("signinform").style.display   = "block";    
        document.getElementById("registerform").style.display = "none";
        document.getElementById("SigninButton").className    += " buttonselected";
        document.getElementById("RegisterButton").className   = "form-button-left";
        }

    document.getElementById("btn-phone").onclick=function(){
        document.getElementById("registerbox").style.display  = "block";
        document.getElementById("signinform").style.display   = "block";    
        document.getElementById("registerform").style.display = "none";
        document.getElementById("SigninButton").className    += " buttonselected";
        document.getElementById("RegisterButton").className   = "form-button-left";
        }


    document.getElementById("SigninButton").onclick = function(){
        document.getElementById("signinform").style.display   = "block";
        document.getElementById("registerform").style.display = "none";    
        document.getElementById("SigninButton").className     += " buttonselected";
        document.getElementById("RegisterButton").className   = "form-button-left";
    }

    document.getElementById("RegisterButton").onclick = function(){
        document.getElementById("registerform").style.display  = "block";
        document.getElementById("signinform").style.display    = "none";    
        document.getElementById("SigninButton").className      = "form-button-left";
        document.getElementById("RegisterButton").className    +=" buttonselected";

    }

    

    document.getElementById("options-icon").onclick = function(){
        menuClickCount++;
        if(menuClickCount%2==0)
        {
            document.getElementById("navbar-phone").style.display = "none";
        }
        else{
            document.getElementById("navbar-phone").style.display = "block";
            
        }
    }

    document.getElementById("xform").onclick=function(){document.getElementById("registerbox").style.display="none";}

</script>










