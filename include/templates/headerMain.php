<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Restaurante Risotto</title>

    <!-- Google font -->
    <link type="text/css" rel="stylesheet" href="CSS/normalize.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700%7CCabin:400%7CDancing+Script"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="WebStyles2/css/bootstrap.min.css" />

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="WebStyles2/css/owl.carousel.css" />
    <link type="text/css" rel="stylesheet" href="WebStyles2/css/owl.theme.default.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="WebStyles2/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="WebStyles2/css/style.css" />
   
    <link type="text/css" rel="stylesheet" href="CSS/tablestyles.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Header -->
    <header id="header">

        <!-- Top nav -->
        <div id="top-nav">
            <div class="container">

                <!-- logo -->
                <div class="logo">
                    <a href="Inicio.php"><img src="WebStyles2/img/logo.png" alt="logo"></a>
                </div>
                <!-- logo -->
                <!-- Mobile toggle -->
                <button class="navbar-toggle">
                    <span></span>
                </button>
                <!-- Mobile toggle -->
                <!-- social links -->
                <ul class="social-nav">
                    <li><a href="https://es-la.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.google.com/?hl=es"><i class="fa fa-google-plus"></i></a></li>
                    <!-- /social links -->

            </div>
        </div>
        <!-- /Top nav -->
        <!-- Bottom nav -->
        <div id="bottom-nav">
            <div class="container">
                <nav id="nav">

                    <!-- nav -->
                    <ul class="main-nav nav navbar-nav">
                        <li><a href="Inicio.php">Inicio</a></li>
                        <li><a href="Inicio.php#AboutUs">Sobre Nosotros</a></li>
                        <li><a href="Inicio.php#OurMenu">Menú</a></li>
                        <li><a href="Inicio.php#Reservation">Puntúanos</a></li>
                        <li><a href="Inicio.php#contact">Contactenos</a></li>
                        <li><a href="Carrito.php">Carrito</a></li>
                      
                    </ul>
                    <!-- /nav -->
                    <!-- button nav -->
                    <ul class="cta-nav">
                        <?php
                        if($_SESSION['tipo']=="1"){
                           echo '<li><a href="Administracion.php" class="main-button">Administrar</a></li>' ;
                        }
                        ?>   
                        <li><a href="php/cerrar_sesion.php" class="main-button">Cerrar Sessión</a></li>

                    </ul>
                    <!-- button nav -->
                    <!-- contact nav -->

                    <!-- contact nav -->

                </nav>
            </div>
        </div>
        <!-- /Bottom nav -->


    </header>