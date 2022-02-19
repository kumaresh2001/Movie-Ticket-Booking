# Movie-Ticket-Booking

The **Movie Ticket Booking System** is a local web application which is a model for a web application designed for booking tickets in a cinema theatre online

The application is designed for
 - A customer to login and view available movies
 - A customer to book tickets
 - Download the ticket as a pdf after booking a movie
 - The admin of the application to login 
 - The admin of the application to add/edit/delete movies

# Contents

1. [ Software Architecture. ](#arch)
2. [ Pages ](#pages)
3. [ Database ](#db)
4. [ Ticket Download ](#ticket)

<a name="arch"></a>
## 1. Software Architecture

This is a movie ticket booking application developed using HMTL,CSS and javascript for the front-end of the application and PHP as the backend of the application. The database used in this application is MySQL
This application is a local project that can be hosted by installing a local server like [wamp]
  

<a name="pages"></a>
## 2. Pages

### Home Page
![alt text](https://github.com/kumaresh2001/Movie-Ticket-Booking/blob/master/scrnshots/home-page.png?raw=true)
 
 <hr>
 
 ### Login / Register
 ![alt text](https://github.com/kumaresh2001/Movie-Ticket-Booking/blob/master/scrnshots/login-box.png?raw=true)
 
 <hr>
 
 ### Movie Booking
 ![alt text](https://github.com/kumaresh2001/Movie-Ticket-Booking/blob/master/scrnshots/book-ticket.png?raw=true)
 
 <hr>
 
 ### Booking Confirmed
 ![alt text](https://github.com/kumaresh2001/Movie-Ticket-Booking/blob/master/scrnshots/booking-confirmed.png?raw=true)
 
 <hr>
 
 ### Ticket
  ![alt text](https://github.com/kumaresh2001/Movie-Ticket-Booking/blob/master/scrnshots/ticket-pdf.png?raw=true)
 
 <hr>
 
 ### Add Movie
  ![alt text](https://github.com/kumaresh2001/Movie-Ticket-Booking/blob/master/scrnshots/add-movie.png?raw=true)
 
 <hr>
 
 ### Edit Movie
  ![alt text](https://github.com/kumaresh2001/Movie-Ticket-Booking/blob/master/scrnshots/edit-movie.png?raw=true)

<hr>






<a name="db"></a>
## 3. Database

The SQL database for this application consists of 3 Tables.
1. Movie
   |  Name      |   Type                |
   |------------|-----------------------|
   |  Id        |   String(Primary Key) |
   |  Name      |   String              |
   |  Image URL |   String              |
   <hr>
2. Shows
   |  Name        |   Type                |
   |--------------|-----------------------|
   |  Id          |   String(Primary Key) |
   |  First name  |   String              |
   |  Last name   |   String              |
   |  E-mail      |   String              |
   |  Timings     |   String              |
   |  Movie name  |   String              |
    <hr>
3. Login
   |  Name        |   Type                |
   |--------------|-----------------------|
   |  Id          |   Int(Primary Key)    |
   |  User        |   String              |
   |  Password    |   String              |
   |  Admin       |   Int ( 0 / 1 )       |
   
   The admin column is used to identify whether the particular account belongs to a customer or an admin
   <hr>
   
<a name="ticket"></a>
## 4. Ticket Download
  After booking a show, the customer can download the ticket by clicking the **Download Ticket** button.
  This is facilitated by using a library called [Mpdf].
  This library is added into the project repository. The message to be written inside the file can be stored inside a variable and a file pointer is created by importing the library.  
  
  Example : **$mpdf = new \Mpdf\Mpdf();**  
    
  Then a method called WriteHMTL is used to write the message inside the file.  
  Example : **$mpdf->WriteHTML($message);**  
    
  After that the file is downloaded on the customers device as a pdf by choosing the download option in the output method.  
  Example : **$mpdf->Output('ticket.pdf','D');**    
    
  After downloading the ticket,it can be viewed by the customer in their device

 
  [wamp]:  https://www.wampserver.com/en/
  [Mpdf]:  https://github.com/mpdf/mpdf
