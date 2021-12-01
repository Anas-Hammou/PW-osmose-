<?php
    class evenement
    {
        private $id;
        public $titre;
        public $description;
		private $img;
		private $auteur;
		private $date_ajout;

    

        function __construct($id, $titre, $description, $img , $auteur){
			$this->id=$id;
			$this->titre=$titre;
			$this->description=$description;
			$this->img=$img;
			$this->auteur =$auteur;
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

        function getid(){
			return $this->id;
		}
        function gettitre(){
			return $this->titre;
		}
        function getdescription(){
			return $this->description;
		}
		function getimg(){
			return $this->img;
		}
		function getauteur(){
			return $this->auteur;
		}
		function getdate_ajout(){
			return $this->date_ajout;
		}

        
    }
    

?>