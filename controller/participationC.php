<?php

    require_once '../config.php';
    require_once '../model/participation.php';


    Class participationC {

        function afficherparticipation()
        {
            $requete = "select * from participation";
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
            $requete = "select * from participation where id like '%$ch%'";
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

        function triParId()
        {
            $requete = "select * from participation ORDER BY idev";
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
        function getparticipationbyID($id)
        {
            $requete = "select * from participation where id=:id";
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

        function ajouterparticipation($participation)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO participation
                (id,idev,idclient,email)
                VALUES
                (:id,:idev,:idclient,:email)
                ');
                $querry->execute([
                    'id'=>$participation->getid(),
                    'idev'=>$participation->getidev(),
                    'idclient'=>$participation->getidclient(),
                    'email'=>$participation->getemail()

                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifierparticipation($participation)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE participation SET
                idev=:idev,idclient=:idclient,email=:email

                where id=:id
                ');
                $querry->execute([
                    'id'=>$participation->getid(),
                    'idev'=>$participation->getidev(),
                    'idclient'=>$participation->getidclient(),
                    'email'=>$participation->getemail(),

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimerparticipation($id)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM participation WHERE id =:id
                ');
                $querry->execute([
                    'id'=>$id
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function afficherparticipationbyevent($id_ev)
        {
            $requete = "select * from participation where idev=$id_ev";
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
    }
