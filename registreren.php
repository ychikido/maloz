<!DOCTYPE html>
<?php // include(''); ?>
<html lang="nl">
	<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
		<title>MaLoz - Registreren</title>
		<link rel="stylesheet" href="" />
    </head>
	<body>
	<div class="content">
	<form name="registeren" class="form" method="POST" >
        <h1 id="pagina_titel">Registreren</h1>
		<input type="text" required name="voornaam" placeholder="Voornaam"/>
        <br><br>
		<input type="text" name="tussenvoegsel" placeholder="Tussenvoegsel"/>
        <br><br>
		<input type="text" required name="achternaam" placeholder="Achternaam"/>
        <br><br>
		<input type="text" required name="nummer" placeholder="Telefoonnummer"/>
        <br><br>
		<input type="text" required name="functie" placeholder="Functie"/>
        <br><br>
		<input type="text" required name="gebruikersnaam" placeholder="Gebruikersnaam"/>
        <br><br>
		<input type="password" required name="wachtwoord" placeholder="Wachtwoord"/>
		<br><br>
		<div class="icon_container">
		
        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" class="icon" id="submit" name="submit" value="Submit"/>
		</div>
		<a class="btn btn-outline-danger my-2 my-sm-0" href="index.php">Back</a>
	</form>
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