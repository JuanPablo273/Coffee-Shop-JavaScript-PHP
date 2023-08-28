<?php
include 'conexion_be.php';

function registroPuntuacion($r1,$r2,$r3,$user){
    $retorno = false;
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        if(mysqli_set_charset($conexion2, "utf8")){
            $stmt = $conexion2->prepare("INSERT INTO criticas(servicio, comida, bebidas, usuario) VALUES(?,?,?,?)");
            $stmt->bind_param("ssss", $iR1,$iR2,$iR3,$iUser);

            //set parametros y la ejecución
            $iR1 = $r1;
            $iR2 = $r2;
            $iR3 = $r3;
            $iUser = $user;
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
function RetornarPuntuacion() {
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("select id, servicio, comida, bebidas, usuario from criticas");

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
    echo "<th>Servicio</th>";
    echo "<th>Comida</th>";
    echo "<th>Bebida</th>";
    echo "<th>Usuario</th>";
    echo "<th>Acciones</th>";
    echo "</tr>";

    if($datos->num_rows > 0){
        while ($row = $datos->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['servicio']}</td>";
            echo "<td>{$row['comida']}</td>";
            echo "<td>{$row['bebidas']}</td>";
            echo "<td>{$row['usuario']}</td>";
            echo "<td><a href=\"php/eliminarPuntuacion.php?id={$row['id']}\">Eliminar</a></td>";
            echo "</tr>";
        }
    }else {
        echo "<tr><td>No hay registros de Puntuacion</td></tr>";
    }
    echo "</table>";
}

?>