<?php session_start();

include("function.php"); 

$_SESSION['totalq']= $_COOKIE['fixe_question'];
//echo $_SESSION['totalq'];

?>


<!doctype html>
<html lang="en">
  <head>

  <style>

      
  #scrollZone{
    max-height: 400px;
    overflow: scroll;
}

  </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7cc22476cb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../ASSET/CSS/user.css">

    <title>PAGE JOUEUR</title>
  </head>
  <body>
      <!--container fluid -->
<div class="container-fluid">
    <div class="navbar bg-secondary ">
        <div class="button">
        <a class="btn text-light font-weight-bold " href="Deconnexion.php">Deconnexion</a>
        </div>

         <div class="button">
            <div class="  mx-auto col-md-4 "><img class='rounded rounded-circle' height='15%' width='30%' src="../IMAGE/<?php echo $_SESSION["user"]["avatar"]  ?>" alt=""></div> 
            <div class=" text-white font-weight-bold col-md-5 mx-auto  "><?php  echo  $_SESSION["user"]["prenom"] ;?>  <?php  echo  $_SESSION["user"]["nom"] ;?></div>
        </div>

        <div class="button">
          <a class="btn text-light font-weight-bold " href="table-recap.php">Quitter</a>
        </div>

    </div>
    <!-- navbar-->
    <div class="row">
    <div class="rounded rounded-top col-lg-5 bg-white mt-4 ml-3" >
   <h3 class="row justify-content-center">Question <?php echo ($_GET['page']+1). "/". $_COOKIE["fixe_question"];?></h3><hr>
   
<fieldset class="border  border-warning">
<div class="col" id="">
    <form action="./corriger.php" method="post">
        <input type="hidden" name="next" value="<?php echo $_GET['page'] ;?>">
<?php
    

$cnx=getConnection();

if (!$cnx){ // Contrôler la connexion

     $MessageConnexion = die ("connection impossible");
    }else{
        $montableau =[];
        $afiche = $cnx->prepare("SELECT * FROM `creerquestion`");
        $afiche->execute();
        $montableau= $afiche->fetchAll();
     

 
    if ($montableau[$_GET['page']]['reponse']=="texte") { //debut choix text
        $idquestion=$montableau[$_GET['page']]['id'];
        ?>
        <label for=""><?php echo $montableau[$_GET['page']]['question']   ?></label><br><br><br><br>
       <label > <?php echo $montableau[$_GET['page']]['point'] ?>pts</label><br><br><br><br>
       
        <?php
      /*  $monreponse =[];
        $afiche = $cnx->prepare("SELECT reponses,etat FROM reponsequestion WHERE id_creerquestion=:id");
    
        $afiche->execute(['id'=>$idquestion]);
        $monreponse =$afiche->fetchAll();*/
        ?>
        <input type="text" name="question" id="" value=""><br><br>
        <?php
        } // fin choix texte

        elseif ($montableau[$_GET['page']]['reponse']=="multiple") { //debut choix multiple
            $idquestion=$montableau[$_GET['page']]['id'];
            ?>
            <label for=""><?php echo $montableau[$_GET['page']]['question']   ?></label><br><br>
            <label > <?php echo $montableau[$_GET['page']]['point']?>pts</label><br><br>
            <?php

           $monreponse =[];
            $afiche = $cnx->prepare("SELECT reponses,etat FROM reponsequestion WHERE id_creerquestion=:id ");
            
            $afiche->execute(['id'=>$idquestion]);
            $monreponse =$afiche->fetchAll();
            //on parcourt nos differents reponses
            for ($j=0; $j < count($monreponse) ; $j++) { 
                ?>
            <input type="checkbox"  name="" id=""><label for=""><?php echo $monreponse[$j]['reponses'] ;?></label></br><br>

            <?php
           }

        }// fin choix multiple
          else{
            $idquestion=$montableau[$_GET['page']]['id'];
            ?>
           <label for=""><?php echo $montableau[$_GET['page']]['question']   ?></label><br><br>
           <label for=""><?php echo $montableau[$_GET['page']]['point']   ?>pts</label><br><br>
            <?php
            $reponse2 =[];
            $afiche = $cnx->prepare("SELECT reponses,etat FROM reponsequestion WHERE id_creerquestion=:id ");
            
            $afiche->execute(['id'=>$idquestion]);
            $reponse2 =$afiche->fetchAll();
            //on parcourt nos differents reponses
            for ($j=0; $j < count($reponse2) ; $j++) { 
                ?>
            <input type="radio"  name="vrais" id=""><label for=""><?php echo $reponse2[$j]['reponses'] ;?></label></br><br>

            <?php
            

            }
        }
        




}

?>

</div>
<div class="row">
    
    <?php 
    if($_GET['page'] >0) {
     ?>
   <input type="submit" name="precedent"  id="suivant" value="Précédent"> &nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <?php 
    }

    if($_GET['page']<( $_COOKIE["fixe_question"]-1) )
    {
     ?>
   <input type="submit" name="suivant" id="suivant" value="Suivant">
   <?php 
    }else{
   
     ?>
        <input type="submit" name="suivant" id="suivant" value="Terminer">
    <?php 
    }
     ?>

</div>
</form>
</fieldset>



    </div>





<!-- rounded-->

<div class=" bg-white fl-5 col-lg-3 ml-5 mt-4" height='500px' width='100px'>
<h4 class="row  justify-content-center text-warning">Top Score</h4>
<fieldset class=" border border-warning">
<?php


$cnx = getConnection();
$state = $cnx->prepare("SELECT user.id, nom,prenom, score FROM `user`,score WHERE `role`='joueur' AND user.id=score.id  ORDER BY score DESC");
$state->execute();

$result =$state->fetchAll();
/*echo"<pre>";
print_r($result);
  echo"</pre>";*/
//$colonne=array_column($result,"score");
//array_multisort($colonne,SORT_DESC,$result);
echo "<table  class='table table-striped'>";
echo "<td><strong>  Nom </strong></td> <td><strong>  Prenom </strong></td> <td><strong> Score  </strong> </td>";
  
for ($i=0; $i<5; $i++) { 
        echo"<tr>";
        echo "<td> <br>".$result[$i]["nom"]."</td>";
        echo "<td> <br>".$result[$i]["prenom"]."</td>";
        echo "<td> <br>".$result[$i]["score"]. "pts </td>";
        echo"</tr>";
    }

echo"</table>";

?>
</fieldset>
</div>
</div><!-- row-->
</div>
<!--fin container fluid-->

 <!--footer -->
<footer class="containers  bg-ms-4 ">
    <div class="container">
        <div class="row ">
            <div class="col text-center col-expand-md">
                <h1 class="text-capitalize text-white font-italic font-weight-light p-3">
                    tester votre culture générale
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
    <script src="../ASSET/JS/joueur.js"></script>
  </body>
</html>