<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito de Compras</title>
  <!-- Materialize CSS -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
  <div class="container">
    <h3 class="center-align">Carrito de Compras</h3>
    <div class="row">
      <div class="col s12">
        <ul class="collection">
          <!-- Incluir script PHP para mostrar los elementos del carrito -->
          <?php include 'cart.php'; ?>
        </ul>
      </div>
    </div>
    <!-- Formulario para agregar productos al carrito -->
    <form action="cart.php" method="POST">
      <div class="row"
      >
        <div class="input-field col s6">
          <input id="product_name" type="text" class="validate" name="product_name" required>
          <label for="product_name">Nombre del Producto</label>
        </div>
        <div class="input-field col s6">
          <input id="product_price" type="number" class="validate" name="product_price" required>
          <label for="product_price">Precio</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 center-align">
          <button class="btn waves-effect waves-light" type="submit">Agregar al Carrito<i class="material-icons right">add_shopping_cart</i></button>
        </div>
      </div>
    </form>
    <!-- Div para mostrar el total del carrito -->
    <div class="row">
      <div class="col s12">
        <h5 class="center-align">Total: $<?php echo $carro->calcularTotal(); ?></h5>
      </div>
    </div>

  </div>
  <!-- Materialize JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
