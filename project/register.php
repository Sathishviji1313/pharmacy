<?php
$servername = "localhost";  
$username = "root";        
$password = "";            
$database = "pharmacy";  


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$pharmacyName = $_POST['pharmacyName'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);  


$sql = "INSERT INTO pharmacy_tabl (pharmacyName, address, mobile, username, password) VALUES ('$pharmacyName', '$address', '$mobile', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
    header("Location: index.html");
    exit();

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
