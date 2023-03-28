<?php
error_reporting(E_ERROR | E_PARSE); /* Suppression d'un article */
ini_set('display_errors', '1');
require '../partials/header.php';
require 'database.php';
$id=$_SESSION['id'];
if ($_SESSION['id'])
{
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
    echo "<h2 class='marginMessage text-center'L'enregistement a bien été effacé !</h2>";		
    echo"<div class='text-center pt-3'><a href='../templates/newArticle.php'> <input type='button' value='Retour'  class='btn btn-primary mb-5'></a></center></div>";
}
else {
	echo "<h2 class='marginMessage text-center'>Vous ne vous êtes pas identifié !</h2>";
	echo"<script>setTimeout(function() {location.href='../templates/index.php'}, 5000);</script>"; 
}
require '../partials/footer.php';
