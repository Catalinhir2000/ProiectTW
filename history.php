<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CyMaT</title>
	<link rel="shortcut icon" type="image/png" href="images/screwdriver-wrench-solid.svg">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<link rel="stylesheet" href="csspages/appointments.css">
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
<div class="wrapper">
	<div class="view_main">
		<div class="view_wrap list-view" style="display: block;">
				<?php
					$conn = mysqli_connect("localhost:3306", "root", "", "CyMat");
                    $sessName = $_SESSION["useruid"];
					$sql = "SELECT * FROM bookingdb WHERE userNameBooking = '$sessName';";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck > 0){
						while($row = mysqli_fetch_assoc($result)){
					?>
						<div class="view_item">
						<div class="vi_left">
							<?php echo '<img src="../ProiectTW/images/bookingImages/'.$row["imageBooking"] . '" alt ="auto part" >'; ?>
							
						</div>
						<div class="vi_right">
							<p class="title"><?php
                             echo $row["userEmailBooking"];
                             echo "<br>"; 
                             ?></p>
							<p class="content"><?php 
                            echo $row["dateTimeBooking"];
                            echo "<br>";
                            echo $row["detailsBooking"];
                            echo "<br>"; 
                            ?></p>
                            <p class="title"><?php
                             echo "Response: ";
                             echo "<br>"; 
                             ?></p>
                             <p class="content"><?php 
                            echo $row["statusBooking"];
                            echo "<br>";
                            echo $row["responseBooking"];
                            echo "<br>";
                            ?></p>

					</div>
			</div> 
			<?php
					}
				}
				else{
					echo " <h1 align = 'center'> No appointments yet </h1>";
				}
			?>
		</div>
	</div>
	
</div>
</body>
</html>
