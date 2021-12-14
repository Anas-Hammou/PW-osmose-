document.getElementById("verif").addEventListener("submit", function(e){
	var erreur;
	var inputs = this.getElementsByTagName("input");

	for (var i = 0;i<inputs.length; i++){
		if(!inputs[i].value)
		{
			erreur = "veuillez remplir tous les champs";
		}
	}
	
	if(erreur)
	{
		e.preventDefault();
		document.getElementById("erreur").innerHTML = erreur;
		return false;	}
		
	

	

}

)
function verif_id()
{
    var word = document.getElementById("id").value;

    var numbers = /^[0-9]+$/
    if (word.match(numbers)) {
        return true;
    }
    else {
        return false;
    }




}



function startsWithCapital() {
    var word = document.getElementById("titre").value;
    if (/[A-Z]/.test(word[0])) {
        return true;
    }
    else {
        return false;
        
    }
  }









function verif_auteur() {
    var word = document.getElementById("formateur").value;
    var letters = /^[A-Za-z]+$/;
    if (word.match(letters)) {
        return true;
    }
    else {
        return false;
    }
}



function verif() {

    if (verif_id() == false) {
        alert('l id doit etre tous en chiffres');
        return false;
    }
    

    
    

    if (startsWithCapital() == false) {
        alert("Le premier lettre doit en majuscule.");
        return false;
    }

    if (verif_auteur() == false) {
        alert('le auteur doit etre tous en lettres');
        return false;
    }

  return true;


}