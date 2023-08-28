<?php

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'include/funciones/recogeRequests.php';

    $usuario = recogePost("usuario");
    $nombre_completo= recogePost("nombre_completo");
    $password = recogePost("password");
    $email = recogePost("email");
	$telefono = recogePost("telefono");

    $usuarioOK = false;
    $nombre_completoOK = false;
    $passwordOk = false;
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

	if ($password === "") {
		$errores[] = "No se ingresó una contraseña. Por favor, ingrese una contraseña.";
	} elseif (strlen($password) < 8) {
		$errores[] = "La contraseña es demasiado corta. Debe tener al menos 8 caracteres."; // Agregue que sea de minimo 8 caracteres por seguridad
	} else {
		$passwordOk = true;
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
	

    if ($usuarioOK && $nombre_completoOK && $passwordOk && $emailOK && $telefonoOK) {
        //inserción de datos
        require_once 'php/get_data.php';
        if (RegistroUsuario($usuario, $nombre_completo, $password,$email,$telefono )) {
            header("Location: Login.php");
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
	<title>Cafeteria Web</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="WebStyles3/css/style.css">
	<link type="text/css" rel="stylesheet" href="CSS/tablestyles.css" />

</head>

<body class="img js-fullheight" style="background-image: url(WebStyles3/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Cafeteria Risotto</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center">Registar Cuenta</h3>
						<!-- <form action="#" class="signin-form"> -->
						<!-- Validar Esto -->
						<form  method="POST" class="formulario__register"> <!-- Se quito el action -->

							<div class="form-group">
								<input type="text" class="form-control" placeholder="Usuario" name="usuario">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" placeholder="Nombre Completo"
									name="nombre_completo">
							</div>

							<div class="form-group">
								<input id="password-field" type="password" class="form-control" placeholder="Password"
									name="password">
								<span toggle="#password-field"
									class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>

							<div class="form-group">
								<input type="text" class="form-control" placeholder="Email" name="email">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" placeholder="Telefono" name="telefono">
							</div>

							<div class="form-group">
								<button type="submit"
									class="form-control btn btn-primary submit px-3">Registrar</button>
							</div>

							<div class="form-group d-md-flex">
								<div class="w-50">

								</div>
								<div class="w-50 text-md-right">
									<a href="Login.php" style="color: #fff">Login</a>
								</div>
							</div>
						</form>
						<?php foreach($errores as $error): ?>
                   		 <div class="alerta error">
                        <?php echo $error; ?>
                    		</div>
                    	<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>

	<script src="WebStyles3/js/jquery.min.js"></script>
	<script src="WebStyles3/js/popper.js"></script>
	<script src="WebStyles3/js/bootstrap.min.js"></script>
	<script src="WebStyles3/js/main.js"></script>



	<script src="assets/js/script.js"></script>
</body>

</html>