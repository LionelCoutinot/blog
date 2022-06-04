<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
require 'config/commandes.php';
require 'partials/header.php'; 
$results = getContacts();


?>
<div class="row py-5">
	<?php foreach($results as $result){ ?>
 		<div class="col-12 col-md-8  offset-md-2 pb-4">
            <div class="card shadow-sm containerback">
                <div class="card-header">							
                    <h4 class="card-title text-center bg-light uppercase pt-2"><?php echo "<b>".$result ->titre."</b>"?></h4>
                </div>
                <div class="card-body">
               		<div class="card-text">
						<div class='py-4 text-center'>
							<?php echo"<img src='". $result->image."'class='illustration containerback'>" ; ?>
						</div>	
						<div class='py-4 px-3 bg-light'>
							<?php 	echo mb_strimwidth($result->contenu, 0, 200, "..."); ?>
						</div>	
						<div class="text-center mt-4 mb-3">
							<a href="single.php?id=<?php echo $result ->id ?>" class="btn btn-primary">Voir l'article</a> </h5>
						</div>                    
                    </div>
                </div>
            </div>			
		</div>
	<?php } ?>
</div>





<?php require 'partials/footer.php';
?>
