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
<link rel="stylesheet" href="liste-joueur.css">
<title>LISTE JOUEUR</title>
</head>
<body>
<div class=" bg-white float-left col-lg-5">
<?php

include("function.php");

$cnx = getConnection();
$state = $cnx->prepare("SELECT nom,prenom, score FROM `user`,score WHERE `role`='joueur' AND user.id=score.id ORDER BY 'score' DESC");
$state->execute();

$result =$state->fetchAll();


$colonne=array_column($result,"score");
array_multisort($colonne,SORT_DESC,$result);

/*echo "<pre>";
print_r($result);
echo"</pre>";*/

echo "<fieldset  class='border border-secondary mt-3'>";
echo "<table>";
echo '<td><strong> Nom  </strong></td>  <td><strong>Prenom  </strong></td>  <td><strong> Score </strong> </td>';

for ($i=0; $i <count($result); $i++) { 
        echo"<tr>";
        echo "<td> <br>".$result[$i]["nom"]."</td>";
        echo "<td> <br>".$result[$i]["prenom"]."</td>";
        echo "<td> <br>".$result[$i]["score"]."pts</td>";
        
        echo"</tr>";

}
echo"</table>";

echo" </fieldset>";
?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>