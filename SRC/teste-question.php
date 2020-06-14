<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <title>Hello, world!</title>
  </head>
  <body>

<style> span {color:red;font-size:10px; }</style>
     <div class="row justify-content-center mt-3">
     <div class="bg-white float-left col-lg-5 p-3 rounded-3"> 
            <div style="color:rgba(0, 128, 122, 0.774); text-align:center"><h4>PARAMETRER VOTRE QUESTION</h4></div>
            <div class="creer-question">
                 <form action="" method="POST" ><br>
                     <label for=""><strong>Question </strong></label>
                 <textarea name="question" id="question" cols="60" rows="5" style="border-radius:2px"></textarea><br>
                     <span id="question_error"></span><br>
                     <label for=""> <strong> Nbre de points</strong> </label>
                     <select style="width:50px;height:30px" name="point"  id="point">
                         <option > </option>
                         <option > 1</option>
                         <option >45</option>
                         <option >30</option>
                         <option >3</option>
                         <option >4</option>
                         <option >5</option>
                         <option >16</option>
                         <option >20</option>
                         <option>10</option>
                         <option>8</option>
                         <option >2</option>
                    </select> <br>                              
                     <span id="point_error"></span>

                 <div class="row" id="row_0">
                     <label for=""> <strong>Type de réponse</strong></label>
                     <select style="width:300px;height:40px" name="reponse" id="reponse">
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
     <script src="../ASSET/JS/creer-question.js"></script>
     <script src="../ASSET/JS/insert-test.js"></script>
  </body>
</html>