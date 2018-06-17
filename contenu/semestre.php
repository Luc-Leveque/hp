<div class="contenaire">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
           <?php
              $req = 'SELECT * FROM semestre where etat = 1 ';
                $requete = $bdd->query($req);

                while($data = $requete->fetch())
                {  
                    echo "<legend>";
                    echo " Le semestre en cour est le ".$data['nom_s'];
                    echo "</legend>";
                }
            ?>
                <legend>Changer semestre</legend>
                <div class="form-group">
                <a href="index?page=changersem" ><button  type="submit" class="btn btn-primary">Changer semestre en cours</button></a>
        </div>
    </div>
</div>