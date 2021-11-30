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
   if (startsWithCapital(titre) == false) { alert("le premier lettre du nom en majiscule!"); 
   document.getElementById("msgDiv12").innerHTML = "le premier lettre du nom doit etre en majiscule! ";

  }

     
   if (allLetter(prenom) === false) { alert("le prenom doit etre en lettres "); 
   document.getElementById("msgDiv2").innerHTML = "le prenom doit etre en lettres ";
   preventdefault();
  }
   if (startsWithCapital(prenom) == false) { alert("le premier lettre du prenom doit etre en majiscule!");
   document.getElementById("msgDiv22").innerHTML = "le premier lettre du prenom doit etre en majiscule! "; }

     if (!email.includes('@techjob.tn'))  {alert("verifier que votre mail est de type @techjob.tn");
     document.getElementById("msgDiv3").innerHTML = "verifier que votre mail est de type @techjob.tn "; 
     preventdefault();
   }

   var num=document.getElementById("tel").value;
    if(num.length!=8)
   {alert ("Le NUMERO DE TEL doit etre composer de 8 chiffres.");
   document.getElementById("msgDiv5").innerHTML = "Le NUMERO DE TEL doit etre composer de 8 chiffres."; 
   preventdefault();
  }
 
  
}
