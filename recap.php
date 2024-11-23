<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des produits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Récapitulatif des produits</h1>
    </header>
    <nav>
        <a href="index.php">Accueil</a> | <a href="recap.php">Récapitulatif</a>
    </nav>

    <?php
    session_start();

    if (isset($_SESSION['message'])) {
        echo "<div class='message {$_SESSION['message']['type']}'>{$_SESSION['message']['text']}</div>";
        unset($_SESSION['message']);
    }

    if (isset($_SESSION['products']) && count($_SESSION['products']) > 0): ?>
        <div class="table-container">
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prix Unitaire</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
                <?php
                $grandTotal = 0;
                foreach ($_SESSION['products'] as $index => $product) {
                    $grandTotal += $product['total'];
                    echo "<tr>
                            <td>{$product['name']}</td>
                            <td>{$product['price']} €</td>
                            <td>
                                <a class='btn btn-decrease' href='traitement.php?action=down-qtt&index=$index'>-</a>
                                {$product['qtt']}
                                <a class='btn btn-increase' href='traitement.php?action=up-qtt&index=$index'>+</a>
                            </td>
                            <td>{$product['total']} €</td>
                            <td><a class='btn btn-delete' href='traitement.php?action=delete&index=$index'>Supprimer</a></td>
                          </tr>";
                }
                ?>
            </table>
        </div>
        <h2>Total général : <?php echo $grandTotal; ?> €</h2>
        <a class="btn btn-clear" href="traitement.php?action=clear">Supprimer tous les produits</a>
    <?php else: ?>
        <p>Aucun produit ajouté.</p>
    <?php endif; ?>
</body>
</html>












