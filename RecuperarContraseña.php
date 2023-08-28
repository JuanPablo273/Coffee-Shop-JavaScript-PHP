<?php
        session_start();

        if(isset($_SESSION['usuario'])){
            header("location: php/bienvenida.php");
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
		      	<form action="#" class="signin-form">
		      		
	            
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email" required>
                </div>
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Recuperar Contraseña</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">

								</div>
								<div class="w-50 text-md-right">
									<a href="Login.php" style="color: #fff">Login</a>
								</div>
	            </div>
	          </form>

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

	</body>
</html>