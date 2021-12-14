
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
  
   for (var i = 0; i < inputs.length; i++) {
    console.log(inputs[i]);
    if (!inputs[i].value) {
      erreur = "Veuillez renseigner tous les champs";
      break;
    }
  }
   if (startsWithCapital(titre) == false) { alert("le premier lettre du titre en majiscule!"); 
   e.preventDefault();
  
  }

     
   if (startsWithCapital(formateur) == false) { alert("le premier lettre du formateur doit etre en majiscule!");
   e.preventDefault();
    
   
}

}
