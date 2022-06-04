<?php 
require 'database.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
ini_set('display_errors', '1');
function getContacts() {
    $db = dbconnect();
    $sth = $db->query('SELECT * FROM articles ORDER BY id DESC');
    $results = $sth->fetchAll(PDO::FETCH_OBJ);
    return $results;
}



function getContactById($id) {
    $db = dbconnect();
    $contact = $db->prepare('SELECT * FROM articles INNER JOIN auteurs ON articles.auteur_id = auteurs.id WHERE articles.id=:id');	
     $contact -> bindParam(':id', $id);
    $contact->execute();
    $result = $contact->fetch(PDO::FETCH_OBJ);
    return $result;
}

function getPostById($id){
    $db = dbconnect();
    $query = $db->query("SELECT articles.id as articleId, articles.auteur_id, articles.image, articles.titre, articles.publication, articles.contenu  FROM articles WHERE articles.id='$id'");
    $article = $query->fetch(PDO::FETCH_ASSOC);
    return $article;
}



function getCommentairesById($id){
    $db = dbconnect();
    $commentaires = $db->prepare("SELECT  commentaires.pseudo, commentaires.content, commentaires.publication  FROM commentaires INNER  JOIN articles ON  commentaires.article_id=articles.id WHERE commentaires.article_id=:id");
    $commentaires -> bindParam(':id', $id);
    $commentaires->execute();
	$comments = $commentaires->fetchAll(PDO::FETCH_OBJ);	
    return $comments;
}

function getCategories(){
    $db = dbconnect();	
    $categories = $db->query('SELECT * FROM categories');
    $categories->execute();
    $resultats = $categories->fetchAll(PDO::FETCH_OBJ);
    return $resultats;
}
function getCategoriesById2($id){
    $db = dbconnect();	    
    $categories = $db->prepare("SELECT categorie_articles.id as categorieId, 	categorie_articles.id_article as categorieIdArticle,  	categorie_articles.id_categorie as categorieIdCategorie, categories.id as categoriesId, categories.nom_categorie as categoriesNom FROM categorie_articles INNER JOIN categories 
   WHERE categorie_articles.id_article=:id");
    $categories -> bindParam(':id', $id);
    $categories->execute();
	$classificationbiss = $categories->fetchAll(PDO::FETCH_OBJ);	
    return $classificationbiss;
}


function getCategoriesById($id){
    $db = dbconnect();	    
    $categories = $db->prepare("SELECT categorie_articles.id as categorieId, 	categorie_articles.id_article as categorieIdArticle,  	categorie_articles.id_categorie as categorieIdCategorie, categories.id as categoriesId, categories.nom_categorie as categoriesNom FROM categorie_articles INNER JOIN categories on categories.id=categorie_articles.id_categorie WHERE categorie_articles.id_article=:id");
    $categories -> bindParam(':id', $id);
    $categories->execute();
	$classifications = $categories->fetchAll(PDO::FETCH_OBJ);	
    return $classifications;
}

function getCategoryIdById($id){
    $db = dbconnect();
    $query = $db->query("SELECT categories.id FROM categories WHERE categories.id='$id'");
    $categoryId = $query->fetch(PDO::FETCH_OBJ);
    return $categoryId;
}

function getCategoryNameById($id){
    $db = dbconnect();
    $query = $db->prepare("SELECT nom_categorie FROM categories WHERE categories.id='$id'");
    $query -> bindParam(':id', $id);
    $query->execute();
    $categoryName = $query->fetch(PDO::FETCH_OBJ);
    return $categoryName;
}

function getPostsByCategoryId($id){
    $db = dbconnect();
    $query = $db->query("SELECT articles.id as articleId, articles.auteur_id, articles.image, articles.titre, articles.publication, articles.contenu  FROM articles INNER JOIN categorie_articles ON categorie_articles.id_article = articles.id INNER JOIN categories ON categorie_articles.id_categorie  = categories.id WHERE categories.id = '$id' ORDER BY articleId DESC");
    $posts = $query->fetchAll(PDO::FETCH_OBJ);
    return $posts;
}


function getIdentifiers($pseudo,$email,$pass){
    try {   
        $db = dbconnect();
        // Vérification des identifiants
        $req = $db->prepare('SELECT * FROM auteurs WHERE pseudo = :pseudo AND email= :email');
        $req->execute(array(
        'pseudo' => $pseudo,
        'email' => $email));
        $resultat = $req->fetch();
        $pass_hache = password_verify($pass,$resultat['password']);
        if ($pass_hache && $resultat)   {
            function user_verified() { 
                return isset($_SESSION['id']);
            }
             echo"<script>location.href='newArticle.php';</script>";
        }
        else {
            echo "<center class='mt-4'><strong>Mauvais identifiant ou mot de passe !<strong></center> ";	
            echo"<script>setTimeout(function() {location.href='admin.php'}, 4000);</script>"; 	
        }
    }
    catch(PDOException $e){
        echo 'Erreur : '.$e->getMessage();
    } 
    /*session_start();*/
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $pseudo;
}

   
function addCommentaires($id,$pseudo,$content){
    $db = dbconnect();
    try {
        $req = $db->prepare("INSERT INTO commentaires (pseudo, content, article_id) VALUES (:pseudo,:content,:article_id)");
        $req->bindParam(':pseudo',$pseudo);
        $req->bindParam(':content',$content);	       
        $req->bindParam(':article_id',$id);
        $req->execute();
        echo'<script type="text/javascript">alert("Commentaire posté !")</script>';      
        echo"<script>location.href='index.php';</script>";
    }
    catch(PDOException $e){
        echo 'Erreur :  '.$e->getMessage();
    }
}

function addArticle($id,$image,$titre,$contenu){
    try {
        $db = dbconnect();
		$req = $db->prepare("INSERT INTO articles (image,titre, contenu, auteur_id) VALUES (:image, :titre,:contenu,:auteur_id)");
		$req->bindParam(':image',$image);
		$req->bindParam(':titre',$titre);
		$req->bindParam(':contenu',$contenu);		
		$req->bindParam(':auteur_id',$id);
		$req->execute();
	}
    catch(PDOException $e){
        echo 'Erreur :  '.$e->getMessage();
    }
    $last=$db->lastInsertId();
    /*var_dump($last);*/
	  
    try { 
	  foreach (($_POST['interest'])	 as $interest)  {
            $req = $db->prepare('INSERT INTO categorie_articles (id_article,id_categorie) VALUES (:id_article,:id_categorie)');
		    $req->bindParam(':id_article',$last);   
		    $req->bindParam(':id_categorie', $interest);
		    $req->execute();   
            echo'<script type="text/javascript">alert("Article posté !")</script>';
	    }  	 
    }
    catch(PDOException $e){
	    echo 'Erreur : '.$e->getMessage();
    }
}


function updateArticle($id,$id2,$image,$titre,$contenu){
    try {
        $db = dbconnect();	
        $req = $db->prepare("UPDATE articles SET titre=:titre, image=:image, contenu=:contenu  WHERE articles.id=:id");
        $req-> bindParam(':id', $id);		
        $req->bindParam(':image',$image);
		$req->bindParam(':titre',$titre);
		$req->bindParam(':contenu',$contenu);		
		$req->execute();  
	}
    catch(PDOException $e){
        echo 'Erreur :  '.$e->getMessage();
    }
  
    try { 
        $db = dbconnect();       
	    foreach (($_POST['interest'])	 as $interest)  {
             /* echo'<script type="text/javascript">alert("' . $interest .', ' . $id2 . ', ' . $id . '")</script>';*/
            $req = $db->prepare("UPDATE categorie_articles SET id_article=:id_article, id_categorie=:id_categorie WHERE categorie_articles.id=:id");
            $req-> bindParam(':id', $id2);
            $req->bindParam(':id_article',$id);   
            $req->bindParam(':id_categorie', $interest);
            $req->execute(); 
            echo'<script type="text/javascript">alert("Article modifié !")</script>';
            echo"<script>location.href='newArticle.php';</script>";
	    } 
    }
    catch(PDOException $e){
	    echo 'Erreur : '.$e->getMessage();
    }

}





