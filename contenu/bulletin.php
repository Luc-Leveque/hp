<?php 

$id = (int)$_GET['id']; 

$req2="Select * from semestre where etat = 0";
$requete2 = $bdd->query($req2);
$data2 = $requete2->fetch();
$id_s = (int)$data2['id_s'];

if (isset($_POST['submit'])) {

                extract($_POST);
                    foreach($app as $k => $v){
							$req = 'UPDATE  commenter SET appreciation = :app Where id_u=:id_u and id_s=:id_s and id_m=:id_m ';
							$req = $bdd->prepare($req);
							$req = $req->execute(array(
							':app' => "$app[$k]",
                            ':id_m'=> $id_m[$k],
                            ':id_s'=> $id_s,
                            ':id_u'=> $id
							));
                                
                            }

}
?>

    <div class="contenaire">
        <div class="row">
            <div class="col-xs-7 col-xs-offset-2">
                <form method="post">
                    <h1>Bulletin :</h1>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Matiere</th>
                                <th>Moyenne</th>
                                <th>Appreciation </th>
                            </tr>
                        <?php 
                            $req = "SELECT * FROM commenter c, user u , matiere m , semestre s where s.id_s=c.id_s and m.id_m=c.id_m and  u.id_u=c.id_u and c.id_u=$id and c.id_s=$id_s";
                            $requete = $bdd->query($req);

                            while($data = $requete->fetch())
                            {
                            ?>
                        </thead>
                            <tbody>
                                <tr>
                                    <td >
                                        <input class="hidden" type="text" name="id_m[]" value=" <?php echo $data['id_m'] ; ?>">
                                        <?php
                                        echo $data['nom_m'] ;
                                        ?>
                                    </td>
                                    <td>
                                     <?php
                                       if(isset($data['moyenne'])){
                                        echo $data['moyenne'];   
                                       }
                                        ?>
                                    </td>
                                    <td>
                                    <div class="row">
                                        <div class="col-xs-8">
                                         <?php if($_SESSION['lvl'] ==0 || $_SESSION['lvl'] == 2){ ?> 
                                            <input type="text" name="app[]" class="form-control" value="
                                        <?php 
                                        }
                                        if(isset($data['appreciation'])){
                                            echo $data['appreciation']; 
                                        }
                                        ?> " >        
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
}
echo "</table>";
?>               <?php if($_SESSION['lvl'] ==0 || $_SESSION['lvl'] == 2){ ?> 
                    <button type="submit" name="submit" class="btn btn-default">Valider</button>
                <?php }?> 
                </form>
            </div>
        </div>
    </div>