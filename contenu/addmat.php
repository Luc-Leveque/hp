<?php

if(isset($_POST['submit'])){
	if(isset($_POST['nom']) && !empty($_POST['nom']) && 
      preg_match("#^([A-Z]([a-z]){1,})|([A-Za-z0-9 -_]{1,})$#",$_POST['nom'])){

		$nom = $_POST['nom'];

			$req = "INSERT INTO matiere (nom_m) VALUES (:nom)";
			$req = $bdd->prepare($req);
			$req = $req->execute(array(
			':nom' => $nom
			));
			
			$reussite = '<div class="alert alert-success">
			La matiere a était ajouter à la base de données  </div> ';

	}
	else
	{$erreur = '<div class="alert alert-warning"> <strong>Warning!</strong>Veullez saisir un Nom dans le bon</div>' ;
	}
}
	
?>
    <?php if(isset($erreur) && !empty($erreur) ) {echo $erreur ; } ?>
        </br>
        </br>
        <?php if(isset($reussite) && !empty($reussite) ) {echo $reussite ; } ?>
            </br>
            </br>
            <form method="post" class="form-horizontal" action="#" class="form">
                <div class="form-group">
                    <label for="nom" class="col-sm-3 control-label">Nouvelle matiere:</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="nom" value=""> </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" name="submit" class="btn btn-primary pull-left" data-somestringvalue-text="Loading Finished" autocomplete="off">Ajouter</button>
                    </div>
                </div>
            </form>
            <div class="contenaire">
                <div class="row">
                    <div class="col-xs-7 col-xs-offset-2">
                        <h1>Matiere :</h1>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nom </th>
                                </tr>
                            </thead>
                            <?php
                            $req = 'SELECT * FROM matiere';
                            $requete = $bdd->query($req);

                            while($data = $requete->fetch())
                            {
                            ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $data['nom_m']; ?>
                                        </td>
                                        <td> <a href='<?php echo "index.php?page=supmat&id=".$data['id_m'] ; ?>'>Supprimer </a> </td>
                                    </tr>
                                </tbody>
                                <?php
}
echo "</table>";
?>
                    </div>
                </div>
            </div>