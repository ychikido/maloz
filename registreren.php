<!DOCTYPE html>
<?php include(''); ?>
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
		<input type="text" required name="first" placeholder="Voornaam"/>
        <br><br>
		<input type="text" required name="last" placeholder="Achternaam"/>
        <br><br>
		<input type="text" required name="street" placeholder="Straat"/>
        <br><br>
		<input type="number" required name="number" placeholder="Huisnummer"/>
        <br><br>
		<input type="text" required name="zip" placeholder="Postcode"/>
        <br><br>
		<input type="text" required name="city" placeholder="Stad"/>
        <br><br>
        <input type="text" required name="country" placeholder="Land"/>
        <br><br>
		<input type="email" required name="email" placeholder="E-mail"/>
        <br><br>
		<input type="password" required name="password" placeholder="Wachtwoord"/>
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
    $first = htmlspecialchars($_POST['first']);
    $last = htmlspecialchars($_POST['last']);
    $email = htmlspecialchars($_POST['email']);
    $city = htmlspecialchars($_POST['city']);
    $street = htmlspecialchars($_POST['street']);
    $zip = htmlspecialchars($_POST['zip']);
    $number = htmlspecialchars($_POST['number']);
    $country = htmlspecialchars($_POST['country']);
    $username = $email;
    $password = htmlspecialchars($_POST['password']);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
	
	// Controleer of e-mail al bestaat (geen dubbele adressen)
	$sql= "SELECT * FROM user WHERE email = ?";
	$stmt = $link1->prepare($sql);
	$stmt->execute(array($email));
	$resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($resultaat) {
		$melding = "Dit e-mailadress is al geregisteerd";
        print_r ($melding);
	}else {
		$sql = "INSERT INTO user (first_name, last_name, email, username, password, city, street, zip_code, house_number, country)
                            VALUES ('$first','$last','$email','$email','$passwordHash','$city','$street','$zip','$number','$country')";
		$stmt= $link1->prepare($sql);
		try {
			$stmt->execute (array(
			$first,
			$last,
			$email,
			$city,
			$street,
			$zip,
            $number,
            $country,
            $username,
			$passwordHash,
            0,
            0)
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