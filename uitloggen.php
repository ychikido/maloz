<?php
//Controleren of de gebruiker wil uitloggen
if(isset($_POST['uitloggen']))
{

    //Sessie update in de database
    $qLog = "UPDATE login SET sessie='', ip='', useragent='' WHERE sessie='".mysql_real_escape_string($_SESSION['login'])."' AND ip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."'";
    $qLogs = mysql_query($qLog);

    //Controleren of de naam goed is opgehaald uit de database
    if($qLogs === false)
    {
        echo $sError[1];
    }
    else
    {

        //Sessie legen
        if (isset($_SESSION['login']))
        {
            unset($_SESSION['login']);
        }
        session_destroy();
        
        //Redirect naar de inlog pagina
        header('Refresh: 0; url=../index.php');
    }
}?>