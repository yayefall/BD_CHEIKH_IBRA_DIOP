<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="../ASSET/CSS/user.css">
<link rel="stylesheet" href="../ASSET/CSS/liste-joueur.css">

<title>LISTE JOUEUR</title>
</head>
<body>
<div id="alert_message"></div>
<div class="row justify-content-center mt-4">
<div class=" bg-white  col-lg-6 text-center ">
<h4 class=" ">Liste des joueurs par leurs scores</h4>
  <div id="scrollZone" class="col">
<?php

include("function.php");

$cnx = getConnection();
$state = $cnx->prepare("SELECT user.id, nom,prenom, score FROM `user`,score WHERE `role`='joueur' AND user.id=score.id ORDER BY 'score' DESC");
$state->execute();

$result =$state->fetchAll();

$colonne=array_column($result,"score");
array_multisort($colonne,SORT_DESC,$result);

/*echo "<pre>";   
print_r($result);
echo"</pre>";*/

echo "<fieldset  class='border '>";
echo "<table class='table table-striped' id='user_data'>";
echo '<td><strong> Nom </strong></td> <td><strong>Prenom </strong></td> <td><strong> Score</strong> </td>
  <td><strong> modifier</strong> </td> <td><strong> supprimer </strong> </td>';
  
for ($i=0; $i <count($result); $i++) { 
 
        echo"<tr>";
        echo "<td> <br>".$result[$i]["nom"]."</td>";
        echo "<td> <br>".$result[$i]["prenom"]."</td>";
        echo "<td> <br>".$result[$i]["score"]. "pts</td>";
        echo' <td><button type="button" id="'.$result[$i]["id"].' " class="btn btn-warning btn-xs update text-white" data-toggle="modal" data-target="#myModal">Update</button></td>';
        echo' <td><button type="button" id="'.$result[$i]["id"].'" class="btn btn-danger btn-xs delete ">Delete</button></td>';
        echo"</tr>";

}
echo"</table>";

echo" </fieldset>";
?>
   </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="../ASSET/JS/liste-joueur.js"></script>

 <!-- /**************************************************************** */ -->
        
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="color:rgba(0, 128, 122, 0.774); text-align:center">MODIFIER LE JOUEUR</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="" method="post" id="myForm"  enctype="multipart/form-data" >
                <div class="content  "><img src="" alt="" id="output"></div>

                <label for="">Nom</label><br>
                <input type="text" name="nom" placeholder="nom" class="ma-groupA " id="nom" >
                <span id="nom_error" class="text-danger font-weight-bold"></span><br/>

                <label for="">Prenom</label><br>
                <input type="text" name="prenom" placeholder="prenom" class="ma-groupB  " id="prenom"  >
                <span id="prenom_error"  class="text-danger font-weight-bold"></span><br>

                <label for="">Login</label><br>
                <input type="text" name="login" placeholder="login" class="ma-groupC  " id="login" >
                <span id="login_error"  class="text-danger font-weight-bold"></span><br>

                <label for="">Password</label><br>
                <input type="password" name="password" placeholder="****" class="ma-groupD  " id="pass" >
                <span id="pass_error"  class="text-danger font-weight-bold"></span><br>

                <label for="">Confirmpass</label><br>
                <input type="password" name="password2" placeholder="****" class="ma-groupE " id="repass" >
                <span id="repass_error"  class="text-danger font-weight-bold"></span><br>

              
                <input type="file" name="file" id="file" style=" background-color: chocolate" class="ma-groupF form-control  " 
                 accept="image/*" onchange="loadFile(event)" >
                <span id="image_error"  class="text-danger font-weight-bold"></span>
                <input type="hidden" name="idJoueur" id="idJoueur" >

                <input type="hidden" name="sender" id="send" value="user">
                <input type="submit" name="compte"  value="Creer Compte"  id="compte" class="btn text-white font-italic "><hr>
                
            </form>
            
            <script> 
      var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
      </div>
      
 <!-- /**************************************************************** */ -->

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
<script>


$("#myForm").submit(function(e){
  e.preventDefault();
var form = new FormData();
var image = $('#file')[0].files[0];
var nom=$('#nom').val();
var prenom=$('#prenom').val();
var login=$('#login').val();
var password=$('#pass').val();
var idJoueur=$('#idJoueur').val();
var confirm=$('#repass').val();



form.append('file',image);
form.append('nom',nom);
form.append('prenom',prenom);
form.append('login',login);
form.append('password',password);    
form.append('confirm',confirm);
form.append('idJoueur',idJoueur);

 
  
    $.ajax({
     url:"update-joueur.php",
     method:"POST",
     contentType: false,
     processData: false,
     data:form,
     success:function(data){
       alert('Diadieuf fils modifié ngako nice')
      $("#myForm")[0].reset();
     }
     
    
    });

   });




</script>
    </div>
  </div>
</div>
</body>
</html>