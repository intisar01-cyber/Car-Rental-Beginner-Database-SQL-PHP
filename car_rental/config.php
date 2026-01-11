<?php
$conn = new mysqli("localhost","root","","car_rental_db");

if($conn->connect_error){
    die("Database Connection Failed");
}
session_start();
?>
