<?php

    require_once '../config.php';
    require_once '../Model/reclamation.php';


    Class reclamationC {

        function afficherformation()
        {
            $requete = "select * from reclamation ORDER BY participants ";
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
        
       
       

        function getarticlebyID($id)
        {
            $requete = "select * from reclamation where idrec=:idrec";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'idrec'=>$idrec
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function ajouterformation($article)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO reclamation
                (idrec,idclient,idoffre,texte)
                VALUES
                (:idrec,:idclient,:idoffre,:texte)
                ');
                $querry->execute([
                    'id'=>$article->getid(),
                    'idclient'=>$article->getidclient(),
                    'idoffre'=>$article->getidoffre(),
                    'texte'=>$article->gettexte(),
                    
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifierformation($article)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE reclamation SET
                idclient=:idclient,idoffre=:idoffre,texte=:texte

                where idrec=:idrec
                ');
                $querry->execute([
                    'idrec'=>$article->getidrec(),
                    'idclient'=>$article->getidclient(),
                    'idoffre'=>$article->getidoffre(),
                    'texte'=>$article->gettexte(),
                    

                ]);
                }
            catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimerformation($idrec)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM reclamation WHERE idrec =:idrec
                ');
                $querry->execute([
                    'id'=>$id
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    }
