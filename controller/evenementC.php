<?php

    require_once '../config.php';
    require_once '../model/evenement.php';


    Class evenementC {

        function afficherevenement()
        {
            $requete = "select * from evenement";
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


        function trievenement()
        {
            $requete = "select * from evenement ORDER BY nbr_p DESC";
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

        function recherche($ch)
        {
            $requete = "select * from evenement where titre like '%$ch%'";
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
        function getevenementbyID($id)
        {
            $requete = "select * from evenement where id=:id";
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

        function ajouterevenement($evenement)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO evenement
                (id,titre,description,img,auteur)
                VALUES
                (:id,:titre,:description,:img,:auteur)
                ');
                $querry->execute([
                    'id'=>$evenement->getid(),
                    'titre'=>$evenement->gettitre(),
                    'description'=>$evenement->getdescription(),
                    'img'=>$evenement->getimg(),
                    'auteur'=>$evenement->getauteur()
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifierevenement($evenement)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE evenement SET
                titre=:titre,description=:description,img=:img,auteur=:auteur

                where id=:id
                ');
                $querry->execute([
                    'id'=>$evenement->getid(),
                    'titre'=>$evenement->gettitre(),
                    'description'=>$evenement->getdescription(),
                    'auteur'=>$evenement->getauteur(),
                    'img'=>$evenement->getimg()

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function incparticipants($id,$nbr_p)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE evenement SET
                nbr_p=:nbr_p

                where id=:id
                ');
                $querry->execute([
                    'id'=>$id,
                    'nbr_p' => $nbr_p

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimerevenement($id)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM evenement WHERE id =:id
                ');
                $querry->execute([
                    'id'=>$id
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    }
