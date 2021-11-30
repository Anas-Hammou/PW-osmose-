<?php

    require_once '../Assets/Utils/config.php';
    require_once '../Model/categorie.php';


    Class categorieC {

        function affichercategorie()
        {
            $requete = "select * from categorie";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function getcategoriebyID($id)
        {
            $requete = "select * from categorie where idcategorie=:id";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'id'=>$id
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function ajoutercategorie($categorie)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO categorie
                (idcategorie,nomcategorie,nbrearticle)
                VALUES
                (:idcategorie,:nomcategorie,:nbrearticle)
                ');
                $querry->execute([
                    'idcategorie'=>$categorie->getidcategorie(),
                    'nomcategorie'=>$categorie->getnomcategorie(),
                    'nbrearticle'=>$categorie->getnbrearticle(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifiercategorie($categorie)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE categorie SET
                nomcategorie=:nomcategorie,nbrearticle=:nbrearticle

                where idcategorie=:idcategorie
                ');
                $querry->execute([
                    'idcategorie'=>$categorie->getidcategorie(),
                    'nomcategorie'=>$categorie->getnomcategorie(),
                    'nbrearticle'=>$categorie->getnbrearticle(),
                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimercategorie($id)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM categorie WHERE idcategorie =:id
                ');
                $querry->execute([
                    'id'=>$id
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
   
    }
