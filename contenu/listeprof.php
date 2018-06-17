<div class="contenaire">
    <div class="row">
        <div class="col-xs-7 col-xs-offset-2">
            <h1>Matiere :</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Mdp</th>
                        <th>Email</th>
                        <th>Matiere</th>
                    </tr>
                </thead>
                <?php
                            $matiere =""  ; 
                            $req = 'SELECT * FROM enseigner e,user u , matiere m  WHERE u.id_u=e.id_u And m.id_m=e.id_m AND lvl= 2';
                            $requete = $bdd->query($req);

                            while($data = $requete->fetch())
                            {
                            ?>
                    <tbody>
                   <tr>
                    <td>
                        <?php echo $data['nom']; ?>
                    </td>
                    <td>
                        <?php echo $data['prenom']; ?>
                    </td>
                    <td>
                        <?php echo $data['mdp']; ?>
                    </td>
                    <td>
                        <?php echo $data['email']; ?>
                    </td>
                    <td>
                        <?php 
                            $matiere = $data['nom_m'];
                            echo $matiere; ?>
                    </td>
                       <?php if ($_SESSION['lvl'] == 0){ ?>  
                        <td> <a href='<?php echo "index.php?page=supprof&id1=".$data['id_m']."&id2=".$data['id_u'] ; ?>'>Supprimer </a> 
                        </td>
                        <?php } ?>
                        </tr>
                    </tbody>
                    <?php
}
echo "</table>";
?>
        </div>
    </div>
</div>