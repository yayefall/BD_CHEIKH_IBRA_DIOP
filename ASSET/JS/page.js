
$(function  (){
    $('#myForm').validate({


        rules:{
            login:{
                required:true,
                email:true
                },
            password:"required",
                
        },
        messages:{
            login:{
                required:"SVP entrer une adresse email *!",
                email:"SVP entrer un email valide."
            },
            password:{
                required:"SVP entrer votre password *!",
            
            }
            
        }

    });
});

