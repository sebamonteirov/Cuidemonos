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

    <div class="seccion_noticia">
        <form action="php/next-location.php" method="POST">
            <input type="button" value="Ver siguiente punto" class="map map_en_pag-map">
        </form>
        <div id="googleMap"></div>
    </div>
    <script>
        /**
         * @param String name
         * @return String
         */
        function getParameterByName(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }

        var latitudeString = getParameterByName('latitude');
        var longitudeString = getParameterByName('longitude');
        var date = getParameterByName('date');

        var latitude = parseFloat(latitudeString);
        var longitude = parseFloat(longitudeString);

        function myMap() {
            var mapProp= {
            center:new google.maps.LatLng(latitude,longitude),
            zoom:14,
            disableDefaultUI: true,
            zoomControl: true
            };
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

            var marker = new google.maps.Marker({position: new google.maps.LatLng(latitude,longitude)});

            marker.setMap(map);

            console.log(latitude + " " + longitude + " " );
        }
    </script>
        
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd1p8Y_W2HVduY0j21EM7P3CL3YC_J8-I&callback=myMap"></script>
        
</body>
</html>