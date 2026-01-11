<?php
include 'config.php';
if($_SESSION['role']!='user'){ header("Location:index.php"); }

if(isset($_POST['calc'])){
    $vehicle = $_POST['vehicle'];
    $days = $_POST['days'];

    $v = $conn->query("SELECT * FROM vehicles WHERE id=$vehicle")->fetch_assoc();
    $total = $days * $v['rent_per_day'];

    echo "<h3>Total Rent: Rs $total</h3>";
    echo "<p>Vehicle: {$v['name']} ({$v['number_plate']})</p>";
    echo "<p>Rent Per Day: Rs {$v['rent_per_day']}</p>";
    echo "<p>Days: $days</p>";
}
?>

<!DOCTYPE html>
<html>
<head><title>Calculate Rent</title></head>
<body style="font-family:Arial;background:#f4f4f4;">
<h2>Rent Calculator</h2>

<form method="post" style="background:white;padding:20px;width:300px;">
Vehicle:
<select name="vehicle">
<?php
$res = $conn->query("SELECT * FROM vehicles");
while($r=$res->fetch_assoc()){
    echo "<option value='{$r['id']}'>{$r['name']} - {$r['number_plate']}</option>";
}
?>
</select><br><br>

Days:
<input type="number" name="days" min="1" required><br><br>

<input type="submit" name="calc" value="Calculate">
</form>

<br>
<a href="user_dashboard.php">⬅ Back</a>
</body>
</html>
