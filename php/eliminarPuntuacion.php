<?php

    include 'conexion_be.php';
    require_once '../include/funciones/recogeRequests.php';
    $conexion = Conecta();
    $id = recogeGet('id');
                            
   
    
 //Password Encryption  


    $query = "DELETE FROM criticas WHERE ID = $id;";

 //Verificar que el correo no se repita en la
  
    
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Puntuacion Eliminada exitosamente");
                window.location = "../Puntuacion.php";
            </script>    
        ';
    }else{
        echo '
            <script>
                alert("Intentalo de nuevo, puntuacion no eliminada");
                window.location = "../Puntuacion.php";
            </script>    
        ';
    }

    Desconecta($conexion2);

?>