<?php

    require_once '../config.php';
    require_once '../Model/participant.php';


    Class participantC {

        function afficherformation()
        {
            $requete = "select * from participants";
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
        function getarticlebyID($idparticipant)
        {
            $requete = "select * from participants where idpartcipant=:idparticipant";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'idparticipant'=>$idparticipant
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
                INSERT INTO participants
                (idparticipant,idoffre,idclient)
                VALUES
                (:idparticipant,:idoffre,:idclient)
                ');
                $querry->execute([
                    'idparticipant'=>$article->getidparticipant(),
                    'idoffre'=>$article->getidoffre(),
                    'idclient'=>$article->getidclient(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifierparticipant($article)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE participants SET
               idoffre=:idoffre,idclient=:idclient

                where idparticipant=:idparticipant
                ');
                $querry->execute([
                    'idparticipant'=>$article->getidparticipant(),
                    'idoffre'=>$article->getidoffre(),
                    'idclient'=>$article->getidclient(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimerparticipant($idparticipant)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM participants WHERE idparticipant =:idparticipant
                ');
                $querry->execute([
                    'idparticipant'=>$idparticipant
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    }
