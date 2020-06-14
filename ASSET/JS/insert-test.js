
/*$(document).ready(function(){

    $("#validation").click(function(){
        
        var question=$("#question").val();
        var point=$("#point").val();
        var reponse=$("#reponse").val();
        var donnes={question:question,point:point,reponse:reponse};

       $.ajax({

        url: "../SRC/insert-question.php",
        type:"POST",
        data:donnes,
       }).done(function( arg ){

            if(question!=="" && point!=="" && reponse!=="" ){

                console.log(donnes);
                alert( "Votre question a été enrégistrée !"); 

            }else{

                alert("ERREUR CALL CHEIKH IBRA DIOP PLEASE 00221777756542");
            }
        });


    });

});*/

$(document).ready(function(){

    $('#myForm').submit(function(e){

e.preventDefault();


if(question=="" || point=="" || reponse=="" ){
   // alert('tous les champs sont obligatoirs **!')

    }else{
       
        $.ajax({

            url: "../SRC/insert-question.php",
            method:"POST",
            data:$(this).serialize(),
            success:function(data){
                $("form").trigger("reset");  
                alert('votre question a été enrégistrée dans la base de donnée.');
                console.log(data);
                //$('#result').loat("./menu.php?user=creer-question");
            }
        });
   }

   });





});