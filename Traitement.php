<?php
session_start();

// Filtrage et validation des données
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$qtt = filter_input(INPUT_POST, 'qtt', FILTER_VALIDATE_INT);

if ($name && $price !== false && $qtt !== false) {
    $total = $price * $qtt;
    $_SESSION['products'][] = [
        'name' => $name,
        'price' => $price,
        'qtt' => $qtt,
        'total' => $total
    ];
    header('Location: recap.php');
    exit();
} else {
    echo "Erreur dans les données fournies.";
}
?>










