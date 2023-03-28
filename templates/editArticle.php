<?php   
error_reporting(E_ERROR | E_PARSE); /* Formulaire d'édition d'un article */
ini_set('display_errors', '1');
require '../config/commandes.php';
require '../partials/header.php';
$id = $_GET['id'];
$comments=getCommentairesById($id);
$result = getContactById($id);
$categories = getCategories();
$classifications=getCategoriesById($id);
$classificationbiss=getCategoriesById2($id);
$db = dbconnect();
$id=$_SESSION['id'];
$pseudo=$_SESSION['pseudo'];
if ($_SESSION['id'])
{
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
					<h2 class="card-title text-center bg-light uppercase pt-2">Article à modifier</h2>
				</div>
				<div class="card-body">
               		<div class="card-text">						
						<div class="row">
							<form action="" name="form" method="post" enctype="multipart/form-data">							
								<div class="col-8 offset-2 mb-5">
									<div  class="margin-box mt-3">
			        					<input id="image" name="image" type="text" class="form-control" value="<?php echo $result->image ?>" required>
                   						<span class="error"></span>
			    					</div>
			    					<div  class="margin-box">
			        					<input id="titre" name="titre" type="text" class="form-control" value="<?php echo $result->titre ?>" required>
                   						<span class="error"></span>
			    					</div>
									<div  class="margin-box pb-4">
				    					<textarea id="contenu" name="contenu" class="form-control" rows="20"  required><?php echo $result->contenu ?></textarea>
                    					<span class="error"></span>
			    					</div>
									<div id="classification" name="classification">
				    					<fieldset class="panel panel-primary mb-5">
											<div class="panel-body">
												<strong class="text-on-pannel">Veuillez sélectionner les catégories adéquates :</strong>
												<div id="check">
													<?php try  {   
                                       					foreach($classificationbiss as  $classification){ 	
															if ($classification->categoriesId === $classification->categorieIdCategorie)   {?>
																<div class="pb-2">
																	<input type="checkbox" id=".$classification->categoriesId." name='interest[]' value="<?php echo $classification->categoriesId ?>" checked>
																	<label><?php echo$classification->categoriesNom; ?></label>
																</div>
															<?php }											
																else    { ?>
																	<div>
																		<input type="checkbox" id=".$classification->categoriesId." name='interest[]' value="<?php echo $classification->categoriesId ?>" unchecked>
																		<label><?php echo$classification->categoriesNom; ?></label>
																	</div>
															<?php }
														}
													}
                                   					catch(Exception $e)  {
                                       					die('Erreur : '.$e->getMessage());
                                    				}   ?>
								 				</div> 	
                            				</div> 
						    				<span class="error"></span>
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


		<?php 

  		if(isset($_POST['submit_article'])) {
			if(isset($_POST['image'],$_POST['titre'],$_POST['contenu'], $_POST['interest']) AND !empty($_POST['image']) AND !empty($_POST['titre'])AND !empty($_POST['contenu'])AND !empty($_POST['interest']) ) {
	   			$image = htmlspecialchars($_POST['image']);
	   			$titre = htmlspecialchars($_POST['titre']);
	   			$contenu = ($_POST['contenu']);
       			$interest = ($_POST['interest']);	
	   			$id=$classification->categorieIdArticle;
	   			$id2=$classification->categorieId;
	   			updateArticle($id,$id2,$image,$titre,$contenu,$interest);
				} else {
	   				echo"<span style='color:red'>Erreur: Tous les champs doivent être complétés</span>";
				}
  
			}
}
	else {
		echo "<h2 class='marginMessage text-center'>Vous ne vous êtes pas identifié !</h2>";
		echo"<script>setTimeout(function() {location.href='../templates/index.php'}, 5000);</script>"; 
	}

require '../partials/footer.php';
?>