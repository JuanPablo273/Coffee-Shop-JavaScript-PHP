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
    $usuario = recogePost("user");
    $nombre_completo= recogePost("nombre_completo");
    $email = recogePost("email");
	$telefono = recogePost("telefono");
    $tipos = recogePost("tipos");

    $usuarioOK = false;
    $nombre_completoOK = false;
    $emailOK = false;
	$telefonoOK = false;

	if ($usuario === "") {
		$errores[] = "No se ingresó el usuario Correcto: el campo de usuario está vacío.";
	} elseif (strlen($usuario) > 50) {
		$errores[] = "El usuario ingresado es demasiado largo, debe tener 50 caracteres o menos.";
	} else {
		$usuarioOK = true;
	}
    if ($nombre_completo === "") {
        $errores[] = "No se ingresó el Nombre Completo Correcto: el campo de usuario está vacío";
    } else {
        $nombre_completoOK = true;
    }

    if ($email === "") {
    $errores[] = "No se ingresó un correo electrónico. Por favor, ingrese un correo electrónico.";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El formato del correo electrónico es inválido.";
	} elseif (strpos($email, '@') === false) {
    $errores[] = "El correo electrónico debe contener al menos un símbolo '@'.";
	} else {
    $emailOK = true;
	}
	
	if ($telefono === "") {
		$errores[] = "No se ingresó un número de teléfono. Por favor, ingrese un número de teléfono.";
	} elseif (strlen($telefono) !== 8 || !ctype_digit($telefono)) {
		$errores[] = "El número de teléfono debe tener exactamente 8 dígitos.";
	} else {
		$telefonoOK = true;
	}
	

    if ($usuarioOK && $nombre_completoOK && $emailOK && $telefonoOK) {
        //inserción de datos
        require_once 'php/get_data.php';
        if (ActualizarUsuario($usuario, $nombre_completo,$email,$telefono,$tipos,$id)) {
            header("Location: Administracion.php");
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
                    <H2>Usuario</H2>
                    <div>



                        <form  method="post">
                            <?php
                            require_once 'php/get_data.php';
                           
                            RetorneUsuario($id);
                            ?>

                            <input type="text" name="id" id="id" value="<?= $id ?>" hidden>
                            <button class="main-button" type="submit">Actualizar</button>
                        </form>
                        <br>
                        <form action="php/eliminar_usuario_be.php" method="post">
                            <!-- Borramos el action -->

                            <input type="text" name="id" id="id" value="<?= $id ?>" hidden>
                            <button class="main-button" type="submit">Eliminar</button>
                        </form>
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