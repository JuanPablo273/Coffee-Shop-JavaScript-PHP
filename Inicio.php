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
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'include/funciones/recogeRequests.php';

    $r1 = recogePost("rating");
    $r2 = recogePost("ratingC");
    $r3 = recogePost("ratingB");
    $user = $_SESSION['usuario'];
    //Investigar expresiones regulares para validar telefono y correo
    $r1OK = false;
    $r2OK = false;
    $r3OK = false;
    
    if ($r1 === "") {
        $errores[] = "No se digitó el nombre del platillo";
    } else {
        $r1OK = true;
    }

    if ($r2 === "") {
        $errores[] = "No se digitó ninguna descriocion";
    } else {
        $r2OK = true;
    }

    if ($r3 === "") {
        $errores[] = "No se digitó el precio del platillo";
    } else {
        $r3OK = true;
    }
   

    if ($r1OK && $r2OK && $r3OK) {
        //inserción de datos
        require_once 'php/getPuntuacion.php';
        if (registroPuntuacion($r1, $r2, $r3,$user)) {
            header("Location: Inicio.php#Reservation");
        }
    }
}
?>



    <!-- /Header -->
    <!-- Home -->
    <div id="home" class="banner-area">


        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image: url('webstyles2/img/background01.jpg');">
        </div>
        <!-- /Backgound Image -->


        <div class="home-wrapper">

            <div class="col-md-10 col-md-offset-1 text-center">
                <div class="home-content">
                    <h1 class="white-text">Bienvenido a Cafeteria Risotto</h1>
                    <h4 class="white-text lead">Donde los Sabores se Despliegan</h4>
                    <a id="AboutUs" href="#OurMenu"><button class="main-button">Descubre el Menú</button></a>
                </div>
            </div>

        </div>

    </div>
    <!-- /Home -->
    <!-- About -->
    <div id="about" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- section header -->
                <div class="section-header text-center">
                    <h4 class="sub-title">Sobre Nosotros</h4>
                    <h2 class="title">Cafeteria Risotto</h2>
                </div>
                <!-- /section header -->
                <!-- about content -->
                <div class="col-md-5">
                    <h4 class="lead">Bienvenido/a a la Cafeteria Risotto. Desde 1988, ofreciendo platos tradicionales de
                        la más alta calidad.</h4>
                </div>
                <!-- /about content -->
                <!-- about content -->
                <div class="col-md-7">
                    <p>Te ofrecemos una amplia selección de bebidas a base de café, que incluye espresso, cappuccino,
                        latte, americano y muchas más, tanto calientes como frías. También podrás disfrutar de una
                        variedad de tés, infusiones y otras bebidas refrescantes sin alcohol.<br>

                        Nuestra pasión por el café va más allá, ya que te brindamos delicias complementarias para
                        complementar tu experiencia. Deléitate con nuestros pasteles, muffins, galletas, sándwiches,
                        ensaladas y aperitivos ligeros. Todo esto en un ambiente acogedor y relajante, diseñado para que
                        puedas reunirte, estudiar o trabajar mientras disfrutas de tus momentos especiales.<br>

                        Además, tenemos servicios adicionales para llevar el placer del café a tu hogar. Podrás adquirir
                        granos de café de alta calidad para preparar en la comodidad de tu casa. También ofrecemos
                        métodos alternativos de preparación del café y productos relacionados para que disfrutes de la
                        mejor experiencia en cada taza.</p>
                </div>
                <!-- /about content -->
                <!-- Gallery Slider -->
                <div id="Galeria" class="col-md-12">
                    <div id="Gallery" class="owl-carousel owl-theme">

                        <!-- single column -->
                        <div class="Gallery-item">

                            <!-- single image -->
                            <div class="Gallery-img" style="background-image: url('webstyles2/img/image01.jpg');"></div>
                            <!-- /single image -->

                        </div>
                        <!-- single column -->
                        <!-- single column -->
                        <div class="Gallery-item">

                            <!-- single image -->
                            <div class="Gallery-img" style="background-image: url('webstyles2/img/image02.jpg');"></div>
                            <!-- /single image -->
                            <!-- single image -->
                            <div class="Gallery-img" style="background-image: url('webstyles2/img/image03.jpg');"></div>
                            <!-- /single image -->

                        </div>
                        <!-- single column -->
                        <!-- single column -->
                        <div class="Gallery-item">

                            <div class="item-column">
                                <!-- single image -->
                                <div class="Gallery-img" style="background-image: url('webstyles2/img/image04.jpg');">
                                </div>
                                <!-- /single image -->
                                <!-- single image -->
                                <div class="Gallery-img" style="background-image: url('webstyles2/img/image05.jpg');">
                                </div>
                                <!-- /single image -->
                            </div>

                            <div class="item-column">
                                <!-- single image -->
                                <div class="Gallery-img" style="background-image: url('webstyles2/img/image06.jpg');">
                                </div>
                                <!-- /single image -->
                                <!-- single image -->
                                <div class="Gallery-img" style="background-image: url('webstyles2/img/image07.jpg');">
                                </div>
                                <!-- /single image -->
                            </div>

                        </div>
                        <!-- /single column -->

                    </div>
                </div>
                <!-- /Gallery Slider -->


            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /About -->
    <!-- Menu -->
    <div id="menu" class="section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image: url('webstyles2/img/background01.jpg');">
        </div>
        <!-- /Backgound Image -->
        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <div class="section-header text-center">
                    <h4 class="sub-title">Descubre</h4>
                    <h2 id="OurMenu" class="title white-text">Nuestro Menú</h2>
                </div>


                <!-- menu nav -->
                <ul class="menu-nav">
                    <li class="active"><a data-toggle="tab" href="#menu1">Entradas</a></li>
                    <li><a data-toggle="tab" href="#menu2">Bebidas</a></li>
                    <li><a data-toggle="tab" href="#menu3">Platos Fuertes</a></li>
                    <li><a data-toggle="tab" href="#menu4">Postres</a></li>
                </ul>
                <!-- /menu nav -->
                <!-- menu content -->
                <div id="menu-content" class="tab-content">

                    <!-- menu1 -->
                    <div id="menu1" class="tab-pane fade in active">

                    <?php
                        //imprimir  menu2
                        require_once 'php/menuDinamico.php';
                        RetornarMenu1();
                        ?>
                    </div>       
                    <!-- /menu1 -->
                    <div id="menu2" class="tab-pane fade">
                        <?php
                        //imprimir  menu2
                        require_once 'php/menuDinamico.php';
                        RetornarMenu2();
                        ?>

                    </div>
                    <!-- /menu2 -->
                    <div id="menu3" class="tab-pane fade">
                        <?php
                        //imprimir  menu3
                        require_once 'php/menuDinamico.php';
                        RetornarMenu3();
                        ?>
                    </div>
                    <!-- /menu3 -->
                    <div id="menu4" class="tab-pane fade">

                        <?php
                        //imprimir  menu4
                        require_once 'php/menuDinamico.php';
                        RetornarMenu4();
                        ?>
                    </div>
                    <!-- /menu4 -->
                </div>
                <!-- /menu content -->

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Menu -->
    <!-- Reservation -->
    <div id="reservation" class="section">

        <!-- Backgound Image -->
        <div class="bg-image" style="background-image: url('webstyles2/img/background03.jpg');"></div>
        <!-- /Backgound Image -->
        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- reservation form -->
                <div class="col-md-6 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <div class="reserve-form row">
                        <div class="section-header text-center">
                            <h4 id="Reservation" class="sub-title">Valoranos</h4>
                            <h2 class="title white-text">Puntua nuestos sevicios</h2>
                        </div>
                    <form  method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Servicio</label>

                                <div class="star-rating">
                                    <input type="radio" id="star1" name="rating" value="5" />
                                    <label for="star1">&#9733;</label>
                                    <input type="radio" id="star2" name="rating" value="4" />
                                    <label for="star2">&#9733;</label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3">&#9733;</label>
                                    <input type="radio" id="star4" name="rating" value="2" />
                                    <label for="star4">&#9733;</label>
                                    <input type="radio" id="star5" name="rating" value="1" />
                                    <label for="star5">&#9733;</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Comida</label>

                                <div class="star-rating">
                                    <input type="radio" id="star1C" name="ratingC" value="5" />
                                    <label for="star1C">&#9733;</label>
                                    <input type="radio" id="star2C" name="ratingC" value="4" />
                                    <label for="star2C">&#9733;</label>
                                    <input type="radio" id="star3C" name="ratingC" value="3" />
                                    <label for="star3C">&#9733;</label>
                                    <input type="radio" id="star4C" name="ratingC" value="2" />
                                    <label for="star4C">&#9733;</label>
                                    <input type="radio" id="star5C" name="ratingC" value="1" />
                                    <label for="star5C">&#9733;</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Bebidas</label>

                                <div class="star-rating">
                                    <input type="radio" id="star1B" name="ratingB" value="5" />
                                    <label for="star1B">&#9733;</label>
                                    <input type="radio" id="star2B" name="ratingB" value="4" />
                                    <label for="star2B">&#9733;</label>
                                    <input type="radio" id="star3B" name="ratingB" value="3" />
                                    <label for="star3B">&#9733;</label>
                                    <input type="radio" id="star4B" name="ratingB" value="2" />
                                    <label for="star4B">&#9733;</label>
                                    <input type="radio" id="star5B" name="ratingB" value="1" />
                                    <label for="star5B">&#9733;</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button class="main-button" type="submit">ENVIAR</button>
                        </div>

                    </form>
                    </div>
                </div>
                <!-- /reservation form -->
                <!-- opening time -->
                <div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1">
                    <div class="opening-time row">
                        <div class="section-header text-center">
                            <h2 class="title white-text">Abierto</h2>
                        </div>
                        <ul>
                            <li>
                                <h4 class="day">De Miercoles a Domingo</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>

                            <li>
                                <h4 class="day">Lunes y martes</h4>
                                <h4 class="hours">Cerrado</h4>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- /opening time -->

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Reservation -->
    <!-- Events -->
    <div id="events" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- section header -->
                <div class="section-header text-center">
                    <h4 id="Gallery" class="sub-title">Eventos Especiales</h4>
                    <h2 class="title">Proximos eventos</h2>
                </div>
                <!-- /section header -->
                <!-- single event -->
                <?php
                        //imprimir  eventos
                        require_once 'php/EveDinamico.php';
                        RetornarEves();
                        ?>
                

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Events -->
    <!-- Contact -->
    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <div class="col-md-5 col-md-offset-4">
                    <div class="section-header text-center">
                        <h4 id="ContactUs" class="sub-title">Contactanos</h4>
                        <h2 class="title">Ponte en contacto</h2>
                    </div>
                    <div class="contact-content text-center">
                        <p>Si tienes alguna pregunta, sugerencia o simplemente quieres decirnos algo, no dudes en
                            ponerte en contacto con nosotros. Estamos encantados de escucharte y brindarte la mejor
                            experiencia en nuestro acogedor espacio.</p>
                        <h3>Tel: <a href="#">87654321</a></h3>
                        <p>Ubicación: San Jose/Escazu/San Rafael/Guachipilin</p>
                        <p>Email: <a href="#">Risotto@email.com</a></p>
                        <ul class="list-inline">
                            <li>
                                <p>Siguenos:</p>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->
        <!-- map -->

        <!-- /map -->

    </div>
    <!-- Contact -->
    <?php

//include 'include/template/footer.php';
incluirTemplate('footerAdmin');

?>