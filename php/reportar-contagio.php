<?php
session_start();
require_once "conexion.php";
/*
if ($_POST['g-recaptcha-response'] == '') {
    echo "Captcha invalido";
} 
else 
{
    $obj = new stdClass();
    $obj->secret = "CODIGO";
    $obj->response = $_POST['g-recaptcha-response'];
    $obj->remoteip = $_SERVER['REMOTE_ADDR'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';

    $options = array(
        'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($obj)
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    $validar = json_decode($result);

    /* FIN DE CAPTCHA /

    if ($validar->success) 
    {
        $lista_pos = "S";

        $sql = "SELECT id FROM user WHERE positions.contains ='" id. "' || ";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
    } 
    else 
    {
        echo "Captcha invalido";
    }
}*/

header("Refresh:0 , url = ../home.php");
?>