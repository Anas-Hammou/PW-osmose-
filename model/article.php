<?php
    class article
    {
        private $id;
        public $titre;
		private $description;
        public $idcategorie;
		private $auteur;
        public $date;
    

        function __construct($id, $titre, $description, $idcategorie, $auteur, $date){
			$this->id=$id;
			$this->titre=$titre;
			$this->description=$description;
			$this->idcategorie=$idcategorie;
			$this->auteur=$auteur;
			$this->date=$date;
		}

        function setid(string $id){
			$this->id=$id;
		}
        function settitre(string $titre){
			$this->titre=$titre;
		}
		function setdescription(string $description){
			$this->description=$description;
		}
		function setidcategorie(string $idcategorie){
			$this->idcategorie=$idcategorie;
        }
		function setauteur(string $auteur){
			$this->auteur=$auteur;
		}
		function setdate(string $date){
			$this->date=$date;
        }
        function getid(){
			return $this->id;
		}
        function gettitre(){
			return $this->titre;
		}
		function getdescription(){
			return $this->description;
		}
        function getidcategorie(){
			return $this->idcategorie;
		}
		function getauteur(){
			return $this->auteur;
		}
        function getdate(){
			return $this->date;
		}
        
    }
    

?>