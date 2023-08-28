<?php

    include 'conexion_be.php';
    $conexion2 = Conecta();
    $id = $_POST['id'];
   
    
 //Password Encryption  


    $query = "DELETE FROM menu WHERE ID = '$id' ";
    $query2 = "DELETE FROM carrito WHERE id_menu = '$id' ";
 //Verificar que el correo no se repita en la
  
 $ejecutar2 = mysqli_query($conexion2, $query2);
    $ejecutar = mysqli_query($conexion2, $query);

    if($ejecutar && $ejecutar2){
        echo '
            <script>
                alert("Platillo Eliminado exitosamente");
                window.location = "../Menu.php";
            </script>    
        ';
    }else{
        echo '
            <script>
                alert("Se debe cancelar la pedido para eliminar el platillo");
                window.location = "../MenuMostrar.php?id='.$id.'";
            </script>    
        ';
    }

    Desconecta($conexion2);

?>