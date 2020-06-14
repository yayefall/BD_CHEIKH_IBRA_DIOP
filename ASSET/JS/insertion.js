// $(document).ready(function(){

//     $("#compte").click(function(){

//         var nom = $("#nom").val();
//         var prenom = $("#prenom").val();
//         var login = $("#login").val();
//         var password = $("#pass").val();
//         var avatar = $("#image").val();
//         var sender = $("#send").val();
//         var donnes={nom:nom,prenom:prenom,login:login,password:password,avatar:avatar,sender:sender}
      
//           console.log(donnes);
//            $.ajax({
//             url: "../SRC/insertion.php",
//             type:"POST",
//             data:donnes,

//         }).done(function( arg ) {

//          if(nom!=="" && prenom!=="" && login!=="" && password!==""){

//             alert( "Votre inscription a été validé \n Veuillez vous connectez !"); 
//              $('#user').hide()
//             $( "#test" ).load( "./index.php" );


        
//          }
           
//         });
        
        
//     });

// });

$(document).ready(function(){
     $('#myForm').submit(function(e){

e.preventDefault();

var form = new FormData();
var image = $('#image')[0].files[0];
var nom=$('#nom').val();
var prenom=$('#prenom').val();
var login=$('#login').val();
var password=$('#pass').val();
var confirm=$('#repass').val();
var sender=$('#send').val();


form.append('file',image);
form.append('nom',nom);
form.append('prenom',prenom);
form.append('login',login);
form.append('password',password);    
form.append('confirm',confirm);
form.append('sender',sender);

if(nom=="" || prenom=="" || login=="" || password=="" || confirm==""){
alert('tous les champs sont obligatoirs **!')
}else{
    $.ajax({
        url: "../SRC/insertion.php",
        type:"POST",
        contentType: false,
        processData: false,
        data:form,
        success:function(response){
            alert('bonjour');
        window.location.href="../index.php";
             $("#myForm")[0].reset();
            

            // alert(data)
            // $('#user').hide()
            // $( "#test" ).load( "./index.php" );

        }
    })
    
}

});


});