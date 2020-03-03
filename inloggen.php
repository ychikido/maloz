
<html>
<head>
<title>log in</title>
<link rel="stylesheet" href="inc/style.css" type="text/css">
<script language="">
<!--
function cursor(){document.login.name.focus();}
// -->
</script>
</head>

<body bgcolor="#FFFFFF" text="#000000" onLoad=cursor()>
<img src="inc/title.gif" width="308" height="82">
<blockquote>
  <p><b>please login</b></p>
<table border="0" cellspacing="0" cellpadding="2">
  <form action="login.php" method="post" name=login>
    <tr>
      <td>Username</td>
      <td>
        <input type="Text" name="name" size="15">
      </td>
    </tr>
    <tr>
      <td height="6">Password</td>
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
<?php
include("inc/config.php");
$connection = mysql_connect($hostname, $user, $pass) or die ("Unable to connect!");
$query = "SELECT * FROM clients WHERE name = '$name' AND password = PASSWORD('$password')";
$result = mysql_db_query($database, $query, $connection);
if (mysql_num_rows($result) == 1)
    {
    session_start();

    session_register("client_id");
    session_register("client_name");
    session_register("client_email");
    session_register("client_ref");
    session_register("client_title");
    list($clientid, $name, $pass, $email, $ref, $title) = mysql_fetch_row($result);
    $client_id = $clientid;
    $client_name = $name;
    $client_email = $email;
    $client_ref = $ref;
    $client_title = $title;
    
    header("Location: menu.php");
    mysql_free_result ($result);    

    mysql_close($connection);
    }
else

    {
    mysql_free_result ($result);    
    mysql_close($connection);

    header("Location: index.htm");
    exit;
    }
?>