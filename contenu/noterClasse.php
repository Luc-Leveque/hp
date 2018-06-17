<?php

$id1 = (int)$_GET['id_c'];
$id2 = (int)$_GET['id_m'];

$req2="Select id_s from semestre where etat = 1";
$requete2 = $bdd->query($req2);
$data2 = $requete2->fetch();
$id_s = $data2['id_s'];


if (isset($_POST['submit'])) {
        if(isset($_POST['nom']) && preg_match("#^([A-Za-z -_]{1,})$#",$_POST['nom'])){
            if(isset($_POST['coeff']) && preg_match("#^([0-9]{1,2})$#",$_POST['coeff'])){

                extract($_POST);

    
							$req = "INSERT INTO devoir (id_m , nom_d,coeff) VALUES (:id_m , :nom, :coeff )";
							
							$req = $bdd->prepare($req);
							$req = $req->execute(array(
							':id_m' => $id2,
							':nom' => $nom,
							':coeff' => $coeff
							));
                
                $id_d =$bdd->lastInsertId();
                
                
                		$req3 = "INSERT INTO corespondre (id_m ,id_d) VALUES (:id_m , :id_d)";
							
							$req3 = $bdd->prepare($req3);
							$req3 = $req3->execute(array(
							':id_m' => $id2,
							':id_d' => $id_d
							));

				foreach ($note as $k => $v ){
                    if(isset($v) && preg_match("#^(0[0-9]|1[0-9]|20|[0-9])$#",$v)){
                    $req2 = $bdd->prepare("INSERT INTO noter(id_u,id_d,id_s,note) VALUES(:id_u,:id_d,:id_s,:note)");
                    $req2->execute(array(
							':id_u' => $id_u[$k],
							':id_d' => $id_d,
							':id_s' => $id_s,
							':note' => $v));
                    
                    $sommecoeff=0;
                    $totalnote=0;
                    $req5="Select * from devoir d , noter n where d.id_d=n.id_d and id_u=$id_u[$k] and id_s=$id_s ";
                    $requete5 = $bdd->query($req5);
                    while ($data5 = $requete5->fetch()){
                        $sommecoeff = $sommecoeff + $data5['coeff'];
                        $totalnote =  $totalnote +($data5['note']*$data5['coeff']);
                        $moyenne = $totalnote/$sommecoeff ; 
                    }
                   $req3 = $bdd->prepare("UPDATE commenter SET moyenne = :moyenne Where id_u=:id_u and id_s=:id_s and id_m=:id_m ;");
                    $req3->execute(array(
							':moyenne' =>$moyenne,
                            ':id_u' => $id_u[$k],
                            ':id_s' => $id_s,
                            ':id_m' => $id2
                            
                    )); 
                    }
                    else{
                        $v=10;
                            $req3 = $bdd->prepare("INSERT INTO noter(id_u,id_d,id_s,note) VALUES(:id_u,:id_d,:id_s,:note)");
                            $req3->execute(array(
							':id_u' => $id_u[$k],
							':id_d' => $id_d,
							':id_s' => $id_s,
							':note' => $v));
                    }
                    
            }			
            }
            else {
                  $erreur = '<div class="alert alert-danger" >Aucun coeff </div>';  
            } 
        }
            else {
                  $erreur = '<div class="alert alert-danger" >aucun nom </div>';  
            } 
}
?>
    <div class="contenaire">
        <div class="row">
            <div class="col-xs-7 col-xs-offset-2">
                <div>
                    <?php if(isset($erreur) && !empty($erreur)){ echo $erreur; } ?>
                </div>
                <form method="post">
                 Nom du devoir
                <input type="text" name="nom" class="form-control"> Coefficient
                <input type="text" name="coeff" class="form-control">
                <input class="hidden" type="text" name="sem" value="<?php $id_act ?>" class="form-control">
                    <h1>Etudiants :</h1>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <?php
                            $req = 'SELECT * FROM user WHERE  lvl= 1 and id_c='.$id1;
                            $requete = $bdd->query($req);

                            while($data = $requete->fetch())
                            {
                            ?>
                            <tbody>
                                <tr>
                                    <td >
                                        <?php echo $data['nom']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['prenom']; ?>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-xs-2">
                                                <input type="text" name="note[]" class="form-control" > </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input class="hidden" type="text" name="id_u[]" value=" <?php echo $data['id_u'] ; ?>">
                                    </td>
                                </tr>
                            </tbody>
                            <?php
}
echo "</table>";
?>
                <button type="submit" name="submit" class="btn btn-default">Valider</button>
                </form>
            </div>
        </div>
    </div>