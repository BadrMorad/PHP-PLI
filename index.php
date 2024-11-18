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

    <?php
    // Démarrer une session pour accéder aux messages qui peuvent être générés par traitement.php
    session_start();

    // Vérifier s'il y a un message dans la session, et l'afficher s'il existe
    if (isset($_SESSION['message'])) {
        // Afficher le message avec un style en rouge pour attirer l'attention de l'utilisateur
        echo "<p style='color:red;'>" . $_SESSION['message'] . "</p>";
        // Supprimer le message après l'avoir affiché, pour ne pas qu'il s'affiche à nouveau après un rafraîchissement de la page
        unset($_SESSION['message']);
    }
    ?>

    <!-- Formulaire pour ajouter un produit -->
    <!-- Utiliser la méthode POST pour éviter d'exposer les données dans l'URL -->
    <form action="traitement.php" method="post">
        <p>
            <label>
                Nom du produit : 
                <input type="text" name="name" required> <!-- Champ texte obligatoire pour le nom du produit -->
            </label>
        </p>
        <p>
            <label> 
                Prix du produit :
                <input type="number" step="any" name="price" required> <!-- Champ numérique pour le prix, accepte les décimales -->
            </label>
        </p>
        <p>
            <label>
                Quantité désirée : 
                <input type="number" name="qtt" value="1" required> <!-- Champ numérique avec une valeur par défaut de 1 -->
            </label>
        </p>
        <p>
            <!-- Bouton de soumission du formulaire, envoie les données à traitement.php -->
            <input type="submit" name="submit" value="Ajouter le produit">
        </p>
    </form>
</body>
</html>






