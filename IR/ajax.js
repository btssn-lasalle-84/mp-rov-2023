function actualisation()
{
   $.ajax({
      url: 'chargement.php',
      type: 'POST',
      dataType : "html",
   })
   .done(function(reponse){
   //let data = JSON.stringify(reponse);
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
   setInterval(actualisation, 2000); /* time in milliseconds (2 seconds)*/
}); 

$(document).ready(function(){
   setInterval(insertion, 200); /* time in milliseconds (2 seconds)*/
}); 



function openInNewTab(url) {
   var win = window.open(url, '_blank');
   win.blur();
   window.focus();
 }