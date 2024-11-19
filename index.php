<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    <form action="traitement.php" method="post">
        <label for="name">Nom du produit:</label>
        <input type="text" name="name" required>
        <br>
        <label for="price">Prix unitaire:</label>
        <input type="text" name="price" required>
        <br>
        <label for="qtt">Quantité:</label>
        <input type="number" name="qtt" required min="1">
        <br>
        <input type="submit" value="Ajouter le produit">
    </form>
</body>
</html>







