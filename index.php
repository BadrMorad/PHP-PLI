<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Première Application</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    <!-- Correction de la balise <from> en <form> et modification de l'attribut action pour pointer vers 'traitement.php' -->
    <form action="traitement.php" method="get">
        <p>
            <label>
                Nom du produit : 
                <!-- Correction du type de 'text' au lieu de 'texte' -->
                <input type="text" name="name" required> 
            </label>
        </p>
        <p>
            <label> 
                Prix du produit :
                <!-- 'step="any"' est correct pour accepter des décimales -->
                <input type="number" step="any" name="price" required>
            </label>
        </p>
        <p>
            <label>
                Quantité désirée : 
                <!-- Correction de l'attribut 'value' au lieu de 'valeu' -->
                <input type="number" name="qtt" value="1" required>
            </label>
        </p>
        <p>
            <!-- Correction de 'valeu' en 'value' pour l'attribut de valeur du bouton submit -->
            <input type="submit" name="submit" value="Ajouter le produit">
        </p>
    </form>
</body>
</html>



