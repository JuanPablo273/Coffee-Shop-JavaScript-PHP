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

incluirTemplate('headerMain');

?>
<div>

<!-- Backgound Image -->
<div class="bg-image bg-parallax overlay" style="background-image: url('webstyles2/img/background01.jpg');">
</div>
<!-- /Backgound Image -->
</div>


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
                    <H2>Item</H2>
                    <div>



                        <form action="php/actualizarItem.php" method="post">
                            <?php
                            require_once 'php/getCarrito.php';
                            $id = recogeGet('id');
                            RetorneItem($id);
                            ?>
                            <br>
                            <input type="text" name="id" id="id" value="<?= $id ?>" hidden>
                            <button class="main-button" type="submit">Actualizar</button>
                        </form>
                        <br>
                        <form action="php/eliminarItem.php" method="post">
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



    <?php

//include 'include/template/footer.php';
incluirTemplate('footerAdmin');

?>