
 function validatGeForm(){
        

    var nombre=document.forms["myForm"]["nombre"].value;
    var nombre_regex=/[1-9]+/;
    var taille= echo count($result);

    if(nombre_regex.test(nombre) && ( nombre>=5 && nombre<=taille)){

            sessionStorage.setItem("myNombre",nombre);

            var nombre_session=sessionStorage.getItem("myNombre");
            var nombre_cookie=document.cookie=+nombre;+"path/;domaine=SRC\liste-question.php;expires max-age=31536000";
          

    }else{
    nombre_session=5;
     }

     if(nombre_cookie){

      nombre_session=nombre_cookie;
}else{
     nombre_cookie=5;

 }

alert(nombre_cookie);

}



$(document).ready(function(){

        let offset = 0;
    
        $.ajax({
                type: "POST",
                url: "http://localhost/BD-CHEIKH-IBRA-DIOP/SRC/liste-question.php",
                data: {limit:4,offset:offset},
                dataType: "JSON",
                success: function (data) {
                    
                    printData(data);
                    offset +=4
                }
            });
    
    
            const scrollZone = $('#scrollZone')
            scrollZone.scroll(function(){
            //console.log(scrollZone[0].clientHeight)
            const st = scrollZone[0].scrollTop;
            const sh = scrollZone[0].scrollHeight;
            const ch = scrollZone[0].clientHeight;
    
            console.log(st,sh, ch);
             
            if(sh-st <= ch){
                $.ajax({
                    type: "POST",
                    url: "http://localhost/BD-CHEIKH-IBRA-DIOP/SRC/liste-question.php",
                    data: {limit:4,offset:offset},
                    dataType: "JSON",
                    success: function (data) {
                        
                        offset +=4;
                    }
                });
            }
               
        });




      /*  $(document).on('click', '.delete', function(){
                var id = $(this).attr("id");
                alert("okkkk");
                if(confirm("Etes vous sure de vouloir supprimer ?"))
                {
                $.ajax({
                url:"supprim-question.php",
                method:"POST",
                data:{id:id},
                success:function(data){
                $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                $('#user_data').DataTable().destroy();
                fetch_data();
                }
                });
                setInterval(function(){
                $('#alert_message').html('');
                }, 5000);
                }

               // alert("okkkk");
        
        });*/

    $('#myForm').submit(function(e){
          e.preventDefault();
        
                $.ajax({
        
                    url: "recup-question.php",
                    method:"POST",
                    data:$(this).serialize(),
                    success:function(data){
                        
                        alert('biennn');
                        console.log(data);
                        
                    }
                });
           
        
     });
        
        
        




            
    });
    

 

    