<?php
include 'config.php';

if(isset($_POST['rent'])){
    $customer=$_POST['customer'];
    $vehicle=$_POST['vehicle'];
    $start=$_POST['start'];
    $end=$_POST['end'];

    $days = (strtotime($end)-strtotime($start))/(60*60*24);
    if($days<=0){ $days=1; }

    $v = $conn->query("SELECT rent_per_day FROM vehicles WHERE id=$vehicle")->fetch_assoc();
    $total = $days * $v['rent_per_day'];

    $conn->query("INSERT INTO rentals(customer_id,vehicle_id,start_date,end_date,total_days,total_amount,status)
                  VALUES('$customer','$vehicle','$start','$end','$days','$total','booked')");

    $conn->query("UPDATE vehicles SET status='rented' WHERE id=$vehicle");

    echo "Car Rented Successfully. Total = Rs $total";
}
?>

<!DOCTYPE html>
<html>
<head><title>Rent Car</title></head>
<body style="font-family:Arial;">
<h2>Rent a Car</h2>

<form method="post">
Customer:
<select name="customer">
<?php
$res=$conn->query("SELECT * FROM customers");
while($r=$res->fetch_assoc()){
    echo "<option value='{$r['id']}'>{$r['name']}</option>";
}
?>
</select><br><br>

Vehicle:
<select name="vehicle">
<?php
$res=$conn->query("SELECT * FROM vehicles WHERE status='available'");
while($r=$res->fetch_assoc()){
    echo "<option value='{$r['id']}'>{$r['name']} - {$r['number_plate']}</option>";
}
?>
</select><br><br>

Start Date: <input type="date" name="start" required><br><br>
End Date: <input type="date" name="end" required><br><br>

<input type="submit" name="rent" value="Rent Now">
</form>

<a href="admin_dashboard.php">⬅ Back</a>
</body>
</html>
