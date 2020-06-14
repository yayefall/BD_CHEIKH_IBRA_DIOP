<?php 
if(isset($_POST['suivant'])){

    $page=$_POST['next'];
    if($page+1 < 5 ){
    $pagesuivant =$page+1;
    //debut traitement



    //fin traitement
    header("location:./joueur.php?page=$pagesuivant");
    }else{
        //debut traitement


    
    //fin traitement




        header("location:./table-recap.php");
    }
}







if(isset($_POST['precedent'])){
    $page=$_POST['next'];
    $pageprecedent =$page-1;
    //debut traitement


    
    //fin traitement


    header("location:./joueur.php?page=$pageprecedent");
}
?>