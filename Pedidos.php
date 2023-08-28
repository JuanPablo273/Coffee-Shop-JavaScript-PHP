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
                <H2>Pedidos</H2>
               
                <?php
                //imprimir los alumnos
                require_once 'php/getFactura.php';
                RetornarFacturas();
                ?>


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