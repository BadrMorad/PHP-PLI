<?php
session_start();

if (isset($_GET['action'])) { // Vérifier s'il y a une action dans l'URL
    switch ($_GET['action']) {
        case "add": // Ajouter un nouveau produit
            if (isset($_POST['name'], $_POST['price'], $_POST['qtt'])) {
                $name = htmlspecialchars(trim($_POST['name']));
                $price = floatval($_POST['price']);
                $qtt = intval($_POST['qtt']);

                if (!isset($_SESSION['products'])) {
                    $_SESSION['products'] = [];
                }

                $total = $price * $qtt;
                $_SESSION['products'][] = [
                    'name' => $name,
                    'price' => $price,
                    'qtt' => $qtt,
                    'total' => $total
                ];

                $_SESSION['message'] = ['type' => 'success', 'text' => 'Produit ajouté avec succès !'];
            } else {
                $_SESSION['message'] = ['type' => 'error', 'text' => 'Erreur : veuillez remplir tous les champs.'];
            }
            break;

        case "delete": // Supprimer un produit spécifique
            if (isset($_GET['index'])) {
                array_splice($_SESSION['products'], $_GET['index'], 1);
                $_SESSION['message'] = ['type' => 'success', 'text' => 'Produit supprimé avec succès.'];
            }
            break;

        case "clear": // Supprimer tous les produits
            unset($_SESSION['products']);
            $_SESSION['message'] = ['type' => 'success', 'text' => 'Tous les produits ont été supprimés.'];
            break;

        case "up-qtt": // Augmenter la quantité d'un produit
            if (isset($_GET['index'])) {
                $_SESSION['products'][$_GET['index']]['qtt']++;
                $_SESSION['products'][$_GET['index']]['total'] = $_SESSION['products'][$_GET['index']]['price'] * $_SESSION['products'][$_GET['index']]['qtt'];
            }
            break;

        case "down-qtt": // Réduire la quantité d'un produit
            if (isset($_GET['index']) && $_SESSION['products'][$_GET['index']]['qtt'] > 1) {
                $_SESSION['products'][$_GET['index']]['qtt']--;
                $_SESSION['products'][$_GET['index']]['total'] = $_SESSION['products'][$_GET['index']]['price'] * $_SESSION['products'][$_GET['index']]['qtt'];
            }
            break;
    }
}

// Rediriger vers la page récapitulative
header('Location: recap.php');
exit();
?>






















