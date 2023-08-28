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

                            <?php
                            require_once 'php/getFactura.php';
                            RetorneFactura($id);
                            ?>

                        <form action="php/eliminarPedido.php" method="post">
                            <!-- novalidate cuando no se quiere la validación html5 -->

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