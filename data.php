<?php 
session_start();//connexion bdd	
		
	try
	{
		$bdd = new PDO("mysql:host=localhost;dbname=hp;charset=utf8","root","");
	
	}
    catch(Exeption $e)
	{
		die("erreur de connection");
	}

?>
