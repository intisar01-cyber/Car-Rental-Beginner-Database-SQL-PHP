<?php
include 'config.php';
if($_SESSION['role']!='admin'){ header("Location:index.php"); }

if(isset($_POST['save'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $cnic=$_POST['cnic'];

    $conn->query("INSERT INTO customers(name,phone,cnic)
                  VALUES('$name','$phone','$cnic')");
    echo "Customer Registered Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head><title>Register Customer</title></head>
<body style="font-family:Arial;">
<h2>Register Customer</h2>

<form method="post">
Name: <input type="text" name="name" required><br><br>
Phone: <input type="text" name="phone" required><br><br>
CNIC: <input type="text" name="cnic" required><br><br>
<input type="submit" name="save" value="Register">
</form>

<a href="admin_dashboard.php">⬅ Back</a>
</body>
</html>
