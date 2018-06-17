<?php
 
$id1 = (int)$_GET['id1'];
$id2 = (int)$_GET['id2'];

		$req='DELETE FROM enseigner WHERE id_m= :id_m and id_u = :id_u';
		$req = $bdd->prepare($req);
		$req = $req->execute(array(
		':id_m'=> $id1,
		':id_u'=> $id2
		));
header('Location:index.php?page=listeprof');
?>