$(document).ready(function(){

    let offset = 0;

    $.ajax({
            type: "POST",
            url: "http://localhost/BD-CHEIKH-IBRA-DIOP/SRC/liste-joueur.php",
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
                url: "http://localhost/BD-CHEIKH-IBRA-DIOP/SRC/liste-joueur.php",
                data: {limit:4,offset:offset},
                dataType: "JSON",
                success: function (data) {
                    
                    offset +=4;
                }
            });
        }
           
    });
        

//alert('ok');





    $(document).on('click', '.delete', function(){
        var id = $(this).attr("id");
        if(confirm("Etes vous sure de vouloir supprimer ?"))
        {
        $.ajax({
        url:"supprim-joueur.php",
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
    });



    


    
    
 $(document).on('click', '.update', function(){
    var id = $(this).attr("id");
    
    $.ajax({
     url:"modify-joueur.php",
     method:"POST",
     data:{id:id},
     dataType:"json",
     success:function(data)
     
     {
    // alert(data.avatar)
      $('#myModal').show();
      $('#idJoueur').attr('value',id);
      $('#nom').attr('value',data.nom);
      $('#prenom').attr('value',data.prenom);
      $('#login').attr('value',data.login);
      $('#pass').attr('value',data.password);
      $('#output').attr('src',data.avatar);
      $('.modal-title').text("MODIFIER LE JOUEUR");
      $('#image_error').html(data.image);
      $('#compte').val("Edit");
      
     }
    });
   });


//alert("okkk");

});