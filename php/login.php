<?php
    function notificacionesNumber()
    {
        $json = file_get_contents('../json-for-db/notifications.json');
        $data = json_decode($json, true);
        return count($data);
    }

    if(trim($_POST['rut'])== null|| trim($_POST['pass']) == null){
        echo "<script>alert('Por favor rellenar los campos correspondientes')</script>";
        header("Refresh:0 , url = index.html");
        exit();

    }
    else{
         require_once "conexion.php";
         $rut = mysqli_real_escape_string($conn,$_POST['rut']);
         $pass = mysqli_real_escape_string($conn,md5($_POST['pass']));
         $sql = "SELECT rut,password FROM user WHERE rut ='". $rut ."' and password = '".$pass."'";
         $query = mysqli_query($conn,$sql);
         $result = mysqli_fetch_array($query , MYSQLI_ASSOC);
         if(!$result){
             echo "<script>alert('Rut o Contraseña Inválida')</script>";
             header("Refresh:0 , url = logout.php");
             exit();

         }
         else{
             session_start();
             $_SESSION['username'] = $result['rut']; //<!-- No estoy seguro si hay q cambiar el parametro de la variable $_SESSION -->
             $_SESSION['noti-number'] = notificacionesNumber();
             header("Location: ../home.php");
             session_write_close();
         }
    }
    mysqli_close($conn);
?>