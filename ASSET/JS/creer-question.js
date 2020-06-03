alert("voulez vous générer des questions??");
    
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
  
    newInput.innerHTML=`<strong style="font-size: 22px;">Réponse ${nbreLigne} </strong>
   <input type="text" name="requette_`+tot+`" style=" height:35px;width:280px" >
   <input type="checkbox" name="BonneReponse`+tot+`" id="" value='`+tot+`'>
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
    
    newInput.innerHTML=` <strong style="font-size: 22px;">Réponse ${nbreLigne} </strong>
    <input type="text" name="requette_`+tot+`" style=" height:35px;width:280px" >
    <input type="radio" name="bonneReponse" value='`+tot+`' id="" >
    <button type="button" onclick="onDeleteInput(${nbreLigne})" style=" padding:0px"><img style="width:20px,height:20px" src="../ASSET/IMG/ic-supprimer.png" alt=""></button> 

    `;
    
      divInput.appendChild(newInput);


     }else if(reponse.value=="texte") {
        
      //var bouton=document.getElementById("bouton");
      //bouton.disabled();   

       newInput.innerHTML=` <strong style="font-size: 22px;">Réponse texte</strong>
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




}

