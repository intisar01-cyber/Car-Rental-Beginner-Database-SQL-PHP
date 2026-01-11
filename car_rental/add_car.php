<?php
include 'config.php';
if($_SESSION['role']!='admin'){ header("Location:index.php"); }

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $plate = $_POST['plate'];
    $rent = $_POST['rent'];

    $conn->query("INSERT INTO vehicles(name,number_plate,rent_per_day) 
                  VALUES('$name','$plate','$rent')");
    echo "Car Added Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Car</title></head>
<body style="font-family:Arial;">
<h2>Add Vehicle</h2>
<form method="post">
Name: <input type="text" name="name" required><br><br>
Number Plate: <input type="text" name="plate" required><br><br>
Rent Per Day: <input type="number" name="rent" required><br><br>
<input type="submit" name="add" value="Add Car">
</form>
<a href="admin_dashboard.php">⬅ Back</a>
</body>
</html>
