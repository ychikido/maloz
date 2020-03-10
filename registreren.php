<!DOCTYPE html>
<html lang="nl">
	<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link href="style.css" rel="stylesheet" style="text/css">
        <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
		<title>MaLoz - Registreren</title>
		<link rel="stylesheet" href="" />
    </head>
	<body>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>Registreren</h1>
						 </div>
					</div>
                   <form action="" method="post" name="Registreren">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Voornaam</label>
                              <input type="name" required name="voornaam" class="form-control" id="email" placeholder="Vul hier gebruikersnaam in">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Tussenvoegsel</label>
                              <input type="name" name="tussenvoegsel" class="form-control" placeholder="Vul hier tussenvoegsel in">
                           </div>
						   <div class="form-group">
                              <label for="exampleInputEmail1">Achternaam</label>
                              <input type="name" required name="achternaam" class="form-control" placeholder="Vul hier achternaam in">
                           </div>
						   <div class="form-group">
                              <label for="exampleInputEmail1">Telefoonnummer</label>
                              <input type="text" required name="nummer" class="form-control" placeholder="Vul hier telefoonnummer in">
                           </div>
						   <div class="form-group">
                              <label for="exampleInputEmail1">Functie</label><br>
							  <select id="functie" class="form-control" required name="functie">
							  <option value="" disabled selected>Kies een functie</option>
    						  <option value="Beheerder">Beheerder</option>
							  <option value="Gebruiker">Gebruiker</option>
							  <option value="Eerstelijns">Eerstelijns</option>
							  <option value="Tweedelijns">Tweedelijns</option>
							  <option value="Derdelijns">Derdelijns</option>
							  </select>
                           </div>
						   <div class="form-group">
                              <label for="exampleInputEmail1">Gebruikersnaam</label>
                              <input type="name" required name="gebruikersnaam" class="form-control" placeholder="Vul hier gebruikersnaam in">
                           </div>
						   <div class="form-group">
                              <label for="exampleInputEmail1">Wachtwoord</label>
                              <input type="password" required name="wachtwoord" class="form-control" placeholder="Vul hier wachtwoord in">
                           </div>
                           <div class="col-md-12 text-center ">
                              <button class="btn btn-block mybtn btn-primary tx-tfm" type="submit" class="icon" id="submit" name="submit" value="Submit">Registreer</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                              </div>
                           </div>
                        </form>
				</div>
			</div>
		</div>
      </div>

<?php 
include("db.php");
require_once('db.php');
if(isset($_POST["submit"])){
	$melding ="";
    $voornaam = htmlspecialchars($_POST['voornaam']);
    $tussenvoegsel = htmlspecialchars($_POST['tussenvoegsel']);
    $achternaam = htmlspecialchars($_POST['achternaam']);
    $nummer = htmlspecialchars($_POST['nummer']);
    $functie = htmlspecialchars($_POST['functie']);
    $gebruikersnaam = htmlspecialchars($_POST['gebruikersnaam']);
    $wachtwoord = htmlspecialchars($_POST['wachtwoord']);
    $passwordHash = password_hash($wachtwoord, PASSWORD_DEFAULT);
	
	// Controleer of gebruikersnaam al bestaat (geen dubbele gebruikersnaam)
	$sql= "SELECT * FROM account WHERE gebruikersnaam = ?";
	$stmt = $link1->prepare($sql);
	$stmt->execute(array($gebruikersnaam));
	$resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($resultaat) {
		$melding = "Gekozen gebruikersnaam is al in gebruik";
        print_r ($melding);
	}else {
        // , 
        $date = date("Y-m-d");
		$sql = "INSERT INTO account (idAccount, voornaam, tussenvoegsel, achternaam, telefoonnummer, functie, gebruikersnaam, wachtwoord, aangemaakt, laatste_login)
                 VALUES (NULL,'$voornaam','$tussenvoegsel','$achternaam','$nummer','$functie','$gebruikersnaam','$passwordHash', '$date', '$date')";
		$stmt= $link1->prepare($sql);
		try {
			$stmt->execute (array(
            NULL,
			$voornaam,
			$tussenvoegsel,
			$achternaam,
			$nummer,
			$functie,
			$gebruikersnaam,
			$passwordHash,
            $date,
            $date)
            );
			$melding = "Nieuw account aangemaakt.";
		}catch(PDOException $e) {
			$melding = "Kon geen account aanmaken.";
			echo $e->getMessage();
		}
		echo "<div id='melding'>".$melding."</div>";
	}
}     
?>       
</body>
</html>