<?php 

session_start();//connexion bdd	

require "lib/fonction/functions.php";

	try
	{
		$bdd = new PDO("mysql:host=localhost;dbname=hp;charset=utf8","root","");
	
	}
    catch(Exeption $e)
	{
		die("erreur de connection");
	}

define('WEBROOT',dirname(__FILE__));
define('BASE_URL',dirname($_SERVER['SCRIPT_NAME']));
define('ROOT',dirname(WEBROOT));
define('DS',DIRECTORY_SEPARATOR);
define('CORE',ROOT.DS.'core');



if(!isset($_GET['page']) || $_GET['page'] =="")
            $page = "pageco";
        else
        {
            if(!file_exists("contenu/".$_GET['page'].".php"))
            {
                $page = 404;
            }
            else
                $page = $_GET['page'];
        }
    
    
ob_start();

include "contenu/".$page.".php";
$content = ob_get_contents();
ob_end_clean();

require "layout.php";


?>