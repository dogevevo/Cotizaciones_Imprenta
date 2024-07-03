<?php

$Total1 = 0;
$TalonarioPrecio = 30;
$TabloideDobleSide = 34;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $CantidadCard = $_POST['cantidadCard'];
    $dobleSideCard = isset($_POST['dobleSideCard']) ? 1 : 0;
    $tabloideCards = 24;  //cantidad de un tabloide

    $total = $CantidadCard / $tabloideCards; 
    $Total1 = round($total, 2); 
    
    //verificar si el numero tiene parte decimal y sumarle uno
    if ($Total1 != floor($Total1)) {
        $Total1 = ceil($Total1);
    }

    //Validar si es doble cara o no
    if ($dobleSideCard == 1) {
        //calcular el precio de los talonarios totales a doble cara
        $precioDobleSide = $Total1 * $TabloideDobleSide;
        $totalPriceTalonarios = $precioDobleSide;
        $tipoTalonario = 'doble cara';
    } else {
        //calcular el precio de los talonarios totales a una cara
        $totalPriceTalonarios = $Total1 * $TalonarioPrecio;
        $tipoTalonario = 'una cara';
    }

    $response = array(
        'cantidadCard' => number_format($CantidadCard, 2),
        'dobleSideCard' => number_format($dobleSideCard, 2),
        'totalPriceTalonarios' => number_format($totalPriceTalonarios, 2),
        'Total1' => $Total1,
        'tipoTalonario' => $tipoTalonario
    );

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header('HTTP/1.1 400 Bad Request');
}
