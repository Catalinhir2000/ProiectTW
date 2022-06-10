<?php
    session_start();
?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <title>CyMaT</title>
    <link rel="shortcut icon" type="image/png" href="images/screwdriver-wrench-solid.svg">
    <link rel="stylesheet" type="text/css" href="csspages/deleteItemPage.css">
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
                echo "<li><a href='history.php'>History</a></li>";
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
        <div class = "title">Delete an Item of the Stock Page</div>
            <form method = "post" action = "../ProiectTW/includes/deleteItem.inc.php">
                <div class ="user-details">
                    <div class ="input-box">
                        <span class = "details">Name of item</span>
                            <input type = "text" placeholder ="Enter the name of product" name = "nameProduct" required>
                    </div>
                </div>
                <div class = "button">
                    <input type ="submit" value = "Delete" name = "deleteItem">
                </div>
                <?php
              if(isset($_GET["error"])){
                  if($_GET["error"]=="statementFailed"){
                    echo "<p align='center'>Something went wrong, try again!</p>";
                  }
                  else if($_GET["error"] == "none"){
                    echo "<p align='center'>Item deleted succesfully!</p>";
                  }
                  else if($_GET["error"] == "itemNotFound"){
                    echo "<p align='center'>The name you have type is not present in the stock!</p>";
                  }
                  else if($_GET["error"] == "emptyInputAtDeleteForm"){
                    echo "<p align='center'>Empty Input! Please fill it.</p>";
                  }
                }
                ?>
        </form>
    </div>
</div>
  </body>
</html>