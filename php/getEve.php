<?php
include 'conexion_be.php';

function registroEve($nombre,$descripcion,$fecha,$hora){
    $retorno = false;
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        if(mysqli_set_charset($conexion2, "utf8")){
            $stmt = $conexion2->prepare("INSERT INTO eventos(nombre, descripcion, fecha, hora) VALUES(?,?,?,?)");
            $stmt->bind_param("ssss", $iNombre,$iDescripcion,$iFecha,$iHora);

            //set parametros y la ejecución
            $iNombre = $nombre;
            $iDescripcion = $descripcion;
            $iFecha = $fecha;
            $iHora = $hora;
            if($stmt->execute()){
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        
    }finally{
        Desconecta($conexion2);
    }
    return $retorno;
}
function actualizarEve($nombre,$descripcion,$fecha,$hora,$id){
    $retorno = false;
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        if(mysqli_set_charset($conexion2, "utf8")){
            $stmt = $conexion2->prepare("UPDATE eventos SET nombre = ?, descripcion = ?, fecha= ?,hora=? WHERE ID = '$id';"); 
            $stmt->bind_param("ssss", $iNombre,$iDescripcion,$iFecha,$iHora);

            //set parametros y la ejecución
            $iNombre = $nombre;
            $iDescripcion = $descripcion;
            $iFecha = $fecha;
            $iHora = $hora;
            if($stmt->execute()){
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        
    }finally{
        Desconecta($conexion2);
    }
    return $retorno;
}
function RetornarEventos() {
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("select id, nombre, descripcion, fecha, hora from eventos");

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
    echo '<table class="table">';
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Descripcion</th>";
    echo "<th>Fecha</th>";
    echo "<th>Hora</th>";
    echo "<th>Acciones</th>";
    echo "</tr>";

    if($datos->num_rows > 0){
        while ($row = $datos->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['nombre']}</td>";
            echo "<td>{$row['descripcion']}</td>";
            echo "<td>{$row['fecha']}</td>";
            echo "<td>{$row['hora']}</td>";
            echo "<td><a href=\"EveMostrar.php?id={$row['id']}\">Mostrar</a></td>";
            echo "</tr>";
        }
    }else {
        echo "<tr><td>No hay registros de platillos</td></tr>";
    }
    echo "</table>";
}

function RetorneEve($id) {
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("select id, nombre, descripcion, fecha, hora from eventos where id = $id");

        if($conexion2->error != ""){
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }

        //Mostrar los datos
        $datos = $resultado->fetch_assoc();
 
   echo '<label for="nombre">Nombre:  </label><br>';
   echo '<input type="text" name="nombre" id="nombre" value="'.$datos["nombre"].'"><br>';  
   echo '<label for="descripcion">Descripción: </label><br>';
   echo '<textarea name="descripcion" id="descripcion" rows="4" cols="50" >'.$datos["descripcion"].'</textarea><br>';
   echo '<label for="fecha">Fecha:</label><br>';  
   echo '<input type="date" name="fecha" id="precio" value="'.$datos["fecha"].'"><br>'; 
   echo '<label for="hora">Hora:</label><br>';  
   echo '<input type="time" name="hora" id="hora" value="'.$datos["hora"].'"><br><br>'; 

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


?>