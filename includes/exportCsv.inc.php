<?php

$conn = mysqli_connect("localhost:3307", "CATALIN", "CATALIN", "CyMat");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

if (isset($_POST['exportCSV'])) {
    $query  = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
          $output  = "";
          $output .= "<table class='table table-striped'>
                 <thead>
               <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
               </tr>
            </thead>";
        while ($data = mysqli_fetch_assoc($result)) {
        $output .=	"<tr>
            <td>".$data['userId']."</td>
            <td>".$data['userName']."</td>
            <td>".$data['userUid']."</td>
            <td>".$data['userEmail']."</td>
        </tr>";
        }

        $output .="</table>";
        $fileName = 'users';
        $fileName .= '.csv';
        file_put_contents('../extras/data/'.$fileName, $output);
        echo $output;

        $query1  = "SELECT * FROM postitemdb";
        $result1 = mysqli_query($conn, $query1);
        if (mysqli_num_rows($result1) > 0) {
            $output1  = "";
            $output1 .= "<table class='table table-striped'>
                    <thead>
                <tr>
                    <th>Product id</th>
                    <th>Product name</th>
                    <th>Product quantity</th>
                    <th>Product image name</th>
                    <th>Product details</th>
                </tr>
                </thead>";
            while ($data = mysqli_fetch_assoc($result1)) {
            $output1 .=	"<tr>
                <td>".$data['idProduct']."</td>
                <td>".$data['nameProduct']."</td>
                <td>".$data['quantityProduct']."</td>
                <td>".$data['imageProduct']."</td>
                <td>".$data['detailsProduct']."</td>
            </tr>";
            }

        $output1 .="</table>";
        $fileName1 = 'stock';
        $fileName1 .= '.csv';
        file_put_contents('../extras/data/'.$fileName1, $output1);

        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=download.xls'); 

        echo $output1;
    }else{
        echo "No record found";
    }
}
}