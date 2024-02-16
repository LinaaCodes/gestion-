<?php

require_once("utils/DBconnect.php");
require_once("dao/IproduitDao.php");

class IproduitDaoImp implements IproduitDAO{


    private PDO $conn;

    public function __construct(){
        $this->conn = DBconnect::getInstance("mysql:host=localhost;dbname=produits","root","")->getConnexion();
    }



    public function saveProduct ($name, $nProduit, $price, $descripton) : bool{

        try{


        $query = "INSERT INTO produit (name , n_Produit , price , descript)
        VALUES (:name , :nProduit , :price , :description)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':nProduit', $nProduit);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':description', $descripton);

        $stmt->execute();


        return true;

        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        } // end catch
    }


    public function getAllProducts () : array{

        $products = [];

        try{


            $query = "SELECT * FROM produit ;";
    
            $stmt = $this->conn->prepare($query);
    
    
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
            return $result;

            if (count($result) > 0) {
                // Parcours des résultats pour créer des objets Person
                foreach ($result as $row) {
                    // Création d'un nouvel objet Person avec les données récupérées
                    $products[] = new Produit(
                        $row["id"],
                        $row['name'],
                        $row['description'],
                        $row['price'],
                        $row['n_Produit']
                    );
                }
            }

            } catch(PDOException $e){
                echo $e->getMessage();
                
            } // end catch
        return $products;
    }


    public function deleteProduct ($id) : bool{
        try {

            
            $query = "DELETE FROM persons WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(":id", $id);

            $stmt->execute();

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } //end catch

       
    }


    public function updateProduct ($name, $nProduit, $price, $descripton, $id) : bool{

        try {

            
            $query = "UPDATE produit SET name = :name , n_Produit = :nProduit, price = :price, descript = :description  WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(":id", $id);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':nProduit', $nProduit);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue(':description', $descripton);

            $stmt->execute();

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } //end catch

    } // fin function updateProduct


    public function getProductById ($id) : array{

        $product = [];

        try{


            $query = "SELECT * FROM produit WHERE id = :id ;";
    
            $stmt = $this->conn->prepare($query);
    
            $stmt->bindValue(':id', $id);

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            

            
                foreach ($result as $row) {
                    $product[] = new Produit(
                        $row["id"],
                        $row['name'],
                        $row['descript'],
                        $row['price'],
                        $row['n_Produit']
                    );
                }
                return $product;

            } catch(PDOException $e){
                echo $e->getMessage();
                
            } // end catch
        return $product;
        
    }


    public function getProductsbyName ($name) : array{

        $product = [];

        try{


            $query = "SELECT * FROM produit WHERE name LIKE :name ;";
    
            $stmt = $this->conn->prepare($query);
    
            $stmt->bindValue(':name', '%'. $name .'%');

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            return $result;

            
                if (count ($result) > 0){
                foreach ($result as $row) {
                    
                    $products[] = new Produit(
                        $row["id"],
                        $row['name'],
                        $row['description'],
                        $row['price'],
                        $row['n_Produit']
                    );
                }
            }
            

            } catch(PDOException $e){
                echo $e->getMessage();
                
            } // end catch
        return $product;
        
    }


    public function getProductsbyPriceInBetween($minPrice, $maxPrice): array{

        $product = [];

        try{


            $query = "SELECT * FROM produit WHERE price BETWEEN :minPrice AND :maxPrice ;";
    
            $stmt = $this->conn->prepare($query);
    
            $stmt->bindValue(':minPrice', $minPrice);
            $stmt->bindValue(':maxPrice', $maxPrice);

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            return $result;

            
                if (count ($result) > 0){
                foreach ($result as $row) {
                    
                    $products[] = new Produit(
                        $row["id"],
                        $row['name'],
                        $row['description'],
                        $row['price'],
                        $row['n_Produit']
                    );
                }
            }
            

            } catch(PDOException $e){
                echo $e->getMessage();
                
            } // end catch
        return $product;
        
    }
       


}