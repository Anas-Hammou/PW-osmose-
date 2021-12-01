<?php
    class participation
    {
        private $id;
        public $idev;
        public $idclient;
		public $email;
    

        function __construct($id, $idev,$idclient,$email){
			$this->id=$id;
			$this->idev=$idev;
			$this->idclient=$idclient;
			$this->email=$email;
		}

        function setid(string $id){
			$this->id=$id;
		}
        function setidev(string $idev){
			$this->idev=$idev;
		}
        function setidclient(string $idclient){
			$this->idclient=$idclient;
        }

		

        function getid(){
			return $this->id;
		}
        function getidev(){
			return $this->idev;
		}
        function getidclient(){
			return $this->idclient;
		}
		function getemail(){
			return $this->email;
		}
        
    }
    

?>