<?php

define('TEMPLATE_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');

function incluirTemplate($nombre) {
    include TEMPLATE_URL . "/$nombre.php";
}