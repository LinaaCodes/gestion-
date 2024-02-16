<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier un produit</title>
    <link rel="stylesheet" href="updateStyle.css">
</head>


<body>
    <form action="" method="get">
    <p>
        entrez l'id du produit a modifier
        </p>
        <label for="id">id :</label>
        <input type="text" name="id">

        <button type="submit">
            chercher
        </button>
    </form>


<?php 

require_once("model/Produit.php");
require_once("dao/imp/IproduitDaoImp.php");
require_once("dao/IproduitDao.php");

$productDAO = new IproduitDaoImp();

if (isset($_GET["id"])) {

    $searchedId = $_GET["id"];

    $requete = $productDAO->getProductById($_GET["id"]);

    if (count($requete)>0){
        foreach($requete as $item=>$key) {
            echo $key;
            
        }
        echo '<a href="delete.php?id=<?= $searchedId ?> ">

            <button name="delete">supprimer le produit</button>

            </a>' ;
    }else{
        echo "pas de produit avec cet id trouvé";
    }
} //fin de min if isset id
?>

    

    <form action="" method="post">

    <br><hr>


    <label for="name"> new nom du produit :</label>
    <input type="text" name="name" value="">

    <label for="price">new price :</label>
    <input type="text" name="price" value="">

    <label for="nProduit">new n de produit :</label>
    <input type="text" name="nProduit" value="" >

    <label for="descript">new description :</label>
    <input type="text" name="descript" value="" >


    <button type="submit" name="submit">modifier</button>


    </form>




</body>


</html>

<?php


if(isset($_POST["submit"]) && isset($_GET["id"])) {

    $update = $productDAO->updateProduct($_POST["name"], $_POST["nProduit"], $_POST["price"], $_POST["descript"], $_GET["id"]);

    if($update == true){
        echo "modification réussie";
    }
    else{
        echo "echec de la modification";
    }
}

