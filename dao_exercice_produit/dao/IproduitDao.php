<?php

require_once("./utils/DBconnect.php");
interface IproduitDAO {

    function saveProduct ($name, $nProduit, $price, $descripton) : bool;

    function getAllProducts () : array;

    function deleteProduct ($id) : bool;

    function updateProduct ($name, $nProduit, $price, $descripton, $id) : bool;

    function getProductById ($id) : array;

    function getProductsbyName ($name) : array;

    function getProductsbyPriceInBetween($minPrice, $maxPrice): array;
       



} // fin de mon interface IproduitDAO