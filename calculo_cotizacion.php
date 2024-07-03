<?php
// Modo de reporte de errores
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cantidadTalonarios = number_format($_POST['cantidadTalonarios']);
    $precio = 190; // Ejemplo de precio base
    // $cantidad = 5; // Ejemplo de cantidad base
    $precioCantidad = $precio * $cantidadTalonarios;
    $ivaProveedor = isset($_POST['iva_proveedor']) ? 0.15 : 0;
    $variableGanancia = $_POST['variable_ganancia'];
    
    $precioCosto = $precioCantidad + ($precioCantidad * $ivaProveedor);
    $ganancia = ($precioCosto * $variableGanancia) - $precioCosto;
    $precioPublico = $precioCosto * $variableGanancia;
    
    $iva = 0.15;
    $precioVenta = $precioPublico + ($precioPublico * $iva);

    $response = array(
        'cantidadTalonarios' => number_format($cantidadTalonarios, 2),
        'precioCantidad' => number_format($precioCantidad, 2),

        'precioCosto' => number_format($precioCosto, 2),
        'ganancia' => number_format($ganancia, 2),
        'precioPublico' => number_format($precioPublico, 2),
        'precioVenta' => number_format($precioVenta, 2)
    );

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header('HTTP/1.1 400 Bad Request');
    // echo json_encode(array('error' => 'Invalid request method.'));
}
?> 
