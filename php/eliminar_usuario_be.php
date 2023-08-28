<?php

    include 'conexion_be.php';
    $conexion2 = Conecta();
    $id = $_POST['id'];
   
    
 //Password Encryption  


    $query = "DELETE FROM usuarios WHERE ID = $id;";

 //Verificar que el correo no se repita en la
  
    
    $ejecutar = mysqli_query($conexion2, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario Elimino exitosamente");
                window.location = "../Administracion.php";
            </script>    
        ';
    }else{
        echo '
            <script>
                alert("Intentalo de nuevo, usuario no elimino   ");
                window.location = "../Administracion.php";
            </script>    
        ';
    }

    Desconecta($conexion2);

?>