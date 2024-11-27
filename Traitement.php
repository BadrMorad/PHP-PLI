<?php
session_start(); 
// session_start(); La fonction session_start(); en PHP est utilisée pour démarrer une nouvelle session ou reprendre une session existante. 
//Les sessions permettent de stocker des informations sur l'utilisateur à travers différentes pages sans avoir à les passer explicitement dans les URL ou les formulaires
//Les cookies sont de petits fichiers stockés sur le client (navigateur) et envoyés au serveur à chaque requête HTTP.
// Ils sont souvent utilisés pour stocker des informations qui doivent persister entre les visites de l'utilisateur
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
//Les superglobales permettent de centraliser l'accès aux données importantes dans un script PHP, 
//rendant le code plus propre et plus facile à maintenir. Elles sont toujours disponibles, quel que soit le contexte, 
//et sont essentielles pour des tâches courantes comme la gestion des formulaires et des sessions.



















