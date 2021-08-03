<?php

        $ticketid = $_GET['id'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "movie";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM shows WHERE Id = ". "'" . $ticketid . "'" ;
        $result = $conn->query($sql);
        $shows = [];
        while($row = mysqli_fetch_array($result))
        {
            $shows[] = $row;
        }
        
        $conn->close();
        require_once __DIR__ . '/vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $message='';

        $fname=$shows[0]["fname"];
        $lname=$shows[0]["lname"];
        $email=$shows[0]["email"];
        $timing=$shows[0]["timings"];
        $movie = $shows[0]["moviename"];
          $message = "<br><br><br><br>
                          <img id='title' src='assets/ticket_title.jpg'>
                          <br><br><br><br>
                          <div class='pass'>
                            Enjoy the Picture !
                            <br /><br />
                          </div>";
        $message .= "<div class='contents'>Your movie:  ".ucfirst($movie)."<br /><br />";
        $message .= "First Name:  ".ucfirst($fname) ."<br /><br />";
        $message .= "Last Name:   ".ucfirst($lname) ."<br /><br />";
        $message .= "Your e-mail: <br><br>".$email ."<br /><br />";
        $message .= "Timing:      ".$timing ."<br /><br />";
        $message .= "Ticket Id:   ".$ticketid ."<br /><br /></div>";   
        $message .="<style>
                             body{
                                    background-image:url('assets/ticket background.jpg');
                                    bakcground-size:cover;
                                    color:white;
                                    font-size:20px;
                                    font-weight:bold;
                                  }
                              .ticketbox{
                                margin-left:20%;
                                margin-top:30%;
                              }
                              #title{
                                margin-left:10%;
                                margin-top:20%; 
                                height:100px;
                                width:750px;
                              } 
                              .pass{
                                margin-left:25%;
                                font-size:35px;
                                text-transform:uppercase;
                              }
                              .contents{
                                margin-left:30%;
                                font-size:25px;
                                text-transform:capitalize;
                              }
                               </style>";
        $mpdf->WriteHTML($message);
        $mpdf->Output('ticket.pdf','D');



    ?>