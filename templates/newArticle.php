<?php	
  	/*****   FORMULAIRE D'AJOUT D'UN NOUVEL ARTICLE  *****/

 	/* error_reporting(E_ERROR | E_PARSE | E_WARNING);
	ini_set('display_errors', '1'); */

	require '../partials/header.php'; 
	require '../config/commandes.php';
	
	$db = dbconnect();  
	$id=$_SESSION['id'];
    $pseudo=$_SESSION['pseudo'];
	$results = getContacts();
	$categories = getCategories();
	if ($_SESSION['id']) {
  ?>
  <p class="badge rounded-pill bg-white text-dark px-2 py-2"><?php echo"Connexion de : <strong>".$pseudo; ?></p>
 	<div class="row pt-4">	
        <div class="col-12 col-md-8  offset-md-2 badge rounded-pill bg-info text-center mb-5">   
            <h2 class="uppercase text-white pt-2">Espace administrateur</h2>
        </div> 
    </div>
    <div class="row py-5">
		<div class="col-12 Pb-4">
			<div class="card shadow-sm containerback">
            	<div class="card-header">
					<h2 class="card-title text-center bg-light uppercase pt-2">Ajout</h2>
				</div>
				<div class="card-body">
               		<div class="card-text">						
						<div class="row">
						  	<form action="" name="form" method="post" enctype="multipart/form-data">
	        					<div class="col-8 offset-2 mb-5">
				 					<div  class="margin-box mt-3">
			        					<input id="image" name="image" type="text" class="form-control" placeholder="Lien image" required>
                    					<span class="error"></span>
			    					</div>
			   						<div  class="margin-box">
			        					<input id="titre" name="titre" type="text" class="form-control" placeholder="Titre de l'article" required>
                    					<span class="error"></span>
			    					</div>
				 					<div  class="margin-box pb-4">
				    					<textarea id="contenu" name="contenu"  class="form-control" rows="20" placeholder="Le contenu" required></textarea>
                    					<span class="error"></span>
			    					</div>
									<div id="classification" name="classification">
				   						<fieldset class="panel panel-primary mb-5">
										   	<div class="panel-body">
                        						<strong class="text-on-pannel">Veuillez sélectionner les catégories adéquates :</strong>
                            					<div id="check">
													<?php  try  {        	  		
                                        				foreach($categories as $category){ 
						                    				echo "<div><input type='checkbox' class='pb-2' id=".$category->id." name='interest[]' value=".$category->id."> <label>  ".$category->nom_categorie."</label></div>";
					 	                				}			                    	
	                               					}					
                                    				catch(Exception $e)  {
                                        				die('Erreur : '.$e->getMessage());
                                    				}  ?>
                            					</div> 
						    					<span class="error"></span>
											</div>	
                    					</fieldset>					
		        					</div>
									<div class="d-grid gap-2">
                    					<input type="submit"  id="submit" class="btn btn-primary btn-lg"   name="submit_article" value="Envoyer" disabled>
                					</div>
            					</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="row pb-5">
		<div class="col-12 pb-5">
			<div class="card shadow-sm containerback">
            	<div class="card-header">
					<h2 class="card-title text-center bg-light uppercase pt-2">Suppression/Modification</h2>
				</div>
	            <div class="card-body">
               		<div class="card-text">	
        				<?php foreach($results as $result){ ?>		
            				<div class="row px-5 pb-5">
								<div class="col-4 mb-3">                
                					<span class="naming"><?php echo "<b>".$result ->titre."</b>"?>
								</div>	
								<div class="col-8 pb-3  text-end">			    
									<a href="../config/wipeoff.php?id=<?php echo $result ->id ?>"> <input type="button" class="btn btn-danger me-4"  onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'))" value="Delete"></a> </h5>
                					<a href="editArticle.php?id=<?php echo $result ->id ?>"> <input type="button" class="btn btn-success"   value="Edit"></a> </h5>
								</div>
								<hr class="pb-1"/>
							</div>
        				<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php 

  if(isset($_POST['submit_article'])) {
	if(isset($_POST['image'],$_POST['titre'],$_POST['contenu'], $_POST['interest']) AND !empty($_POST['image']) AND !empty($_POST['titre'])AND !empty($_POST['contenu']) ) {
	   $image = htmlspecialchars($_POST['image']);
	   $titre = htmlspecialchars($_POST['titre']);
	   $contenu = ($_POST['contenu']);
       addArticle($id,$image,$titre,$contenu);
	} else {
	   echo"<span style='color:red'>Erreur: Tous les champs doivent être complétés</span>";
	}
  }
}
else {
?>
<div class="bg-white mb-5 containerback">	
	<div class="row">
		<div class="col-12 text-center answer">	
			<h2>Vous ne vous êtes pas identifié !</h2>
			<?php echo"<script>setTimeout(function() {location.href='../templates/index.php'}, 5000);</script>";?>    
		</div>
	</div>
</div>
<?php	
}

require '../partials/footer.php';
?>