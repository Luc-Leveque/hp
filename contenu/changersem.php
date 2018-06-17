<?php


    $req="Select id_s from semestre where etat = 1";
    $requete = $bdd->query($req);
    $data = $requete->fetch();
    $id_act = $data['id_s'];
    

    $req2="Select id_s from semestre where etat = 0";
    $requete2 = $bdd->query($req2);
    $data2 = $requete2->fetch();
    $id_inact = $data2['id_s'];

    
    $req3="UPDATE semestre SET etat= 0 WHERE id_s =:id ;";
    $req3 = $bdd->prepare($req3);
    $req3 = $req3->execute(array(
    ':id'=> $id_act
    ));

    $req4="UPDATE semestre SET etat=1 WHERE id_s =:id ;";
    $req4 = $bdd->prepare($req4);
    $req4 = $req4->execute(array(
    ':id'=> $id_inact
    ));

    header('Location:index.php?page=Semestre');


?>