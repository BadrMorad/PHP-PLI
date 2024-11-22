<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Résumé des produits</h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="recap.php">Récapitulatif</a>
        </nav>
    </header>

    <section class="products">
        <h2>Produits ajoutés :</h2>
        <ul>
            <?php if (isset($_SESSION['produits']) && count($_SESSION['produits']) > 0): ?>
                <?php foreach ($_SESSION['produits'] as $id => $produit): ?>
                    <li>
                        <?php echo $produit['nom'] . " - Quantité: " . $produit['quantite'] . " - Prix: " . $produit['prix'] . "€"; ?>
                        <a href="traitement.php?action=supprimer&id=<?php echo $id; ?>" class="delete-btn">Supprimer</a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Aucun produit dans la liste.</li>
            <?php endif; ?>
        </ul>
        <a href="traitement.php?action=supprimer_tous" class="delete-all-btn">Supprimer tous les produits</a>
    </section>
</body>
</html>

