<?php
include 'config.php';
if($_SESSION['role']!='admin'){ header("Location:index.php"); }

if(isset($_POST['return'])){
    $rid=$_POST['rental'];

    $r=$conn->query("SELECT * FROM rentals WHERE id=$rid")->fetch_assoc();
    $conn->query("UPDATE rentals SET status='returned' WHERE id=$rid");
    $conn->query("UPDATE vehicles SET status='available' WHERE id={$r['vehicle_id']}");

    $conn->query("INSERT INTO payments(rental_id,amount,payment_date)
                  VALUES('$rid','{$r['total_amount']}',CURDATE())");

    echo "Car Returned & Payment Recorded!";
}
?>

<!DOCTYPE html>
<html>
<head><title>Return Car</title></head>
<body style="font-family:Arial;">
<h2>Return Car</h2>

<form method="post">
Rental:
<select name="rental">
<?php
$res=$conn->query("SELECT * FROM rentals WHERE status='booked'");
while($r=$res->fetch_assoc()){
    echo "<option value='{$r['id']}'>Rental ID {$r['id']}</option>";
}
?>
</select><br><br>
<input type="submit" name="return" value="Return">
</form>

<a href="admin_dashboard.php">⬅ Back</a>
</body>
</html>
