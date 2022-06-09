<?php
    session_start();
?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <title>CyMaT</title>
    <link rel="shortcut icon" type="image/png" href="images/screwdriver-wrench-solid.svg">
    <link rel="stylesheet" type="text/css" href="csspages/bookingPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  </head>
  <body>
    <nav>
        <input type ="checkbox" id="check">
        <label for = "check" class="checkbutton">
          <i class="fas fa-solid fa-bars"></i>
        </label>
      <label class = "logo">Cy<span>MaT</span></label>
      <ul>
        <li><a class ="active" href ="mainPage.php">Home</a></li>
        <li><a href ="stockPage.php">Stock</a></li>
        <?php
           if(isset($_SESSION["useruid"])){
            if($_SESSION["userid"] == 1){
              echo "<li><a href='appointments.php'>Appointments</a></li>";
              echo "<li><a href='postItemPage.php'>Post</a></li>";
              echo "<li><a href='deleteItemPage.php'>Delete</a></li>";
              echo "<li><a href='modifyItemPage.php'>Modify</a></li>";
              echo "<li><a href='../ProiectTw/includes/logout.inc.php'>Log out</a></li>";
            }
            else if($_SESSION["userid"] != 1){
                echo "<li><a href ='bookingPage.php'>Booking</a></li>";
                echo "<li><a href='profilePage.php'>Profile</a></li>";
                echo "<li><a href='inbox.php'>Inbox</a></li>";
                echo "<li><a href='../ProiectTw/includes/logout.inc.php'>Log out</a></li>";
            }
          }
          else{
                echo"<li><a href='signInPage.php'>Log In</a></li>";
        } 
            ?>
      </ul>
    </nav>
    <div class ="interior">
    <div class = "container">
        <div class = "title">Appointment</div>
            <form action="../ProiectTW/includes/booking.inc.php" method = "post" enctype="multipart/form-data">
                <div class ="user-details">
                    <div class ="input-box">
                        <span class = "details">Name</span>
                            <input type = "text" placeholder ="Enter your name" name = "nameUser" required>
                    </div>
                    <div class ="input-box">
                        <span class = "details">User Id</span>
                            <input type = "text" placeholder ="Enter your User Id" name="uid" required>
                    </div>
                    <div class ="input-box">
                        <span class = "details">E-mail</span>
                            <input type = "email" placeholder ="Enter your e-mail" name="email" required>
                    </div>
                    <div class ="input-box">
                        <span class = "details">Date and Time</span>
                            <input type="date" id="booking" name ="date" required>
                    </div>
                    <div class ="input-box">
                        <span class = "details">Images</span>
                            <input type="file" name="image" accept="image/png, image/jpg">
                    </div>
                    <div class ="input-box">
                        <span class = "details">Details</span>
                            <textarea placeholder="Write further details" name = "details"></textarea>
                    </div>
                </div>
                <div class = "button">
                    <input type ="submit" value = "Book now" name = "BookNow">
                </div>
                <?php
              if(isset($_GET["error"])){
                  if($_GET["error"] == "statementFailed"){
                    echo "<p align='center'>Something went wrong when trying to submit the booking request, please try again!</p>";
                  }
                  else if($_GET["error"] == "none"){
                    echo "<p align='center'>You have sent your request for a booking!</p>";
                  }
                  else if($_GET["error"] == "sizeTooBig"){
                    echo "<p align='center'>The size of the image you uploaded is too big.</p>";
                  }
                  else if($_GET["error"] == "unexpectedError"){
                    echo "<p align='center'>Tere was an error submiting the booking form!</p>";
                  }
                }
                ?>
        </form>
    </div>
</div>
  </body>
</html>

