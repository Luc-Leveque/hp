<?php

    $id1 = (int)$_GET['id'];


?>
    <div class="contenaire">
        <div class="row">
            <div class="col-xs-7 col-xs-offset-2">
                    <h1>Etudiants :</h1>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                            </tr>
                        </thead>
                        <?php
                            $req = 'SELECT * FROM user WHERE  lvl=1 and id_c='.$id1;
                            $requete = $bdd->query($req);

                            while($data = $requete->fetch())
                            {
                            ?>
                            <tbody>
                                <tr>
                                    <td >
                                       <a href="<?php echo "index.php?page=bulletin&id=".$data['id_u']; ?>"><?php echo $data['nom']; ?></a> 
                                    </td>
                                    <td>
                                       <a href="<?php echo "index.php?page=bulletin&id=".$data['id_u']; ?>"><?php echo $data['prenom']; ?></a> 
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
            </div>
        </div>
    </div>