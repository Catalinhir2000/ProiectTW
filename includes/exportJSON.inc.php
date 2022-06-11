<?php

$conn = mysqli_connect("localhost:3307", "CATALIN", "CATALIN", "CyMat");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

if (isset($_POST['exportJSON'])) {
    $query  = "SELECT * FROM users";
    $usersData = array();
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $usersData[] = array(
                'id' => $data['userId'],
                'name' => $data['userName'],
                'username' => $data['userUid'],
                'email' => $data['userEmail']
            );
        }

        $output = json_encode($usersData, JSON_PRETTY_PRINT);

        echo $output;
        $fileName = 'users';
        $fileName .= '.json';
        file_put_contents('../extras/data/'.$fileName, $output);
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename=download.json'); 

        $query1  = "SELECT * FROM postitemdb";
        $stockData = array();
        $result1 = mysqli_query($conn, $query1);
        if (mysqli_num_rows($result1) > 0) {
            while ($data = mysqli_fetch_assoc($result1)) {
                $stockData[] = array(
                     'id'  => $data["idProduct"],
                     'name' => $data["nameProduct"],
                     'quantity' => $data["quantityProduct"],
                     'image name' => $data["imageProduct"],
                     'details' => $data["detailsProduct"],
                );
            }

            $output1 = json_encode($stockData, JSON_PRETTY_PRINT);

            echo $output1;
            $fileName1 = 'stock';
            $fileName1 .= '.json';
            file_put_contents('../extras/data/'.$fileName1, $output1);
            header('Content-Type: application/json');
            header('Content-Disposition: attachment; filename=download.json'); 
    }
    }else{
        echo "No record found";
    }

}