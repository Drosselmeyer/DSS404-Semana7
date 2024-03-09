<?php
require_once 'Carro.class.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreProducto = $_POST["product_name"];
    $precioProducto = $_POST["product_price"];

    // Agregar el producto al carrito
    $carro->agregarAlCarro($nombreProducto, $precioProducto);

    // Redireccionar de vuelta a la página principal
    header("Location: index.php");
} else {
    // Mostrar los productos del carrito si no se envía ningún formulario
    $productos = $carro->obtenerProductos();
    foreach ($productos as $indice => $producto) {
        echo '<li class="collection-item">' . $producto['nombre'] . ' - $' . $producto['precio'] .'</li>';
    }
}
?>
