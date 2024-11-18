<?php
// Démarrer la session pour stocker et utiliser des variables de session
session_start();

// Vérifier si le formulaire a été soumis correctement, c'est-à-dire via le bouton 'submit'
if (isset($_POST['submit'])) {
    // Récupérer les données envoyées depuis le formulaire via la méthode POST
    $nomProduit = $_POST['name'];
    $prixProduit = $_POST['price'];
    $quantiteProduit = $_POST['qtt'];

    // Vérifier que tous les champs sont remplis avant de procéder
    if ($nomProduit != "" && $prixProduit != "" && $quantiteProduit != "") {
        // Créer une chaîne de texte qui contient toutes les informations du produit
        // Utilisation de htmlspecialchars() pour éviter les risques de sécurité comme les injections XSS
        $produit = "Nom: " . htmlspecialchars($nomProduit) . ", Prix: " . htmlspecialchars($prixProduit) . "€, Quantité: " . htmlspecialchars($quantiteProduit);

        // Vérifier si la variable de session 'produits' existe déjà. Si elle n'existe pas, on la crée
        if (!isset($_SESSION['produits'])) {
            $_SESSION['produits'] = []; // Initialiser un tableau vide pour stocker les produits
        }

        // Ajouter le produit au tableau de produits existant dans la session
        $_SESSION['produits'][] = $produit;
    } else {
        // Si un des champs est vide, on stocke un message d'erreur dans la session pour l'afficher à l'utilisateur
        $_SESSION['message'] = "Veuillez remplir tous les champs.";
    }
} else {
    // Si l'utilisateur accède directement à ce script sans passer par le formulaire, on affiche un message d'erreur
    $_SESSION['message'] = "Accès direct non autorisé.";
}

// Rediriger l'utilisateur vers la page principale (index.php) après le traitement des données
header("Location: index.php");
exit(); // Terminer le script ici pour éviter l'exécution de code supplémentaire après la redirection
?>








