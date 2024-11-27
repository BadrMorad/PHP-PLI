<?php
session_start(); // Démarrer la session pour stocker les données

// Vérifier si une action est définie dans l'URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Utiliser la fonction switch pour gérer l'action
    switch ($action) {
        case 'up-qtt': // Cas où l'action est "up-qtt"
            if (isset($_GET['index']) && is_numeric($_GET['index'])) {
                $index = (int)$_GET['index'];
                if (isset($_SESSION['products'][$index])) {
                    $_SESSION['products'][$index]['qtt']++;
                    $_SESSION['message'] = [
                        'type' => 'success',
                        'text' => 'Quantité augmentée avec succès !'
                    ];
                } else {
                    $_SESSION['message'] = [
                        'type' => 'error',
                        'text' => 'Produit non trouvé.'
                    ];
                }
            } else {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'text' => 'Index invalide.'
                ];
            }
            break;

        case 'down-qtt': // Cas où l'action est "down-qtt"
            if (isset($_GET['index']) && is_numeric($_GET['index'])) {
                $index = (int)$_GET['index'];
                if (isset($_SESSION['products'][$index])) {
                    if ($_SESSION['products'][$index]['qtt'] > 1) {
                        $_SESSION['products'][$index]['qtt']--;
                        $_SESSION['message'] = [
                            'type' => 'success',
                            'text' => 'Quantité diminuée avec succès !'
                        ];
                    } else {
                        $_SESSION['message'] = [
                            'type' => 'error',
                            'text' => 'La quantité ne peut pas être inférieure à 1.'
                        ];
                    }
                } else {
                    $_SESSION['message'] = [
                        'type' => 'error',
                        'text' => 'Produit non trouvé.'
                    ];
                }
            } else {
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

// Rediriger vers la page de récapitulatif
header('Location: recap.php');
exit();
























