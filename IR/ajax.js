function actualisation()
{
   $.ajax({
      url: 'chargement.php',
      type: 'POST',
      dataType : "html",
   })
   .done(function(reponse){
      $("tbody").html(reponse); 
   })
   
   .fail(function(error){
   alert("Echec :" + error);
   }); 
}

function insertion()
{
      $.ajax({
        url: 'insertion.php',
        })
    
     .fail(function(error){
      alert("Echec :" + error); 

      }); 
}

$(document).ready(function(){
   setInterval(actualisation, 2000); /* actualisation affichage du tableau toute les 2 secondes*/
}); 

$(document).ready(function(){
   setInterval(insertion, 200); /* actualisation de l'insertion des données dans la bdd* toute les 0,2 seconde */
}); 


/*  Ouverture de la page lecture.php sur un nouvel onglet */

function openInNewTab(url) {
   var win = window.open(url, '_blank');
   win.blur();
   window.focus();
 }