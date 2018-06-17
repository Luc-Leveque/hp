
<link href="css/messagerie.php" rel="stylesheet">


 <?php
    if(isset($_POST['submit']))
    {
        extract($_POST);
        

                $requete = $bdd->prepare("INSERT INTO message(titre,contenu,id_exp,id_dest) VALUES(:titre,:contenu,:exp,:dest)");
        
                $requete->bindValue(':titre',$titre,PDO::PARAM_STR);
                $requete->bindValue(':contenu',$contenu,PDO::PARAM_STR);
                $requete->bindValue(':exp',$_SESSION['id_u'],PDO::PARAM_INT);
                $requete->bindValue(':dest',$id_dest,PDO::PARAM_INT);
                $requete->execute();
                echo "Message envoyé";    
    }
?>

<div class="contenaire">
    <div class="row">
        <div class="col-xs-7 col-xs-offset-2">
    <form class="form" id="form1" method="post">
        
    <?php
        echo "<select class='btn btn-default' name='id_dest'>";
        
                $req = 'SELECT * FROM user where lvl=1 or lvl= 2';
                            $requete = $bdd->query($req);

                            while($data = $requete->fetch()){
          
            echo " <option  value=".$data['id_u'].">".$data['nom']." ".$data['prenom']."</option></br>";
                            }
        echo "</select>";
                        ?>
          <input type="text" name="titre" class="form-control" placeholder="Titre">
        <textarea name="contenu" class="form-control" id="comment" placeholder="Contenu"></textarea>
      
      
      <div class="submit">
        <input type="submit" name="submit" value="Envoyer" id="button-blue"/>
        <div class="ease"></div>
      </div>
    </form>
  </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-10 col-xs-offset-2">
        <h2>Message</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nom expediteur</th>
                    <th>Titre message</th>
                    <th>Contenu</th>
                </tr>
            </thead>
            <tbody>
<?php

        $id_u = $_SESSION['id_u'];

        $messages ="SELECT * FROM message , user where id_dest = $id_u  and id_exp = id_u ";

        $messages = $bdd->query($messages);

        while($reponse = $messages->fetch())
        {
        echo "<tr>";
        echo "<td>".$reponse['nom']." ".$reponse['prenom']."</td>";
        echo "<td>".$reponse['titre']."</td>";
        echo "<td>".$reponse['contenu']."</td>";
        echo "</tr>";
        }
        ?>
    </tbody>
  </table>
            </div>
        </div>