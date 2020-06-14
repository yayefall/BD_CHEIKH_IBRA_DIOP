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
    <link rel="stylesheet" href="../ASSET/CSS/user.css">
    

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container-fluid">
    <div class="row justify-content-center  ">
        <div class="card bg-white  col-lg-5  col-md-5 col-sm-5 ">
            <form action="" method="post" id="myForm"  enctype="multipart/form-data">
                <div class="content  "><img src="" alt="" id="output"></div>
                <label for="">Nom</label><br>
                <input type="text" name="nom" placeholder="nom" class=" " id="nom"> <hr>
                <label for="">Prenom</label><br>
                <input type="text" name="prenom" placeholder="prenom" class=" " id="prenom"><hr>
                <label for="">Login</label><br>
                <input type="text" name="login" placeholder="login" class=" " id="login"><hr>
                <label for="">Password</label><br>
                <input type="password" name="password" placeholder="****" class=" " id="pass"><hr>
                <label for="">Confirmpass</label><br>
                <input type="password" name="password2" placeholder="****" class="" id="repass"><br><br>
                <input type="file" name="image" value="" class="form-control  " id="image" style=" background-color: chocolate"
                accept="image/*"onchange="loadFile(event)"><br>
                <input type="hidden" id="send" value="<?= $_POST["send"]="user"?>">
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
        </div>
    </div>

</div>
<!--fin container ffluid-->

 <!--footer -->
<footer class="containers  bg-ms-4 fixed-bottom">
    <div class="container">
        <div class="row ">
            <div class="col text-center col-expand-md">
                <h1 class="text-capitalize text-white font-italic font-weight-light p-3">
                    s'inscrire pour jouer
                </h1>
            </div>
        </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
   <script src="../ASSET/JS/insertion.js"></script>
  </body>
</html>