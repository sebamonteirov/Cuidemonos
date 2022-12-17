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
    <title>Cuidémonos - reportar contagio</title>
    
    <!-- Styles  -->
	<link href="css/styles.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/select-regiones-comunas.js"></script>
    <script src="js/insertar-region-comunas.js"></script>

    <!-- CAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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

        <h1 style="margin: 0.75rem 0px 0px 6.25vw; padding: 0px;">Si estás contagiado de Sars-Cov-2 (covid-19) rellena el siguiente formulario: </h1>

        <form id="regForm" action="php/reportar-contagio.php" method="post">
            
            <div class="tab">Confirma que eres humano:
                <p>
                    <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                </p>
            </div>
            <!-- Esta seccion era para que el usuario reportara las comunas en las que habia tenido contacto estrecho, por el momento va a quedar inhabilitada porque aunque agrega otro <select> para region y comuna, este no se ve afectado por el script que deberia hacer que aparecieran las opciones de regiones y comunas

            One "tab" for each step in the form: 
            <div id="tab1" class="tab">
              ¿En qué comuna(s) crees tuviste contacto estrecho con otras personas? Te recomendamos tomar en cuenta los lugares públicos en lo que no usaste mascarilla como patios de comida.
              <div id="select_regiones_comunas">
                 <p><select id="regiones"></select></p>
                 <p><select id="comunas"></select></p>
              </div>
              <p><input type="button" value="Agregar otra comuna" onclick="insertarNuevoRC()" style="background-color: #44ef5c;"></p>
            </div>

            SCRIPT PARA INSERTAR NUEVO SELECT
            <script>
                var x = document.getElementById("select_regiones_comunas");
                console.log(x);

                function insertarNuevoRC(){
                    x.insertAdjacentHTML("afterend", "<div><p><select id='regiones'></select></p><p><select id='comunas'></select></p></div>");
                }
            </script>

            -->
            <div class="tab">¿En qué comuna(s) crees tuviste contacto estrecho con otras personas? Te recomendamos tomar en cuenta los lugares públicos en lo que no usaste mascarilla como patios de comida.
                <p>
                    <input type="checkbox" id="region0" name="region0" value="region0" onclick="regiones0()">
                    <label for="region0"> No lo sé/No estoy seguro</label><br>

                    <input type="checkbox" id="region1" name="region1" value="arica_y_parinacota" onclick="regiones()" class="checkbox_region">
                    <label for="region1"> Arica y Parinacota</label><br>

                    <input type="checkbox" id="region2" name="region2" value="tarapaca" onclick="regiones()" class="checkbox_region">
                    <label for="region2"> Tarapacá </label><br>

                    <input type="checkbox" id="region3" name="region3" value="antofagasta" onclick="regiones()" class="checkbox_region">
                    <label for="region3"> Antofagasta</label><br>

                    <input type="checkbox" id="region4" name="region4" value="atacama" onclick="regiones()" class="checkbox_region">
                    <label for="region4"> Atacama</label><br>

                    <input type="checkbox" id="region5" name="region5" value="coquimbo" onclick="regiones()" class="checkbox_region">
                    <label for="region5"> Coquimbo</label><br>

                    <input type="checkbox" id="region6" name="region6" value="valparaiso" onclick="regiones()" class="checkbox_region">
                    <label for="region6"> Valparaíso</label><br>

                    <input type="checkbox" id="region7" name="region7" value="metropolitana" onclick="regiones()" class="checkbox_region">
                    <label for="region7"> Metropolitana</label><br>

                    <input type="checkbox" id="region8" name="region8" value="ohiggins" onclick="regiones()" class="checkbox_region">
                    <label for="region8"> Región del Libertador Gral. Bernardo O’Higgins</label><br>

                    <input type="checkbox" id="region9" name="region9" value="maule" onclick="regiones()" class="checkbox_region">
                    <label for="region9"> Región del Maule</label><br>

                    <input type="checkbox" id="region10" name="region10" value="nuble" onclick="regiones()" class="checkbox_region">
                    <label for="region10"> Ñuble</label><br>

                    <input type="checkbox" id="region11" name="region11" value="biobio" onclick="regiones()" class="checkbox_region">
                    <label for="region11"> Región del Biobío</label><br>

                    <input type="checkbox" id="region12" name="region12" value="araucania" onclick="regiones()" class="checkbox_region">
                    <label for="region12"> Región de la Araucanía</label><br>

                    <input type="checkbox" id="region13" name="region13" value="rios" onclick="regiones()" class="checkbox_region">
                    <label for="region13"> Región de Los Ríos</label><br>

                    <input type="checkbox" id="region14" name="region14" value="lagos" onclick="regiones()" class="checkbox_region">
                    <label for="region14"> Región de Los Lagos</label><br>

                    <input type="checkbox" id="region15" name="region15" value="aysen" onclick="regiones()" class="checkbox_region">
                    <label for="region15"> Región Aysén</label><br>

                    <input type="checkbox" id="region16" name="region16" value="magallanes" onclick="regiones()" class="checkbox_region">
                    <label for="region16"> Región de Magallanes y de la Antártica Chilena</label><br>
                </p>
            </div>
            <div class="tab">¿Sabes si fue alguna variante en especifico?
                <p>
                    <select>
                        <option>No conozco la variante</option>
                        <option>Variante Alfa</option>
                        <option>Variante Beta</option>
                        <option>Variante Gamma</option>
                        <option>Variante Delta</option>
                        <option>Variante Ómicron</option>
                    </select>
                </p>
            </div>

            <div class="tab"> ¿Quieres compartir tu información con las autoridades de salud? *Tu info. seguirá siendo privada para otras personas.
                <p>
                    <select>
                        <option>Sí</option>
                        <option>No</option>
                    </select>
                </p>
            </div>
            
            <div style="overflow:auto; margin-top: 2rem;">
              <div style="float:right;">
                <input type="button" value="Previous" id="prevBtn" onclick="nextPrev(-1)" class="btn-prev-nxt">
                <input type="button" value="Next" id="nextBtn" onclick="nextPrev(1)" class="btn-prev-nxt">
              </div>
            </div>
            
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
            </div>
            
            </form>
    </div>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
        }

        function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
        }

        function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
        }

        function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
        }
    </script>
    <!--Script js para que si usuario selecciona el primer checkbox sobre la region se desactiven los demas y viceversa-->
    <script>
        var region0 = document.getElementById("region0");
        var checkboxs = document.getElementsByClassName("checkbox_region");

        function regiones0() {
            if (region0.checked == true) {
                for (let index = 0; index < checkboxs.length; index++) {
                    checkboxs[index].checked = false;
                }
            }
        }

        function regiones() {
            if (checkboxs[0].checked == true || 
                checkboxs[1].checked == true ||
                checkboxs[2].checked == true ||
                checkboxs[3].checked == true ||
                checkboxs[4].checked == true ||
                checkboxs[5].checked == true ||
                checkboxs[6].checked == true ||
                checkboxs[7].checked == true ||
                checkboxs[8].checked == true ||
                checkboxs[8].checked == true ||
                checkboxs[9].checked == true ||
                checkboxs[10].checked == true ||
                checkboxs[11].checked == true ||
                checkboxs[12].checked == true ||
                checkboxs[13].checked == true ||
                checkboxs[14].checked == true ) {
                region0.checked = false;
                console.log("una checkbox esta marcada")
            }
        }
    </script>
</body>
</html>