<?php
    session_start();
?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <title>CyMaT</title>
    <link rel="shortcut icon" type="image/png" href="images/screwdriver-wrench-solid.svg">
    <link rel="stylesheet" type="text/css" href="csspages/mainPage.css">
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
    <?php
    if(isset($_SESSION["useruid"])){
              if($_SESSION["userid"] == 1){
                echo "<section id = 'showcase'>
                <h2>Welcome Admin</h2>
                </section>";
              }
              else if($_SESSION["userid"] != 1){
               echo "<section id = 'showcase'>
                <h2>Welcome to CyMaT</h2>
                <h4>To get started book a session with us</h4>
                <a href = 'bookingPage.php' class = 'button'>Book Now</a>
                </section>";
              }
            }
            else{
              echo "<section id = 'showcase'>
                <h2>Welcome to CyMaT</h2>
                <h4>In order to book, you have to log in.</h4>
                <a href = 'signInPage.php' class = 'button'>Log In</a>
                </section>";
          }
  ?>
  </body>
</html>