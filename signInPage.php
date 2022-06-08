<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>CyMaT</title>
    <link rel="stylesheet" href="csspages/signInPage.css">
    <link rel="shortcut icon" type="image/png" href="images/screwdriver-wrench-solid.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
        <img src="images/poza2.webp" alt="">
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Log In</div>
          <form action="../ProiectTW/includes/login.inc.php" method = "post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name = "uidLogin" placeholder="Enter your username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name = "pwdLogin" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="mainPage.php">Return to home?</a></div>
              <div class="button input-box">
                <input type="submit" name = "submitLogin" value="Log In">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
            </div>
            <?php
              if(isset($_GET["error"])){
                  if($_GET["error"] == "wrongLogin"){
                      echo "<p style = 'color:red'>Incorrect login info!</p>";
                  }
                  else if($_GET["error"] == "emptyInputAtLogin"){
                    echo "<p style = 'color:red'>Fill in the required fields!</p>";
                  }
                  else if($_GET["error"] == "wrongLogin2"){
                    echo "<p style = 'color:red'>Different passwords the normal and hashed one, this is a database problem</p>";
                  }
              }
            ?>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Sign Up</div>
        <form action="../ProiectTW/includes/signup.inc.php" method = "post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name = "name" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name = "uid" placeholder="Enter your username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name = "email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name = "pwd" placeholder="Enter your password" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name = "pwdrepeat" placeholder="Retype password" required>
              </div>
              <div class="button input-box">
                <input type="submit" name = "submit" value="Sign Up">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
            <?php
              if(isset($_GET["error"])){
                  if($_GET["error"]=="passwordNotMatching"){
                      echo "<p style = 'color:red'>Passwords not matching!</p>";
                  }
                  else if($_GET["error"]=="invalidUsername"){
                      echo "<p style = 'color:red'>Invalid username!</p>";
                  }
                  else if($_GET["error"]=="usernameTaken"){
                      echo "<p style = 'color:red'>Username already taken, think of another one!</p>";
                  }
                  else if($_GET["error"]=="invalidEmail"){
                      echo "<p style = 'color:red'>Enter a valid email adress!</p>";
                  }
                  else if($_GET["error"]=="statementFailed"){
                      echo "<p style = 'color:red'>Something went wrong, try again!</p>";
                  }
                  else if($_GET["error"]=="emptyInput"){
                    echo "<p style = 'color:red'>Fill in the required fields!</p>";
                  }
                  else if($_GET["error"] == "shortPasswordLength"){
                    echo "<p style = 'color:red'>Your password should be above 6 characters!</p>";
                  }
                  else if($_GET["error"]=="none"){
                      echo "<p>You have signed up!</p>";
                  }
                }
              ?>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
