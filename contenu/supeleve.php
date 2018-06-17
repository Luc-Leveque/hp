<?php
 
$id = (int)$_GET['id'];

		$req='DELETE FROM user WHERE id_u= :id';
		$req = $bdd->prepare($req);
		$req = $req->execute(array(
		':id'=> $id
		));
header('Location:index.php?page=listeeleve');
?>