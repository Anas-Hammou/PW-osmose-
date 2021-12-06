function allLetter(word) {
    var letters = /^[A-Za-z]+$/;
    if (word.match(letters)) {
        return true;
    }
    else {
        return false;
        
    }
  }
  function startsWithCapital(word) {
    if (/[A-Z]/.test(word[0])) {
        return true;
    }
    else {
        return false;
        
    }
  }
  function verif() {
     var titre =document.getElementById("titre").value;
     var auteur =document.getElementById("auteur").value;
     var id =document.getElementById("id").value;

  var ok=true;
     if (allLetter(titre) === false) { alert("le nom doit etre en lettres ");
     document.getElementById("msgDiv1").innerHTML = "le nom doit etre en lettres ";
     preventdefault();
    }    
     if (startsWithCapital(titre) == false) { alert("le premier lettre du titre en majiscule!"); 
     document.getElementById("msgDiv12").innerHTML = "le premier lettre du titre doit etre en majiscule! ";
     preventdefault();
    }
    
    if (id<0) {
        alert("id doit etre positive"); 
        document.getElementById("msgDiv12").innerHTML = "id doit etre positive! ";
        preventdefault();
    }
       
     if (allLetter(auteur) === false) { alert("le prenom doit etre en lettres "); 
     document.getElementById("msgDiv2").innerHTML = "le prenom doit etre en lettres ";
     preventdefault();
    }
     if (startsWithCapital(auteur) == false) { alert("le premier lettre du prenom doit etre en majiscule!");
     document.getElementById("msgDiv22").innerHTML = "le premier lettre du prenom doit etre en majiscule! "; }
  
      
  
   
    
  }