<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <title>CyMaT</title>
    <link rel="shortcut icon" type="image/png" href="images/screwdriver-wrench-solid.svg">
    <link rel="stylesheet" type="text/css" href="css pages/bookingPage.css">
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
    <div class ="interior">
    <div class = "container">
        <div class = "title">Appointment</div>
            <form action = "#">
                <div class ="user-details">
                    <div class ="input-box">
                        <span class = "details">Name</span>
                            <input type = "text" placeholder ="Enter your name" required>
                    </div>
                    <div class ="input-box">
                        <span class = "details">Surname</span>
                            <input type = "text" placeholder ="Enter your surname" required>
                    </div>
                    <div class ="input-box">
                        <span class = "details">E-mail</span>
                            <input type = "email" placeholder ="Enter your e-mail" required>
                    </div>
                    <div class ="input-box">
                        <span class = "details">Date and Time</span>
                            <input type="datetime-local" id="booking" name="booking" required>
                    </div>
                    <div class ="input-box">
                        <span class = "details">Images</span>
                            <input type="file" name="gallery-img" accept="image/png, image/jpg">
                    </div>
                    <div class ="input-box">
                        <span class = "details">Details</span>
                            <textarea name = "message" placeholder="Write further details"></textarea>
                    </div>
                </div>
                <div class = "button">
                    <input type ="submit" value = "Book now">
                </div>
        </form>
    </div>
</div>
  </body>
</html>
