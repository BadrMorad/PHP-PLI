<?php
// Démarrage de la session
session_start();

// Vérification si le formulaire a été soumis
if (isset($_GET['submit'])) {
    // Récupérer les données envoyées par le formulaire
    $nom = htmlspecialchars($_GET['name']); // Protection contre les injections HTML
    $prix = (float) $_GET['price'];
    $quantite = (int) $_GET['qtt'];

    // Vérifier si le tableau de produits existe dans la session
    if (!isset($_SESSION['produits'])) {
        $_SESSION['produits'] = [];
    }

    // Ajouter le produit au tableau de session
    $_SESSION['produits'][] = [
        'nom' => $nom,
        'prix' => $prix,
        'quantite' => $quantite
    ];

    // Message de confirmation
    echo "<p>Produit ajouté avec succès !</p>";
}

// Afficher les produits enregistrés dans la session
if (!empty($_SESSION['produits'])) {
    echo "<h2>Produits enregistrés :</h2>";
    echo "<ul>";
    foreach ($_SESSION['produits'] as $produit) {
        echo "<li>{$produit['nom']} - {$produit['prix']}€ - Quantité : {$produit['quantite']}</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Aucun produit enregistré pour le moment.</p>";
}

// Lien pour retourner au formulaire
echo '<p><a href="index.php">Retour au formulaire</a></p>';
?>

