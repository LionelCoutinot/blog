<?php
/***** SUPPRESSION D'UN COMMENTAIRE  *****/
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
        $db->exec("DELETE FROM commentaires WHERE id=".$id);	    
    }					
    catch(Exception $e)  {
    die('Erreur : '.$e->getMessage());
    } ?>
    <div class="bg-white mb-5 containerback">
        <div class="row">
            <div class="col-12 text-center answer">	
                <h2>Le commentaire vient d'être effacé. Vous allez être redirigé dans quelques instants !</h2>
                <?php echo"<script>setTimeout(function() {location.href='../templates/newArticle.php'}, 6000);</script>";?>                   
            </div>
        </div>
    </div>
<?php }
else {	?>
	<div class="bg-white mb-5 containerback">	
		<div class="row">
			<div class="col-12 text-center answer">	
				<h2>Vous ne vous êtes pas identifié !</h2>
				<?php echo"<script>setTimeout(function() {location.href='../templates/index.php'}, 5000);</script>";?>    
			</div>
		</div>
	</div>
<?php }
require '../partials/footer.php';
