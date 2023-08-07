<?php 
/*****  INDEX DES ATICLES  *****/

 /* error_reporting(E_ERROR | E_PARSE | E_WARNING);
ini_set('display_errors', '1'); */

require '../partials/header.php'; 
require '../config/pagination.php';

?>
	<div class="row py-5">
		<?php foreach($articles as $article){ ?>				
		<div class="col-12 col-md-8  offset-md-2 pb-4">
            <div class="card shadow-sm containerback">
                <div class="card-header">							
                    <h4 class="card-title text-center bg-light uppercase pt-2"><?php echo "<b>".$article ->titre."</b>"?></h4>
                </div>
                <div class="card-body">
               		<div class="card-text">
						<div class='py-4 text-center'>
							<?php echo"<img src='". $article->image."'class='illustration containerback'>" ; ?>
						</div>	
						<div class="py-4 px-3 bg-light">							
							<?php 	 echo mb_strimwidth($article->contenu, 0, 100, "..."); ?>							
						</div>							
						<div class="text-center mt-4 mb-3">
							<a href="single.php?id=<?php echo $article ->id ?>" class="btn btn-primary">Voir l'article</a> 
						</div>                    
                    </div>
				</div>				
            </div>			
		</div>				
		<?php } ?>
	</div>    
    <div class="row">
        <div class="col-12 col-md-8  offset-md-2 pb-4">            
            <nav>
                <ul class="pagination">
                    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    </li>
                    <?php for($page = 1; $page <= $pages; $page++): ?>
                        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    </li>
                </ul>
            </nav>  
        </div>        
    </div>
    
  


<?php require '../partials/footer.php';
?>
