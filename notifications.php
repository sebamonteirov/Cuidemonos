<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Cuidémonos</title>

    <!-- Styles 
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet"> 
	<link href="css/magnific-popup.css" rel="stylesheet"> -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://kit.fontawesome.com/d2b3bb300e.js" crossorigin="anonymous"></script>

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>

<body>

    <div class="top-bar">
        <button class="reportar" onclick="location.href='select-type-of-new-contagion.html'"><i class="fas fa-exclamation-circle" style="font-size: 1.5rem;"></i></button>
        <h1>Cuidémonos <i class="fas fa-angle-right"></i> Covid-19</h1>
    </div>

    <div class="bottom-bar">
        <button onclick="location.href='home.php'"><i class="fas fa-home" style="font-size: 1.5rem;"></i></button>
        <button onclick="location.href='notifications.php'">
            <div>
                <div class="red-circle">
                    <?php session_start(); require_once "php/conexion.php"; echo $_SESSION['noti-number']; ?>
                </div>
            </div>

            <i class="fas fa-bell" style="font-size: 1.5rem;"></i>
        </button>
        <button onclick="location.href='new_reunion.html'"><i class="fas fa-users" style="font-size: 1.5rem;"></i></button>
        <button onclick="location.href='cuenta.html'"><i class="fas fa-user" style="font-size: 1.5rem;"></i></button>
        <button onclick="location.href='config.html'"><i class="fas fa-bars" style="font-size: 1.5rem;"></i></button>
    </div>

    <div class="seccion_noticia">

        <h1 style="margin: 0.75rem 0px 0px 6.25vw; padding: 0px;">Notificaciones: </h1>

        <?php
        //session_start();
        //require_once "php/conexion.php";

        $rut = $_SESSION['username'];

        //$sql = "SELECT notifications FROM user WHERE rut = $rut";
        //$query = mysqli_query($conn, $sql);
        //$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        //$resultJson = $result['notifications'];

        $json = file_get_contents('json-for-db/notifications.json');
        $data = json_decode($json, true);

        foreach ($data as $valor){

            $coordenadas = null;

            echo '<div class="notificacion">';

            echo '<div class="contenido">';
            if ($valor['type'] === 1) {
                echo "<div class='logo'><i class='fas fa-virus' style='font-size: 3rem;'></i></div>";
                $coordenadas = true;
            } else {
                echo "<div class='logo'><i class='fas fa-users' style='font-size: 3rem;'></i></div>";
                $coordenadas = false;
            }
            
            echo '<div class="texto">';
            echo '<h1>'. $valor['title'] .'</h1>';
            echo '<p>'. $valor['text'] .'</p>';
            echo "</div>";
            echo "</div>";

            if ($coordenadas) {
                $latitud = $valor['location'][0][0];
                $longitud = $valor['location'][0][1];
                echo "<input type='button' value='Ver mapa' class='map' onclick='verMapa(0, $latitud, $longitud)'>";
            }

            echo '<div class="opciones_noti">';
            echo '<form action="php/aceptar-rechazar-notificacion.php" method="POST">';
            echo '    <input type="submit" value="Submit" class="a">';
            echo '    <input type="submit" value="Decline" class="d">';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
    <script>
        function verMapa(punto_actual, latitude, longitude) {
            location.href = "map.html?punto_actual=" + punto_actual + "&latitude=" + latitude + "&longitude=" + longitude;
        }
    </script>

</body>

</html>