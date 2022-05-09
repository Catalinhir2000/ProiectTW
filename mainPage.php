<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CyMaT</title>
    <link rel="shortcut icon" type="image/png" href="images/screwdriver-wrench-solid.svg">
    <link rel="stylesheet" type="text/css" href="css pages/mainPage.css">
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
        <li><a href ="bookingPage.php">Booking</a></li>
        <li><a href ="stockPage.php">Stock</a></li>
        <li><a href ="signInPage.php">Log In</a></li>
      </ul>
    </nav>
    <section id = "showcase">
         <h2>Welcome to CyMaT</h2>
         <h4>To get started book a session with us</h4>
         <a href ="bookingPage.php" class = "button">Book Now</a>
  </section>
  </body>
</html>