<?php

    require_once '../config.php';
    require_once '../Model/formation.php';


    Class formationC {

        function afficherformation()
        {
            $requete = "select * from formation ORDER BY participants ";
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
        function portfolio(){
            $req ="select * from formation ORDER BY categorie DESC";
            $categorie='';
            while ($dnn = mysqli_fetch_array($req)){
                if ($categorie!=$dnn['categorie']){
                    $categorie=$dnn['categorie'];
                    echo '<h1>'.$categorie.':</h1>';
                }
                echo '<hr></hr>'.
                    '<a href="'.$dnn['titre'].'">'.$dnn['participants'].'</a>';
            }
        }
        function recherche($ch)
        {
            $requete = "select * from formation where id like '%$ch%'";
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
            $requete = "select * from formation ORDER BY id";
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
        function afficherformation2()
        {
            $requete = "select * from formation ORDER BY participants DESC ";
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
        function afficherformationparcategorie($idcat)
        {
            try {
                $pdo = getconnexion();
                $query = $pdo-> prepare(
                    'SELECT * FROM formation where categorie = :idcat'

                );
                $query->execute([
                    'id'-> $idcat
                ]);
                return $query->fetchall();
            }catch(PDOException $e){
                $e->getMessage();
            }
        }

        function getformationbyID($id)
        {
            $requete = "select * from formation where id=:id";
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

        function ajouterformation($formation)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO formation
                (id,titre,description,categorie,prix,formateur,participants)
                VALUES
                (:id,:titre,:description,:categorie,:prix,:formateur,:participants)
                ');
                $querry->execute([
                    'id'=>$formation->getid(),
                    'titre'=>$formation->gettitre(),
                    'description'=>$formation->getdescription(),
                    'categorie'=>$formation->getcategorie(),
                    'prix'=>$formation->getprix(),
                    'formateur'=>$formation->getformateur(),
                    'participants'=>$formation->getparticipants(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifierformation($formation)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE formation SET
                titre=:titre,description=:description,categorie=:categorie,prix=:prix,formateur=:formateur,participants=:participants

                where id=:id
                ');
                $querry->execute([
                    'id'=>$formation->getid(),
                    'titre'=>$formation->gettitre(),
                    'description'=>$formation->getdescription(),
                    'categorie'=>$formation->getcategorie(),
                    'prix'=>$formation->getprix(),  
                    'formateur'=>$formation->getformateur(),
                    'participants'=>$formation->getparticipants(),  

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
                DELETE FROM formation WHERE id =:id
                ');
                $querry->execute([
                    'id'=>$id
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    }
      
