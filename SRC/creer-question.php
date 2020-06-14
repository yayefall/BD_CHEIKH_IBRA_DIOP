<?php 
/*include("function.php");

if(isset($_POST['valider'])){

    if(!empty($_POST['question']) && !empty($_POST['point'] ) && !empty($_POST['reponse'])){
    $question=$_POST['question'];
    $point=$_POST['point'];
    $reponse=$_POST['reponse'];
   


     //la connexion a la base de donnée
    $cnx = getConnection();
     // preparation de la requete d'insertion
    $state = $cnx->prepare("INSERT INTO creerQuestion(question,point,reponse) VALUES(:question,:point,:reponse)");
      // execution de la requete preparée
    $result= $state->execute(array(

          "question"=>$question,
          "point"=>$point,
          "reponse"=>$reponse,
         

    ));


    if($result){
        $message="la question a été enrégistrée";

    }else{
        $message=" Echec d'enregitrement";
        
    }

    echo  $message;  

    

    }else{
        echo"<p style='color:red'><strong>Tous les champs sont obligatoire *!!</strong></p>";
    }
}
*/

?>



<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  </head>
  <body>
      
<style> span {color:red;font-size:10px; }</style>
     <div class="row justify-content-center mt-4">
     <div class="bg-white float-left col-lg-6 p-3 rounded-3"> 
            <div style="color:rgba(0, 128, 122, 0.774); text-align:center"><h4>PARAMETRER VOTRE QUESTION</h4></div>
            <div class="creer-question">
            <div id="result"></div>
                 <form action="" method="POST" id="myForm"><br>
                     <label for=""><strong>Question </strong></label>
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
            <input style="background-color:chocolate" type="submit" value="Enrégistrer" name="valider" id="validation">

          </div><!-- fin div creer question-->
      </div><!-- fin div bady-->
    
      </form>
      </div>
       <!-- jquery et ajax  pour validation -->
    
    <!-- Optional JavaScript -->
  
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../ASSET/JS/creer-question.js"></script> 
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
     integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Optional JavaScript -->
    
     <script src="../ASSET/JS/insert-test.js"></script>
  </body>
</html>