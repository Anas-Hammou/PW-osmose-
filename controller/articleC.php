<?php

    require_once '../Assets/Utils/config.php';
    require_once '../Model/article.php';


    Class articleC {

        function afficherarticle()
        {
            $requete = "select * from article";
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

        function ajouterarticle($article)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO article
                (id,titre,description,idcategorie,auteur,date)
                VALUES
                (:id,:titre,:description,:idcategorie,:auteur,:date)
                ');
                $querry->execute([
                    'id'=>$article->getid(),
                    'titre'=>$article->gettitre(),
                    'description'=>$article->getdescription(),
                    'idcategorie'=>$article->getidcategorie(),
                    'auteur'=>$article->getauteur(),
                    'date'=>$article->getdate(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifierarticle($article)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE article SET
                titre=:titre,description=:description,idcategorie=:idcategorie,auteur=:auteur,date=:date

                where id=:id
                ');
                $querry->execute([
                    'id'=>$article->getid(),
                    'titre'=>$article->gettitre(),
                    'description'=>$article->getdescription(),
                    'idcategorie'=>$article->getidcategorie(),
                    'auteur'=>$article->getauteur(),
                    'date'=>$article->getdate(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimerarticle($id)
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
