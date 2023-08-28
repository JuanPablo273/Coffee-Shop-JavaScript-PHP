<?php
function RetornarEves() {
    try {
        //1. Estableciendo la conexion
        $conexion2 = Conecta();
        //2. Ejecutar la consulta
        $resultado = $conexion2->query("select id, nombre, descripcion, fecha, hora from eventos ");

        if($conexion2->error != ""){
            echo "Ocurrió un error al ejecutar la consulta : $conexion2->error";
        }
        
       
       
        ImprimirDatosEventos($resultado);
        
    } catch (\Throwable $th) {
        
    }finally{
        Desconecta($conexion2);
    }
}
function ImprimirDatosEventos($datos) {
   
    if($datos->num_rows > 0){
        while ($row = $datos->fetch_assoc()) {
            echo '<div class="col-md-6">';
            echo '<div class="event">';            
            echo '<div class="event-img">'; 
            echo '<img src="/WebStyles2/img/event01.jpg" alt="">'; 
            echo '<div class="event-day">';
            $fecha=$row['fecha'];
            $fechaf=date("m-d",strtotime($fecha));
            echo "<span>{$fechaf}</span>"; 
            echo '</div>';
            echo '</div>';
            echo '<div class="event-content">';
            $hora=$row['hora'];
            $horaf=date("H:i",strtotime($hora));
            echo "<p><i class='fa fa-clock-o'></i>{$horaf}</p>";
            echo "<h3><a href=''></a>{$row['nombre']}</h3>";
            echo "<p>{$row['descripcion']}</p>";
            echo '</div>';
            echo '</div>';
            echo '</div>';
            
        }
    }else {
        echo "<h4 class='name'>No hay registros de entradas</h4>";
    }
    
}
?>