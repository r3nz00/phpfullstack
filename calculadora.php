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