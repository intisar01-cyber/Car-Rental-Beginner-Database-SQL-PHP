<?php
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$q = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($q);

if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $_SESSION['role'] = $row['role'];
    
    if($row['role'] == 'admin'){
        header("Location: admin_dashboard.php");
    } else {
        header("Location: user_dashboard.php");
    }
} else {
    echo "Invalid Login!";
}
?>
