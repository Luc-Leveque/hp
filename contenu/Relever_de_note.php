<?php 

$id = (int)$_GET['id']; 

$req2="Select * from semestre where etat = 1";
$requete2 = $bdd->query($req2);
$data2 = $requete2->fetch();
$id_s = (int)$data2['id_s'];


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
                                <th>Nom du devoir</th>
                                <th>Note</th>
                                <th>Coefficient</th>
                            </tr>
                        <?php 
                            $req="Select * from noter n ,devoir d , matiere m  where m.id_m=d.id_m and d.id_d=n.id_d and id_u=$id and id_s=$id_s  ";
                            $requete = $bdd->query($req);
                            while ($data = $requete->fetch()){
                            
                            
                            //$req = "SELECT * FROM commenter c, user u , matiere m , semestre s where s.id_s=c.id_s and m.id_m=c.id_m and  u.id_u=c.id_u and c.id_u=$id and c.id_s=$id_s";
                            //$requete = $bdd->query($req);

                            //while($data = $requete->fetch())
                            //{
                            ?>
                        </thead>
                            <tbody>
                                <tr>
                                    <td >
                                        <?php
                                            echo $data['nom_m'] ;
                                        ?>
                                    </td>
                                    <td>
                                     <?php
                                       echo $data['nom_d']
                                        ?>
                                    </td>
                                        <td>
                                     <?php
                                       echo $data['note']
                                        ?>
                                    </td>
                                        <td>
                                     <?php
                                       echo $data['coeff']
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
}
echo "</table>";
?> 
                </form>
            </div>
        </div>
    </div>