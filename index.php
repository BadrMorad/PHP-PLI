<!DOCTYPE html>
<html lang="fr"> <!-- Vous avez commencé par déclarer le type de document HTML et la langue de la page (français) -->
<head>
    <meta charset="UTF-8"> <!-- Vous avez spécifié l'encodage des caractères en UTF-8 pour supporter tous les caractères spéciaux -->
    <title>Ajouter un produit</title> <!-- Vous avez mis un titre de page 'Ajouter un produit' qui sera affiché dans l'onglet du navigateur -->
</head>
<body>
    <h1>Ajouter un produit</h1> <!-- Vous avez créé un titre principal de la page qui annonce l'action 'Ajouter un produit' -->

    <!-- Vous avez créé un formulaire pour ajouter un produit, qui envoie les données à 'traitement.php' via la méthode POST -->
    <form action="traitement.php" method="post">
        
        <!-- Vous avez ajouté un champ pour saisir le nom du produit. Ce champ est obligatoire grâce à l'attribut 'required' -->
        <label for="name">Nom du produit:</label> <!-- Vous avez associé un label pour décrire le champ -->
        <input type="text" name="name" required> <!-- Vous avez défini un champ de texte pour entrer le nom du produit -->
        <br> <!-- Vous avez ajouté un saut de ligne après ce champ -->

        <!-- Vous avez ajouté un champ pour saisir le prix du produit, encore une fois obligatoire -->
        <label for="price">Prix unitaire:</label> <!-- Vous avez placé un label pour le champ de prix -->
        <input type="text" name="price" required> <!-- Vous avez défini un champ de saisie pour le prix, avec un attribut 'required' pour qu'il soit obligatoire -->
        <br> <!-- Vous avez ajouté un autre saut de ligne pour séparer ce champ des autres -->

        <!-- Vous avez ajouté un champ pour saisir la quantité de produit. Le champ est numérique et limite la valeur minimale à 1 -->
        <label for="qtt">Quantité:</label> <!-- Vous avez créé un label pour le champ de quantité -->
        <input type="number" name="qtt" required min="1"> <!-- Vous avez défini un champ numérique pour la quantité, avec un minimum de 1 -->
        <br> <!-- Encore un saut de ligne pour espacer ce champ -->

        <!-- Vous avez ajouté un bouton de soumission pour envoyer le formulaire -->
        <input type="submit" value="Ajouter le produit"> <!-- Le bouton qui soumettra le formulaire pour ajouter le produit -->
    </form>
</body>
</html>









