<?php
session_start(); // Démarre la session pour gérer les produits
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Lien vers la feuille de style CSS -->
</head>
<body>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="recap.php">Récapitulatif</a>
    </nav>

    <h1>Ajouter un produit</h1>

    <form action="traitement.php" method="post">
        <input type="text" name="produit" placeholder="Nom du produit" required>
        <input type="number" name="quantite" placeholder="Quantité" required min="1"> <!-- Champ pour la quantité -->
        <input type="text" name="prix" placeholder="Prix" required> <!-- Champ pour le prix -->
        <button type="submit" name="action" value="ajouter">Ajouter Produit</button>
    </form>

    <h2>Nombre total de produits : <?php echo isset($_SESSION['produits']) ? count($_SESSION['produits']) : 0; ?></h2>

    <?php
    if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    ?>
</body>
</html>









