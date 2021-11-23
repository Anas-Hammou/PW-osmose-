<?php
    class evenement
    {
        private $id;
        public $titre;
        public $description;
    

        function __construct($id, $titre, $description){
			$this->id=$id;
			$this->titre=$titre;
			$this->description=$description;
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
        
    }
    

?>