<?php

class Carro {
    private $file;

    public function __construct($file) {
        $this->file = $file;
    }

    // Método para agregar el producto al carrito
    public function agregarAlCarro($nombreProducto, $precioProducto) {
        $producto = $nombreProducto . ',' . $precioProducto . PHP_EOL;
        file_put_contents($this->file, $producto, FILE_APPEND);
    }

    // Método para obtener los productos del carrito desde el archivo
    public function obtenerProductos() {
        if (file_exists($this->file)) {
            $lineas = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $productos = [];
            foreach ($lineas as $linea) {
                $datos = explode(',', $linea);
                $productos[] = ['nombre' => $datos[0], 'precio' => $datos[1]];
            }
            return $productos;
        } else {
            return [];
        }
    }

    // Método para calcular el total del carrito
    public function calcularTotal() {
        $total = 0;
        $productos = $this->obtenerProductos();
        foreach ($productos as $producto) {
            $total += $producto['precio'];
        }
        return $total;
    }
}

$carro = new Carro('productos_carro.txt');

?>
