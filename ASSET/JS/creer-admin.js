
$(document).ready(function(){
             
    /*$("#myForm").validate({

        rules:{
           nom:{
                 required:true,
            },
           prenom:{
               required:true,

           },
           login:{
               required:true,
                 email:true
                },
            pass:"required",
             repass:{
                    required:true,
                   equalTo:"#pass"
               }
        },
          messages:{
               nom:{
                required:"Ce champs nom est obligatoire*!",
               },
               prenom:{
                 required:"Ce champs prenom est obligatoire*!",
                },
              login:{
                required:"Entrer une adresse email.",
               email:"Entrer un email valide."
             },
            pass:{
                 required:"Entrer votre password *!",
               },
               repass:{
                  required:"Confirmer le password *!",
              }
         }
        

        
    
    });
    
    
 alert("merci de vous inscrire pour jouer");*/


  

$("#nom_error").hide();
$("#prenom_error").hide();
$("#login_error").hide();
$("#pass_error").hide();
$("#repass_error").hide();
$("#image_error").hide();

var nom_error=false;
var prenom_error=false;
var login_error=false;
var pass_error=false;
var repass_error=false;
var image_error=false;

$("#nom").focusout(function(){

check_nom();

});
$("#prenom").focusout(function(){

check_prenom();

});
$("#login").focusout(function(){

check_login();

});
$("#pass").focusout(function(){

check_pass();

});
$("#repass").focusout(function(){

check_repass();

});
$("#image").focusout(function(){

check_image();

});


function check_nom(){

var nom=$("#nom").val();
var nom_regex=/^[A-Z a-zêâîé-]+$/;

if(nom_regex.test(nom) && nom!==""){

    $(".ma-groupA").css("border","2px solid green");
    $("#nom_error").hide();

}else{
    
    $("#nom_error").html("invalide");
    $("#nom_error").show();
    $(".ma-groupA").css("border","2px solid red");
    nom_error=true;
}

}

function check_prenom(){


var prenom=$("#prenom").val();
var prenom_regex=/^[A-Z a-zêâîé-]+$/;

if(prenom_regex.test(prenom) && prenom!==""){
    
    $(".ma-groupB").css("border","2px solid green");
    $("#prenom_error").hide();

}else{
    
    $("#prenom_error").html("invalide");
    $("#prenom_error").show();
    $(".ma-groupB").css("border","2px solid red");
    prenom_error=true;
}
}



function check_login(){


var login=$("#login").val();
//var login_regex=/^[A-Z a-zêâîé-]+$/;

if( login!==""){

    $(".ma-groupC").css("border","2px solid green");
    $("#login_error").hide();

}else{
    
    $("#login_error").html("invalide");
    $("#login_error").show();
    $(".ma-groupC").css("border","2px solid red");
    login_error=true;
}

}


function check_pass(){

var pass=$("#pass").val();

if( pass!==""){
    
    $(".ma-groupD").css("border","2px solid green");
    $("#pass_error").hide();

}else{
    
    $("#pass_error").html("invalide");
    $("#pass_error").show();
    $(".ma-groupD").css("border","2px solid red");
    pass_error=true;
}

}


function check_repass(){

var repass=$("#repass").val();


if( repass!==""){
    
    $(".ma-groupE").css("border","2px solid green");
    $("#repass_error").hide();

}else{
    
    $("#repass_error").html("invalide");
    $("#repass_error").show();
    $(".ma-groupE").css("border","2px solid red");
    repass_error=true;
}

}
function check_image(){

var image=$("#image").val();


if( image!==""){
    
$(".ma-groupF").css("border","2px solid green");
$("#image_error").hide();

}else{

$("#image_error").html("invalide");
$("#image_error").show();
$(".ma-groupF").css("border","2px solid red");
image_error=true;
}

}


$("#myForm").submit(function(){

 nom_error=false;
prenom_error=false;
 login_error=false;
 pass_error=false;
 repass_error=false;
 image_error=false;


check_nom();
check_prenom();
check_login();
check_pass();
check_repass();
check_image();

if( nom_error===false && prenom_error===false && login_error===false && pass_error===false && repass_error===false && image_error===false){

alert("success full");
return false;


}else{
alert("remplir le formulaire correctement");
return false;
}

});



});


