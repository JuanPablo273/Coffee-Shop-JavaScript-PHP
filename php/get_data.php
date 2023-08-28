<?php
include 'conexion_be.php';


function RegistroUsuario($usuario,$nombre_completo,$password,$email,$telefono) {
    $passwordhash = password_hash($password, PASSWORD_BCRYPT);
    $retorno = false;
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        if(mysqli_set_charset($conexion2, "utf8")){
            $stmt = $conexion2->prepare("INSERT INTO usuarios(usuario, nombre_completo, password, email,telefono,tipo) VALUES(?,?,?,?,?,0)");
            $stmt->bind_param("sssss", $iUsuario,$iNombre_completo,$iPassword,$iEmail,$iTelefono);

            //set parametros y la ejecución
            $iUsuario= $usuario;
            $iNombre_completo = $nombre_completo;
            $iPassword  = $passwordhash;
            $iEmail = $email;
            $iTelefono = $telefono;
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




function ActualizarUsuario($usuario,$nombre_completo,$email,$telefono,$tipo,$id) {
    $retorno = false;
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        if(mysqli_set_charset($conexion2, "utf8")){
            $stmt = $conexion2->prepare("UPDATE usuarios SET usuario = ?, nombre_completo = ?, email = ?, telefono= ?,tipo=? WHERE ID = '$id';");
            $stmt->bind_param("sssss", $iUsuario,$iNombre_completo,$iEmail,$iTelefono,$iTipo);
            
            //set parametros y la ejecución
            $iUsuario= $usuario;
            $iNombre_completo = $nombre_completo;
            $iEmail = $email;
            $iTelefono = $telefono;
            $iTipo = $tipo;
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







function RetornarUsuarios() {
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("select id, nombre_completo, email,usuario,telefono,tipo from usuarios");

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
    echo "<th>Correo</th>";
    echo "<th>Usuario</th>";
    echo "<th>Teléfono</th>";
    echo "<th>Tipo</th>";
    echo "<th>Acciones</th>";
    echo "</tr>";

    if($datos->num_rows > 0){
        while ($row = $datos->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['nombre_completo']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['usuario']}</td>";
            echo "<td>{$row['telefono']}</td>";
            if($row['tipo'] == 0){
                echo "<td>Cliente</td>";
            }else{
                echo "<td>Administrador</td>";
            }
            echo "<td><a href=\"mostrar.php?id={$row['id']}\">Mostrar</a></td>";

            echo "</tr>";
        }
    }else {
        echo "<tr><td>No hay registros de alumnos</td></tr>";
    }
    echo "</table>";
}
function RetorneUsuario($id) {
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("select id, nombre_completo, email,usuario,telefono,tipo from usuarios where id = $id");

        if($conexion2->error != ""){
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }

        //Mostrar los datos
        $datos = $resultado->fetch_assoc();
 
   echo '<label for="nombre_completo">Nombre: </label><br>';
   echo '<input type="text" name="nombre_completo" id="nombre_completo" value="'.$datos["nombre_completo"].'"><br>';  
   echo '<label for="email">Email: </label><br>';
   echo '<input type="email" name="email" id="email" value="'.$datos["email"].'"><br>'; 
   echo '<label for="user">Usuario: </label><br>';
   echo '<input type="text" name="user" id="user" value="'.$datos["usuario"].'"><br>'; 
   echo '<label for="telefono">Teléfono:</label><br>';  
   echo '<input type="number" name="telefono" id="telefono" value="'.$datos["telefono"].'"><br><br>';  
   echo '<select name="tipos" id="tipos">
         <option value="0"'.isSelected($datos["tipo"], "0").'>Cliente</option>
         <option value="1"'.isSelected($datos["tipo"], "1").'>Administrador</option>
         </select><br><br>' ; 

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
function isSelected($valorActual, $valorDeseado) {
    $valorR = $valorActual === $valorDeseado ? "selected" : " ";
    return $valorR;
}

?>