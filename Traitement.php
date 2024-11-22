<?php
session_start();

if (!isset($_SESSION['produits'])) {
    $_SESSION['produits'] = [];
}

if (isset($_POST['action']) && $_POST['action'] == 'ajouter') {
    if (!empty($_POST['produit']) && !empty($_POST['quantite']) && !empty($_POST['prix'])) {
        $produit = [
            'nom' => $_POST['produit'],
            'quantite' => $_POST['quantite'],
            'prix' => $_POST['prix']
        ];
        $_SESSION['produits'][] = $produit;
        $_SESSION['message'] = "Produit ajouté avec succès.";
    }
}

// Gestion des actions via $_GET['action']
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'supprimer':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if (isset($_SESSION['produits'][$id])) {
                    unset($_SESSION['produits'][$id]);
                    $_SESSION['message'] = "Produit supprimé avec succès.";
                }
            }
            break;

        case 'supprimer_tous':
            $_SESSION['produits'] = [];
            $_SESSION['message'] = "Tous les produits ont été supprimés.";
            break;

        default:
            $_SESSION['message'] = "Action inconnue.";
            break;
    }
}

header('Location: index.php');
exit();











