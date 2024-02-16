<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./homepageStyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit Homepage</title>
</head>



<body>

    <form action="" method="POST">

        <label for="name">nom du produit :</label>
        <input type="text" name="name">

        <label for="price">prix :</label>
        <input type="number" min="0" name="price">

        <label for="nProduit">numéro id du produit (deux lettres suivies de 4 chiffres)</label>
        <input type="text" name="nProduit">

        <label for="descript">description du produit :</label>
        <input type="text" name="descript">

        <button type="submit" value ="add" >Ajouter le produit</button>
        
    </form>
    


<?php

// require_once("./utils/DBconnect.php");
require_once("model/Produit.php");
require_once("dao/imp/IproduitDaoImp.php");
require_once("dao/IproduitDao.php");

$productDAO = new IproduitDaoImp();


if (isset($_POST["name"]) && isset($_POST["nProduit"]) && isset($_POST["price"]) && isset($_POST["descript"])) {

    $requete = $productDAO->saveProduct($_POST["name"],
                $_POST["nProduit"],
                $_POST["price"],
                $_POST["descript"]);

   
    if ($requete === true) {

       echo"Product was successfully added !"; 
    }
    else{
        echo "erreur";
    }

    
}
?>

<a href="update.php" ><button class="btnUpdate">modifier un article</button></a>

</body>


</html>