<?php
//database
$dbhost = 'localhost';
$dbuser = 'root'; 
$dbww = '';
$dbname = 'maloz'; 

$link = mysqli_connect($dbhost, $dbuser, $dbww, $dbname);

if (mysqli_connect_errno($link)) {
    printf("Connect failed: %s\n", mysqli_connect_error($link));
    exit();
}
if (!$link) {
    echo "Error: Unable to connect to MySQL.<br>";
    echo "Debugging errno: " . mysqli_connect_errno($link) . '<br>';
    echo "Debugging error: " . mysqli_connect_error($link) . '<br>';
    exit;
}

 try {
	  $link1 = new PDO(
	  "mysql:host=localhost;dbname=maloz",
	  $dbuser,$dbww);
	  $link1->setAttribute(
	  PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
	  echo $e->getMessage();
  }

?>