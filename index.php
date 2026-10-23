<?php
// PRIMERA APROXIMACIÓN AL MODELO VISTA CONTROLADOR.
// Funciones auxiliares Ej - usuarioOK
include_once 'app/funciones.php';

// Salida hacia buffer
ob_start(); 
$msg = "";

if (!isset($_REQUEST['orden'])) {
    include_once 'app/plantillas/entrada.php';
} else {
    switch($_REQUEST['orden']) {
        case "Entrar":
            // Chequear usuario
            $nombre = isset($_REQUEST['nombre']) ? limpiarEntrada($_REQUEST['nombre']) : '';
            $contraseña = $_REQUEST['contraseña'] ?? '';

            if (usuarioOK($nombre, $contraseña)) {
                echo " Bienvenido <b>".$nombre."</b><br>";
                include_once 'app/plantillas/comentario.html';
            } else {
                include_once 'app/plantillas/entrada.php';
                echo "<br> Usuario no válido </br>";
            }
            break;

        case "Nueva opinión":
            echo " Nueva opinión <br>";
            include_once 'app/plantillas/comentario.html';
            break;

        case "Detalles": // Mensaje y detalles
            echo "Detalles de su opinión";
            include_once 'app/plantillas/comentariorelleno.php';
            include_once 'app/plantillas/detalles.php';
            break;

        case "Terminar": // Formulario inicial
            include_once 'app/plantillas/entrada.php';
            break;
    }
}

$contenido_php = ob_get_clean();
include_once "app/plantillas/principal.php";
?>

