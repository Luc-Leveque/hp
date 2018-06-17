<?php

//creer un prof

$nomsaisie = "";
$prenomsaisie = "";

//creer un prof

if (isset($_POST['submit'])) {
	if(isset($_POST['nom']) && !empty($_POST['nom']) && preg_match("#^([A-Za-z]{1,})$#",$_POST['nom'])){
		if(isset($_POST['prenom']) && !empty($_POST['prenom']) && preg_match("#^([A-Za-z]{1,})$#",$_POST['prenom'])){
			 
                extract($_POST);
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $lvl= htmlspecialchars($_POST['lvl']);
                $mdp = sha1(htmlspecialchars($_POST['mdp']));

                
							$req = "INSERT INTO user (nom, prenom,mdp,lvl) VALUES ( :nom, :prenom, :mdp , :lvl  )";
							
							$req = $bdd->prepare($req);
							$req = $req->execute(array(
							':nom' => $nom,
							':prenom' => $prenom,
							':mdp' => $mdp,
							':lvl' => $lvl
							));
                
                $id_u =$bdd->lastInsertId();
          
            if(isset($matiere)){
				foreach ($matiere as $k => $v ){
                    $req2 = $bdd->prepare("INSERT INTO enseigner(id_u , id_m) VALUES( :id_u, :id_m )");
                    $req2->execute(array(
							':id_u' => $id_u,
							':id_m' => $v));
                    }
                $reussite = '<div class="alert alert-success">L utilisateur a était ajouter à la base de données  </div> ';
            }
            else{
            $erreur = '<div class="alert alert-warning"> <strong>Warning!</strong> Veullez saisir au moins une matiere </div>' ;
            }
			}
			else{
			$erreur = '<div class="alert alert-warning"> <strong>Warning!</strong> Veullez saisir votre prenom </div>' ;
			}	
	}
	else{
	$erreur = '<div class="alert alert-warning"> <strong>Warning!</strong> Veullez saisir votre nom</div>' ;
	}					
			
			
	
}

if(isset($reussite) && !empty($reussite) ) {echo $reussite ; } 
if(isset($erreur) && !empty($erreur) ) {echo $erreur ; } 
?>
 <div class="row">
    <div class="col-xs-8 col-xs-offset-1">
        <div class="panel-body">
            <form method="post" action="#" class="form">
                <div class="form-group">
                    <label for="email">Nom:</label>
                    <input type="text" name="nom" class="form-control" id="nom" value="<?php echo $nomsaisie ; ?>"> </div>
                <div class="form-group">
                    <label for="email">Prenom:</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" value="<?php echo $prenomsaisie ; ?>"> </div>
                <div class="form-group">
                    <label for="mdp">Mdp:</label>
                    <input type="password" name="mdp" class="form-control" id="mdp">
                </div>
                <label for="mdp">Matiere :</label>
                </br>
                <?php 
        $req = "Select * from matiere ";
        $requete = $bdd->query($req);
						
        while($data = $requete->fetch())
        {	
           echo "".$data['nom_m']."<input type='checkbox' name='matiere[]' value=".$data['id_m']."></br>";
        }
        ?>
        <input type="hidden" name="lvl" class="form-control" id="lvl" value="2">
        </div>
        </br>
        <button type="submit" name="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
</div>
</div>
<div class="row">
    <div class="col-xs-2 col-xs-offset-1">
        <a type="button" class="btn " href="index?page=addmat">Ajouter une matiere</a>
    </div> 
 </div>
