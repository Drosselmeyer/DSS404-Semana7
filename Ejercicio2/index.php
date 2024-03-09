<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imágenes</title>
    <!-- Importar Material Design Lite CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Importar Material Design Lite JavaScript -->
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <style>
        #imagenes {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .imagen {
            margin: 10px;
            width: 200px;
            height: 200px;
            overflow: hidden;
        }
        .imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .mdl-textfield {
            width: 100%;
            margin-bottom: 20px;
        }
        .mdl-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Subir Imágenes</span>
            </div>
        </header>
        <main class="mdl-layout__content">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset">
                    <!-- Formulario para subir imágenes -->
                    <form action="subir_imagen.php" method="post" enctype="multipart/form-data">
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="file" id="imagenInput" name="imagen" accept="image/*">
                            <label class="mdl-textfield__label" for="imagenInput">Seleccionar Imagen</label>
                        </div>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">Subir Imagen</button>
                    </form>
                </div>
            </div>
            <div id="imagenes" class="mdl-grid">
                <?php
                // Archivo donde se almacenan los enlaces de las imágenes
                $archivoTexto = 'imagenes.txt';

                // Verificar si el archivo de texto existe, si no, crearlo
                if (!file_exists($archivoTexto)) {
                    fopen($archivoTexto, 'w');
                }

                if (file_exists($archivoTexto)
                ){
                    // Leer el archivo de texto y mostrar las imágenes
                    $lineas = file($archivoTexto, FILE_IGNORE_NEW_LINES);
                    foreach ($lineas as $linea) {
                        $datos = explode('|', $linea);
                        $nombreArchivo = $datos[0];
                        $enlace = $datos[1];
                        echo '<div class="mdl-cell mdl-cell--4-col">';
                        echo '<div class="imagen"><img src="' . $enlace . '" alt="' . $nombreArchivo . '"></div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </main>
    </div>
</body>
</html>

