<?php

    require_once '../assets/utils/config.php';
    require_once '../model/commande.php';


    Class commandeC {

        function affichercommande()
        {
            $requete = "select * from commande";
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
        //triii
        function affichertri()
        {
            $requete = "select * from commande ORDER BY ID_Commande";
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
        function recherchecommande($ID_CLIENT)
        {
            $requete = "select * from commande where ID_CLIENT like '%$ID_CLIENT%'";
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

        function getcommandebyID($ID_Commande)
        {
            $requete = "select * from commande where ID_Commande=:ID_Commande";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'ID_Commande'=>$ID_Commande
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function ajoutercommande($commande)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO commande
                (ID_Commande,ID_OFFRE,ID_CLIENT ,COMPTE_CB)
                VALUES
                (:ID_Commande,:ID_OFFRE,:ID_CLIENT,:COMPTE_CB)
                ');
                $querry->execute([
                    'ID_Commande'=>$commande->getID_Commande(),
                    'ID_OFFRE'=>$commande->getID_OFFRE(),
                    'ID_CLIENT'=>$commande->getID_CLIENT(),
                    'COMPTE_CB'=>$commande->getCOMPTE_CB(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifiercommande($commande)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE commande SET
                ID_OFFRE=:ID_OFFRE,ID_CLIENT=:ID_CLIENT,COMPTE_CB=:COMPTE_CB

                where ID_Commande=:ID_Commande
                ');
                $querry->execute([
                    'ID_Commande'=>$commande->getID_Commande(),
                    'ID_OFFRE'=>$commande->getID_OFFRE(),
                    'ID_CLIENT'=>$commande->getID_CLIENT(),
                    'COMPTE_CB'=>$commande->getCOMPTE_CB(),
                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimercommande($ID_Commande)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM commande WHERE ID_Commande=:ID_Commande
                ');
                $querry->execute([
                    'ID_Commande'=>$ID_Commande
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    }
