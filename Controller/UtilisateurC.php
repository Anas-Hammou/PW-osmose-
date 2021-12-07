<?php

    include_once '../config.php';
    require_once '../Model/Utilisateur.php';

    class UtilisateurC{
		// CRUD
        public function afficher_Utilisateur(){
			$sql="SELECT * FROM utilisateurs" ;
            $db = config::getConnexion() ;
            try {
                $liste = $db->query($sql) ;
                return $liste ;
            }
            catch(Exception $e) {
                die('Erreur:' .$e->getMessage()) ;
            }
        }
 
		function ajouter_Utilisateur($Utilisateur){
			$sql="INSERT INTO utilisateurs (nom_user,prenom_user,email_user,tel_user,adresse_user,
					username,password_user,role_user, confirmation_key, confirme) 
				VALUES (:nom_user,:prenom_user,:email_user,:tel_user,:adresse_user,
					:username,:password_user,:role_user, :confirmation_key, :confirme)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom_user' => $Utilisateur->getNomUser(),
					'prenom_user' => $Utilisateur->getPrenomUser(),
					'email_user' => $Utilisateur->getEmailUser(),
					'tel_user' => $Utilisateur->getTelUser(),
					'adresse_user' => $Utilisateur->getAdresseUser(), 
					'username' => $Utilisateur->getUsername(),
					'password_user' => $Utilisateur->getPasswordUser(),
					'role_user' => $Utilisateur->getRoleUser(),
					'confirmation_key' => $Utilisateur->getConfirmationKey(),
					'confirme' => $Utilisateur->getConfirme()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		function supprimer_Utilisateur($id_user){
			$sql="DELETE FROM utilisateurs WHERE id_user= :id_user";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_user',$id_user);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
        }

		function modifier_Utilisateur($utilisateur, $id_user){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE utilisateurs SET 
						nom_user = :nom_user, 
						prenom_user = :prenom_user, 
						email_user = :email_user, 
						tel_user = :tel_user,
						adresse_user = :adresse_user, 
						username = :username, 
						password_user = :password_user, 
						role_user = :role_user, 
						confirmation_key = :confirmation_key,
						confirme = :confirme
					WHERE id_user = :id_user"
                );
                
                $query->execute([
                    'id_user' => $id_user,
					'nom_user' => $utilisateur->getNomUser(), 
					'prenom_user' => $utilisateur->getPrenomUser(), 
					'email_user' => $utilisateur->getEmailUser(), 
					'tel_user' => $utilisateur->getTelUser(), 
					'adresse_user' => $utilisateur->getAdresseUser(), 
					'username' => $utilisateur->getUsername(), 
					'password_user' => $utilisateur->getPasswordUser(), 
					'role_user' => $utilisateur->getRoleUser(), 
					'confirmation_key' => $utilisateur->getConfirmationKey(),
					'confirme' => $utilisateur->getConfirme()
				]);		
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		// RECHERCHE
        function rechercher_Utilisateur($id_user){
			$sql="SELECT * from utilisateurs where id_user=:id_user";
			$db = config::getConnexion();
			$query=$db->prepare($sql);
			$query->bindValue(':id_user',$id_user);

			try{
				$query->execute();
				$utilisateurs=$query->fetch();
				return $utilisateurs;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		public function rechercher_UtilisateurID($id_user) { 
            try {
                $db = config::getConnexion() ; 
                $query = $db->prepare('SELECT * FROM utilisateurs WHERE id_user=:id_user') ; 
                $query->execute([
                    'id_user' => $id_user
                ]) ; 
                return $query->fetchAll();

            } catch (PDOException $e) {
                $e->getMessage() ; 
            } 
        }

		function rechercher_UtilisateurUsername($username){
			$sql="SELECT * from utilisateurs where username=:username";
			$db = config::getConnexion();
			$query=$db->prepare($sql);
			$query->bindValue(':username',$username);

			try{
				$query->execute();
				$utilisateurs=$query->fetch();
				return $utilisateurs;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		// TRI
		public function trier_UtilisateurId(){
			$sql="SELECT * FROM utilisateurs ORDER BY id_user" ;
            $db = config::getConnexion() ;
            try {
                $liste = $db->query($sql) ;
                return $liste ;
            }
            catch(Exception $e) {
                die('Erreur:' .$e->getMessage()) ;
            }
        }

		public function trier_UtilisateurNom(){
			$sql="SELECT * FROM utilisateurs ORDER BY nom_user ASC" ;
            $db = config::getConnexion() ;
            try {
                $liste = $db->query($sql) ;
                return $liste ;
            }
            catch(Exception $e) {
                die('Erreur:' .$e->getMessage()) ;
            }
        }

		public function trier_UtilisateursUsername(){
			$sql="SELECT * FROM utilisateurs ORDER BY username" ;
            $db = config::getConnexion() ;
            try {
                $liste = $db->query($sql) ;
                return $liste ;
            }
            catch(Exception $e) {
                die('Erreur:' .$e->getMessage()) ;
            }
        }
    }
?>