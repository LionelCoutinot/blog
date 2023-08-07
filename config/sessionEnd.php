<?php 
  /***** DÉCONNECTION ET FIN DE SESSION *****/
    /* error_reporting(E_ERROR | E_PARSE | E_WARNING);
    ini_set('display_errors', '1'); */
         
    require '../partials/header.php'; 
    session_unset(); /* Fin de session */
    ?>
    
    <div class="bg-white mb-5 containerback">	
	    <div class="row">
		    <div class="col-12 text-center answer">	
                <h2> Vous venez de vous déconnecter. Vous allez être redirigé dans quelques instants !</h2>
                <?php echo"<script>setTimeout(function() {location.href='../templates/index.php'}, 6000);</script>";?>                   
            </div>
        </div>
    </div>
 
        


<?php
require '../partials/footer.php';
?>