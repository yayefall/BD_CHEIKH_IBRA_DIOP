<?php
include("function.php");
                 
                $cnx = getConnection();
                $state = $cnx->prepare("SELECT * FROM creerquestion ORDER BY reponse ASC");
                $state->execute();

                $result =$state->fetchAll();
 


if(isset($_POST['submit'])){

    if(!empty($_POST["nombre"])  && ($_POST["nombre"] >=5  && $_POST["nombre"]<=count($result) ) ){

            $_SESSION["nombre"]=$nombre=$_POST["nombre"];
    
    setcookie("fixe_question",$_SESSION['nombre'],(time()+60*60*24*365));


    }elseif($nombre<5){

            $_COOKIE["fixe_question"]=$_SESSION["nombre"]=$nombre=5;
    }else{}
    
}
if(!isset($_COOKIE["fixe_question"])){

$_COOKIE["fixe_question"]=5;
}
?>


<!doctype html>
<html lang="en">
  <head>
    <title>LISTE QUESTION</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../ASSET/CSS/liste-question.css">

  </head>
  <body>
  <div id="alert_message"></div>
      <div class="row justify-content-center mt-3">
       <div class="bg-white col-lg-6">
            <div class="nombre"> 
            <form action="" method="post" id="myForm" onsubmit="return validateForm() " >
                    <label for=""> <strong> Nbre de questions/jeu</strong></label>
                    <input type="number" class="" min="0" id="point" name="nombre" value="<?php echo $_COOKIE["fixe_question"] ?>" style="width:60px;height:30px">
                    <input type="submit" id="ok" name="submit" class="" value="ok" style="font-size:30px;color:white;background-color:blue;width:40px;height:40px">
             </form><hr>
             </div><!-- fin div nombre-->

             <div class="container" >
              
                 <fieldset class="border border-secondary" id="user_data" >
                 <div class="col" id="scrollZone">
                 <?php
                 


     $select=getConnection();

   if (!$select){ // Contrôler la connexion

      $MessageConnexion = die ("connection impossible");
}else{
      $montableau =[];
      $afiche = $select->prepare("SELECT * FROM `creerquestion`");
      $afiche->execute();

      $montableau =$afiche->fetchAll();
      for ($i=0; $i < count($montableau) ; $i++) { 
        if ($montableau[$i]['reponse']=="texte") { //debut choix text
            $idquestion=$montableau[$i]['id'];
            ?>
            <label for=""><?php echo $montableau[$i]['question']   ?></label>
           <span href="#"  class='supprimer'  id="<?php echo ($montableau[$i]['id']);?>" > <i class="fas  fa-trash-alt fa-lg text-danger" ></i></span> &nbsp;&nbsp;&nbsp; <span href="#"  class='modifier'  id="<?php echo ($montableau[$i]['id']);?>"data-toggle="modal" data-target="#myModal"><i class="fas  fa-edit fa-lg text-info"></i></span>
            
        </br>
            <?php
            $monreponse =[];
      $afiche = $select->prepare("SELECT reponses,etat FROM reponsequestion WHERE id_creerquestion=:id");
      
      $afiche->execute(['id'=>$idquestion]);
      $monreponse =$afiche->fetchAll();
      ?>
        <input type="text" name="question<?php echo ($i+1);?>" id="" value="<?php echo $monreponse[0]['reponses'] ; ?>">
        
        <br>
        <?php
        } // fin choix texte

        elseif ($montableau[$i]['reponse']=="multiple") { //debut choix multiple
            $idquestion=$montableau[$i]['id'];
            ?>
            <label for=""><?php echo $montableau[$i]['question']   ?></label>
            <span href="#"  class='supprimer' id="<?php echo ($montableau[$i]['id']);?>" > <i class="fas  fa-trash-alt fa-lg text-danger" ></i></span> &nbsp;&nbsp;&nbsp; <span href="#"  class='modifier'  id="<?php echo ($montableau[$i]['id']);?>"data-toggle="modal" data-target="#myModal"><i class="fas  fa-edit fa-lg text-info"></i></span> </br>
            <?php

            $monreponse =[];
            $afiche = $select->prepare("SELECT reponses,etat FROM reponsequestion WHERE id_creerquestion=:id ");
            
            $afiche->execute(['id'=>$idquestion]);
            $monreponse =$afiche->fetchAll();
            //on parcourt nos differents reponses
            for ($j=0; $j < count($monreponse) ; $j++) { 
                ?>
            <input type="checkbox" <?php if($monreponse[$j]['etat']=="true"){echo 'checked';}  ?> name="" id=""><label for=""><?php echo $monreponse[$j]['reponses'] ;?></label></br>

            <?php
            }

        }// fin choix multiple
        else{
            $idquestion=$montableau[$i]['id'];
            ?>
           <label for=""><?php echo $montableau[$i]['question']   ?></label>
           <span href="#" class='supprimer'id="<?php echo ($montableau[$i]['id']);?>" > <i class="fas  fa-trash-alt fa-lg text-danger" ></i></span> &nbsp;&nbsp;&nbsp; <span href="#" class='modifier'id="<?php echo ($montableau[$i]['id']);?>"data-toggle="modal" data-target="#myModal"><i class="fas  fa-edit fa-lg text-info"></i></span>  </br>
            <?php
            $reponse2 =[];
            $afiche = $select->prepare("SELECT reponses,etat FROM reponsequestion WHERE id_creerquestion=:id ");
            
            $afiche->execute(['id'=>$idquestion]);
            $reponse2 =$afiche->fetchAll();
            //on parcourt nos differents reponses
            for ($j=0; $j < count($reponse2) ; $j++) { 
                ?>
            <input type="radio" <?php if($reponse2[$j]['etat']=="true"){echo 'checked';}  ?> name="" id=""><label for=""><?php echo $reponse2[$j]['reponses'] ;?></label></br>

            <?php
            }

            }
        }
        
          
      }
     
  
     ?>

                 </div>
                 </fieldset>
                 
             </div>

          </div><!-- fin div bady-->
          </div>
          <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
         <script>


$('.modifier').click(function modifier(){
    var id = $(this).attr("id");
    if(confirm("Etes vous sure de vouloir modifier ?"))
                {
                $.ajax({
                url:"update-question.php",
                method:"POST",
                data:{id:id},
                success:function(data){
                    $('#reps').text('')
                    $('#reps').append(data)
                    console.log(data)
             
                }
                });
                setInterval(function(){
                $('#alert_message').html( );
                }, 5000);
                }
})





             $('.supprimer').click(function(){
                var id = $(this).attr("id");
            
                
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
                $('#alert_message').html( );
                }, 5000);
                }

             })
         </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../ASSET/JS/creer-question.js"></script> 
    <script src="../ASSET/JS/liste-question.js"></script>
   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
     integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
     integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <!-- /**************************************************************** */ -->
          <!-- The Modal -->
     <div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title "style="color:rgba(0, 128, 122, 0.774); text-align:center">MODIFIER VOTRE QUESTION</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="" method="POST" id="myForms"><br>
      <div id="reps"></div>

             <!--        <label for=""><strong>Question </strong></label>
                 <textarea name="question" id="question" cols="60" rows="5" style="border-radius:2px" class="groupA"></textarea><br>
                     <span id="question_error"></span><br>
                     <label for=""> <strong> Nbre de points</strong> </label>
                     <select style="width:50px;height:30px" name="point"  id="point" class="groupA">
                         <option > </option>
                         <option value="1" > 1</option>
                         <option  value="45">45</option>
                         <option value="30">30</option>
                         <option  value="3">3</option>
                         <option  value="4">4</option>
                         <option  value="5">5</option>
                         <option  value="16">16</option>
                         <option  value="20">20</option>
                         <option  value="10">10</option>
                         <option  value="8">8</option>
                         <option  value="2">2</option>
                    </select> <br>                              
                     <span id="point_error"></span>

                 <div class="row" id="row_0">
                     <label for=""> <strong>Type de réponse</strong></label>
                     <select style="width:300px;height:40px" name="reponse" id="reponse" class="groupA">
                         <option value=""></option>
                         <option>Donner le type de réponse</option>
                         <option   value="simple">Choix simple</option>  
                         <option  value="multiple" > Choix multiple</option>  
                         <option value="texte">Réponse texte </option>   
                     </select>  
                     <span id="reponse_error"></span> 
                     <button type="button"  id=" bouton" style="position:absolute; padding:0px ;margin:0px 0 0 427px "  onclick="onAddInput()" >
                     <img class="" src="../ASSET/IMG/ic-ajout-réponse.png" alt="" ><br>
                </div>
                <div id="inputs" label="nobre_0"> 

            </div>
            <input style="background-color:chocolate" type="submit" value="Modifier" name="valider" id="validation">

          </div> fin div creer question
      </div> fin div bady-->
    
      </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- /**-*********************************************************************** */ -->


<script >


$('#myForms').submit(function(e){
    e.preventDefault();
   $.ajax({
    url:"recup-question.php",
                method:"POST",
                data:$(this).serialize(),
                success:function(data){
                
                }
   })
})





/*$(document).ready(function(){
    

     $(document).on('click', '.delete', function(){

                var id = $(this).attr("id");
                
                if(confirm("Etes vous sure de vouloir supprimer ?"))
                {
                $.ajax({
                url:"supprim-question.php",
                method:"POST",
                data:{id:id},
                success:function(data){
                $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                $('#user_data').DataFieldset().destroy();
                fetch_data();
                }
                });
                setInterval(function(){
                $('#alert_message').html('');
                }, 5000);
                }

             
        });


       // alert("okkkkkkkkkkkkkkk");
        

            
    });*/
    

</script>
  </body>
</html>