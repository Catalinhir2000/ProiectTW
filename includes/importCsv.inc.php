<?php

$conn = mysqli_connect("localhost:3307", "CATALIN", "CATALIN", "CyMat");
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

    if (isset($_POST['importCSV'])) {
    	
    	$fileName = $_FILES["file"]["tmp_name"];

    	if ($_FILES['file']['size'] > 0) {
            $row = 1;
            if (($handle = fopen($fileName, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    echo "<p> $num fields in line $row: <br /></p>\n";
                    $row++;
                    for ($c = 0; $c < $num; $c++) {
                        echo $data[$c] . "<br />\n";
                    }
                }
                fclose($handle);
            }
        }
    }

?>