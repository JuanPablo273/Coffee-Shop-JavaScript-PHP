<?php
    include 'conexion_be.php';
    $conexion2 = Conecta();
    $id = $_POST['id'];
    $nombre = $_POST['nombre_completo'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $telefono = $_POST['telefono']; 
    $tipos=$_POST['tipos'];
  
    $query = "UPDATE usuarios SET nombre_completo = '$nombre', email = '$email',user = '$user', telefono= '$telefono',tipo='$tipos', WHERE ID = '$id';";
 //Verificar que el correo no se repita en la 
    $ejecutar = mysqli_query($conexion2, $query);

    
    if($ejecutar){
        echo '
            <script>
                alert("Usuario actualizo exitosamente");
                window.location = "../Administracion.php";
            </script>    
        ';
    }else{
        echo '
            <script>
                alert("Intentalo de nuevo, usuario no actualizado");
                window.location = "../Mostrar.php";
            </script>    
        ';
    }
    Desconecta($conexion2);
?>