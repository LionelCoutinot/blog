<?php
/***** SUPPRESSION D'UN ARTICLE *****/
/* error_reporting(E_ERROR | E_PARSE | E_WARNING);
ini_set('display_errors', '1'); */

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
    } ?>
    <div class="bg-white mb-5 containerback">
        <div class="row">
            <div class="col-12 text-center answer">	
                <h2>L'article vient d'être effacé. Vous allez être redirigé dans quelques instants !</h2>
                <?php echo"<script>setTimeout(function() {location.href='../templates/newArticle.php'}, 6000);</script>";?>                   
            </div>
        </div>
    </div>
<?php
}
else {
	echo "<h2 class='answer text-center'>Vous ne vous êtes pas identifié !</h2>";
	echo"<script>setTimeout(function() {location.href='../templates/index.php'}, 5000);</script>"; 
}
require '../partials/footer.php';
