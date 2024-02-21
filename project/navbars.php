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
                <a href="#" onclick="showForm('deleteMedicineForm')">Delete Medicine</a>
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
<!DOCTYPE html>
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

            <form action="add.php" method="post" >
                <!-- Your existing form code here -->
                <label for="addMedicine"><br>Medicine Name :</label>
                <input type="text" id="medicinename" name="medicinename" required>

                <label for="supplie dte"><br>Expire date:</label>
                <input type="text" id="date" name="sdate" required>

                <label for="supplie name"><br>Supplire name:</label>
                <input type="text" id="sname" name="sname" required>
<br>
                <input type="submit"  value="submit">
                
            </form>
        
        </div>

        <div class="content" id="deleteMedicineForm">
            <h2>Delete Medicine</h2>
            <form action="deleteMedicine.php" method="post" onsubmit="return deleteMedicine();">
                <!-- Delete Medicine Form Fields -->
                <label for="medicineToDelete">Medicine Name to Delete:</label>
                <input type="text" id="medicineToDelete" name="medicineToDelete" required>
    
                <label for="supplierToDelete">Supplier Name:</label>
                <input type="text" id="supplierToDelete" name="supplierToDelete" required>
    
                <input type="submit" value="Delete">
            </form>
          
            <div id="deleteMessage"></div>
            
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
