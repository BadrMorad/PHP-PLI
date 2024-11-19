<?php
session_start();
$totalGeneral = 0;

if (!empty($_SESSION['products'])) {
    echo "<h1>Récapitulatif des produits</h1>";
    echo "<table border='1'>
            <tr>
                <th>Nom</th>
                <th>Prix Unitaire</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>";
    
    foreach ($_SESSION['products'] as $product) {
        echo "<tr>
                <td>{$product['name']}</td>
                <td>{$product['price']}</td>
                <td>{$product['qtt']}</td>
                <td>{$product['total']}</td>
              </tr>";
        $totalGeneral += $product['total'];
    }
    
    echo "</table>";
    echo "<h2>Total Général: $totalGeneral</h2>";
} else {
    echo "Aucun produit ajouté.";
}
?>



