<?php
include 'config.php';
if($_SESSION['role']!='admin'){ header("Location:index.php"); }

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM vehicles WHERE id=$id");
}
?>

<!DOCTYPE html>
<html>
<head><title>Manage Cars</title></head>
<body style="font-family:Arial;">
<h2>Manage Vehicles</h2>

<form method="get">
Search: <input type="text" name="search">
<input type="submit" value="Search">
</form>

<table border="1" cellpadding="5">
<tr>
<th>ID</th><th>Name</th><th>Plate</th><th>Rent</th><th>Status</th><th>Action</th>
</tr>

<?php
$where="";
if(isset($_GET['search'])){
    $s=$_GET['search'];
    $where="WHERE name LIKE '%$s%' OR number_plate LIKE '%$s%'";
}

$res = $conn->query("SELECT * FROM vehicles $where");
while($row=$res->fetch_assoc()){
echo "<tr>
<td>{$row['id']}</td>
<td>{$row['name']}</td>
<td>{$row['number_plate']}</td>
<td>{$row['rent_per_day']}</td>
<td>{$row['status']}</td>
<td><a href='?delete={$row['id']}'>Delete</a></td>
</tr>";
}
?>
</table>
<a href="admin_dashboard.php">⬅ Back</a>
</body>
</html>
