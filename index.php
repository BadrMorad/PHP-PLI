<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Bienvenue sur notre Boutique</h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="recap.php">Récapitulatif</a>
        </nav>
    </header>

    <section class="form-container">
        <h2>Ajouter un produit</h2>
        <form action="traitement.php" method="post">
            <input type="text" name="produit" placeholder="Nom du produit" required>
            <input type="number" name="quantite" placeholder="Quantité" required min="1">
            <input type="text" name="prix" placeholder="Prix (€)" required>
            <button type="submit" name="action" value="ajouter">Ajouter</button>
        </form>
    </section>

    <section class="summary">
        <h2>Nombre total de produits : 
            <?php echo isset($_SESSION['produits']) ? count($_SESSION['produits']) : 0; ?>
        </h2>

        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='message'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
    </section>
</body>
</html>










