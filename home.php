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
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
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

    <?php
    //session_start(); Están comentados porque los llamo para mostrar la cantidad de notificaciones
    //require_once "php/conexion.php";
    
    //Para datos
    $sql = "SELECT * FROM datos_diarios WHERE date = '1'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    //Para noticias
    $sql2 = "SELECT * FROM news ORDER BY id DESC";
    $query2 = mysqli_query($conn, $sql2);

    ?>
    <div class="datos">
        <h1>Datos diarios</h1>
        <div class="datos-card-container">
            <div class="card-datos">
                <p class="logo-dato"><i class="fas fa-percent"></i></p>
                <p class="nombre-dato">Positividad</p>
                <p class="numero-dato">
                    <?php echo $result['positividad']?>
                </p>
            </div>
            <div class="card-datos">
                <p class="logo-dato"><i class="fas fa-head-side-cough"></i></p>
                <p class="nombre-dato">Nuevos Casos</p>
                <p class="numero-dato">+<?php echo $result['nuevos_casos']?></p>
            </div>
            <div class="card-datos">
                <p class="logo-dato"><i class="fas fa-ribbon" style="font-size: 1.5rem;"></i></p>
                <p class="nombre-dato">Muertos</p>
                <p class="numero-dato">+<?php echo $result['muertos']?></p>
            </div>
        </div>
    </div>

    <div class="seccion_noticia">

        <h1 style="margin: 0.75rem 0px 0px 6.25vw; padding: 0px;">Noticias relacionadas: </h1>

        <?php

        while ($result2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
        echo "<div class='noticia'>";
        
        $imageUrl = $result2['image'];
        echo    "<div class='img' style='background-image: url($imageUrl)'></div>";
        echo    "<h1>" . $result2['title'] . "</h1>";
        echo    "<p id='" . $result2['id'] . "'";
        echo    "onclick='showText(" . $result2['id'] . ")'>";
        echo    "    <b>" . $result2['name_source'] . " " . "</b>";
        echo       $result2['content'];
        echo    "</p>
               </div>";
        }
        ?>
    </div>
    <script>
        function showText(id) {
            var noticia = document.getElementById(id);
            console.log(noticia);
            noticia.style.whiteSpace = "normal";
        }
    </script>
    <script>

    </script>
</body>
</html>