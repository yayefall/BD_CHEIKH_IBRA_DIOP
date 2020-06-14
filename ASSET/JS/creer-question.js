//alert("voulez vous générer des questions??");
    
var nbreLigne= 0 ;
function onAddInput()
{
    nbreLigne++;

    var divInput=document.getElementById('inputs');

    var newInput=document.createElement('div');

    newInput.setAttribute('class','row');

    newInput.setAttribute('id','row_'+nbreLigne);

    newInput.style.marginTop="5px";
 
 
  if(reponse.value=="multiple"){
    
    var tot=document.getElementById('inputs').childNodes.length;
    tot-=1;
   if(tot==0){
    tot=1;
    }else{
   tot++;
   }
  
    newInput.innerHTML=`<strong style="font-size: 20px;">Réponse ${nbreLigne} </strong>
   <input type="text" name="requette_`+tot+`" style=" height:35px;width:280px" >
   <input type="checkbox" name="BonneReponse`+tot+`" id="" value="true">
   <button type="button" onclick="onDeleteInput(${nbreLigne})" style=" padding:0px"><img style="width:20px,height:20px" src="../ASSET/IMG/ic-supprimer.png" alt=""></button> 

  `;

   divInput.appendChild(newInput);

    } else if(reponse.value=="simple"){
         
        var tot=document.getElementById('inputs').childNodes.length;
        tot-=1;
    if(tot==0){
        tot=1; 
    }else{
    tot++;
    }
    
    newInput.innerHTML=` <strong style="font-size: 20px;">Réponse ${nbreLigne} </strong>
    <input type="text" name="requette_`+tot+`" style=" height:35px;width:280px" >
    <input type="radio" name="bonneReponse" value='`+tot+`' id="" >
    <button type="button" onclick="onDeleteInput(${nbreLigne})" style=" padding:0px"><img style="width:20px,height:20px" src="../ASSET/IMG/ic-supprimer.png" alt=""></button> 

    `;
    
      divInput.appendChild(newInput);


     }else if(reponse.value=="texte") {
        
      //var bouton=document.getElementById("bouton");
      //bouton.disabled();   

       newInput.innerHTML=` <strong style="font-size: 20px;">Réponse texte</strong>
       <input type="text" name="requette2" id="requette2" style=" height:40px;width:280px"  >
       <button type="button" onclick="onDeleteInput(${nbreLigne})" style=" padding:0px"><img style="width:20px,height:20px" src="../ASSET/IMG/ic-supprimer.png" alt=""></button> 
   
      `;

    divInput.appendChild(newInput);


      }else{}


}
 function onDeleteInput(n)
 {

    var target=document.getElementById('row_'+n);
    target.remove();
    

 }

/*
var question=document.getElementById('question');
var question_error=document.getElementById('question_error');
var regex_question=/^[A-Z][^.;!:]+[.!:?]$/;

var point=document.getElementById('point');
var point_error=document.getElementById('point_error');


var reponse =document.getElementById('reponse');
var reponse_error=document.getElementById('reponse_error');

var validation= document.getElementById('validation');
validation.addEventListener('click',enregistrer);


function enregistrer(e){
if (question.value=="")
    {
       e.preventDefault();
       question.style.border=" solid 1px red";
       question_error.innerHTML="Ce champs est obligatoire*!";

    }else if(regex_question.test(question.value)==false)
      {
         e.preventDefault();
         question_error.innerHTML="Format incorrect";

      }else{}


 if (point.value=="")
    {
       e.preventDefault();
       point.style.border=" solid 1px red";
       point_error.innerHTML="Ce champs est obligatoire*!";
    
    }else{}


 if(reponse.value=="")
        {
            e.preventDefault();
            reponse.style.border="solid 1px red";
            reponse_error.innerHTML="Ce champs est obligatoire*!";
        }else{}




}*/

$(document).ready(function(){ 

$("#question_error").hide();
$("#point_error").hide();
$("#reponse_error").hide();

var question_error=false;
var point_error=false;
var reponse_error=false;

$("#question").focusout(function(){

   check_question();

});
$("#point").focusout(function(){

   check_point();

});
$("#reponse").focusout(function(){

   check_reponse();

});

function check_question(){
  
   var question=$("#question").val();
   var question_regex=/^[A-Z][^.;!:]+[.!:?]$/;

   if(question_regex.test(question) && question!==""){

       $(".groupA").css("border","2px solid green");
       $("#question_error").hide();

   }else{
       
       $("#question_error").html("invalide");
       $("#question_error").show();
       $(".groupA").css("border","2px solid red");
       question_error=true;
   }
   
}

function check_point(){
  
   var point=$("#point").val();
   
   if(point!==""){

       $(".groupB").css("border","2px solid green");
       $("#point_error").hide();

   }else{
       
       $("#point_error").html("invalide");
       $("#point_error").show();
       $(".groupB").css("border","2px solid red");
       point_error=true;
   }
   
}

function check_reponse(){
  
   var reponse=$("#reponse").val();
  
   if( reponse!==""){

       $(".groupC").css("border","2px solid green");
       $("#reponse_error").hide();

   }else{
       
       $("#reponse_error").html("invalide");
       $("#reponse_error").show();
       $(".groupC").css("border","2px solid red");
       reponse_error=true;
   }
   
}
$("#myForm").submit(function(){

   question_error=false;
   point_error=false;
   reponse_error=false;

   check_question();
   check_point();
   check_reponse();

   if( question_error===false && point_error===false && reponse_error===false){

      alert("Tous les champs sont remplis.");
      return false;
   }else{
      alert("Remplir les champs correctement");
      return false;
   }
   
   });
});
