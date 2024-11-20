<?php
session_start(); // Démarre la session
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Récapitulatif</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Lien vers la feuille de style CSS -->
</head>
<body>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="recap.php">Récapitulatif</a>
    </nav>

    <h1>Produits en session :</h1>

    <ul>
        <?php if (isset($_SESSION['produits']) && count($_SESSION['produits']) > 0): ?>
            <?php foreach ($_SESSION['produits'] as $id => $produit): ?>
                <li>
                    <?php echo $produit['nom'] . " - Quantité: " . $produit['quantite'] . " - Prix: " . $produit['prix']; ?>
                    <a href="traitement.php?action=supprimer&id=<?php echo $id; ?>">Supprimer</a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Aucun produit dans la session.</li>
        <?php endif; ?>
    </ul>

    <a href="traitement.php?action=supprimer_tous">Supprimer tous les produits</a>
</body>
</html>
