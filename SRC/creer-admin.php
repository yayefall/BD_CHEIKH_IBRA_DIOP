<?php 
include('function.php');
if(isset($_POST['compte'])){
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) &&!empty($_POST['login']) && !empty($_POST['password']) && !empty($_FILES['image'])){

        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $login=$_POST['login'];
        $password=$_POST['password'];

        

 // on vérifie si limage est na pas d'erreur
 if(isset($_FILES['image']) && $_FILES['image']['error']==0)
 {
         
       

         $infosImage=pathinfo($_FILES['image']['name']);//c'est l'information de  l'image
         // cad infoimage= photo.jpeg

         $extensionImage=$infosImage['extension'];//c'est l'extention de l'image cad jpeg, png , jpg

         $extensionAutorisee=[ "jpeg","jpg","png"];// tableau de l'extention (jpeg jpg png) autorisée

         if(in_array($extensionImage,$extensionAutorisee))//on verifie si $extensionImage se trouve dans $extentionAutorisee

         {
          //on peut valider le fichier et le stocker définitivement       
           move_uploaded_file($_FILES['image']['tmp_name'],'../IMAGE/'.basename($_FILES['image']['name']));

           $cheminImage= '../IMAGE/'.basename($_FILES['image']['name']);// chemin de l'image a enregistre dans le cerveur
         }else
           {
              echo "cette extention n'est pas autorisée";

           }
         

     
 }else
   {
           echo" il y'a erreur d'image";
   }
    



          //la connexion a la base de donnée
          $cnx = getConnection();
          // preparation de la requete d'insertion
          $state = $cnx->prepare("INSERT INTO user(login,nom,prenom,password,avatar,role) VALUES (:login,:nom,:prenom,:password,:avatar,:role)");
          // la liaison de chaque  attribut a une valeur
         
           // execution de la requete preparée
           $result= $state->execute(array(
  
              "login"=>$login,
              "nom"=>$nom,
              "prenom"=>$prenom,
              "password"=>$password,
              "avatar"=>$cheminImage,
              "role"=>"admin"
  
           ));
  
         
          if($result){
              $message="l'inscription a été réussit";
  
              header('location:../SRC/menu.php?user=liste-question');
  
          }else{
              $message=" Echec d'enregitrement";
              
          }
  
          echo  $message;  
  
  

        }else{
            echo"<p style='color:red'><strong>tous les champs sont obligatoire*!</strong></p>";
        }
}

?>


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
<link rel="stylesheet" href="../ASSET/CSS/admin.css">
<title>CREER ADMIN</title>
</head>
<body>
    
      <!--container fluid -->
      <div class="container-fluid">
      <div class="row justify-content-center  ">
        <div class="card bg-white  col-lg-5  col-md-5 col-sm-5 ">
            <form action="" method="post" id="myForm"  enctype="multipart/form-data">
                <div class="content "><img src="" alt="" id="output"></div>
                <label for="">Nom</label><br>
                <input type="text" name="nom" placeholder="nom" id="nom" class="form-control col-md-6 col-xs-12  col-sm-12"> <hr>
                <label for="">Prenom</label><br>
                <input type="text" name="prenom" placeholder="prenom" id="prenom" class=" "><hr>
                <label for="">Login</label><br>
                <input type="text" name="login" placeholder="login" id="login" class=" "><hr>
                <label for="">Password</label><br>
                <input type="password" name="password" id="password" placeholder="****" class=" "><hr>
                <label for="">Confirmpass</label><br>
                <input type="password" name="password2" id="password2" placeholder="****" class=""><br><br>
                <input type="file" name="image" value="" class="form-control  " style=" background-color: chocolate"
                accept="image/*"onchange="loadFile(event)"><br>
                <input type="submit" name="compte"  value="Créer compte" id="compte" class="btn text-white font-italic "><hr>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <!-- jquery et ajax  pour validation -->
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
    
    <!-- link page javascript -->
       <!-- link page javascript -->
<script src="../ASSET/JS/creer-admin.js"></script>
</body>
</html>