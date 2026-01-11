<?php
include 'config.php';
if($_SESSION['role']!='admin'){ header("Location:index.php"); }
?>

<!DOCTYPE html>
<html>
<head>
<title>Reports</title>
</head>
<body style="font-family:Arial;background:#eef2f3;">
<h2>Admin Reports</h2>

<h3>🚗 Cars Currently On Rent</h3>
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Name</th><th>Plate</th></tr>
<?php
$res = $conn->query("SELECT * FROM vehicles WHERE status='rented'");
while($r=$res->fetch_assoc()){
    echo "<tr>
            <td>{$r['id']}</td>
            <td>{$r['name']}</td>
            <td>{$r['number_plate']}</td>
          </tr>";
}
?>
</table>

<br>

<h3>🅿 Free Cars</h3>
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Name</th><th>Plate</th></tr>
<?php
$res = $conn->query("SELECT * FROM vehicles WHERE status='available'");
while($r=$res->fetch_assoc()){
    echo "<tr>
            <td>{$r['id']}</td>
            <td>{$r['name']}</td>
            <td>{$r['number_plate']}</td>
          </tr>";
}
?>
</table>

<br>

<h3>💰 Total Revenue</h3>
<?php
$res = $conn->query("SELECT SUM(amount) AS total FROM payments");
$row = $res->fetch_assoc();
$total = $row['total'] ? $row['total'] : 0;
echo "<h2>Rs $total</h2>";
?>

<br>
<a href="admin_dashboard.php">⬅ Back</a>
</body>
</html>
