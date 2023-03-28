<?php 
    error_reporting(E_ERROR |  E_PARSE); /* Page de visualisation d'un article complet */
    ini_set('display_errors', '1');    
    require '../config/commandes.php';
    require '../partials/header.php'; 
	$id = $_GET['id'];
    $comments=getCommentairesById($id);
    $result = getContactById($id);
	$classifications=getCategoriesById($id);
	$db = dbconnect();
    $publication=  DATE('d-m-Y', strtotime($result->publication));
?>

<div class="bg-white mb-5 containerback">	
	<div class="row">
		<div class="col-12">	
			<div class="card shadow-sm containerback">
           		<div class="card-header">
					<h2 class="card-title text-center bg-light uppercase pt-2"> <?php echo $result->titre ?></h2>
		   		</div>
            	<div class="card-body">
               		<div class="card-text">
						<div class="row mt-4">	
				  		 	<div class="col-12  col-md-6  text-start ps-5">
								<h5>Article de   <b>  <?php echo $result->pseudo."</b> | le " . $publication ?></b></h5>  
							</div>
							<div class="col-12  col-md-6  text-end pe-5">
								<h6>
									<strong>Catégorie(s)</strong> :
									<?php foreach($classifications as $classification){ 
										echo"<span class='badge rounded-pill bg-primary badge-lg text-white mx-2 py-2 px-2'><a href='categories.php?id=". $classification->categorieIdCategorie." '>".$classification->categoriesNom."</a></span>";
			 						}   ?>
						 		</h6>
							</div>
						</div>
						<div class="col-12 pb-5">
							<div class="text-center mt-4">
            					<?php	echo"<img src='". $result->image."'class='img-fluid'" ; ?>
							</div>
							<div class="mt-5 py-4 px-4 textjustify">
								<?php  echo $result->contenu;	?>
							</div>
							<hr class='pb-1' />	
						</div>
						<div class="col-12 col-md-6 offset-md-3">
							<h3 class="subtitle text-center mt-4 mb-5">Commentaires :</h3>			
							<form action="" id="comment_form" name="form" method="post" enctype="multipart/form-data">
                				<div  class="margin-box">
			        				<input id="pseudo" name="pseudo" type="text" class="form-control" placeholder="Pseudo" required>
                    				<span class="error"></span>                           
                				</div>
								<div  class="margin-box">
									<textarea id="content" name="content" rows="10" cols="50" class="form-control" placeholder="Vos impressions" required></textarea>
                    				<span class="error"></span>                           
                				</div>
                				<div  class="margin-box">
										<input id="agree" type="checkbox" name="agree"  required>
										<strong>Je permets aux administrateurs de ce blog de conserver mes données</strong>
										<span class="error"></span>                           
                				</div>								
								<div class="d-grid gap-2 margin-box">
									<input id="submit" type="submit" class="btn btn-primary btn-lg" value="Envoyer"  name="submit_commentaire" disabled>
								</div>
            				</form>
							<div class="mb-4">	
								<?php foreach($comments as $comment){
									$publication_commentaires=  DATE('d-m-Y', strtotime($comment->publication));?>		
           							<div class="commentback text-start py-3 mb-4">
										<div > <?php 				
											echo "<span class='ps-3'>Commentaire de <strong>" .$comment ->pseudo. "</strong> du " .$publication_commentaires." :</span>";
										?></div>
										<div class="italic textjustify"> <?php 
											echo $comment ->content;
										?></div>
									</div>
                 				<?php }?>
							</div>
						</div>		
					</div>
				</div>
			</div>
		</div>
	</div>			    
</div>		

<?php 
if(isset($_GET['id']) AND !empty($_GET['id'])) {
    if(isset($_POST['submit_commentaire'])) {
      	if(isset($_POST['pseudo'],$_POST['content']) AND !empty($_POST['pseudo']) AND !empty($_POST['content'])) {
         	$pseudo = htmlspecialchars($_POST['pseudo']);
         	$content = htmlspecialchars($_POST['content']);	
			$agree = isset($_POST['agree']);			
			addCommentaires($id,$pseudo,$content,$agree);	
			        
   		} else {
         	echo"<span style='color:red'>Erreur: Tous les champs doivent être complétés</span>";
      	}
  	}

}
require '../partials/footer.php';
?>