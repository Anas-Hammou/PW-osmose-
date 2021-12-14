<?php
    class formation
    {
        private $id;
        public $titre;
        public $description;
		public $categorie;
		public $prix;
		public $formateur;
		public $participants;


    

        function __construct($id,$titre,$description,$categorie,$prix,$formateur,$participants)
		{
			$this->id=$id;
			$this->titre=$titre;
			$this->description=$description;
			$this->categorie=$categorie;
			$this->prix=$prix;
			$this->formateur=$formateur;
			$this->participants=$participants;

			
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
		function setcategorie(string $categorie){
			$this->categorie=$categorie;
        }
		function setprix(string $prix){
			$this->prix=$prix;
        }
		function setformateur(string $formateur){
			$this->formateur=$formateur;
        }
		function setparticipants(string $participants){
			$this->participants=$participants;
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
		function getcategorie(){
			return $this->categorie;
		}
		function getprix(){
			return $this->prix;
		}
		function getformateur(){
			return $this->formateur;
		}
		function getparticipants(){
			return $this->participants;
		}
        
    }
    

?>