<?php
 
$id = (int)$_GET['id'];

		$req='DELETE FROM classe WHERE id_c= :id';
		$req = $bdd->prepare($req);
		$req = $req->execute(array(
		':id'=> $id
		));
header('Location:index.php?page=listeclasse');
?>