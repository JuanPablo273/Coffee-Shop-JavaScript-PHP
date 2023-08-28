<?php

include 'conexion_be.php';

function RetornarCarrito() {
    try {
        $user = $_SESSION['usuario'];   
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("SELECT carrito.id, carrito.cantidad,carrito.usuario, menu.nombre AS nombre_menu, menu.descripcion AS descripcion_menu, menu.precio AS precio_menu,
                                        (menu.precio * carrito.cantidad) AS subtotal_producto
                                        FROM carrito
                                        JOIN menu ON carrito.id_Menu = menu.id
                                        WHERE carrito.usuario = '$user'  -- Aquí puedes poner tu condición específica
                                        GROUP BY carrito.id;");

        if($conexion2->error != ""){
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }

        //Mostrar los datos
        ImprimirDatos($resultado);

    } catch (\Throwable $th) {
        
    }finally{
        Desconecta($conexion2);
    }
}

function ImprimirDatos($datos) {
    $sum = 0;
    echo '<table class="table">';
    echo "<tr>";
    echo "<th>Cantidad</th>";
    echo "<th>Nombre</th>";
    echo "<th>Descripcion</th>";
    echo "<th>Precio</th>";
    echo "<th>Acciones</th>";
    echo "</tr>";

    if($datos->num_rows > 0){
        while ($row = $datos->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['cantidad']}</td>";
            echo "<td>{$row['nombre_menu']}</td>";
            echo "<td>{$row['descripcion_menu']}</td>";
            echo "<td>{$row['subtotal_producto']}</td>";
            $sum = $sum + $row['subtotal_producto'];
            echo "<td><a href=\"CarritoMostrar.php?id={$row['id']}\">Mostrar</a></td>";
            echo "</tr>";
        }
    }else {
        echo "<tr><td>No hay registros de platillos</td></tr>";
    }
    echo "</table>";
    echo "<div class='total'>";
    echo "<h2 >{$sum}</h2>";
    echo "</div>";
    
}

function RetorneItem($id) {
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("select id, cantidad from carrito where id = '$id'");

        if($conexion2->error != ""){
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }

        //Mostrar los datos
        $datos = $resultado->fetch_assoc();
 
   echo '<label for="cantidad">Cantidad:  </label><br>';
   echo '<input type="number" name="cantidad" id="cantidad" min="1" value="'.$datos["cantidad"].'"><br>';  
   

    } catch (\Throwable $th) {
        //echo $th;
        //throw $th;
        //almacenar en bitacora (apache) el error
        //devolver un mensaje al usuaro más acorde a su función
        //almacer en archivos o tablas y bitacoras propias
    }finally{
        Desconecta($conexion2);
    }
}
function recogeGet($var, $m ="")
{
    //isset devuelve false null
    if(!isset($_GET[$var])){
        //is_array 
        $tmp = (is_array($m)) ? [] : "";
    }elseif (!is_array($_GET[$var])){
        //trim recortar caracteres en blanco al inicio y al final
        //htmlspecialchars convierte caracteres en entidades html
        // ENT_COMPAT: predeterminado. Codificar comillas dobles
        // ENT_QUOTES - Codifica comillas dobles como simples
        // ENT_NOQUOTES - no codifica comillas
        $tmp = trim(htmlspecialchars($_GET[$var], ENT_QUOTES, "UTF-8"));
    }else{
        $tmp = $_GET[$var];
        //array_walk_recursive recorrer la matriz
        array_walk_recursive($tmp, function (&$valor)
        {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}
?>