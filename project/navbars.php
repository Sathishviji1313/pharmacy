<!DOCTYPE html>
<html lang="en">
    <style>
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
  background: url(bg.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}

  

.container {
    display: flex;
 
}

.navbar {
    height: 100%;
    width: 200px;
    position: fixed;
    background-image:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(navbg.jpg);
    overflow-x: hidden;
    padding-top: 20px;
    transition: 0.5s;
}

.navbar a {
    padding: 10px 16px;
    text-decoration: none;
    font-size: 16px;
    color: white;
    display: block;
    transition: 0.3s;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
    transition: 0.5s;
}

.submenu {
    display: none;
    padding-left: 16px;
}

.navbar a.active + .submenu, .navbar a:hover + .submenu {
    display: block;
}

.submenu a {
    
    padding: 8px 16px;
    text-decoration: none;
    font-size: 14px;
    color: white;
    display: block;
    transition: 0.3s;
    cursor: pointer;
}

.submenu a:hover {
    background-color: #ddd;
    color: black;
}

.clickable {
    cursor: pointer;
}

.clickable + .submenu {
    display: none;
}

.clickable:hover + .submenu {
    display: block;
}

.content {
    margin-left: 200px;
    padding: 40px;
    padding-bottom: 5px;
    color: #010c0f;
    width: 300px;
    backdrop-filter: blur(8px); 
    background-color: rgba(255, 255, 255, 0.384); 
    background-size: cover;
    flex: auto;  
}


h2 {
    text-align: center; 
    margin-bottom: 20px; 
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;

}

   
label {
    margin-bottom: 8px;
}

input {
    padding: 8px;
    margin-bottom: 16px;
    width: 80%;
    box-sizing: border-box;
}

input[type="submit"] {
    margin-top: 8px;
}
.tm{
    display: inline-block;
    width: 200px;
    padding: 100px;
    background-color: rgba(255, 255, 255, 0.5);
    color: black;
    margin-left: 100px;
}

    /* css for show data table form */


    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      text-align: center;
      color: black;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    td {
      background-color:white;
      max-width: 200px;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    </style>

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Medicine and Employee Navigation</title>
</head>
<body> 
  

    
    <div class="container">
        <div class="navbar">
        
            <a href="#" class="active">Medicine</a>
            <div class="submenu">
                <a href="#" onclick="showForm('dashboardform')">Dashboard</a>
                <a href="#" onclick="showForm('addMedicineForm')">Add Medicine</a>
                <a href="#" onclick="showForm('totalmedicineform')">Total Medicine</a>
                <div id="medicineListContainer"></div>
            </div>
            
        </div>

        <div class="content" id="dashboardform">
            <h1>Dashboard</h1>
            
            <h2 class="tm"> <br>
                comming soon
            </h2>

            <?php

$conn = mysqli_connect("localhost", "root", "", "pharmacy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT COUNT(*) as count FROM medicines";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
$count = $row['count'];


?>

<body>
    <h2 class="tm">Total medicine <br>
    <?php  echo $count; ?></h2>
</body>
</html>
<?php

mysqli_close($conn);
?>    
          </div>
        

        <div class="content" id="addMedicineForm">
        
            <h2>Add Medicine</h2>
            
            <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pharmacy";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the delete button is clicked
    if (isset($_POST['delete'])) {
        $id_to_delete = $_POST['id_to_delete'];
        $sql = "DELETE FROM medicines WHERE id = $id_to_delete";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else { // If add button is clicked
        $medicinename = $_POST['medicinename'];
        $sdate = $_POST['sdate'];
        $sname = $_POST['sname'];

        $sql = "INSERT INTO medicines (medicinename, sdate, sname) VALUES ('$medicinename', '$sdate', '$sname')";

        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>


    <title>Add/Delete Records</title>
</head>
<body>
    <h2>Add New Record</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        ID : <input type="number" name="id"><br><br>
        Medicine Name: <input type="text" name="medicinename"><br><br>
        Date: <input type="date" name="sdate"><br><br>
        Name: <input type="text" name="sname"><br><br>
        <input type="submit" name="add" value="Add">
    </form>

    <h2>Delete Record</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        ID to Delete: <input type="number" name="id_to_delete"><br><br>
        <input type="submit" name="delete" value="&#10006;">
    </form>
</body>
</html>

        
        </div>


        <div  class="content" id="totalmedicineform">
            <h2>Medicine Table</h2>
            
            <table border="1">
              <thead>
                <tr>
                  <th>Medicinename</th>
                  <th>Supplire Name</th>
                </tr>
              </thead>
              <tbody>
            
              <?php
              $conn = new mysqli('localhost', 'root', '', 'pharmacy');
            
              if ($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
              }
            
              $result = $conn->query("SELECT * FROM medicines");
            
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr><td>{$row['medicinename']}</td><td>{$row['sname']}</td></tr>";
                }
              } else {
                echo "<tr><td colspan='2'>No data found</td></tr>";
              }
            
              $conn->close();
              ?>
            
              </tbody>
            </table>

    </div>


    <div class="content" id="totemp" style="display: none;">
        <h2>Total Employee</h2>
    </div>
    <div class="content" id="empsal" style="display: none;">
        <h2>Employee Salary</h2>
    </div>

    <script src="script.js"></script>

    <script>
        function showForm(formId) {
       
            document.querySelectorAll('.content').forEach(form => form.style.display = 'none');

        
            document.getElementById(formId).style.display = 'block';
        }
    
        
    </script>
</body>
</html>
