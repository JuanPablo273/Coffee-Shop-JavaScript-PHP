<?php

$conexion = mysqli_connect("localhost", "root", "", "cafeteria_db");


function Conecta() {
    $server = "localhost";
    $user = "root";
    $password = "";
    $dataBase = "cafeteria_db";

    //1. Establecer la conexión con el motor de base de datos
    $conexion2 = mysqli_connect($server, $user, $password, $dataBase);

    if(!$conexion2){
        echo "Ocurrió un error al establecer la conexión: " . mysqli_connect_error();
    }

    return $conexion2;
}

function Desconecta($conexion2) {
    //Ultima operación
    mysqli_close($conexion2);
}

