<?php

    include 'conexion_be.php';
    $conexion2 = Conecta();
    $id = $_POST['id'];
   
    
 //Password Encryption  


    $query = "DELETE from factura WHERE id_maestro = $id; ";
    $query2 = "DELETE from maestro WHERE id = $id;";
 //Verificar que el correo no se repita en la
  
    
    $ejecutar = mysqli_query($conexion2, $query);
    $ejecutar2 = mysqli_query($conexion2, $query2);
    if($ejecutar && $ejecutar2){
        echo '
            <script>
                alert("Pedido Eliminado exitosamente");
                window.location = "../Pedidos.php";
            </script>    
        ';
    }else{
        echo '
            <script>
                alert("Intentalo de nuevo, platillo no elimino");
                window.location = "../PedidosMostrar.php";
            </script>    
        ';
    }

    Desconecta($conexion2);

?>