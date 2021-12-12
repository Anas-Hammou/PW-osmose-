<?php

    require_once '../config.php';
    require_once '../model/achat.php';


    Class achatC {

        function afficherachat()
        {
            $requete = "select * from achat";
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
        //recherche//
        function rechercheachat($titre)
        {
            $requete = "select * from achat where titre like '%$titre%'";
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
        //jointure//
        function afficherachatbycommand($id_commande)
        {
            $requete = "select * from achat where ID_COMMANDE=$id_commande";
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
        //triii//
        function affichertri()
        {
            $requete = "select * from achat ORDER BY PRIX";
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
        function getachatbyID($id)
        {
            $requete = "select * from achat where ID_ACHAT=:ID_ACHAT";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'ID_ACHAT'=>$id
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function ajouterachat($achat)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO achat
                (ID_ACHAT,TITRE ,PRIX,ID_COMMANDE,COMPTE_CB)
                VALUES
                (:ID_ACHAT,:TITRE,:PRIX,:ID_COMMANDE,:COMPTE_CB)
                ');
                $querry->execute([
                    'ID_ACHAT'=>$achat->getID_ACHAT(),
                    'TITRE'=>$achat->getTITRE(),
                    'PRIX'=>$achat->getPRIX(),
                    'ID_COMMANDE'=>$achat->getID_COMMANDE(),
                    'COMPTE_CB' => $achat->getCOMPTE_CB()
                   
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifierachat($achat)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE achat SET
                TITRE=:TITRE,PRIX=:PRIX,ID_COMMANDE=:ID_COMMANDE

                where ID_ACHAT=:ID_ACHAT
                ');
                $querry->execute([
                    'ID_ACHAT'=>$achat->getID_ACHAT(),
                    'TITRE'=>$achat->getTITRE(),
                    'PRIX'=>$achat->getPRIX(),
                    'ID_COMMANDE'=>$achat->getID_COMMANDE(),
                    
                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimerachat($ID_ACHAT)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM achat WHERE ID_ACHAT=:ID_ACHAT
                ');
                $querry->execute([
                    'ID_ACHAT'=>$ID_ACHAT
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    }
