<?php
$resultado = "";
$error = "";
$num1 = "";
$num2 = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $num1 = $_POST['num1'] ?? '';
  $num2 = $_POST['num2'] ?? '';
  $operacion = $_POST['operacion'] ?? '';

  if (!is_numeric($num1) || !is_numeric($num2)) {
    $error = "Ingresa números válidos.";
  } else {
    $num1 = (float)$num1;
    $num2 = (float)$num2;

    switch ($operacion) {
      case "sumar":
        $resultado = "El resultado de la suma es: " . ($num1 + $num2);
        break;
      case "restar":
        $resultado = "El resultado de la resta es: " . ($num1 - $num2);
        break;
      case "multiplicar":
        $resultado = "El resultado de la multiplicación es: " . ($num1 * $num2);
        break;
      case "dividir":
        if ($num2 != 0) {
          $resultado = "El resultado de la división es: " . ($num1 / $num2);
        } else {
          $error = "Error: No es posible dividir entre cero.";
        }
        break;
      default:
        $error = "Operación no válida.";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora Básica</title>
</head>
<body>

  <h2>Calculadora Matemática Básica</h2>

  <form action="index.php" method="POST">
    <label>Primer Número:</label>
    <input type="number" name="num1" required>
    <br><br>

    <label>Segundo Número:</label>
    <input type="number" name="num2" required>
    <br><br>

    <button type="submit" name="operacion" value="sumar">Sumar</button>
    <button type="submit" name="operacion" value="restar">Restar</button>
    <button type="submit" name="operacion" value="multiplicar">Multiplicar</button>
    <button type="submit" name="operacion" value="dividir">Dividir</button>
  </form>

  <?php if (!empty($resultado)): ?>
    <h3>Resultado:</h3>
    <p><strong><?php echo $resultado; ?></strong></p>
  <?php endif; ?>

  <?php if (!empty($error)): ?>
    <h3>Resultado:</h3>
    <p style="color: red; font-weight: bold;"><?php echo $error; ?></p>
  <?php endif; ?>

</body>
</html>
