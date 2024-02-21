<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $medicineToDelete = $_POST['medicineToDelete'];
    $supplierToDelete = $_POST['supplierToDelete'];

    $sql = "DELETE FROM medicines WHERE medicinename = '$medicineToDelete' AND sname = '$supplierToDelete'";

    if ($conn->query($sql) === TRUE) {
       
        echo '<script>alert("record inserted sucessfully !")</script>';
    } else {

        echo '<div class="error-message">No medicine on this name ' . $conn->error . '</div>';
    }
}


$conn->close();
?>
