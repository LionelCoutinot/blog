<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
ini_set('display_errors', '1');
require '../partials/header.php';
require 'database.php';
$db = dbconnect();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = $_GET['id'];
/*var_dump($id);*/
try  { 
    $db->exec("DELETE FROM commentaires WHERE article_id=".$id);
	  $db->exec("DELETE FROM categorie_articles WHERE id_article=".$id);
	$db->exec("DELETE FROM articles WHERE articles.id=".$id); 
}					
catch(Exception $e)  {
    die('Erreur : '.$e->getMessage());
}
echo "<strong>L'enregistement a bien été effacé !</strong>";		
echo"<div class='text-center pt-3'><a href='../index.php'> <input type='button' value='Retour'  class='btn btn-primary mb-5'></a></center></div>";
  
  
require '../partials/footer.php';
