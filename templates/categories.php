<?php 
   /*****  PAGE DE VISUALISATION PAR CATEGORIE  *****/

    /* error_reporting(E_ERROR | E_PARSE | E_WARNING);
    ini_set('display_errors', '1'); */
    
     $id = $_GET['id'];
     require '../partials/header.php'; 
     require '../config/commandes.php';    
    $comments=getCommentairesById($id);
    $posts = getPostsByCategoryId($id);
    $result =  getContactById($id);
    $category=getCategoryNameById($id);    
	$article=getPostById($id);
	$db = dbconnect();
?>
    <div class="row">	<!-- Visualisation des articles selon une même catégorie  -->
        <div class="col-12 col-md-8  offset-md-2 badge rounded-pill bg-primary text-center mb-5">   
            <h2 class="uppercase text-white pt-2">Catégorie : <?php echo  $category->nom_categorie; ?></h2>
        </div> 
    </div>  
    <div class="row mt-5">          
        <?php foreach($posts as $post){ ?>
            <div class="col-12 col-md-8  offset-md-2 mb-5">
                <div class="card shadow-sm containerback">
                    <div class="card-header">							
                        <h4 class="card-title text-center bg-light uppercase pt-2"> <?php echo $post->titre ?></h2> 
                    </div>
                    <div class="card-body">
               		    <div class="card-text">
						    <div class='py-4 text-center'>
                                <?php echo"<div class='pb-4 text-center'><img src='".$post->image."'class='illustration containerback'></div>" ; ?>               
                            </div>
                            <div class='py-4 bg-light'>
                                <?php 	echo mb_strimwidth($post->contenu, 0, 100, "..."); ?>
		                    </div>	
                            <div class="text-center mt-4 mb-3">
                                <a href="single.php?id=<?php echo $post->articleId ?>" class="btn btn-primary">Voir l'article</a>
                            </div>
                        </div>
                    </div>
                </div>			
		    </div>
        <?php } ?>   
    </div>

<?php require '../partials/footer.php';
?>
