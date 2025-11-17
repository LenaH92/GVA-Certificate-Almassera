<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Formulario</title>
</head>
<body>
    <?php
    echo'<h1>Datos recibidos</h1>';
    foreach ($_GET as $nombre => $value) 
        echo '<li><strong>' . $nombre . ':</strong> ' . $value . ' !!!!<em>desde $_GET</em></li> '; /* El objetivo del fragmento es recorrer todos los parámetros enviados por GET en la URL y mostrarlos en una lista <li>. */

    foreach ($_POST as $nombre => $value) 
        echo '<li><strong>' . $nombre . ':</strong> ' . $value . ' !!!!<em>desde $_POST</em></li>'; /* Lo mismo pero para metodo post */

    foreach ($_REQUEST as $nombre => $value) 
        echo '<li><strong>' . $nombre . ':</strong> ' . $value . ' !!!<em>desde $_REQUEST</em></li>';/* sIRVE TNATO PARA POST COMO PARA GET */
?>
</body>
</html>