<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Première Application</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    <from action="traitement.php" method="post">
        <p>
            <label>
                Non du produit : 
                <input type="texte" name="name"> 
            </label>
        </p>
        <p>
            <label> 
                Prix du produit :
                <input type="number" step="any" name="price">
</lable>

        </p>
        <p>
            <label>
                Quantité désirée : 
                <input type="number" name="qtt" valeu="1">
            </label>
        </p>
        <p>
            <input type="submit" name="submit" valeu="Ajouter le produit">
        </p>
</from>
    
</body>
</html>

