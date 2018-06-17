<?php
 
$id = (int)$_GET['id'];

		$req='DELETE FROM matiere WHERE id_m= :id';
		$req = $bdd->prepare($req);
		$req = $req->execute(array(
		':id'=> $id
		));
header('Location:index.php?page=addmat');
?>