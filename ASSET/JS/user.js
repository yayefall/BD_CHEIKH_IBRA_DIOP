$(function(){

    $("#myForm").validate({

        rules:{
            nom:{
                required:true,
                lettersonly:true,
                nowithespace:true
            },
            prenom:{
                required:true,
                lettersonly:true
            },
            login:{
                required:true,
                email:true
                },
            password:"required",
             password2:{
                    required:true,
                    equalTo:"#password"
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
             password:{
                    required:"Entrer votre password *!",
                },
                password2:{
                    required:"Confirmer le password *!"
                }
           }
        

        
    
    });
    
    
alert("merci de vous inscrire pour jouer");

});