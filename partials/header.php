<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr">


<head>
   <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Astronomie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style/style.css" rel="stylesheet">	
</head>
<body class="bg-img">
    <div class="bg-dark">
        <div class="container-fluid">  
            <nav class="navbar navbar-expand-md navbar-light bg-dark">
                <div class="col-12 col-md-6">
                    <span class="navbar-brand uppercase text-white title">Star News</span>             
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-12 col-md-6">
                    <div class="collapse navbar-collapse  justify-content-md-end flex-grow-1" id="navbarSupportedContent">  
                        <ul class="navbar-nav  ">   
                            <li class="nav-item"><a class="nav-link active me-4" href="../blog/index.php"><span class="whitestrong">Home</span></a></li>
                            <li class="nav-item"><a class="nav-link me-4" href="../blog/categories.php?id=1"><span class="whitestrong">Astronomie</span></a></li>
                            <li class="nav-item"><a class="nav-link me-4" href="../blog/categories.php?id=2"><span class="whitestrong">Spatial</span></a></li> 
                            <?php  if  ($_SESSION['pseudo']) { ?>
                                <li class="nav-item ">
                                    <a href="../blog/newArticle.php" class="btn btn-success btn-sm border-primary px-3 mt-2 me-4">Admin</a>
                                </li>
                                <li class="nav-item "> 
                                    <a href="../blog/sessionEnd.php" class="btn btn-transparent btn-sm border-primary text-primary px-3 mt-2 me-4">Déconnection</a>
                                </li>
                                    <?php	    }       else { ?>  
                                <li class="nav-item ">                               
                                    <a href="../blog/admin.php" class="btn btn-transparent btn-sm border-primary text-primary px-3 mt-2 me-4">Connection</a>
                                </li>
                            <?php	    }      ?>    
                        </ul>             
                    </div> 
                </div>
            </nav>
        </div>   
    </div>
    <div class="opacity pt-5 pb-5">
        <div class="container mt-5">
      
            
