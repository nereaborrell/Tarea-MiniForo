<?php
// Evita inyección de código (XSS) limpiando el texto
function limpiarEntrada($texto) {
    return htmlspecialchars(trim($texto), ENT_QUOTES, 'UTF-8');
}

// Comprueba usuario de >= 8 caracteres y contraseña al revés
function usuarioOK($nombre, $contraseña): bool {
    if (strlen($nombre) >= 8 && $contraseña === strrev($nombre)) {
        return true;
    }
    return false;
}

// Calcula las estadísticas del comentario para mostrar en detalles.php
function analizarTexto($texto) {
    $resultado = [];
    
    // Longitud total de caracteres
    $resultado['longitud'] = mb_strlen($texto);
    
    // Número de palabras
    $palabras = str_word_count($texto, 1, 'áéíóúÁÉÍÓÚñÑüÜ');
    $resultado['num_palabras'] = count($palabras);
    
    // Letra más repetida (ignorando espacios)
    $caracteres = count_chars(mb_strtolower($texto), 1);
    $maxCar = 0;
    $letraMasRepetida = '-';
    foreach ($caracteres as $ascii => $freq) {
        $char = chr($ascii);
        if ($freq > $maxCar && trim($char) !== '') {
            $maxCar = $freq;
            $letraMasRepetida = $char;
        }
    }
    $resultado['letra_repetida'] = $letraMasRepetida;
    
    // Palabra más repetida
    if (!empty($palabras)) {
        $conteoPalabras = array_count_values(array_map('mb_strtolower', $palabras));
        arsort($conteoPalabras);
        $resultado['palabra_repetida'] = array_key_first($conteoPalabras);
    } else {
        $resultado['palabra_repetida'] = '-';
    }
    
    return $resultado;
}
?>
