<?php
$name=$_POST['name'];
$id=$_POST['id'];
$age=$_POST['age'];

$con=mysqli_connect('localhost','root','','pharmacy');
$sql="INSERT INTO employee(name,id,age)values('$name','$id','$age')";
$q=mysqli_query($con,$sql);
if($q){
    echo 'REGISTERD SUCCESFULLY <a href="employee.html">go back</a>'; 
    
}
else{
    echo 'REGISTER FAILD';
}
?>
