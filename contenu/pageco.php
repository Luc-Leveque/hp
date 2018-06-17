<?php

$pdo = dbConnect();
$userIp = $_SERVER['REMOTE_ADDR'];
$limite = $pdo->query("SELECT * FROM ban WHERE ip = $userIp");

if($limite){
    $limite = $limite->fetch(PDO::FETCH_ASSOC)['limite'];
}

$isStillBanned = strtotime($limite) > strtotime(time() - 60*5 );
if(!$isStillBanned){
    unset($_SESSION['nbFailedAuth']);
    $pdo->query("DELETE FROM ban WHERE ip = '$userIp' ");
}else{
    die('Vous êtes ban !');
}

$nomsaisie = "";
$mdpsaisie = "";
$prenomsaisie= "";

if (isset($_POST['submit'])){
    
    extract($_POST);
    $nom = htmlspecialchars($_POST['nom']); 
	$prenom = htmlspecialchars($_POST['prenom']);
	$mdp = sha1(htmlspecialchars($_POST['mdp']));
    
    
    $req = $pdo->prepare('SELECT COUNT(*) as nb FROM user WHERE nom = ? AND prenom=? AND mdp = ?');
    $req->execute([$nom,$prenom, $mdp]);
    $has = $req->fetch(PDO::FETCH_ASSOC)['nb'];
    if($has){
         $requete = $bdd->prepare("SELECT * FROM user WHERE nom = :nom AND prenom= :prenom  AND mdp = :mdp AND lvl = :lvl");
            $requete->bindValue(":nom",$nom,PDO::PARAM_STR);
            $requete->bindValue(":prenom",$prenom,PDO::PARAM_STR);
            $requete->bindValue(":mdp",$mdp,PDO::PARAM_STR);
            $requete->bindValue(":lvl",$lvl,PDO::PARAM_INT);
            $requete->execute();
 
            if ($reponse = $requete->fetch())
            {
                $_SESSION['connecte'] = true;
                $_SESSION['id_u'] = $reponse['id_u'];
                $_SESSION['lvl'] = $reponse['lvl'];

                header('Location:index.php?page=accueil');
            }
             else
             {
                $erreur = '<div class="alert alert-danger" >Mauvais identifiant</div>';
             }  
    }else
    {

        if(!isset($_SESSION['nbFailedAuth'])){
            $_SESSION['nbFailedAuth'] = 1;
        }else{
            $_SESSION['nbFailedAuth'] += 1;
        }

        if($_SESSION['nbFailedAuth'] > 3){
            $pdo->query("INSERT INTO ban (ip) VALUES ('$userIp')");
        }

    }
    }
	
?>
    <div class="contenair">
        <div class="row">
            <div class=""> <img src="img/Logo.jpg" class="img-thumbnail img-responsive" width="400" height="300"> </div>
        </div>
        <div>
            <?php if(isset($erreur) && !empty($erreur)){ echo $erreur; } ?>
        </div>
        </br>
 <div class="row ">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Espace Eleve  </a>
        </h4> </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <form method="post" action="#" class="form-inline">
                            <div class="form-group">
                                <label for="email">Nom:</label>
                                <input type="nom" name="nom" class="form-control" id="nom" value="<?php echo $nomsaisie ; ?>"> </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="prenom">Prenom:</label>
                                    <input type="prenom" name="prenom" class="form-control" id="prenom" value="<?php echo $prenomsaisie ; ?>"> </div>
                                <div class="form-group">
                                    <label for="mdp">Password:</label>
                                    <input type="password" name="mdp" class="form-control" id="mdp" value="<?php echo $mdpsaisie ; ?>"> </div>
                                <div class="form-group">
                                    <input type="hidden" name="lvl" class="form-control" id="lvl" value="1"> </div>
                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Espace Enseignant</a>
        </h4> </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <form class="form-inline" method="post" action="#">
                                        <div class="form-group">
                                            <label for="nom">Nom:</label>
                                            <input type="nom" name="nom" class="form-control" id="nom" value="<?php echo $nomsaisie ; ?>"> </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="prenom">Prenom:</label>
                                                <input type="prenom" name="prenom" class="form-control" id="prenom" value="<?php echo $prenomsaisie ; ?>"> </div>
                                            <div class="form-group">
                                                <label for="mdp">Password:</label>
                                                <input type="password" name="mdp" class="form-control" id="mdp" value="<?php echo $mdpsaisie ; ?>"> </div>
                                            <div class="form-group">
                                                <input type="hidden" name="lvl" class="form-control" id="lvl" value="2"> </div>
                                            <button type="submit" name="submit" class="btn btn-default">Valider</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Espace Admin</a>
        </h4> </div>
                        <div id="collapse3" class="panel-collapse collapse ">
                            <div class="panel-body">
                                <form class="form-inline" method="post" action="#">
                                    <div class="form-group">
                                        <label for="nom">Nom:</label>
                                        <input type="nom" name="nom" class="form-control" id="nom" value="<?php echo $nomsaisie ; ?>"> </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="prenom">Prenom:</label>
                                            <input type="prenom" name="prenom" class="form-control" id="prenom" value="<?php echo $prenomsaisie ; ?>"> </div>
                                        <div class="form-group">
                                            <label for="mdp">Password:</label>
                                            <input type="password" name="mdp" class="form-control" id="mdp" value="<?php echo $mdpsaisie ; ?>"> </div>
                                        <div class="form-group">
                                            <input type="hidden" name="lvl" class="form-control" id="lvl" value="0"> </div>
                                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>