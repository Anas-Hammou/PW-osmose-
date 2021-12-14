<?php
    class participant
    {
        private $idparticipant;
        public $idoffre=null;
        public $idclient=null;

    

        function __construct($idparticipant,$idoffre,$idclient)
		{
			$this->idparticipant=$idparticipant;
			$this->idoffre=$idoffre;
			$this->idclient=$idclient;
		}

        function setidparticipant(string $idparticipant){
			$this->idparticipant=$idparticipant;
		}
        function setidoffre(string $idoffre){
			$this->idoffre=$idoffre;
		}
        function setidclient(string $idclient){
			$this->idclient=$idclient;
        }


        function getidparticipant(){
			return $this->idparticipant;
		}
        function getidoffre(){
			return $this->idoffre;
		}
        function getidclient(){
			return $this->idclient;
		}
		

        
    }
    

?>