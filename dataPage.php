<?php
    session_start();
?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <title>CyMaT</title>
    <link rel="shortcut icon" type="image/png" href="images/screwdriver-wrench-solid.svg">
    <link rel="stylesheet" type="text/css" href="../ProiectTW/csspages/dataPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  </head>

<body>
    <div class="row">
        <!--- this form is for the Import data--->
        <form action="../ProiectTW/includes/importCsv.inc.php" method="POST" enctype="multipart/form-data" style="margin-left: 500px;">
            <div class="form-group">
                <label>Select CSV File</label>
                <input type="file" name="file" class="form-control" accept=".csv, .xls"  required>
            </div>
            <div class="form-group">
                <input type="submit" name="importCSV" class="btn btn-primary" value="Upload CSV">
            </div>
        </form>

        <form action="#" method="POST" enctype="multipart/form-data" style="margin-left: 500px;">
            <div class="form-group">
                <label>Select JSON File</label>
                <input type="file" name="file" class="form-control" accept=".json"  required>
            </div>
            <div class="form-group">
                <input type="submit" name="importJSON" class="btn btn-primary" value="Upload JSON">
            </div>
        </form>

        
        <!--- This form is for the Export data--->
        <form action="../ProiectTW/includes/exportCsv.inc.php" method="POST" style="margin-left:1010px;margin-bottom: 20px;">
            <input type="submit" class="btn btn-success" name="exportCSV" value="Export to Excel">
        </form>
        <form action="../ProiectTW/includes/exportJSON.inc.php" method="POST" style="margin-left:1010px;margin-bottom: 20px;">
            <input type="submit" class="btn btn-success" name="exportJSON" value="Export to JSON">
        </form>
    <?php
    echo '<h1 align="center"> Users table </h1>';
        echo '<table class="content-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>'
            ?>
        <?php
             $conn = mysqli_connect("localhost:3306", "root", "", "CyMat");
            if (mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $query  = "SELECT * FROM users";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($data = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $data['userId']?></td>
              <td><?php echo $data['userName']?></td>
              <td><?php echo $data['userUid']?></td>
              <td><?php echo $data['userEmail']?></td>
            </tr>
          <?php } } ?>
      </table>
      <?php
        echo '<br>';
        echo '<h1 align="center"> Stock table </h1>';
         echo '<table class="content-table">
         <thead>
             <tr>
                 <th>Product Id</th>
                 <th>Product name</th>
                 <th>Product quantity</th>
                 <th>Product image name</th>
                 <th>Product details</th>
             </tr>
         </thead>'
         ?>
          <?php
            $conn = mysqli_connect("localhost:3307", "CATALIN", "CATALIN", "CyMat");
            if (mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $query  = "SELECT * FROM postitemdb";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($data = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $data["idProduct"]?></td>
              <td><?php echo $data["nameProduct"]?></td>
              <td><?php echo $data["quantityProduct"]?></td>
              <td><?php echo $data["imageProduct"]?></td>
              <td><?php echo $data["detailsProduct"]?></td>
            </tr>
          <?php } } ?> 
      </table>
    </div>

</body>

</html>