
<?php
session_start();
      include("SRC/function.php");

 if(isset ($_POST['bouton'])){

    if(!empty($_POST['login']) && !empty($_POST['password']))
    {
        $login=$_POST['login'];
        $password=$_POST['password'];

        $cnx = getConnection();
        $state = $cnx->prepare("SELECT * FROM `user` WHERE `login` LIKE  '".$login."' AND `password` LIKE '".$password."' ");
        $state->execute();
        $result =$state->fetchAll();
        if (!empty($result)) {
            $_SESSION['user']=$result[0];
            # User exite
            if($result[0]['role']=="admin"){
                //page  compte admin
                $_SESSION["admin"]=$result[0]['avatar'];
                header('location:./SRC/menu.php?user=liste-joueur');
            }else{
                //page joueur      
                header('location:./SRC/joueur.php?page=0');
            }   
        }else{
            // User n'existe pas 
            echo " <p style='color:red'><strong>Cet utilisateur n'existe pas , veuillez vous inscrire.</strong></p>"; 
        }
    }else{
        echo"<p style='color:red'><strong>Tous les champs sont obligatoire *!!</strong></p>";
    }
}
?>



<!doctype html>
<html lang="en">
  <head>
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7cc22476cb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./ASSET/CSS/page.css">
    <title>PAGE DE CONNEXION</title>
  </head>
  <body>
<!--container fluid -->
<div class="container-fluid ">
    <!--row-->
<div class="row  justify-content-center ">
<!-- Material form login -->
<div class="card bg-light col-lg-5  mt-5 col-md-5 col-sm-5">

  <h5 class="card-header  white-text text-center py-4 ">
    <strong>HOME PAGE</strong>
  </h5>
<div id='test'></div>
  <!--Card content-->
  <div class="card-body px-lg-5 pt-0 ">

    <!-- Form -->
    <form  id="myForm" class="text-center" style="color: #757575;" action=""  method="post">

      <!-- Email -->
      <div class="md-form ">
        <label for="materialLoginFormEmail">E-mail</label>
        <input type="email" id="materialLoginFormEmail" class="form-control " name="login" placeholder="Email">
        
      </div>

      <!-- Password -->
      <div class="md-form">
        <label for="materialLoginFormPassword">Password</label>
        <input type="password" id="materialLoginFormPassword" class="form-control " name="password" placeholder="*****">
        
      </div>

      <div class="d-flex justify-content-around">
        <div>
          <!-- Remember me -->
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
            <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
          </div>
        </div>
        <div>
          <!-- Forgot password -->
          <a href="">Forgot password?</a>
        </div>
      </div>

      <!-- Sign in button -->
      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0 " type="submit" name="bouton" >connexion</button>
     <a href="./SRC/user.php"> <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="button">S'inscrire pour jouer</button></a>

      <!-- Register -->
      <p>Not a member?
        <a href="">Register</a>
      </p>

      <!-- Social login -->
      <p>or sign in with:</p>
      <a type="button" class="btn-floating btn-fb btn-sm">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a type="button" class="btn-floating btn-tw btn-sm">
        <i class="fab fa-twitter"></i>
      </a>
      <a type="button" class="btn-floating btn-li btn-sm">
        <i class="fab fa-linkedin-in"></i>
      </a>
      <a type="button" class="btn-floating btn-git btn-sm">
        <i class="fab fa-github"></i>
      </a>

    </form>
    <!-- Form -->
<script>
    
/*$(function(){

$("#myForm").validate({

    rules:{
        login:{
            required:true,
            login:true
            },
        password:"required",
         password2:{
                required:true,
                equalTo:"#password"
    },
    messages:{
        login:{
            required:"SVP entrer une adresse email.",
            login:"SVP entrer un email valide."
        },
         password:{
                required:"SVP entrer votre password *!",
            }
    }

});

});*/
</script>
  </div>

</div>
<!-- Material form login -->

</div>
<!-- fin row -->
</div>
<!--container fluid -->
    <!--footer -->
<footer class="containers  bg-ms-4 fixed-text fixed-bottom">
    <div class="container">
        <div class="row ">
            <div class="col text-center col-expand-md">
<h1 class="text-capitalize text-white font-italic font-weight-light p-3">
    bienvenue champion!!! sur la plateforme de yaye fall dev
</h1>


            </div>
        </div>
    </div>
</footer>
     <!--fin footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<!-- jquery et ajax  pour validation -->
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
    <!-- link page javascript -->
    <script src="./ASSET/JS/page.js"></script>
  </body>
</html>