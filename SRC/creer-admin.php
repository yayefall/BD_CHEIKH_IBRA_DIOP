<?php 
// include('function.php');
// if(isset($_POST['compte'])){
//     if(!empty($_POST['nom']) && !empty($_POST['prenom']) &&!empty($_POST['login']) && !empty($_POST['password']) && !empty($_FILES['image'])){

//         $nom=$_POST['nom'];
//         $prenom=$_POST['prenom'];
//         $login=$_POST['login'];
//         $password=$_POST['password'];

        

//  // on vérifie si limage est na pas d'erreur
//  if(isset($_FILES['image']) && $_FILES['image']['error']==0)
//  {
         
       

//          $infosImage=pathinfo($_FILES['image']['name']);//c'est l'information de  l'image
//          // cad infoimage= photo.jpeg

//          $extensionImage=$infosImage['extension'];//c'est l'extention de l'image cad jpeg, png , jpg

//          $extensionAutorisee=[ "jpeg","jpg","png"];// tableau de l'extention (jpeg jpg png) autorisée

//          if(in_array($extensionImage,$extensionAutorisee))//on verifie si $extensionImage se trouve dans $extentionAutorisee

//          {
//           //on peut valider le fichier et le stocker définitivement       
//            move_uploaded_file($_FILES['image']['tmp_name'],'../IMAGE/'.basename($_FILES['image']['name']));

//            $cheminImage= '../IMAGE/'.basename($_FILES['image']['name']);// chemin de l'image a enregistre dans le cerveur
//          }else
//            {
//               echo "cette extention n'est pas autorisée";

//            }
         

     
//  }else
//    {
//            echo" il y'a erreur d'image";
//    }
    



//           //la connexion a la base de donnée
//           $cnx = getConnection();
//           // preparation de la requete d'insertion
//           $state = $cnx->prepare("INSERT INTO user(login,nom,prenom,password,avatar,role) VALUES (:login,:nom,:prenom,:password,:avatar,:role)");
//           // la liaison de chaque  attribut a une valeur
         
//            // execution de la requete preparée
//            $result= $state->execute(array(
  
//               "login"=>$login,
//               "nom"=>$nom,
//               "prenom"=>$prenom,
//               "password"=>$password,
//               "avatar"=>$cheminImage,
//               "role"=>"admin"
  
//            ));
  
         
//           if($result){
//               $message="l'inscription a été réussit";
  
//               header('location:../SRC/menu.php?user=liste-question');
  
//           }else{
//               $message=" Echec d'enregitrement";
              
//           }
  
//           echo  $message;  
  
  

//         }else{
//             echo"<p style='color:red'><strong>tous les champs sont obligatoire*!</strong></p>";
//         }
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" href="../ASSET/CSS/admin.css">
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<title>CREER ADMIN</title>
</head>
<body>
    
      <!--container fluid -->
     <!-- <div class="container-fluid">-->
      <div class="row justify-content-center mt-4">
        <div class="card bg-white  col-lg-5  col-md-5 col-sm-5 ">
        <form action="" method="post" id="myForm"  enctype="multipart/form-data" >
                <div class="content  "><img src="" alt="" id="output"></div>

                <label for="">Nom</label><br>
                <input type="text" name="nom" placeholder="nom" class="ma-groupA " id="nom">
                <span id="nom_error" class="text-danger font-weight-bold"></span><br/>

                <label for="">Prenom</label><br>
                <input type="text" name="prenom" placeholder="prenom" class="ma-groupB  " id="prenom">
                <span id="prenom_error"  class="text-danger font-weight-bold"></span><br>

                <label for="">Login</label><br>
                <input type="text" name="login" placeholder="login" class="ma-groupC  " id="login">
                <span id="login_error"  class="text-danger font-weight-bold"></span><br>

                <label for="">Password</label><br>
                <input type="password" name="password" placeholder="****" class="ma-groupD  " id="pass">
                <span id="pass_error"  class="text-danger font-weight-bold"></span><br>

                <label for="">Confirmpass</label><br>
                <input type="password" name="password2" placeholder="****" class="ma-groupE " id="repass">
                <span id="repass_error"  class="text-danger font-weight-bold"></span><br>

              
                <input type="file" name="image" id="image" style=" background-color: chocolate" class="ma-groupF form-control  " 
                 accept="image/*" onchange="loadFile(event)">
                <span id="image_error"  class="text-danger font-weight-bold"></span>

                <input type="hidden" name="sender" id="send" value="admin">
                <input type="submit" name="compte"  value="Créer compte"  id="compte" class="btn text-white font-italic "><hr>
                
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
<script src="../ASSET/JS/creer-admin.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
 integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <!-- link page javascript -->
       <!-- link page javascript -->

<script src="../ASSET/JS/insert-admin.js"></script>
</body>
</html>