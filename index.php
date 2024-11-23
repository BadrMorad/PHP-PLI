<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Ajouter un produit</h1>
    </header>
    <nav>
        <a href="index.php">Accueil</a> | <a href="recap.php">Récapitulatif</a>
    </nav>

    <?php
    session_start();
    if (isset($_SESSION['message'])) {
        echo "<div class='message {$_SESSION['message']['type']}'>{$_SESSION['message']['text']}</div>";
        unset($_SESSION['message']);
    }
    ?>

    <div class="form-container">
        <form action="traitement.php?action=add" method="POST">
            <label for="name">Nom du produit :</label>
            <input type="text" id="name" name="name" placeholder="Nom du produit" required><br>

            <label for="price">Prix unitaire :</label>
            <input type="number" id="price" name="price" placeholder="Prix en €" required><br>

            <label for="qtt">Quantité :</label>
            <input type="number" id="qtt" name="qtt" placeholder="Quantité" required><br>

            <input type="submit" value="Ajouter le produit">
        </form>
    </div>
</body>
</html>


























