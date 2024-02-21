<?php
$servername = "localhost";  
$username = "root";        
$password = "";            
$database = "pharmacy";  


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$medicinename = $_POST['medicinename'];
$sdate = $_POST['sdate'];
$sname = $_POST['sname'];


$sql = "INSERT INTO medicines (medicinename,sdate,sname) VALUES ('$medicinename', '$sdate', '$sname')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
    
  

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
