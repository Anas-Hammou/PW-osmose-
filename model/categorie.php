<?php
    class categorie
    {
        private $idcategorie;
        public $nomcategorie;
        public $nbrearticle;
    

        function __construct($idcategorie, $nomcategorie, $nbrearticle){
			$this->idcategorie=$idcategorie;
			$this->nomcategorie=$nomcategorie;

			$this->nbrearticle=$nbrearticle;
		}

        function setidcategorie(string $idcategorie){
			$this->idcategorie=$idcategorie;
		}
        function setnomcategorie(string $nomcategorie){
			$this->nomcategorie=$nomcategorie;
		}
        function setnbrearticle(string $nbrearticle){
			$this->nbrearticle=$nbrearticle;
        }

        function getidcategorie(){
			return $this->idcategorie;
		}
        function getnomcategorie(){
			return $this->nomcategorie;
		}
        function getnbrearticle(){
			return $this->nbrearticle;
		}
        
    }
    

?>