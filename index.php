<?php 	session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>MaLoz - Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link href='style.css' rel='stylesheet' type='text/css'>
        <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <meta name="description" content="">
        <meta name="keyword" content="">
        <meta charset="UTF-8">
        <meta name="robots" content="all">
        <meta name="language" content="dutch">
        <meta name="copyright" content="copyright">
    </head>
<body>

<?php   
      include ('db.php');
      $welkom = 'Welkom &nbsp;';
      if(!empty($_SESSION['voornaam'])){
        echo $welkom;
        echo ucfirst($_SESSION['voornaam']);
    } //else {
        //echo '';
        //print_r($_SESSION);
     }
?>

<img src="login.png" width="308" height="82">
<blockquote>
  <p><b>Inloggen</b></p>
<table border="0" cellspacing="0" cellpadding="2">
  <form action="home.php" method="post" name=login>
    <tr>
      <td>Gebruiksnaam</td>
      <td>
        <input type="Text" name="name" size="15">
      </td>
    </tr>
    <tr>
      <td height="6">Wachtwoord</td>
      <td height="6">
        <input type="password" name="password" size="15">
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="Submit" name="submit" value="Enter">
      </td>
    </tr>
  </form>
</table>
</blockquote>
</body>
</html>