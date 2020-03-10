<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="style.css" rel="stylesheet" style="text/css">
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<body>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>Login</h1>
						 </div>
					</div>
                   <form action="" method="post" name="login">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Gebruikersnaam</label>
                              <input type="name" name="gebruikersnaam"  class="form-control" placeholder="Vul hier gebruikersnaam in">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Wachtwoord</label>
                              <input type="password" name="password"  class="form-control" placeholder="Vul hier wachtwoord in">
                           </div>
                           <div class="col-md-12 text-center ">
                              <button type="submit" name="submit" class="btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or">of</span>
                              </div>
                           </div>
                           <div class="form-group">
                              <p class="text-center">Heeft u nog geen account? <a href="/maloz/registreren.php" id="signup">Registreer hier</a></p>
                           </div>
                        </form>
                 
				</div>
			</div>
		</div>
      </div>   

<?php
include('db.php');
require_once('db.php');
if(!empty($_POST['submit'])){
   $gebruikersnaam = mysqli_real_escape_string($link,$_POST['gebruikersnaam']);
   $wachtwoord = mysqli_real_escape_string($link,$_POST['wachtwoord']);
   
   // echo "$gebruikersnaam $wachtwoord";
   
   // $wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
   $query = "SELECT * FROM account WHERE gebruikersnaam = '$gebruikersnaam'";
   // wachtwoord = '$wachtwoord' AND 
   // echo '<br>' . $query . '<br>';
   $result = mysqli_query($link, $query);
   
   $nr_rows = mysqli_num_rows($result);
   // echo $nr_rows;
   
   if($nr_rows == 1){
      $row = mysqli_fetch_assoc($result);
      echo '<br>' . $row["password"] . '<br>';
      if (password_verify($wachtwoord , $row["password"])) {
         echo 'Password is valid!';
         $_SESSION['voornaam'] = $row['voornaam'];
         // echo '<script>window.location.href = "logged_in.php"</script>;';  
                 echo '<script>window.location.href = "home.php"</script>;';                           
      } else {
         echo 'Invalid password.';
      }
   } else {
      //error
   }
}
?>
</body>
</html>