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
require_once 'include/funciones/recogeRequests.php';
$id = recogeGet('id');
$errores = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = recogePost("nombre");
    $descripcion = recogePost("descripcion");
    $precio = recogePost("precio");
    $tipos = recogePost("tipos");
    //Investigar expresiones regulares para validar telefono y correo
    $nombreOK = false;
    $descripcionOK = false;
    $precioOK = false;
    $tiposOK = false;
        
    if ($nombre === "") {
        $errores[] = "No se ingresó el nombre del platillo. Por favor, ingrese un nombre.";
    } elseif (strlen($nombre) > 100) {
        $errores[] = "El nombre del platillo es demasiado largo. Debe tener 100 caracteres o menos.";
    } else {
        $nombreOK = true;
    }

    
    if ($descripcion === "") {
        $errores[] = "No se ingresó ninguna descripción del platillo. Por favor, agregue una descripción.";
    } else {
        $descripcionOK = true;
    }

    
    if ($precio === "") {
        $errores[] = "No se ingresó el precio del platillo. Por favor, ingrese un precio.";
    } elseif (!is_numeric($precio) || $precio <= 0) {
        $errores[] = "El precio debe ser un número positivo.";
    } else {
        $precioOK = true;
    }

    
    if ($tipos === "") {
        $errores[] = "No se seleccionó ningún tipo de platillo. Por favor, elija un tipo.";
    } else {
        $tiposOK = true;
    }

    if ($nombreOK && $descripcionOK && $precioOK && $tiposOK) {
        //inserción de datos
        require_once 'php/getMenu.php';
        if (actualizarMenu($nombre, $descripcion, $precio,$tipos,$id)) {
            header("Location: Menu.php");
        }
    }
}
?>



    <!-- About -->
    <div id="about" class="section">

        <!-- container -->
        <div class="container" style="background-color: white;">

            <!-- row -->
            <div class="row">

                <br>
                <br>
                <br>
                <br>
                <div>
                    <H2>Platillos</H2>
                    <div>



                        <form  method="post">
                            <?php
                            require_once 'php/getMenu.php';
                            
                            RetornePlatillo($id);
                            ?>

                            <button class="main-button" type="submit">Actualizar</button>
                        </form>
                        <br>
                        <form action="php/eliminarMenu.php" method="post">
                            <!-- novalidate cuando no se quiere la validación html5 -->

                            <input type="text" name="id" id="id" value="<?= $id ?>" hidden>
                            <button class="main-button" type="submit">Eliminar</button>
                        </form>
                        <?php foreach ($errores as $error): ?>
                        <div class="alerta error">
                            <?php echo $error; ?>
                        </div>
                    <?php endforeach; ?>
                    </div>


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