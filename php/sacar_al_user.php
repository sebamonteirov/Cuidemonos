<?php
$varsesion = $_SESSION['usuario'];

if ($varsesion == NULL or $varsesion == '') {
    header('location:.../login.html');
}
?>