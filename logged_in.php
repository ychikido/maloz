<?php
	session_start();
    //include("index.html");
    if(!empty($_SESSION['voornaams'])){
        echo '<a href="home.php">link</a></br>';
        echo $_SESSION['voornaam'];
    } else {
        echo '';
        print_r($_SESSION);
    }
?>