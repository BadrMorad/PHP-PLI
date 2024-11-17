<?php
session_start();
$produits = $_SESSION['produits'] ?? [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des Produits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Récapitulatif des Produits</h1>
        <?php if (count($produits) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produits as $produit): ?>
                        <tr>
                            <td><?php echo $produit['nom']; ?></td>
                            <td><?php echo $produit['prix']; ?>€</td>
                            <td><?php echo $produit['quantite']; ?></td>
                            <td><?php echo $produit['total']; ?>€</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun produit ajouté pour le moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>

