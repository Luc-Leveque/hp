<div class="contenaire">
          <div>
            <?php if(isset($erreur) && !empty($erreur)){ echo $erreur; } ?>
        </div>
    <div class="row">
        <div class="col-xs-8 col-xs-offset-1">
            <form method="post">
                <div> <span class="btn btn-default "><h5> Classe :</h5></span>
                    <select class="btn btn-default " name="classe">
                        <?php   $req = "Select * from classes ";
                        $requete = $bdd->query($req);

                        while($data = $requete->fetch())
                        {	
                           echo " <option value=".$data['id_c'].">".$data['nom_c']."</option></br>";
                        }
                        ?>
                    </select>
                    <select class="btn btn-default " name="matiere">
                        <?php   $req = "Select * from enseigner e , matiere m   where e.id_m=m.id_m and id_u = ".$_SESSION['id_u'];
                        $requete = $bdd->query($req);

                        while($data = $requete->fetch())
                        {	
                           echo " <option value=".$data['id_m'].">".$data['nom_m']."</option></br>";
                        }
                        ?>
                    </select>
                    <button class="btn btn-success select_class" type="submit" name="afficher_classe"><span class="glyphicon glyphicon"></span> Noter cette classe</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['afficher_classe'])) 
    {   
        extract($_POST);
        

        header('Location:index.php?page=noterClasse&id_c='.$classe.'&id_m='.$matiere) ;
    }
?>