<?php
error_reporting(E_ERROR |  E_PARSE); /* Sécurisation des données à enregistrer */
ini_set('display_errors', '1'); 
require '../partials/header.php';
require '../config/commandes.php';
$db = dbconnect();

 
function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }
$pseudo=valid_donnees($_POST['pseudo']);
$content=valid_donnees($_POST['content']);
   
  
		  



require '../partials/footer.php';
