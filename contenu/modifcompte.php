<?php 
if(isset($_POST['submit'])){
    
	$id_u = (int) $_SESSION['id_u'];
    $nom = htmlspecialchars($_POST['nom']); 
	$prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']); 
	$mdp = sha1(htmlspecialchars($_POST['mdp']));
    $re_mdp = sha1(htmlspecialchars($_POST['re_mdp']));


	if($mdp != $re_mdp){ 
        $erreur = '<div class="alert alert-warning"> <strong>Warning!</strong>Veullez saisir un Mdp identique </div>' ;
    }
    if($mdp == 'da39a3ee5e6b4b0d3255bfef95601890afd80709' ){
        $req = "SELECT * FROM user  where id_u=$id_u ";
        $requete = $bdd->query($req);
        $data = $requete->fetch();
        $mdp = $data['mdp'];
    }

	$requete = 'UPDATE user SET email = :email, nom = :nom, mdp = :mdp, prenom = :prenom WHERE id_u = :id_u';

	$requete = $bdd->prepare($requete);
	$requete = $requete->execute(array(
		'email' => $email ,
		'nom' => $nom ,
		'prenom' => $prenom ,
		'id_u' => $id_u,
		'mdp' => $mdp
	));
	echo "<script>document.location.href='index.php?page=compte&id=".$_SESSION['id_u']."</script>";
}



$id = (int)$_GET['id']; 
$req = "SELECT * FROM user  where id_u=$id ";
    $requete = $bdd->query($req);

    while($data = $requete->fetch())
    {
?>
<?php if(isset($erreur) && !empty($erreur) ) {echo $erreur ; } ?>
<form method="post" class="form-horizontal">
    <fieldset>
        <div class="row">
            <div class="col-md-3 col-lg-2 col-xs-offset-1 jolie">
                <h1> Modifier info Compte :</h1> </div>
        </div>
        <div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="first_name">Prenom</label>
                <div class="col-md-4">
                    <input id="first_name" name="prenom" type="text" class="form-control input-md" value="<?php echo $data['prenom']  ?>"> </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="last_name">Nom</label>
                <div class="col-md-4">
                    <input id="last_name" name="nom" type="text" class="form-control input-md" value="<?php echo $data['nom']  ?>"> </div>
            </div>
            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input id="email" name="email" class="form-control" placeholder="email utilisateur" type="text" value="<?php echo $data['email']  ?>"> </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="memberID">NouveauMdp</label>
                <div class="col-md-1">
                    <input id="memberID" name="mdp" type="password" placeholder="Mdp" class="form-control input-md"> </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="memberID">ConfirmerMdp</label>
                <div class="col-md-1">
                    <input id="memberID" name="re_mdp" type="password" placeholder="Mdp" class="form-control input-md"> </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-xs-offset-4">
                    <div class="form-group ">
                        <button type="submit" name="submit" class="btn btn-primary ">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</form>
<?php } ?>