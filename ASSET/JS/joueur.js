$(document).ready(function(){
   // alert("okkkkkkkk");
    let offset = 0;

    $.ajax({
            type: "POST",
            url: "http://localhost/BD-CHEIKH-IBRA-DIOP/SRC/joueur.php",
            data: {limit:2,offset:offset},
            dataType: "JSON",
            success: function (data) {
                
                printData(data);
                offset +=2;
            }
        });


        const scrollZone = $('#scrollZone');
        scrollZone.scroll(function(){
        //console.log(scrollZone[0].clientHeight)
        const st = scrollZone[0].scrollTop;
        const sh = scrollZone[0].scrollHeight;
        const ch = scrollZone[0].clientHeight;

        console.log(st,sh, ch);
         
        if(sh-st <= ch){
            $.ajax({
                type: "POST",
                url: "http://localhost/BD-CHEIKH-IBRA-DIOP/SRC/joueur.php",
                data: {limit:2,offset:offset},
                dataType: "JSON",
                success: function (data) {
                    
                    offset +=2;
                }
            });
        }
           
    });

        
});