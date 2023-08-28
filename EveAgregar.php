<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    echo '
            <script>
            alert("Debes de Iniciar Sesion");
            window.location = "Login.php";
            </script>
        ';
    session_destroy();
    die();
}
require 'include/funciones.php';

incluirTemplate('headerAdmin');
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'include/funciones/recogeRequests.php';

    $nombre = recogePost("nombre");
    $descripcion = recogePost("descripcion");
    $fecha = recogePost("fecha");
    $hora = recogePost("hora");
    //Investigar expresiones regulares para validar telefono y correo
    $nombreOK = false;
    $descripcionOK = false;
    $fechaOK = false;
    $horaOK = false;
    if ($nombre === "") {
        $errores[] = "No se digitó el nombre del evento";
    } else {
        $nombreOK = true;
    }

    if ($descripcion === "") {
        $errores[] = "No se digitó ninguna descripcion";
    } else {
        $descripcionOK = true;
    }

    if ($fecha === "") {
        $errores[] = "No se asigno la fecha";
    } else {
        $fechaOK = true;
    }
    if ($hora === "") {
        $errores[] = "No se asigno la hora";
    } else {
        $horaOK = true;
    }

    if ($nombreOK && $descripcionOK && $fechaOK && $horaOK) {
        //inserción de datos
        require_once 'php/getEve.php';
        if (registroEve($nombre, $descripcion, $fecha,$hora)) {
            header("Location: Eventos.php");
        }
    }
}
?>

<!-- About -->
<div id="menu" class="section">

    <!-- container -->
    <div class="container" style="background-color: white;">

        <!-- row -->
        <div class="row">

            <br>
            <br>
            <br>
            <br>
            <div>
                <H2>Agregar Evento</H2>
                <div class="login-wrap p-0">
                    <form method="POST" class="formulario__register">

                        <div class="form-group">
                            <input type="text" id="nombre" placeholder="Nombre" name="nombre">
                        </div>

                        <div class="form-group">
                            <textarea name="descripcion" id="descripcion" rows="4" cols="50" placeholder='Descripcion' ></textarea>
                        </div>
                        <div class="form-group">
                            <input type="date" id="fecha"  name="fecha">
                        </div>
                        <div class="form-group">
                            <input type="time" id="hora"  name="hora">
                        </div>
                        <div class="form-group">
                            <button class="main-button" type="submit" >Agregar</button>
                        </div>


                    </form>
                    <?php foreach($errores as $error): ?>
                    <div class="alerta error">
                        <?php echo $error; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>





            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /About -->



    <!-- Contact -->


    

    <?php

    //include 'include/template/footer.php';
    incluirTemplate('footerAdmin');

    ?>