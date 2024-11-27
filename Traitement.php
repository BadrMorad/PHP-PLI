<?php
session_start(); // Démarrer la session pour stocker les données

// Vérifier si une action est définie dans l'URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Utiliser la fonction switch pour gérer l'action
    switch ($action) {
        case 'add': // Cas où l'action est "add"
            // Vérifier que toutes les données du formulaire sont présentes et valides
            if (isset($_POST['name'], $_POST['price'], $_POST['qtt']) &&
                !empty($_POST['name']) && 
                is_numeric($_POST['price']) && 
                is_numeric($_POST['qtt']) && 
                $_POST['price'] > 0 && 
                $_POST['qtt'] > 0) {
                
                // Créer un tableau pour le produit
                $product = [
                    'name' => htmlspecialchars($_POST['name']), // Nettoyer le nom
                    'price' => (float)$_POST['price'],          // Convertir en nombre flottant
                    'qtt' => (int)$_POST['qtt'],                // Convertir en entier
                ];

                // Ajouter le produit à la session
                if (!isset($_SESSION['products'])) {
                    $_SESSION['products'] = []; // Initialiser si pas encore de produits
                }
                $_SESSION['products'][] = $product; // Ajouter le produit

                // Préparer un message de succès
                $_SESSION['message'] = [
                    'type' => 'success',
                    'text' => 'Produit ajouté avec succès !'
                ];
            } else {
                // Si les données ne sont pas valides, préparer un message d'erreur
                $_SESSION['message'] = [
                    'type' => 'error',
                    'text' => 'Données invalides. Veuillez remplir correctement tous les champs.'
                ];
            }
            break;

        case 'delete': // Cas où l'action est "delete"
            // Vérifier que l'index du produit à supprimer est défini et valide
            if (isset($_GET['index']) && is_numeric($_GET['index'])) {
                $index = (int)$_GET['index'];
                if (isset($_SESSION['products'][$index])) {
                    // Supprimer le produit de la session
                    unset($_SESSION['products'][$index]);
                    // Réindexer le tableau pour éviter les trous
                    $_SESSION['products'] = array_values($_SESSION['products']);

                    // Préparer un message de succès
                    $_SESSION['message'] = [
                        'type' => 'success',
                        'text' => 'Produit supprimé avec succès !'
                    ];
                } else {
                    // Si l'index n'existe pas dans la session
                    $_SESSION['message'] = [
                        'type' => 'error',
                        'text' => 'Produit non trouvé.'
                    ];
                }
            } else {
                // Si l'index n'est pas valide
                $_SESSION['message'] = [
                    'type' => 'error',
                    'text' => 'Index invalide.'
                ];
            }
            break;

        default: // Cas où l'action est inconnue
            $_SESSION['message'] = [
                'type' => 'error',
                'text' => 'Action non reconnue.'
            ];
            break;
    }
} else {
    // Si aucune action n'est spécifiée
    $_SESSION['message'] = [
        'type' => 'error',
        'text' => 'Aucune action spécifiée.'
    ];
}

// Rediriger vers la page d'accueil ou une autre page
header('Location: index.php');
exit();
























