<?php

    include 'conexion_be.php';
    $conexion2 = Conecta();
    $id = $_POST['id'];
   
    
 //Password Encryption  


    $query = "DELETE FROM carrito WHERE ID = $id;";

 //Verificar que el correo no se repita en la
  
    
    $ejecutar = mysqli_query($conexion2, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Item Eliminado exitosamente");
                window.location = "../Carrito.php";
            </script>    
        ';
    }else{
        echo '
            <script>
                alert("Intentalo de nuevo, Item no eliminado");
                window.location = "../CarritoMostrar.php";
            </script>    
        ';
    }

    Desconecta($conexion2);

?>