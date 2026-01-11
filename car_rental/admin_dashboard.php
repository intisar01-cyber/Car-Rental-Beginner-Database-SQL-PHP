<?php
include 'config.php';
if($_SESSION['role']!='admin'){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
</head>
<body style="font-family:Arial;background:#eef2f3">

<h2 style="text-align:center;">Admin Dashboard</h2>

<div style="width:300px;margin:auto;background:white;padding:20px;border-radius:5px;">
<a href="add_car.php">➕ Add Vehicle</a><br><br>
<a href="manage_cars.php">🚗 Manage Vehicles</a><br><br>
<a href="register_customer.php">👤 Register Customer</a><br><br>
<a href="rent_car.php">📄 Rent a Car</a><br><br>
<a href="return_car.php">↩ Return Car</a><br><br>
<a href="cancel_booking.php">❌ Cancel Booking</a><br><br>
<a href="reports.php">📊 Reports</a><br><br>
<a href="logout.php">🚪 Logout</a>
</div>

</body>
</html>
