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
<div id="carrito" class="section">

    <!-- container -->
    <div class="container" style="background-color: white;">

        <!-- row -->
        <div class="row">

            <br>
            <br>
            <br>
            <br>
            <div>
                <H2>Factura</H2>
                <?php
                require_once 'php/getFactura.php';
                RetornarFactUser();
                ?>
                <div class="total">
                <a class="main-button" href="Inicio.php">Regresar</a>
                </div>
            </div>




        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<?php

//include 'include/template/footer.php';
incluirTemplate('footerAdmin');

?>