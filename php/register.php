<!--    CREAR USUARIO   -->
<?php
require_once "conexion.php";

$rut_completo = mysqli_real_escape_string($conn, trim($_POST['rut']) . "-" . trim($_POST['dv']));
$password = mysqli_real_escape_string($conn, md5($_POST['pass']));

$sql = "SELECT rut FROM user WHERE rut = $rut_completo";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);

if ($result) {
    echo "<script>alert('Usuario actualmente está en uso')</script>";
    header("Refresh:0 , url = ../register.html");
    exit();
}else{
if ($_POST['rut'] != null && 
    $_POST['dv'] != null && 
    $_POST['email'] != null && 
    $_POST['pass'] != null &&
    $_POST['cfpass'] != null && 
    $_POST['cfpass'] == $_POST['pass']) {

    $sql2 = "INSERT INTO user (rut, password, email) VALUES ($rut_completo" . "," . trim(md5($_POST['pass'])) . "," . trim($_POST['email']) .")";
    $query = mysqli_query($conn, $sql);

    if ($conn->query($sql2)) {
        echo "<script>alert('Registro completado exitósamente')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();
    } else {
        echo "<script>alert('Registro incompleto')</script>";
        header("Refresh:0 , url = ../register.html");
        exit();
    }
} else {
    echo "<script>alert('Los campos de contraseña no coinciden')</script>";
    header("Refresh:0 , url = ../register.html");
    exit();
}
    mysqli_close($conn);
}
?>