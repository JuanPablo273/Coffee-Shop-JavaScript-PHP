 <?php

    include 'conexion_be.php';

    $nombre = $_POST['nombre_completo'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $telefono = $_POST['telefono'];
    
 //Password Encryption  
    $passwordhash = password_hash($password, PASSWORD_BCRYPT);
 
    $query = "INSERT INTO usuarios(nombre_completo, email, usuario, password,telefono,tipo)
            VALUES('$nombre', '$email', '$usuario', '$passwordhash', '$telefono', 0 )";

 //Verificar que el correo no se repita en la

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email ='$email' ");

    if(mysqli_num_rows($verificar_correo) > 0 ){
        echo '
        <script>
            alert("Este correo ya esta registrado, intenta con otro...");
            window.location = "../Registro.php";
        </script>    
        ';
        exit();
    }
  
    
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../Login.php";
            </script>    
        ';
    }else{
        echo '
            <script>
                alert("Intentalo de nuevo, usuario no almacenado");
                window.location = "../Registro.php";
            </script>    
        ';
    }

    mysqli_close($conexion);

?>
