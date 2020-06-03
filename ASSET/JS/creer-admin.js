/*$(document).ready(function(){
             
    $("#oki").click(function(){
        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        if (nom == "" || prenom == "") {
            alert("Invalide");
        }else
        {
           var donnes = 'nom='+nom+'&prenom='+prenom;
           // alert(nom);
           $.ajax( {
               type : "POST" ,
               url : "creer-admin.php" ,
               data : donnes ,
               success : function (){
                   alert("Send");
                   console.log(donnes);
               }
           } );
        }
    });
 });*/

 /*$(function(){

    $('#myform').validate({
rules:{
    nom:{
        required:true
    },
    prenom:{
        required:true
    },
    login:{
        required:true,
        email:true
    }

},
messages:{
    nom:{
     required:"Ce champs nom est obligatoire*!"
    }

}

    });
alert("merci de vous inscrire");

 });*/
 alert("merci de vous inscrire");
 