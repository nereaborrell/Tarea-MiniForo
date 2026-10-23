<?php
// Obtenemos el comentario y calculamos sus estadísticas de forma dinámica
$comentario = isset($_REQUEST['comentario']) ? limpiarEntrada($_REQUEST['comentario']) : '';
$info = analizarTexto($comentario);
?>
<div>
    <b>Detalles:</b><br>
    <table>
        <tr><td>Longitud:</td><td><?=$info['longitud']?></td></tr>
        <tr><td>Nº de palabras:</td><td><?=$info['num_palabras']?></td></tr>
        <tr><td>Letra + repetida:</td><td><?=$info['letra_repetida']?></td></tr>
        <tr><td>Palabra + repetida:</td><td><?=$info['palabra_repetida']?></td></tr>
    </table>
</div>

