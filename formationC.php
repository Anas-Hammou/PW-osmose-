<?php

    require_once '../config.php';
    require_once '../Model/formation.php';


    Class articleC {

        function afficherformation()
        {
            $requete = "select * from article ORDER BY participants DESC";
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
            $requete = "select * from article where id=:id";
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

        function ajouterformation($article)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO article
                (id,titre,description,categorie,prix,formateur,participants)
                VALUES
                (:id,:titre,:description,:categorie,:prix,:formateur,:participants)
                ');
                $querry->execute([
                    'id'=>$article->getid(),
                    'titre'=>$article->gettitre(),
                    'description'=>$article->getdescription(),
                    'categorie'=>$article->getcategorie(),
                    'prix'=>$article->getprix(),
                    'formateur'=>$article->getformateur(),
                    'participants'=>$article->getparticipants(),
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
                UPDATE article SET
                titre=:titre,description=:description,categorie=:categorie,prix=:prix,formateur=:formateur,participants=:participants

                where id=:id
                ');
                $querry->execute([
                    'id'=>$article->getid(),
                    'titre'=>$article->gettitre(),
                    'description'=>$article->getdescription(),
                    'categorie'=>$article->getcategorie(),
                    'prix'=>$article->getprix(),  
                    'formateur'=>$article->getformateur(),
                    'participants'=>$article->getparticipants(),  

                ]);
                }
            catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimerformation($id)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM article WHERE id =:id
                ');
                $querry->execute([
                    'id'=>$id
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    }
