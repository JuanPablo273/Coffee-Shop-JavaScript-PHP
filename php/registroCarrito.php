<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '
            <script>
            alert("Debes de Iniciar Sesion");
            window.location = "Login.php";
            </script>
        ';
    session_destroy();
    die();
}
include 'conexion_be.php';
require_once '../include/funciones/recogeRequests.php';
$idM = recogeGet('id');
$user= $_SESSION['usuario'];
$cantidad=1;



$verificar_item = mysqli_query($conexion, "SELECT * FROM carrito WHERE id_Menu ='$idM' and usuario = '$user'");

if(mysqli_num_rows($verificar_item) > 0 ){
    $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("SELECT cantidad FROM carrito WHERE id_Menu ='$idM' and usuario = '$user'");

        if($conexion2->error != ""){
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }

        //Mostrar los datos
        $datos = $resultado->fetch_assoc();
        $cantidadS= $datos['cantidad'] + 1;
        $query = "UPDATE carrito SET cantidad = '$cantidadS' WHERE id_Menu ='$idM' and usuario = '$user'";
        $ejecutar = mysqli_query($conexion, $query);
      
}else{
    $query = "INSERT INTO carrito(cantidad,id_Menu,usuario)
        VALUES('$cantidad','$idM', '$user')";
        $ejecutar = mysqli_query($conexion, $query);
     
}





mysqli_close($conexion);
?>