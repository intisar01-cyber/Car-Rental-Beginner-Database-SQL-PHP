<?php
include 'config.php';
if($_SESSION['role']!='user'){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>
</head>
<body style="font-family:Arial;background:#eef2f3">

<h2 style="text-align:center;">User Dashboard</h2>

<div style="width:300px;margin:auto;background:white;padding:20px;border-radius:5px;">
<a href="calculate_rent.php">🧮 Calculate Rent</a><br><br>
<a href="rent_car.php">📄 Request Car Rental</a><br><br>
<a href="logout.php">🚪 Logout</a>
</div>

</body>
</html>
