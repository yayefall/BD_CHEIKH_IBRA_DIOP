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
       url: "../SRC/insert-admin.php",
       type:"POST",
       contentType: false,
       processData: false,
       data:form,
       success:function(data){
      //  $("form").trigger("reset");  
            $("#myForm")[0].reset();
         
           // $('#user').hide()
           // $( "#test" ).load( "./index.php" );

       }
   })
   
}

});


});