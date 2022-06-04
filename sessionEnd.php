<?php 
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    ini_set('display_errors', '1');      
    require 'partials/header.php'; 
    session_unset();
    ?>
    
    <div class="bg-white mb-5 containerback">	
	    <div class="row">
		    <div class="col-12 text-center endSession">	
                <h2> Vous venez de vous déconnecter. Vous allez être redirigé dans quelques instants !</h2>
                <?php echo"<script>setTimeout(function() {location.href='index.php'}, 6000);</script>";?>                   
            </div>
        </div>
    </div>
 
        


<?php
require 'partials/footer.php';
?>