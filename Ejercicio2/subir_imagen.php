<?php
// Directorio donde se guardarán las imágenes
$directorio = 'imagenes/';

// Archivo donde se almacenan los enlaces de las imágenes
$archivoTexto = 'imagenes.txt';

// Verificar si el directorio existe, si no, crearlo
if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);
}

// Verificar si se ha enviado un archivo y no ha ocurrido ningún error
if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    // Obtener información del archivo
    $nombreArchivo = $_FILES['imagen']['name'];
    $archivoTemp = $_FILES['imagen']['tmp_name'];

    // Mover el archivo a su ubicación definitiva
    if (move_uploaded_file($archivoTemp, $directorio . $nombreArchivo)) {
        // Escribir el enlace del archivo en el archivo de texto
        $enlace = $directorio . $nombreArchivo;
        $linea = $nombreArchivo . '|' . $enlace . PHP_EOL;
        file_put_contents($archivoTexto, $linea, FILE_APPEND);
    } else {
        echo "Error al mover el archivo.";
        exit();
    }
} else {
    echo "Error durante la subida del archivo.";
    exit();
}

// Redireccionar de nuevo a la página principal
header("Location: index.php");
exit();
?>
