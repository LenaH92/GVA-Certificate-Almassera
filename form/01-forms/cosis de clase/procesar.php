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
        if(!is_array($_GET[$nombre]))
            echo '<li><strong>' . $nombre . ':</strong> ' . $value . ' !!!!<em>desde $_GET</em></li> '; /* El objetivo del fragmento es recorrer todos los parámetros enviados por GET en la URL y mostrarlos en una lista <li>. */
        else
            echo '<li><strong>' . $nombre . ':</strong> ' .implode(',', $value). ' !!!!<em>desde $_GET</em></li> ';

    foreach ($_POST as $nombre => $value) 
        if(!is_array($_POST[$nombre]))
            echo '<li><strong>' . $nombre . ':</strong> ' . $value . ' !!!!<em>desde $_POST</em></li> '; /* Lo mismo pero para metodo post */
        else
            echo '<li><strong>' . $nombre . ':</strong> ' .implode(',', $value). ' !!!!<em>desde $_POST</em></li> ';

    foreach ($_REQUEST as $nombre => $value) 
        if(!is_array($_REQUEST[$nombre]))
            echo '<li><strong>' . $nombre . ':</strong> ' . $value . ' !!!<em>desde $_REQUEST</em></li>';/* sIRVE TNATO PARA POST COMO PARA GET */
        else
            echo '<li><strong>' . $nombre . ':</strong> ' .implode(',', $value). ' !!!!<em>desde $_REQUEST</em></li> ';
        

/* PAra subir archivos del form, input llamado adjuntar de la carpeta temporal (?) a una del servidor, en nuesro caso upload */
/* como dato esto funciona porque es un archivo solo, si llega a ser un array hay que cambiarlo */
    /* if($_FILES['adjuntar']['error']==UPLOAD_ERR_OK){
        move_uploaded_file($_FILES['adjuntar']['tmp_name'],'upload/'.$_FILES['adjuntar']['name']);
    } */

        /* PAra multiples ficheros */
        for($i=0;$i<count($_FILES['adjuntar']['name']); $i++)
            if($_FILES['adjuntar']['error'][$i]==UPLOAD_ERR_OK){
        move_uploaded_file($_FILES['adjuntar']['tmp_name'][$i],'upload/'.$_FILES['adjuntar']['name'][$i]);
    }
?>
</body>
</html>