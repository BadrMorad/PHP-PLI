<?php
session_start(); // Démarrer la session
// La fonction session_start() initialise une nouvelle session ou reprend une session existante.
// Contrairement aux cookies, qui stockent des données sur le client, 
// les sessions stockent les données sur le serveur, offrant ainsi une meilleure sécurité 
// pour des informations sensibles comme les identifiant

if (!isset($_SESSION['produits'])) {
    $_SESSION['produits'] = [];
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'ajouter' && !empty($_POST['produit']) && !empty($_POST['quantite']) && !empty($_POST['prix'])) {
        $produit = [
            'nom' => $_POST['produit'],
            'quantite' => $_POST['quantite'],
            'prix' => $_POST['prix']
        ];
        $_SESSION['produits'][] = $produit; // Ajoute le produit à la session
        $_SESSION['message'] = "Produit ajouté avec succès.";
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_SESSION['produits'][$id])) {
        unset($_SESSION['produits'][$id]);
        $_SESSION['message'] = "Produit supprimé avec succès.";
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'supprimer_tous') {
    $_SESSION['produits'] = [];
    $_SESSION['message'] = "Tous les produits ont été supprimés.";
}

header('Location: index.php');
exit();













