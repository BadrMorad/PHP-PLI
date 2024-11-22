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

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'supprimer' && isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_SESSION['produits'][$id])) {
            unset($_SESSION['produits'][$id]);
            $_SESSION['message'] = "Produit supprimé avec succès.";
        }
    } elseif ($_GET['action'] == 'supprimer_tous') {
        $_SESSION['produits'] = [];
        $_SESSION['message'] = "Tous les produits ont été supprimés.";
    }
}

header('Location: index.php');
exit();












