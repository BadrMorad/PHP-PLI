
<?php
session_start(); // Démarre la session pour pouvoir stocker les produits dans $_SESSION

// Filtrage et validation des données envoyées par le formulaire
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING); // Nettoie le nom du produit pour éviter les injections XSS
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // Vérifie que le prix est un nombre valide avec des décimales autorisées
$qtt = filter_input(INPUT_POST, 'qtt', FILTER_VALIDATE_INT); // Vérifie que la quantité est un entier valide

// Vérifie si les données sont valides avant de les ajouter à la session
if ($name && $price !== false && $qtt !== false) {
    $total = $price * $qtt; // Calcule le total pour ce produit (prix * quantité)
    
    // Stocke les données du produit dans la session
    $_SESSION['products'][] = [
        'name' => $name, // Nom du produit
        'price' => $price, // Prix unitaire du produit
        'qtt' => $qtt, // Quantité du produit
        'total' => $total // Total calculé pour le produit
    ];

    // Redirige l'utilisateur vers la page récapitulative des produits
    header('Location: recap.php');
    exit(); // Arrête l'exécution du script après la redirection
} else {
    echo "Erreur dans les données fournies."; // Affiche un message d'erreur si les données sont invalides
}
?>












