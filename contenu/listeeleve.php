<div class="contenaire">
    <div class="row">
        <div class="col-xs-7 col-xs-offset-2">
            <h1>Liste des Etudiants :</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Mdp</th>
                        <th>Email</th>
                        <th>Classe</th>
                    </tr>
                </thead>
                <?php
                            $req = 'SELECT * FROM user WHERE  lvl= 1 ';
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
                        <?php echo $data['id_c']; ?>
                    </td>  
                        <td> <a href='<?php echo "index.php?page=supeleve&id=".$data['id_u']; ?>'>Supprimer</a> </td>
                        </tr>
                    </tbody>
                    <?php
}
echo "</table>";
?>
        </div>
    </div>
</div>