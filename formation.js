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
   var formateur =document.getElementById("formateur").value;



    
   if (allLetter(titre) === false) { alert("le nom doit etre en lettres ");
   document.getElementById("msgDiv1").innerHTML = "le nom doit etre en lettres ";
   preventdefault();
  }    
   if (startsWithCapital(titre) == false) { alert("le premier lettre du titre en majiscule!"); 
   document.getElementById("msgDiv12").innerHTML = "le premier lettre du titre doit etre en majiscule! ";
   preventdefault();
  }

     
   if (allLetter(formateur) === false) { alert("le prenom doit etre en lettres "); 
   document.getElementById("msgDiv2").innerHTML = "le prenom doit etre en lettres ";
   preventdefault();
  }
   if (startsWithCapital(formateur) == false) { alert("le premier lettre du prenom doit etre en majiscule!");
   document.getElementById("msgDiv22").innerHTML = "le premier lettre du prenom doit etre en majiscule! "; }

    

   var participants=document.getElementById("participants").value;
    if(participants.length>10)
   {alert ("Le NUMERO DE TEL doit etre composer de 8 chiffres.");
   document.getElementById("msgDiv5").innerHTML = "Le NUMERO DE TEL doit etre composer de 8 chiffres."; 
   preventdefault();
  }
  {
  document.getElementById("id").addEventListener("id", veriff);
 
    const a = ["a", "b", "c"];
    for (let id = 0, len = a.length; id < len; ++id) {
        const element = a[id];
        console.log(element);
    }
            }
 
  
}
