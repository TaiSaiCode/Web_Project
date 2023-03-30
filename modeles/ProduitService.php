<?php
require_once 'Database.php';

class ProduitService {


    public function getSum_articles() {
        try {
            $pdo = DataBase::connect();
            $sth = $pdo->prepare("SELECT SUM(`qte`) AS somme FROM `panier`");
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            DataBase::disconnect();
        } catch (PDOException  $e ){
            echo "Error: ".$e;
        }
        return $result['somme'];    
    }

    public function ajouterArticle($id_produit, $qte) {
        
        try {
            $pdo = DataBase::connect();
            $stmt = $pdo->prepare("INSERT INTO panier (id_produit, qte) VALUES (?, ?)");
			$stmt->execute([$id_produit, $qte]);

            // mettre à jour la quantité disponible dans la table produits


            $stmt = $pdo->prepare("UPDATE `produits` SET `qte` = `qte` - $qte WHERE `produits`.`id` = $id_produit");
			$stmt->execute();

            DataBase::disconnect();  
        } catch (Exception $e) {
            DataBase::disconnect();
            throw $e;
        } 
               
    }

    public function getListProduits($order)
    {
        try {
            $pdo = DataBase::connect();
            $sth = $pdo->prepare("SELECT * FROM produits ORDER BY $order");
            $sth->execute();
            $result = $sth->fetchAll();
            DataBase::disconnect();
        } catch (PDOException  $e ){
            echo "Error: ".$e;
        }
        return $result;
    }

    
    public function getListArticles() {
        try {
            $pdo = DataBase::connect();
            $sth = $pdo->prepare("SELECT panier.id as id_panier, produits.id as id_produit,
            produits.prix as prix, produits.name as name, panier.qte as qte, produits.qte as qte_disponible
            FROM panier
            INNER JOIN produits ON panier.id_produit=produits.id");
            //$sth = $pdo->prepare("SELECT * FROM panier");
            $sth->execute();
            $result = $sth->fetchAll();
            DataBase::disconnect();
        } catch (PDOException  $e ){
            echo "Error: ".$e;
        }
        return $result;
    }

    public function getProduit($id) {
        try{
            $pdo = DataBase::connect();
            $sth = $pdo->prepare("SELECT * FROM produits WHERE id = $id");
            $sth->execute();
            $result = $sth->fetch();
            DataBase::disconnect();
        }catch(PDOException  $e ){
            echo "Error: ".$e;
        }
        return ($result);
    }

    public function creerNouveauProduit( $name ) {
        try {
            $pdo = DataBase::connect();
            $stmt = $pdo->prepare("INSERT INTO produits (name) VALUES (?)");
			$stmt->execute([$name]);
            DataBase::disconnect();;
            } catch (Exception $e) {
            DataBase::disconnect();
            throw $e;
        }
    }

     public function updateArticle( $id, $qte ) {
         try {
             $pdo = DataBase::connect();
             
                $stmt = $pdo->prepare(
                    "UPDATE panier SET qte = $qte WHERE id = $id");
                    //"DELETE FROM `panier` WHERE `panier`.`id` = $id");
                $stmt->execute();
                   
             DataBase::disconnect();;
         } catch (Exception $e) {
             DataBase::disconnect();
             throw $e;
         }
    }

     public function deleteArticleServ( $id ) {
         try {
             $pdo = DataBase::connect();
             
                $stmt = $pdo->prepare(
                    "DELETE FROM panier WHERE id_produit = $id");
                    //"UPDATE panier SET qte = 99 WHERE id = $id");

                $stmt->execute();
                   
             DataBase::disconnect();;
         } catch (Exception $e) {
             DataBase::disconnect();
             throw $e;
         }
    }

     }

