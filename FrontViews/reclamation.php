<?php
    class reclamation
    {
        private $idrec;
        public $texte=null;

    

        function __construct($idrec,$texte)
		{
			$this->idrec=$idrec;
            $this->texte=$texte;
            

		}

        function setidrec(string $idrec){
			$this->idrec=$idrec;
		}
        function settexte(string $texte){
			$this->texte=$texte;
        }



        function getidrec(){
			return $this->idrec;
		}
        function gettexte(){
			return $this->texte;
		}

        
    }
    

?>