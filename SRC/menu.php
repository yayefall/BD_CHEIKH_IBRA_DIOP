<?php
session_start();
//Var_dump($_SESSION);
    /*if (empty($_SESSION['admin'])) {
     header('location:../index.php');
        exit();//bloquer tout
    }*/


 
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
    <link rel="stylesheet" href="../ASSET/CSS/user.css">
    

    <title>MENU</title>
  </head>
  <body>
      <!--container fluid -->
<div class="container-fluid">
    <!--NAV-->

<div class="navbar navbar-expand-md  p-3 " style=" background-color:chocolate">
<div class="button">
   <a class="btn text-light font-weight-bold bg-secondary" href="Deconnexion.php">Deconnexion</a>
</div>

<ul class="navbar-nav ">

<li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppcase px-4" href="menu.php?user=creer-admin">Créer Admin</a></li>
<li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppcase px-4" href="menu.php?user=liste-question">Liste Question</a></li>
<li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppcase px-4" href="menu.php?user=liste-joueur">Liste joueur</a></li>
<li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppcase px-4" href="menu.php?user=creer-question">Créer Question</a></li>
<li class="nav-item"><a class="nav-link text-light font-weight-bold text-uppcase px-4" href="menu.php?user=tableau-bord">Tableau de Bord</a></li>

</ul>
</div>

<div>
    <?php 

if(isset($_GET['user'])) {

    if($_GET['user']=="creer-admin"){
       require_once("creer-admin.php");
   }

   if($_GET['user']=="liste-joueur"){
    require_once("liste-joueur.php");

   }

   if($_GET['user']=="liste-question"){
    require_once("liste-question.php");

   }

   if($_GET['user']=="creer-question"){
    require_once("creer-question.php");

   }

   if($_GET['user']=="tableau-bord"){
    require_once("tableau-bord.php");

   }
}
?>
</div>


<div class="container col-lg-5">

<div class="  mx-auto col-md-5 "><img class='rounded rounded-circle' height='30%' width='100%' src="<?php echo $_SESSION["user"]["avatar"]  ?>" alt=""></div> 
<div class=" text-dark bg-white font-weight-bold col-md-5 mx-auto  "><?php  echo  $_SESSION["user"]["prenom"] ;?>  <?php  echo  $_SESSION["user"]["nom"] ;?></div>

</div>


    <!-- fin NAV-->

</div>
<!--fin container ffluid-->

 <!--footer -->
<footer class="containers  bg-ms-4 fixed-bottom">
    <div class="container">
        <div class="row ">
            <div class="col text-center col-expand-md">
                <h1 class="text-capitalize text-white font-italic font-weight-light p-3">
                    Créer et parametrer votre jeux
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
  </body>
</html>

<?php



?>