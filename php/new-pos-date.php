<?php
session_start();
require_once "conexion.php";

echo "<script>alert()</script>";

$rut = $_SESSION["rut"];
$latitude = $_POST["lat"];
$longitude = $_POST["lng"];
$date = $_POST["date"];

$sql = "SELECT posDate FROM user WHERE rut = $rut";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);


?>