<?php
session_start(); 
// Une session en PHP est un moyen de stocker des informations sur l'utilisateur à travers plusieurs pages web.
// Contrairement aux cookies, qui sont stockés sur le navigateur de l'utilisateur, les données de session sont stockées sur le serveur.
// Chaque utilisateur se voit attribuer un identifiant de sess


$totalGeneral = 0; // Initialisation de la variable $totalGeneral pour calculer le total des produits

// Vérifie si la session contient des produits
if (!empty($_SESSION['products'])) {
    echo "<h1>Récapitulatif des produits</h1>"; // Affiche un titre pour la page récapitulative
    
    // Début de la table pour afficher les produits
    echo "<table border='1'>
            <tr>
                <th>Nom</th>
                <th>Prix Unitaire</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>";
    
    // Parcourt les produits dans la session et affiche chaque produit dans une ligne de la table
    foreach ($_SESSION['products'] as $product) {
        // Affiche les informations de chaque produit dans la table (nom, prix, quantité, total)
        echo "<tr>
                <td>{$product['name']}</td>
                <td>{$product['price']}</td>
                <td>{$product['qtt']}</td>
                <td>{$product['total']}</td>
              </tr>";
        
        // Ajoute le total du produit au total général
        $totalGeneral += $product['total'];
    }
    
    // Fin de la table
    echo "</table>";

    // Affiche le total général calculé
    echo "<h2>Total Général: $totalGeneral</h2>";
} else {
    // Si la session est vide et qu'aucun produit n'a été ajouté
    echo "Aucun produit ajouté."; // Message affiché si aucun produit n'est dans la session
}
// Les variables globales en PHP sont définies en dehors des fonctions.
// Elles peuvent être accessibles dans tout le script,
// Pour utiliser une variable globale à l'intérieur d'une fonction, on doit utiliser le mot-clé 'global'.
// Cela permet à la fonction d'accéder à la variable définie e
?>


