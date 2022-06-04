<?php 	
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    ini_set('display_errors', '1');      
    require 'partials/header.php'; 
	require 'config/commandes.php';	
   	$db = dbconnect();  
?>




   
	<div class="row py-5">
	    <div class="col-12 col-md-6 offset-md-3  pb-4">
			<div class="card shadow-sm containerback">
            	<div class="card-header">
					<h2 class="card-title text-center bg-light uppercase pt-2">Connection administrateur</h2>
				</div>
				<div class="card-body">
               		<div class="card-text">						
        				<div class="row">
							<form action="" id="form" name="form" method="post" enctype="multipart/form-data">
	        					<div class="col-12 col-md-6 offset-md-3">
			           				<div  class="my-5">
			                			<input id="pseudo2" name="pseudo2" type="text" class="form-control" placeholder="Pseudo" required>
                            			<span class="error"></span>                           
                        			</div>
									<div  class="mb-5">
										<input type="email" id="email" name="email"  class="form-control" placeholder="Email" required></textarea>
                            			<span class="error"></span>                           
                        			</div>
									<div  class="mb-5">
						    			<input type="password" id="pass" name="pass"  class="form-control" placeholder="Mot de passe" required></textarea>
                            			<span class="error"></span>                           
                        			</div>
									<div class="d-grid gap-2 margin-box pb-4">
						    			<input id="submit" type="submit" class="btn btn-primary btn-lg" value="Envoyer"  name="submit_admin" disabled>
									</div>
								</div>
							</form>
						</div>
                	</div>
				</div>
			</div>
		</div>
	</div>
		

<?php 
if(isset($_POST['pseudo2'],$_POST['email'],$_POST['pass']) AND !empty($_POST['pseudo2']) AND !empty($_POST['email'])AND !empty($_POST['pass']) ) {
function valid_donnees($donnees){
	$donnees = trim($donnees);
	$donnees = stripslashes($donnees);
	$donnees = htmlspecialchars($donnees);
	return $donnees;
}
$pseudo=valid_donnees($_POST['pseudo2']);
$email=valid_donnees($_POST['email']);
$pass=valid_donnees($_POST['pass']);

getIdentifiers($pseudo,$email,$pass);

}

require 'partials/footer.php';
?>