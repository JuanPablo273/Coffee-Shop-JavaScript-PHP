<?php

include 'conexion_be.php';

function registroFactura($usuario)
{
    $retorno = false;
    try {
        //1. Estableciendo la conexion

        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $conexion2->query("INSERT INTO maestro(fecha, total, usuario) SELECT CURDATE(), SUM(C.cantidad * M.precio), C.usuario 
        FROM carrito C 
        INNER JOIN menu M ON C.id_menu = M.id 
        WHERE usuario = '$usuario'
        GROUP BY C.usuario;");
        $ide = $conexion2->query("SELECT @@IDENTITY as id ;");
        $row = $ide->fetch_assoc();
        $_SESSION['ide'] = $row['id'];
        $conexion2->query("INSERT INTO factura(id_maestro, cantidad, precio, id_menu) SELECT @@Identity, C.cantidad, C.cantidad * M.precio, c.id_menu
        FROM carrito C 
        INNER JOIN menu M ON C.id_menu = M.id 
        WHERE usuario = '$usuario'");
        $conexion2->query("DELETE FROM carrito WHERE usuario = '$usuario';");
        if ($conexion2->error != "") {
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }
        if($_SESSION['ide']!="0" ){
            $retorno = true;
        }else{
            $retorno = false;
        }
        

    } catch (\Throwable $th) {

    } finally {
        Desconecta($conexion2);
    }
    return $retorno;
}


function RetornarFactUser()
{
    try {
        $ide =  $_SESSION['ide'];
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("SELECT m.id AS maestro_id, m.fecha, m.total, m.usuario, f.cantidad, f.precio, me.nombre AS menu_nombre
        FROM maestro m
        JOIN factura f ON m.id = f.id_maestro
        JOIN menu me ON f.id_menu = me.id
        where m.id = '$ide';");

        if ($conexion2->error != "") {
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }

        //Mostrar los datos
        ImprimirFactura($resultado);

    } catch (\Throwable $th) {

    } finally {
        Desconecta($conexion2);
    }
}
function ImprimirFactura($datos){
    $rowP = $datos->fetch_assoc();
    echo "<h2>#{$rowP['maestro_id']}</h2>";
    echo "<h2>{$rowP['fecha']}</h2>";
    echo '<table class="table">';
    echo "<tr>";
    echo "<th>Cantidad</th>";
    echo "<th>Nombre</th>";
    echo "<th>Precio</th>";
    echo "</tr>";
    $datos->data_seek(0);
    if ($datos->num_rows > 0) {
        while ($row = $datos->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['cantidad']}</td>";
            echo "<td>{$row['menu_nombre']}</td>";
            echo "<td>{$row['precio']}</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td>No hay registros de platillos</td></tr>";
    }
    echo "</table>";
    echo "<div class='total'>";
    echo "<h2>{$rowP['total']}</h2>";
    echo "</div>";
}
function RetornarFacturas()
{
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("SELECT id,fecha,total,usuario from maestro");

        if ($conexion2->error != "") {
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }

        //Mostrar los datos
        ImprimirDatos3($resultado);

    } catch (\Throwable $th) {

    } finally {
        Desconecta($conexion2);
    }
}
function ImprimirDatos3($datos){
    echo '<table class="table">';
    echo "<tr>";
    echo "<th>#Factura</th>";
    echo "<th>Fecha</th>";
    echo "<th>Total</th>";
    echo "<th>Usuario</th>";
    echo "<th>Acciones</th>";
    echo "</tr>";

    if($datos->num_rows > 0){
        while ($row = $datos->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['fecha']}</td>";
            echo "<td>{$row['total']}</td>";
            echo "<td>{$row['usuario']}</td>";
            echo "<td><a href=\"PedidosMostrar.php?id={$row['id']}\">Mostrar</a></td>";

            echo "</tr>";
        }
    }else {
        echo "<tr><td>No hay registros de platillos</td></tr>";
    }
    echo "</table>";
}
function RetorneFactura($id)
{
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("SELECT m.id AS maestro_id, m.fecha, m.total, m.usuario, f.cantidad, f.precio, me.nombre AS menu_nombre
        FROM maestro m
        JOIN factura f ON m.id = f.id_maestro
        JOIN menu me ON f.id_menu = me.id
        where m.id = '$id';");

        if ($conexion2->error != "") {
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }

        //Mostrar los datos
        echo '<table class="table">';
        echo "<tr>";
        echo "<th>Cantidad</th>";
        echo "<th>Nombre</th>";
        echo "<th>Precio</th>";
        echo "</tr>";
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['cantidad']}</td>";
                echo "<td>{$row['menu_nombre']}</td>";
                echo "<td>{$row['precio']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td>No hay registros de platillos</td></tr>";
        }
        echo "</table>";


    } catch (\Throwable $th) {
        //echo $th;
        //throw $th;
        //almacenar en bitacora (apache) el error
        //devolver un mensaje al usuaro más acorde a su función
        //almacer en archivos o tablas y bitacoras propias
    } finally {
        Desconecta($conexion2);
    }
}

?>