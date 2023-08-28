<?php
include 'conexion_be.php';


function RetornarMenu1() {
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("select id, nombre, descripcion, precio from menu where tipo=1");

        if($conexion2->error != ""){
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }
        
       
        $num=$resultado->num_rows;
        $mitadFilas = ceil($num / 2);
        ImprimirDatos($resultado,$mitadFilas);
        ImprimirDatos2($resultado,$mitadFilas);
    } catch (\Throwable $th) {
        
    }finally{
        Desconecta($conexion2);
    }
}
function RetornarMenu2() {
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("select id, nombre, descripcion, precio from menu where tipo=2");

        if($conexion2->error != ""){
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }
        
       
        $num=$resultado->num_rows;
        $mitadFilas = ceil($num / 2);
        ImprimirDatos($resultado,$mitadFilas);
        ImprimirDatos2($resultado,$mitadFilas);
    } catch (\Throwable $th) {
        
    }finally{
        Desconecta($conexion2);
    }
}
function RetornarMenu3() {
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("select id, nombre, descripcion, precio from menu where tipo=3");

        if($conexion2->error != ""){
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }
        
       
        $num=$resultado->num_rows;
        $mitadFilas = ceil($num / 2);
        ImprimirDatos($resultado,$mitadFilas);
        ImprimirDatos2($resultado,$mitadFilas);
    } catch (\Throwable $th) {
        
    }finally{
        Desconecta($conexion2);
    }
}
function RetornarMenu4() {
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("select id, nombre, descripcion, precio from menu where tipo=4");

        if($conexion2->error != ""){
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }
        
        $num=$resultado->num_rows;
        $mitadFilas = ceil($num / 2);
        ImprimirDatos($resultado,$mitadFilas);
        ImprimirDatos2($resultado,$mitadFilas);
    } catch (\Throwable $th) {
        
    }finally{
        Desconecta($conexion2);
    }
}
function ImprimirDatos($datos,$nMitad) {
   $filasR=0;
   echo "<div class='col-md-6'>";
    if($datos->num_rows > 0){
        while ($filasR<$nMitad && ($row = $datos->fetch_assoc())) {
           echo '<div class="single-dish">';
           echo '<div class="single-dish-heading">';
           echo "<h4 class='name'>{$row['nombre']}</h4>";
           echo "<h4 class='price'>₡{$row['precio']}</h4>";
           echo "</div>";
           echo "<p>{$row['descripcion']}</p>";
           echo "<a href='#OurMenu' onclick='agregarAlCarrito({$row['id']})'>Agregar Carrito</a>";
           echo "</div>";
           $filasR++;
        }
    }else {
        echo "<h4 class='name'>No hay registros de entradas</h4>";
    }
    echo "</div>";
}
function ImprimirDatos2($datos,$mitad) {
    
    $datos->data_seek($mitad);
   echo "<div class='col-md-6'>";
    if($datos->num_rows > 0){
        while ($row = $datos->fetch_assoc()) {
           echo '<div class="single-dish">';
           echo '<div class="single-dish-heading">';
           echo "<h4 class='name'>{$row['nombre']}</h4>";
           echo "<h4 class='price'>₡{$row['precio']}</h4>";
           echo "</div>";
           echo "<p>{$row['descripcion']}</p>";
           echo "<a href='#OurMenu' onclick='agregarAlCarrito({$row['id']})'>Agregar Carrito</a>";
           echo "</div>";
           
        }
    }else {
        echo " ";
    }
    echo "</div>";
}
?>